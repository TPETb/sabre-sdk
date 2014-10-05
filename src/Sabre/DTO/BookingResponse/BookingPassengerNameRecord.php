<?php
namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingPassengerNameRecord
{
    /**
     * @Type("DateTime<'H:i d.m.Y'>")
     * @XmlAttribute
     */
    private $bdate;

    public function setBdate($bdate)
    {
        $this->bdate = $bdate;

        return $this;
    }

    public function getBdate()
    {
        return $this->bdate;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $regnum;

    public function setRegnum($regnum)
    {
        $this->regnum = $regnum;
        return $this;
    }

    public function getRegnum()
    {
        return $this->regnum;
    }

    /**
     * @Type("DateTime<'d.m.y H:i'>")
     * @XmlElement(cdata=false)
     */
    private $timelimit;

    public function setTimelimit(\DateTime $timelimit)
    {
        $this->timelimit = $timelimit;
        return $this;
    }

    public function getTimelimit()
    {
        return $this->timelimit;
    }

    /**
     * @Type("DateTime<'H:i d.m.Y'>")
     * @XmlElement(cdata=false)
     */
    private $utcTimelimit;

    public function setUtcTimelimit(\DateTime $utcTimelimit)
    {
        $this->utcTimelimit = $utcTimelimit;
        return $this;
    }

    public function getUtcTimelimit()
    {
        return $this->utcTimelimit;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingResponsePassengers")
     * @XmlElement(cdata=false)
     */
    private $passengers;

    public function setPassengers(BookingResponsePassengers $passengers)
    {
        $this->passengers = $passengers;
        return $this;
    }

    public function getPassengers()
    {
        return $this->passengers->getPassengers();
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingResponseSegments")
     * @XmlElement(cdata=false)
     */
    private $segments;

    public function setSegments(BookingResponseSegments $segments)
    {
        $this->segments = $segments;
        return $this;
    }

    public function getSegments()
    {
        return $this->segments->getSegments();
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingPrices")
     * @XmlElement(cdata=false)
     */
    private $prices;

    public function setPrices(BookingPrices $prices)
    {
        $this->prices = $prices;
        return $this;
    }

    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingResponseContacts")
     * @XmlElement(cdata=false)
     */
    private $contacts;

    public function setContacts(BookingResponseContacts $contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $latinRegistration;

    public function setLatinRegistration($latinRegistration)
    {
        $this->latinRegistration = $latinRegistration;
        return $this;
    }

    public function getLatinRegistration()
    {
        return $this->latinRegistration;
    }

    /**
     * @Type("Sabre\DTO\BookingResponse\PossibleActionList")
     * @XmlElement(cdata=false)
     */
    private $possibleActionList;

    public function setPossibleActionList(PossibleActionList $possibleActionList)
    {
        $this->possibleActionList = $possibleActionList;

        return $this;
    }

    public function getPossibleActionList()
    {
        return $this->possibleActionList;
    }
}
