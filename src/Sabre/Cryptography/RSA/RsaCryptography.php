<?php
namespace Sabre\Cryptography\RSA;

use Zend\Crypt\PublicKey\Rsa;
use Zend\Crypt\PublicKey\RsaOptions;

class RsaCryptography
{
    const PRIVATE_KEY_BITS = 1024;

    // public : interface for sirena client //

    /**
     * Generates key pair and stores it to db. Returns generated key id.
     *
     *  @return RsaKeyPair
    **/
    public function generateKeys()
    {
        $rsaOptions = new RsaOptions();
        $rsaOptions->generateKeys([
            'private_key_bits' => self::PRIVATE_KEY_BITS,
        ]);
        return new RsaKeyPair(
            $rsaOptions->getPublicKey(),
            $rsaOptions->getPrivateKey()
        );
    }

    public function encrypt($publicKey, $data)
    {
        return Rsa::factory(['public_key' => $publicKey])->encrypt($data);
    }

    public function decrypt($privateKey, $data)
    {
        return Rsa::factory(['private_key' => $privateKey])->decrypt($data);
    }

    public function sign($privateKey, $data)
    {
        return Rsa::factory(['private_key' => $privateKey])->sign($data);
    }

    public function verify($publicKey, $data, $sign)
    {
        return Rsa::factory(['public_key' => $publicKey])->verify($data, $sign);
    }
}
