<?php
namespace Sabre\Cryptography\RSA;

use DateTime;
use JsonSerializable;

class RsaKeyEntity implements JsonSerializable
{
    protected $id;
    protected $status;
    protected $publicKey;
    protected $privateKey;
    protected $expiration;
    protected $digest;

    public function __construct(
        $id,
        $status,
        $publicKey,
        $privateKey,
        $expiration = null,
        $digest     = null
    ) {
        $this->id           = intval($id);
        $this->status       = strval($status);
        $this->publicKey    = strval($publicKey);
        $this->privateKey   = strval($privateKey);
        if ($expiration) {
            $this->expiration = $expiration instanceof DateTime
                ? $expiration
                : new DateTime($expiration);
        }
        if ($digest) {
            $this->digest = strval($digest);
        }
    }

    // public : helpers //

    public function calculateDigest()
    {
        return base64_encode(hex2bin(sha1(base64_decode(
            $this->getStrippedPublicKey()
        ))));
    }

    public function getStrippedPublicKey()
    {
        return preg_replace(
            ['_^-----BEGIN([^-]*)-----(.*)-----END\1-----\s*$_s', '_\s_'],
            ['\2',                                                ''    ],
            $this->publicKey
        );
    }

    // public : getters //

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function getExpiration()
    {
        return $this->expiration;
    }

    public function getDigest()
    {
        return $this->digest;
    }

    // public : JsonSerializable //

    public function jsonSerialize()
    {
        return [
            'id'            => $this->id,
            'status'        => RsaKeyStatus::getName($this->status),
            'public_key'    => $this->publicKey,
            'private_key'   => $this->privateKey,
            'expiration'    => $this->expiration,
            'digest'        => $this->digest,
        ];
    }
}
