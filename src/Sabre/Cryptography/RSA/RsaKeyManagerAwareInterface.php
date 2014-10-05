<?php
namespace Sabre\Cryptography\RSA;

interface RsaKeyManagerAwareInterface
{
    public function setRsaKeyManager(RsaKeyManager $rsaKeyManager);
}
