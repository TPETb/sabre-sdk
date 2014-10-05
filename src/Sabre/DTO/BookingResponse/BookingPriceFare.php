<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingPriceFare
{

    /**
     * Gets the fare expiration date.
     *
     * @XmlAttribute
     * @Type("DateTime<'Y-i-d H:i'>")
     */
    private $fareExpdate;

    public function setFareExpdate(\DateTime $fareExpdate)
    {
        $this->fareExpdate = $fareExpdate;
        return $this;
    }

    public function getFareExpdate()
    {
        return $this->fareExpdate;
    }

    /**
     * Gets the fare code info.
     *
     * @Type("Sabre\DTO\BookingResponse\BookingPriceCode")
     * @XmlElement(cdata=false)
     */
    private $code;

    public function setCode(BookingPriceCode $code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Gets the currency value.
     *
     * @Type("Sabre\DTO\BookingResponse\BookingCurrencyValue")
     * @XmlElement(cdata=false)
     */
    private $value;

    public function setValue(BookingCurrencyValue $value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

} 