<?php
namespace Sabre\Cryptography\RSA\Exceptions;

use DateTime;

class ExpirationDateInPastException extends RsaException
{
    protected $expirationDate;

    public function setExpirationDate(DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
}
