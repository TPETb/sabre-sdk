<?php
namespace Sabre\Connector\Exceptions;

class WrongHeaderLengthException extends ConnectorException
{
    protected $actualLength;

    protected $expectedLength;

    protected $headerData;

    public function setExpectedLength($expectedLength)
    {
        $this->expectedLength = $expectedLength;

        return $this;
    }

    public function setActualLength($actualLength)
    {
        $this->actualLength = $actualLength;

        return $this;
    }

    public function setHeaderData($headerData)
    {
        $this->headerData = $headerData;

        return $this;
    }

    public function getExpectedLength()
    {
        return $this->expectedLength;
    }

    public function getActualLength()
    {
        return $this->actualLength;
    }

    public function getHeaderData()
    {
        return $this->headerData;
    }
}
