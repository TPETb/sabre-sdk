<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

class PricingVariant
{
    /**
     * Set to true if the flight cannot be booked on current blanks.
     *
     * Optional. "true" or "false".
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("TrCantPr")
     */
    private $trCantPr;

    public function setTrCantPr($trCantPr)
    {
        $this->trCantPr = $trCantPr;

        return $this;
    }

    public function getTrCantPr()
    {
        return $this->trCantPr;
    }

    /**
     * Set to "true" if eticket can be created.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $etPossible;

    public function setEtPossible($etPossible)
    {
        $this->etPossible = $etPossible;

        return $this;
    }

    public function getEtPossible()
    {
        return $this->etPossible;
    }

    /**
     * Set to "true" if the variant is created for eticket booking.
     *
     * Only exists if the request had et_if_possible="true".
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $etBlanks;

    public function setEtBlanks($etBlanks)
    {
        $this->etBlanks = $etBlanks;

        return $this;
    }

    public function getEtBlanks()
    {
        return $this->etBlanks;
    }

    /**
     * Number of blanks required to book the flight.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $nBlanks;

    public function setNBlanks($nBlanks)
    {
        $this->nBlanks = $nBlanks;

        return $this;
    }

    public function getNBlanks()
    {
        return $this->nBlanks;
    }

    /**
     * Form of payment supposed to estimate pricing.
     *
     * Two characters long.
     *
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
     * Payment medium type if fop permits.
     *
     * Two characters long.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $cardType;

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;

        return $this;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * A single flight.
     *
     * @Type("array<Sabre\DTO\PricingResponse\PricingFlight>")
     * @XmlList(inline = true, entry = "flight")
     * @XmlElement(cdata=false)
     */
    private $flights = [];

    public function getFlights()
    {
        return $this->flights;
    }

    public function addFlight(PricingFlight $flights)
    {
        $this->flights[] = $flights;
        return $this;
    }

    /**
     * Total price for the variant.
     *
     * Only present if the request had show_varianttotal="true".
     *
     * @Type("Sabre\DTO\PricingResponse\PricingVariantTotal")
     * @XmlElement(cdata=false)
     */
    private $variantTotal;

    public function setVariantTotal(PricingVariantTotal $variantTotal)
    {
        $this->variantTotal = $variantTotal;
        return $this;
    }

    public function getVariantTotal()
    {
        return $this->variantTotal;
    }

    /**
     * Overall trip time for the segment.
     *
     * Only present if the request had show_flighttime="true".
     *
     * @Type("array<Sabre\DTO\PricingResponse\PricingSegmentTransferTime>")
     * @XmlList(inline = true, entry = "segmentTransferTime")
     */
    private $segmentTransferTimes;

    public function addSegmentTransferTime(PricingSegmentTransferTime $segmentTransferTime)
    {
        $this->segmentTransferTimes[] = $segmentTransferTime;

        return $this;
    }

    public function getSegmentTransferTimes()
    {
        return $this->segmentTransferTimes;
    }
}
