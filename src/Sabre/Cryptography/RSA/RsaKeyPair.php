<?php
namespace Sabre\Cryptography\RSA;

class RsaKeyPair
{
    /** @var string */
    protected $publicKey;

    /** @var string */
    protected $privateKey;

    public function __construct(
        $publicKey,
        $privateKey
    ) {
        $this->publicKey  = strval($publicKey);
        $this->privateKey = strval($privateKey);
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }
}
