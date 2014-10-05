<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

/**
 * Represents the booking price collection.
 */
class BookingPrices
{
    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $tickSer;

    public function setTickSer($tickSer)
    {
        $this->tickSer = $tickSer;
        return $this;
    }

    public function getTickSer()
    {
        return $this->tickSer;
    }

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $fop;

    public function setFop($fop)
    {
        $this->fop = $fop;
        return $this;
    }

    public function getFop()
    {
        return $this->fop;
    }

    /**
     * @Type("array<Sabre\DTO\BookingResponse\BookingPrice>")
     * @XmlList(inline = true, entry = "price")
     */
    private $prices = [];

    public function addPrice(BookingPrice $price)
    {
        $this->prices[] = $price;
        return $this;
    }

    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingPrice")
     * @XmlElement(cdata=false)
     */
    private $variantTotal;

    public function setVariantTotal(BookingCurrencyValue $variantTotal)
    {
        $this->variantTotal = $variantTotal;
        return $this;
    }

    public function getVariantTotal()
    {
        return $this->variantTotal;
    }

} 