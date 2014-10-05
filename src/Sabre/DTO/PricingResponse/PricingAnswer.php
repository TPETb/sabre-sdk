<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;

class PricingAnswer
{
    use AnswerAttributesTrait;

    /**
     * @Type("Sabre\DTO\PricingResponse\PricingAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $pricing;

    public function setPricing(PricingAnswerBody $pricing)
    {
        $this->pricing = $pricing;

        return $this;
    }

    public function getPricing()
    {
        return $this->pricing;
    }
}
