<?php
namespace Sabre\Connector\Task\Exceptions;

class WrongStatusException extends TaskException
{
    protected $actualStatus;
    protected $expectedStatus;

    public function getActualStatus()
    {
        return $this->actualStatus;
    }

    public function getExpectedStatus()
    {
        return $this->expectedStatus;
    }

    public function setActualStatus($actualStatus)
    {
        $this->actualStatus = $actualStatus;

        return $this;
    }

    public function setExpectedStatus($expectedStatus)
    {
        $this->expectedStatus = $expectedStatus;

        return $this;
    }
}
