<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class BookingPriceCode
{

    /**
     * Gets the base code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $baseCode;

    public function setBaseCode($baseCode)
    {
        $this->baseCode = $baseCode;
        return $this;
    }

    public function getBaseCode()
    {
        return $this->baseCode;
    }

    /**
     * Gets the code value.
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