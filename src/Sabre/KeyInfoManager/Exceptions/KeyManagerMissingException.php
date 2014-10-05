<?php
namespace Sabre\KeyInfoManager\Exceptions;

use Sabre\DTO\KeyInfoResponse\KeyInfoResponse;

class KeyManagerMissingException extends KeyInfoManagerException
{
    /** @var KeyInfoResponse */
    protected $keyInfoResponse;

    public function setKeyInfoResponse(KeyInfoResponse $keyInfoResponse)
    {
        $this->keyInfoResponse = $keyInfoResponse;

        return $this;
    }

    public function getKeyInfoResponse()
    {
        return $this->keyInfoResponse;
    }
}
