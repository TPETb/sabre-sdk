<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class BookingPrice
{
    /**
     * @Type("integer")
     * @XmlAttribute
     * @SerializedName("segment-id")
     */
    private $segmentId;

    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;
        return $this;
    }

    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * @Type("integer")
     * @XmlAttribute
     * @SerializedName("passenger-id")
     */
    private $passengerId;

    public function setPassengerId($passengerId)
    {
        $this->passengerId = $passengerId;
        return $this;
    }

    public function getPassengerId()
    {
        return $this->passengerId;
    }

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $accode;

    public function setAccode($accode)
    {
        $this->accode = $accode;
        return $this;
    }

    public function getAccode()
    {
        return $this->accode;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingPriceFare")
     * @XmlElement(cdata=false)
     */
    private $fare;

    public function setFare(BookingPriceFare $fare)
    {
        $this->fare = $fare;
        return $this;
    }

    public function getFare()
    {
        return $this->fare;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingPriceTaxes")
     * @XmlElement(cdata=false)
     */
    private $taxes;

    public function setTaxes(BookingPriceTaxes $taxes)
    {
        $this->taxes = $taxes;
        return $this;
    }

    public function getTaxes()
    {
        if($this->taxes instanceof BookingPriceTaxes){
            return $this->taxes->getTaxes();
        }
        return [];

    }

} 