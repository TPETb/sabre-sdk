<?php
namespace Sabre\DTO\KeyInfoResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/**
 * @XmlRoot("sirena")
 */
class KeyInfoResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\KeyInfoResponse\KeyAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer(KeyAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getError() {
        return $this->answer->getKeyInfo()->getError();
    }

    public function getInfo() {
        return $this->answer->getKeyInfo()->getInfo();
    }
}
