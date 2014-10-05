<?php
namespace Sabre\Sender;

use Sabre\Client\ClientInterface;
use Sabre\Client\Exceptions\RequestNotHandledException;
use Sabre\DTO\Interfaces\RequestInterface;
use Sabre\DTO\Interfaces\UnprotectedRequestInterface;
use Sabre\Sender\Exception\SenderException;

abstract class SenderAbstract
{
    /**
     * Debug serializer
     */
    const SERIALIZER_DEBUG = false;

    /**
     * Annotation namespace
     */
    const ANNOTATION_NAMESPACE = 'JMS\Serializer\Annotation';

    /**
     * Response Id
     *
     * @var integer
     */
    protected $responseId = null;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var \JMS\Serializer\Serializer
     */
    protected $serializer;

    /**
     * @var RequestInterface
     */
    private $_request;

    /**
     * @var ResponseInterface
     */
    private $_response;

    /**
     * Retry count
     *
     * @var int
     */
    private $_retryCount = 0;

    /**
     * Maximum retry count
     *
     * @var int
     */
    private $_maxRetryCount = 3;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    abstract protected function getResponseDtoClassname();

    /**
     * @return \Sabre\DTO\Interfaces\ResponseInterface
     * @throws Exception\SenderException
     */
    public function awaitResponse()
    {
        $responseDto = $this->getResponseDtoClassname();

        if (!$this->_response instanceof $responseDto) {
            if ($this->responseId === null) {
                throw new SenderException(
                    'Request does not sent.'
                    , SenderException::REQUEST_DOES_NOT_SENT);
            }

            try {
                $this->_response = $this->client->awaitResponse($this->responseId, $responseDto);
            } catch (RequestNotHandledException $e) {
                return $this->_retrySend($e);
            }

            if (!$this->_response instanceof $responseDto) {
                throw new SenderException(sprintf(
                    'Wrong response instance. Waiting \'%s\', returned \'%s\'.',
                    $responseDto,
                    @get_class($this->_response)
                ), SenderException::WRONG_RESPONSE);
            }
        }

        return $this->_response;
    }

    public function setMaxRetryCount($_maxRetryCount)
    {
        $this->_maxRetryCount = $_maxRetryCount;

        return $this;
    }

    public function getMaxRetryCount()
    {
        return $this->_maxRetryCount;
    }

    /**
     * Check request and call client send request
     *
     * @param RequestInterface $request
     * @return $this
     * @throws Exception\SenderException
     */
    protected function doSendRequest(RequestInterface $request)
    {
        if ($this->responseId !== null) {
            throw new SenderException(sprintf(
                'Request already sent with id \'%d\'',
                $this->responseId
            ), SenderException::REQUEST_ALREADY_SENT);
        }
        $this->clientSendRequest($request);
        $this->_request = $request;

        return $this;
    }

    /**
     * Send request
     *
     * @param RequestInterface $request
     */
    private function clientSendRequest(RequestInterface $request)
    {
        $this->responseId = ($request instanceof UnprotectedRequestInterface ? $this->client->sendRequest($request, false) : $this->client->sendRequest($request));
    }

    /**
     * Retry send request
     *
     * @param RequestNotHandledException $e
     * @return \Sabre\DTO\Interfaces\ResponseInterface
     * @throws RequestNotHandledException
     */
    private function _retrySend($e)
    {
        if ($this->_retryCount >= $this->_maxRetryCount) {
            throw new RequestNotHandledException($e->getMessage(), $e->getCode(), $e);
        }
        $this->_retryCount++;
        $this->clientSendRequest($this->_request);

        return $this->awaitResponse();
    }
}
