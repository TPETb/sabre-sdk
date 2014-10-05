<?php
namespace Sabre\Cryptography\RSA\Exceptions;

class KeyNotFoundException extends RsaException
{
    protected $keyId;

    public function setKeyId($keyId)
    {
        $this->keyId = $keyId;

        return $this;
    }

    public function getKeyId()
    {
        return $this->keyId;
    }
}
