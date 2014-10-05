<?php


namespace Sabre\DTO\BookingResponse;


use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\Types\EnumBookingTaxOwner;

class BookingPriceTax
{
    /**
     * Gets the tax owner.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $owner;

    public function setOwner(EnumBookingTaxOwner $owner)
    {
        $this->owner = $owner->getValue();
        return $this;
    }

    public function getOwner()
    {
        $owner = new EnumBookingTaxOwner($this->owner);
        return $owner->getValue();
    }

    /**
     * Gets the tax code info.
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
     * Gets the tax currency value.
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