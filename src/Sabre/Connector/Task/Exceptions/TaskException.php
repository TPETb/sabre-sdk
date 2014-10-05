<?php
namespace Sabre\Connector\Task\Exceptions;

use Sabre\Connector\Exceptions\ConnectorException;

class TaskException extends ConnectorException
{
    protected $task;

    public function setTask(Task $task)
    {
        $this->task = $task;

        return $this;
    }

    public function getTask()
    {
        return $task;
    }
}
