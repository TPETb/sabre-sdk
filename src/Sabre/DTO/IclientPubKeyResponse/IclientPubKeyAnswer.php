<?php
namespace Sabre\DTO\IclientPubKeyResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class IclientPubKeyAnswer
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
     * @Type("Sabre\DTO\IclientPubKeyResponse\IclientPubKeyAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $iclientPubKey;

    public function getIclientPubKey()
    {
        return $this->iclientPubKey;
    }

    public function setIclientPubKey(IclientPubKeyAnswerBody $iclientPubKey)
    {
        $this->iclientPubKey = $iclientPubKey;
        return $this;
    }
}
