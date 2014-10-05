<?php
namespace Sabre\DTO\IclientPubKeyResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/**
 * @XmlRoot("sirena")
 */
class IclientPubKeyResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\IclientPubKeyResponse\IclientPubKeyAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer(IclientPubKeyAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getError() {
        return $this->answer->getIclientPubKey()->getError();
    }

    public function getInfo() {
        return $this->answer->getIclientPubKey()->getInfo();
    }
}
