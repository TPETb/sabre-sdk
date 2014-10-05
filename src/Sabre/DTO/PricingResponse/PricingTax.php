<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PricingTax
{
    /**
     * Tax code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $code;

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Tax owner is the party taking the tax: aircompany or agency.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $owner;

    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Tax amount.
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
