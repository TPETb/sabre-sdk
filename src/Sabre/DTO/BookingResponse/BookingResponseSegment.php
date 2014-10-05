<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\Types\EnumBookingSegmentStatus;

class BookingResponseSegment
{
    /**
     * @Type("integer")
     * @XmlAttribute
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
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
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $flight;

    public function setFlight($flight)
    {
        $this->flight = $flight;
        return $this;
    }

    public function getFlight()
    {
        return $this->flight;
    }

    /**
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
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $seatcount;

    public function setSeatcount($seatcount)
    {
        $this->seatcount = $seatcount;
        return $this;
    }

    public function getSeatcount()
    {
        return $this->seatcount;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingResponseSegmentPoint")
     * @XmlElement(cdata=false)
     */
    private $departure;

    public function setDeparture(BookingResponseSegmentPoint $departure)
    {
        $this->departure = $departure;
        return $this;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingResponseSegmentPoint")
     * @XmlElement(cdata=false)
     */
    private $arrival;

    public function setArrival(BookingResponseSegmentPoint $arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Gets the segment status.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $status;

    public function setStatus(EnumBookingSegmentStatus $status)
    {
        $this->status = $status->getValue();
        return $this;
    }

    public function getStatus()
    {
        $status = new EnumBookingSegmentStatus($this->status);
        return $status->getValue();
    }
} 