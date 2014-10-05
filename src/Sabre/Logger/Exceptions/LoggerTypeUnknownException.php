<?php
namespace Sabre\Logger\Exceptions;

class LoggerTypeUnknownException extends LoggerException
{
    protected $type;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }
}
