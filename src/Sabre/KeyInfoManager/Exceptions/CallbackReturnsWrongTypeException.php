<?php
namespace Sabre\KeyInfoManager\Exceptions;

class CallbackReturnsWrongTypeException extends KeyInfoManagerException
{
    /** @var callable */
    protected $callback;

    public function setCallback(callable $callback)
    {
        $this->callback = $callback;

        return $this;
    }

    public function getCallback()
    {
        return $this->callback;
    }
}
