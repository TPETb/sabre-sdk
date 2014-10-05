<?php
namespace Sabre\KeyInfoManager\Exceptions;

use Sabre\DTO\Error\Error;

class ResponseContainsErrorException extends KeyInfoManagerException
{
    /** @var Error */
    protected $error;

    public function setError(Error $error)
    {
        $this->error = $error;

        return $this;
    }

    public function getError()
    {
        return $this->error;
    }
}
