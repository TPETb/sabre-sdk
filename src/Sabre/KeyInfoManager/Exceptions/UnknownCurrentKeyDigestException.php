<?php
namespace Sabre\KeyInfoManager\Exceptions;

class UnknownCurrentKeyDigestException extends KeyInfoUpdaterException
{
    protected $digest;

    public function setDigest($digest)
    {
        $this->digest = $digest;

        return $this;
    }

    public function getDigest()
    {
        return $this->digest;
    }
}
