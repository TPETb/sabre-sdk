<?php
namespace Sabre\Connector\Task;

use DateTime;
use Sabre\Connector\ConnectorRequest;
use Sabre\Connector\ConnectorResponse;
use Sabre\Connector\Task\Exceptions\ResponseUnknownException;
use Sabre\Connector\Task\Exceptions\TimerNotStartedException;
use Sabre\Connector\Task\Exceptions\WrongStatusException;

class Task
{
    const STATUS_NEW         = __LINE__;
    const STATUS_IN_PROGRESS = __LINE__;
    const STATUS_FINISHED    = __LINE__;
    const STATUS_ABORTED     = __LINE__;

    const MAX_RETRY_COUNT    = 10;

    // var //

    /** @var DateTime */
    protected $expiration;

    /** @var integer */
    protected $messageId;

    /** @var ConnectorRequest */
    protected $request;

    /** @var ConnectorResponse */
    protected $response;

    /** @var STATUS_* */
    protected $status = self::STATUS_NEW;

    /** @var integer */
    protected $taskId;

    /** @var integer */
    protected $retryCount = 0;

    // public //

    public function __construct($taskId, ConnectorRequest $request)
    {
        $this->taskId = intval($taskId);
        $this->request = $request;
    }

    // public : getters //

    public function getMessageId()
    {
        return $this->messageId;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        if (! $this->response) {
            throw (new ResponseUnknownException('Response has not been set. Call ' . get_called_class() . '::finish()'))
                ->setTask($this);
        }
        return $this->response;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function getRetryCount()
    {
        return $this->retryCount;
    }

    public function isExpired()
    {
        if (! $this->expiration) {
            throw (new TimerNotStartedException('Timer has not been started. Call ' . get_called_class() . '::start()'))
                ->setTask($this);
        }
        return $this->expiration < (new DateTime());
    }

    // public : status getters //

    public function getStatus()
    {
        return $this->status;
    }

    public function isNew()
    {
        return $this->status === self::STATUS_NEW;
    }

    public function isInProgress()
    {
        return $this->status === self::STATUS_IN_PROGRESS;
    }

    public function isFinished()
    {
        return $this->status === self::STATUS_FINISHED;
    }

    public function isAborted()
    {
        return $this->status === self::STATUS_ABORTED;
    }

    // public : setters //

    public function start($messageId)
    {
        if ($this->status !== self::STATUS_NEW) {
            throw (new WrongStatusException('Cannot start a task which is not new'))
                ->setTask($this)
                ->setExpectedStatus(self::STATUS_NEW)
                ->setActualStatus($this->status);
        }
        $this->status = self::STATUS_IN_PROGRESS;
        $this->expiration = (new DateTime('+' . $this->request->getTimeout() . ' seconds'));
        $this->messageId = $messageId;

        return $this;
    }

    public function retry()
    {
        ++$this->retryCount;
        if ($this->retryCount >= self::MAX_RETRY_COUNT) {
            $this->abort();
        }

        return $this;
    }

    public function finish(ConnectorResponse $response)
    {
        if ($this->status !== self::STATUS_IN_PROGRESS) {
            throw (new WrongStatusException('Cannot finish a task which is not in progress'))
                ->setTask($this)
                ->setExpectedStatus(self::STATUS_NEW)
                ->setActualStatus($this->status);
        }
        $this->status = self::STATUS_FINISHED;
        $this->response = $response;

        return $this;
    }

    public function abort()
    {
        $this->status = self::STATUS_ABORTED;

        return $this;
    }
}
