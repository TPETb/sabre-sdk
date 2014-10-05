<?php


namespace Sabre\DTO\FaresResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** XmlRoot */
class FaresResponse implements ResponseInterface
{

    /**
     * @Type("Sabre\DTO\FaresResponse\FaresAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(FaresAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError() {
        return $this->answer->getFares()->getError();
    }

    public function getInfo() {
        return $this->answer->getFares()->getInfo();
    }
} 