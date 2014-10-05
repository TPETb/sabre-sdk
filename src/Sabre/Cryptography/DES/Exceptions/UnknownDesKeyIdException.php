<?php
namespace Sabre\Cryptography\DES\Exceptions;

use Sabre\Exceptions\SdkException;

class UnknownDesKeyIdException extends SdkException
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;

        return $id;
    }

    public function getId()
    {
        return $id;
    }
}
