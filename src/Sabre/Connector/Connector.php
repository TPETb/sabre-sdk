<?php
namespace Sabre\Connector;

use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\StreamInterface;
use Sabre\Connector\ConnectorRequest;
use Sabre\Connector\ConnectorResponse;
use Sabre\Connector\Exceptions\IdAlreadyExistsException;
use Sabre\Connector\Exceptions\ReadTryLimitReachedException;
use Sabre\Connector\Exceptions\RequestNotHandledException;
use Sabre\Connector\Exceptions\RequestTimeoutException;
use Sabre\Connector\Exceptions\RequestWrongTypeException;
use Sabre\Connector\Exceptions\SocketOpenException;
use Sabre\Connector\Exceptions\UnknownMessageIdException;
use Sabre\Connector\Exceptions\UnknownRequestException;
use Sabre\Connector\Exceptions\UnreachableCodeException;
use Sabre\Connector\Header\Header;
use Sabre\Connector\Header\ResponseHeader;
use Sabre\Connector\Task\Task;

class Connector implements ConnectorInterface
{
    /**
     * @var integer
     **/
    protected $connectionTimeout;

    /**
     * @var string
     **/
    protected $host;

    /**
     * Maps messageId to taskId.
     *
     * @var array<integer, integer>
     **/
    protected $messageIdTaskIdMap;

    /**
     * @var integer
     **/
    protected $port;

    /** @var resource * */
    protected $socket;

    /**
     * @var StreamInterface
     **/
    protected $stream;

    /**
     * @var array<integer, Task>
     **/
    protected $tasks = [];

    /**
     * @var integer
     **/
    protected $userId;

    // public : Connector //

    /**
     * @param  string $host Hostname or IP address to connect to.
     * @param  integer $port Port number to connect to.
     * @param  integer $connectionTimeout Timeout in seconds for establishing connection.
     **/
    public function __construct($host, $port, $connectionTimeout)
    {
        $this->host = $host;
        $this->port = $port;
        $this->connectionTimeout = $connectionTimeout;
    }

    // public : ConnectorInterface //

    /**
     * Stores a request internally and associates it with given id.
     *
     * @param  integer $id Identifier used later to retrieve request/response info.
     * @param  ConnectorRequest $request
     * @return self
     **/
    public function addRequest($id, ConnectorRequest $request)
    {
        if (isset($this->tasks[$id])) {
            throw (new IdAlreadyExistsException('Request with id="' . $id . '" already exists'))->setId($id);
        }

        $this->tasks[$id] = new Task($id, $request);

        return $this;
    }


    /**
     * Shorthand for multiple calls to addRequest.
     *
     * @param  array <integer, ConnectorRequest>  $idRequestMap
     * @return self
     **/
    public function addRequests(array $idRequestMap)
    {
        foreach ($idRequestMap as $id => $request) {
            if (!$request instanceof ConnectorRequest) {
                throw (new RequestWrongTypeException('Request value for id="' . $id . '" is not an instance of SirenaRequestInterface'))->setId($id);
            }
            $this->addRequest($id, $request);
        }

        return $this;
    }


    /**
     * Writes all unsent requests to the socket. If connection is not yet open, establishes it.
     *
     * @return self
     **/
    public function send()
    {
        foreach ($this->tasks as $task) {
            $this->startTask($task);
        }

        return $this;
    }


    /**
     * Stops execution and reads socket until response with given id is read; then returns it.
     *
     * @param  integer $id Identifier of the request as set by addRequest[s] method.
     * @return ConnectorResponse       Response header and body.
     * @throws RequestTimeoutException(request) if response cannot be read from socket within timeout defined by request.
     * @throws UnknownRequestException(id) if id is unknown.
     **/
    public function awaitResponse($id)
    {
        return $this->awaitResponses([$id])[$id];
    }


    /**
     * Reads socket until all requests with given ids are successfully read from socket.
     *
     * @param  array <integer>                      $ids    Identifiers of the requests as set by addRequest[s] method.
     * @return array<integer, ConnectorResponse>           Response map from ids to responses.
     * @throws RequestTimeoutException(request) if at least one response cannot be read from socket within timeout defined by its request.
     * @throws UnknownRequestException(id) if there is an unknown id passed.
     **/
    public function awaitResponses(array $ids)
    {
        /**
         * Maps ids to responses.
         *
         * @var array<integer, ConnectorResponse>
         **/
        $responses = [];

        // Handle tasks that are already processed and make sure all requests are sent.
        /**
         * ### ATTENTION! ###
         * All tasks are actually "already processed" at this point as script is synchronous
         */
        foreach ($ids as $id) {
            $task = $this->getTaskById($id);

            if ($task->isAborted()) {
                throw (new RequestNotHandledException('Request was not handled by server after ' . $task->getRetryCount() . ' retries'))
                    ->setTask($task);
            }

            if ($task->isFinished()) {
                $responses[$id] = $task->getResponse();
                continue;
            }

            $this->startTask($task);
            $pendingTasks[$id] = $task;

            // Handle expired tasks.
            if ($task->isExpired()) {
                throw (new RequestTimeoutException('Request is already expired'))
                    ->setRequest($task->getRequest());
            }
        }

        return $responses;
    }

