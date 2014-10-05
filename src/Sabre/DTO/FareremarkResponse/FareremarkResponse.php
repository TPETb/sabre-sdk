<?php


namespace Sabre\DTO\FareremarkResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** XmlRoot */
class FareremarkResponse implements ResponseInterface
{

    /**
     * @Type("Sabre\DTO\FareremarkResponse\FareremarkAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(FareremarkAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError() {
        return $this->answer->getFareremark()->getError();
    }

    public function getInfo() {
        return $this->answer->getFareremark()->getInfo();
    }
} 