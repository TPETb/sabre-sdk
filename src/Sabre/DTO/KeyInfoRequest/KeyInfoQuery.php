<?php
namespace Sabre\DTO\KeyInfoRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class KeyInfoQuery
{
    public function __construct()
    {
        $this->keyInfo = new KeyInfoQueryParams();
    }

    /**
     * @Type("Sabre\DTO\KeyInfoRequest\KeyInfoQueryParams")
     * @XmlElement(cdata=false)
     */
    private $keyInfo;

    public function getKeyInfo()
    {
        return $this->keyInfo;
    }

    public function setKeyInfo(KeyInfoQueryParams $keyInfo)
    {
        $this->keyInfo = $keyInfo;
        return $this;
    }
}
