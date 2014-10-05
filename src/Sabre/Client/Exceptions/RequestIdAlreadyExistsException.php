<?php
namespace Sabre\Client\Exceptions;

class RequestIdAlreadyExistsException extends ClientException
{
    protected $requestId;

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }
}
