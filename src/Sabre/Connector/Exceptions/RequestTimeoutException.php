<?php
namespace Sabre\Connector\Exceptions;

use Sabre\Connector\ConnectorRequest;

class RequestTimeoutException extends ConnectorException
{
    protected $request;

    public function setRequest(ConnectorRequest $request)
    {
        $this->request = $request;

        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
