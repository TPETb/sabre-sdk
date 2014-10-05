<?php


namespace Sabre\DTO\AvailabilityResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class AvailabilityResponse implements ResponseInterface
{

    /**
     * @Type("Sabre\DTO\AvailabilityResponse\AvailabilityAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer(AvailabilityAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getError() {
        return $this->answer->getAvailability()->getError();
    }

    public function getInfo() {
        return $this->answer->getAvailability()->getInfo();
    }

} 