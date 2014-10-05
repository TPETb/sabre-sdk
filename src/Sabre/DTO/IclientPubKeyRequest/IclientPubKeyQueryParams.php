<?php
namespace Sabre\DTO\IclientPubKeyRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class IclientPubKeyQueryParams
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $pubKey;

    public function getPubKey()
    {
        return $this->pubKey;
    }

    public function setPubKey($pubKey)
    {
        $this->pubKey = $pubKey;
        return $this;
    }
}
