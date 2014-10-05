<?php
namespace Sabre\Cryptography\RSA;

use Sabre\Cryptography\RSA\Exceptions\RsaKeyManagerNotSetException;

trait RsaKeyManagerAwareTrait
{
    /** @var RsaKeyManager */
    protected $rsaKeyManager;

    public function setRsaKeyManager(RsaKeyManager $rsaKeyManager)
    {
        $this->rsaKeyManager = $rsaKeyManager;

        return $this;
    }

    protected function getRsaKeyManager()
    {
        if (! $this->rsaKeyManager) {
            throw new RsaKeyManagerNotSetException('RsaKeyManager has not been set. Call setRsaKeyManager.');
        }
        return $this->rsaKeyManager;
    }
}
