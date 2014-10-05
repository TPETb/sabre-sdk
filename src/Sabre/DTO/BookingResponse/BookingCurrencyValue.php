<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class BookingCurrencyValue
{

    /**
     * Gets the currency type.
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
     * Gets the currency value.
     *
     * @Type("string")
     * @XmlValue
     */
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
} 