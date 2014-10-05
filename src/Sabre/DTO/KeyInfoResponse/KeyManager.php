<?php
namespace Sabre\DTO\KeyInfoResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

class KeyManager
{
    /**
     * @Type("array<Sabre\DTO\KeyInfoResponse\KeyDigest>")
     * @XmlList(inline = true, entry = "key")
     */
    private $keys = [];

    public function getKeys()
    {
        return $this->keys;
    }

    public function addKey(KeyDigest $key)
    {
        $this->keys[] = $key;

        return $this;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $expiration;

    public function getExpiration()
    {
        return $this->expiration;
    }

    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $unconfirmed;

    public function getUnconfirmed()
    {
        return $this->unconfirmed;
    }

    public function setUnconfirmed($unconfirmed)
    {
        $this->unconfirmed = $unconfirmed;
        return $this;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $serverPublicKey;

    public function getServerPublicKey()
    {
        return $this->serverPublicKey;
    }

    public function setServerPublicKey($serverPublicKey)
    {
        $this->serverPublicKey = $serverPublicKey;
        return $this;
    }
}