    // protected : task operations //

    /**
     * @param  integer $messageId
     * @return Task
     **/
    protected function getTaskByMessageId($messageId)
    {
        if (!isset($this->messageIdTaskIdMap[$messageId])) {
            throw (new UnknownMessageIdException('Message with id "' . $messageId . '" is unknown'))
                ->setMessageId($messageId);
        }
        $taskId = $this->messageIdTaskIdMap[$messageId];
        return $this->getTaskById($taskId);
    }


    /**
     * @param $taskId
     * @return Task
     * @throws UnknownRequestException
     */
    protected function getTaskById($taskId)
    {
        if (!isset($this->tasks[$taskId])) {
            throw (new UnknownRequestException('Request id "' . $taskId . '" is unknown'))->setId($taskId);
        }
        return $this->tasks[$taskId];
    }


    /**
     * Starts task and writes its data to socket if the task is new.
     *
     * Does nothing otherwise.
     *
     * @param  Task $task
     **/
    protected function startTask(Task $task)
    {
        if ($task->isNew()) {
            // TODO: Catch errors and abort task if something goes wrong.

            // Generate message ids and verify they don't clash.
            do {
                $messageId = mt_rand();
            } while (isset($this->messageIdTaskIdMap[$messageId]));
            $this->messageIdTaskIdMap[$messageId] = $task->getTaskId();
            $task->start($messageId);
            $this->sendTask($task);
        }
    }


    /**
     * This method actually launches the actual SOAP request
     *
     * There is a stream per every request
     *
     * @param Task $task
     * @throws RequestNotHandledException
     */
    protected function sendTask(Task $task)
    {
        $stream = $this->getStream();
        $stream->write($this->buildRequestHeader($task->getRequest()->getBody()) . "\r\n\r\n" . $task->getRequest()->getBody());

        $buffer = $stream->__toString();

        list($header, $body) = explode("\r\n\r\n", $buffer);

        if (!strlen($body)) {
            // Something went very very wrong (usually because headers were incorrect)
            throw (new RequestNotHandledException('Request was not handled by server, server returned empty body'))
                ->setTask($task);
        }

        $header = ResponseHeader::fromString($header);

        // Check if request was handled by the server.
//        if ($header->getFlags()->getNotHandled()) {
//            throw (new RequestNotHandledException('Request was not handled by server after ' . $task->getRetryCount() . ' retries'))
//                ->setTask($task);
//        } else {
            // Request was handled, instantiate response.
            $response = new ConnectorResponse($header, $body);

            // Finish the task that response corresponds to.
            $task->finish($response);
//        }
    }


    // protected : stream operations //

    protected function updateStreamTimeout()
    {
        $maxTimeout = 0;
        foreach ($this->tasks as $task) {
            if ($task->isInProgress()) {
                $taskTimeout = $task->getRequest()->getTimeout();
                if ($maxTimeout < $taskTimeout) {
                    $maxTimeout = $taskTimeout;
                }
            }
        }
        stream_set_timeout($this->getSocket(), $maxTimeout);
    }


    protected function getStream()
    {
        return Stream::factory($this->getSocket());
    }


    /**
     * @return resource
     * @throws SocketOpenException
     * @todo check if multiple streams are possible per socket
     */
    protected function getSocket()
    {
        // Call fsockopen with warning suppression: when timed out, fsockopen triggers an undocumented warning.
        $socket = @fsockopen($this->host, $this->port, $errorNumber, $errorMessage, $this->connectionTimeout);

        if (!$socket) {
            throw new SocketOpenException($errorMessage, $errorNumber);
        }

        return $socket;
    }


    /**
     * @param $body
     * @return string
     * @todo move to separate class, use something more "beautiful" then string concat
     */
    protected function buildRequestHeader($body)
    {
        return
            'POST /websvc HTTP/1.1
Host: ' . parse_url($this->host)['host'] . '
Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5
Accept-Language: en-us,en;q=0.5
Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7
Keep-Alive: 300
Connection: keep-alive
Content-Type: text/xml
Content-Length: ' . strlen($body) . '
Pragma: no-cache
Cache-Control: no-cache';
    }
}
