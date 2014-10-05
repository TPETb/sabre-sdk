<?php
namespace Sabre\Connector\Exceptions;

class RequestNotHandledException extends ConnectorException
{
    protected $task;

    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    public function getTask()
    {
        return $this->task;
    }
}
