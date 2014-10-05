<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PricingVariantTotal
{
    /**
     * Currency code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $currency;

    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Total amount.
     *
     * @Type("double")
     * @XmlValue(cdata=false)
     */
    private $amount;

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
