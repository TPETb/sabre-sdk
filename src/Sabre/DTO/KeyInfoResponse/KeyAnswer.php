<?php
namespace Sabre\DTO\KeyInfoResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class KeyAnswer
{
    /**
     * @XmlAttribute
     * @Type("string")
     */
    private $pult;

    public function getPult()
    {
        return $this->pult;
    }

    public function setPult($pult)
    {
        $this->pult = $pult;
        return $this;
    }

    /**
     * @Type("Sabre\DTO\KeyInfoResponse\KeyAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $keyInfo;

    public function getKeyInfo()
    {
        return $this->keyInfo;
    }

    public function setKeyInfo(KeyAnswerBody $keyInfo)
    {
        $this->keyInfo = $keyInfo;
        return $this;
    }
}
