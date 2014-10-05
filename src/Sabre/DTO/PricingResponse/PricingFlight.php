<?php
namespace Sabre\DTO\PricingResponse;

use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlList;

class PricingFlight
{
    /**
     * Origin (i.e. departure) location code.
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("iSegmentOrig")
     */
    private $iSegmentOrig;

    public function setISegmentOrig($iSegmentOrig)
    {
        $this->iSegmentOrig = $iSegmentOrig;

        return $this;
    }

    public function getISegmentOrig()
    {
        return $this->iSegmentOrig;
    }

    /**
     * Destination (i.e. arrival) location code.
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("iSegmentDest")
     */
    private $iSegmentDest;

    public function setISegmentDest($iSegmentDest)
    {
        $this->iSegmentDest = $iSegmentDest;

        return $this;
    }

    public function getISegmentDest()
    {
        return $this->iSegmentDest;
    }

    /**
     * Origin and destination location codes joined with hyphen ('-') as separator.
     *
     * Docs say it is supposed to be the ordinal number of corresponding segment in the request,
     * but it is not what the server actually returns.
     * Only present if the request had show_io_matching="true".
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("iSegmentNum")
     */
    private $iSegmentNum;

    public function setISegmentNum($iSegmentNum)
    {
        $this->iSegmentNum = $iSegmentNum;

        return $this;
    }

    public function getISegmentNum()
    {
        return $this->iSegmentNum;
    }

    /**
     * Ordinal number of the flight within its segment.
     *
     * Only present if the request had show_io_matching="true".
     *
     * @Type("integer")
     * @XmlAttribute
     * @SerializedName("oSegmentPartNum")
     */
    private $oSegmentPartNum;

    public function setOSegmentPartNum($oSegmentPartNum)
    {
        $this->oSegmentPartNum = $oSegmentPartNum;

        return $this;
    }

    public function getOSegmentPartNum()
    {
        return $this->oSegmentPartNum;
    }

    /**
     * Count of flights within current segment.
     *
     * Only present if the request had show_io_matching="true".
     *
     * @Type("integer")
     * @XmlAttribute
     * @SerializedName("oSegmentPartQuantity")
     */
    private $oSegmentPartQuantity;

    public function setOSegmentPartQuantity($oSegmentPartQuantity)
    {
        $this->oSegmentPartQuantity = $oSegmentPartQuantity;

        return $this;
    }

    public function getOSegmentPartQuantity()
    {
        return $this->oSegmentPartQuantity;
    }

    /**
     * Marketing airline code.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $company;

    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Operating airline code if differs from marketing airline.
     *
     * Optional.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $operationCompany;

    public function setOperationCompany($operationCompany)
    {
        $this->operationCompany = $operationCompany;

        return $this;
    }

    public function getOperationCompany()
    {
        return $this->operationCompany;
    }

    /**
     * Flight number.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $num;

    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    public function getNum()
    {
        return $this->num;
    }

    /**
     * Departure location code.
     *
     * @Type("Sabre\DTO\PricingResponse\PricingLocation")
     * @XmlElement(cdata=false)
     */
    private $origin;

    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Arrival location code.
     *
     * @Type("Sabre\DTO\PricingResponse\PricingLocation")
     * @XmlElement(cdata=false)
     */
    private $destination;

    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Departure date (not including time).
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $deptdate;

    /** @return DateTime */
    public function getDeptdate()
    {
        return $this->deptdate;
    }

    public function setDeptdate(DateTime $deptdate)
    {
        $this->deptdate = $deptdate;

        return $this;
    }

    /**
     * Departure time (not including date).
     *
     * @Type("DateTime<'H:i'>")
     * @XmlElement(cdata=false)
     */
    private $depttime;

    /** @return DateTime */
    public function getDepttime()
    {
        return $this->depttime;
    }

    public function setDepttime(DateTime $depttime)
    {
        $this->depttime = $depttime;

        return $this;
    }

    /**
     * Arrival date (not including time).
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $arrvdate;

    /** @return DateTime */
    public function getArrvdate()
    {
        return $this->arrvdate;
    }

    public function setArrvdate(DateTime $arrvdate)
    {
        $this->arrvdate = $arrvdate;

        return $this;
    }

    /**
     * Arrival time (not including date).
     *
     * @Type("DateTime<'H:i'>")
     * @XmlElement(cdata=false)
     */
    private $arrvtime;

    /** @return DateTime */
    public function getArrvtime()
    {
        return $this->arrvtime;
    }

    public function setArrvtime(DateTime $arrvtime)
    {
        $this->arrvtime = $arrvtime;

        return $this;
    }

    /**
     * Available travel class.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $class;

    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    /**
     * Available travel subclass.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $subclass;

    public function setSubclass($subclass)
    {
        $this->subclass = $subclass;

        return $this;
    }

    public function getSubclass()
    {
        return $this->subclass;
    }

    /**
     * Airplane type code.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $airplane;

    public function setAirplane($airplane)
    {
        $this->airplane = $airplane;

        return $this;
    }

    public function getAirplane()
    {
        return $this->airplane;
    }

    /**
     * Number of available seats of current subclass.
     *
     * Only present if the request had show_available="true".
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $available;

    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Flight time.
     *
     * Only present if the request had show_flighttime="true".
     *
     * @Type("DateTime<'H:i'>")
     * @XmlElement(cdata=false)
     * @SerializedName("flightTime")
     */
    private $flightTime;

    public function getFlightTime()
    {
        return $this->flightTime;
    }

    public function setFlightTime(DateTime $flightTime)
    {
        $this->flightTime = $flightTime;

        return $this;
    }

    /**
     * Price calculation for each passenger on the flight.
     *
     * @Type("array<Sabre\DTO\PricingResponse\PricingPrice>")
     * @XmlList(inline = true, entry = "price")
     * @XmlElement(cdata=false)
     */
    private $prices = [];

    public function getPrices()
    {
        return $this->prices;
    }

    public function addPrice(PricingPrice $price)
    {
        $this->prices[] = $price;

        return $this;
    }
}
