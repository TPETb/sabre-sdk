<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class PricingResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\PricingResponse\PricingAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(PricingAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError()
    {
        return $this->answer->getPricing()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getPricing()->getInfo();
    }
}
