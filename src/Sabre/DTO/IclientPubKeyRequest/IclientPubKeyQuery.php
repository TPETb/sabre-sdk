<?php
namespace Sabre\DTO\IclientPubKeyRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class IclientPubKeyQuery
{
    /**
     * @Type("Sabre\DTO\IclientPubKeyRequest\IclientPubKeyQueryParams")
     * @XmlElement(cdata=false)
     */
    private $iclientPubKey;

    public function getIclientPubKey()
    {
        return $this->iclientPubKey;
    }

    public function setIclientPubKey(IclientPubKeyQueryParams $iclientPubKey)
    {
        $this->iclientPubKey = $iclientPubKey;
        return $this;
    }
}
