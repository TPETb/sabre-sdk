<?php
namespace Sabre\DTO\AvailabilityResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\DtoException;

class AvailabilityFlight
{
    /**
     * Gets or sets the aviacompany.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $company;

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Gets the flight number.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $num;

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;
        return $this;
    }

    /**
     * Gets the departure city.
     *
     * @Type("string")
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
     * Gets the departure city terminal.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $origTerm;

    public function setOrigTerm($origTerm)
    {
        $this->origTerm = $origTerm;
        return $this;
    }

    public function getOrigTerm()
    {
        return $this->origTerm;
    }

    /**
     * Gets the destination city.
     *
     * @Type("string")
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
     * Gets the destination city terminal.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $destTerm;

    public function setDestTerm($destTerm)
    {
        $this->destTerm = $destTerm;
        return $this;
    }

    public function getDestTerm()
    {
        return $this->destTerm;
    }

    /**
     * Gets the departure time.
     *
     * @Type("Sabre\DTO\AvailabilityResponse\AvailabilityFlightTime")
     * @XmlElement(cdata=false)
     */
    private $depttime;

    public function setDepttime(AvailabilityFlightTime $depttime)
    {
        $this->depttime = $depttime;
        return $this;
    }

    public function getDepttime()
    {
        return $this->depttime;
    }

    /**
     * Gets the arrival time.
     *
     * @Type("Sabre\DTO\AvailabilityResponse\AvailabilityFlightTime")
     * @XmlElement(cdata=false)
     */
    private $arrvtime;

    public function setArrvtime(AvailabilityFlightTime $arrvtime)
    {
        $this->arrvtime = $arrvtime;
        return $this;
    }

    public function getArrvtime()
    {
        return $this->arrvtime;
    }

    /**
     * Gets the airplane code.
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
     * Gets intermediate stops count during the flight.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $ilc;

    public function setIlc($ilc)
    {
        $this->ilc = $ilc;
        return $this;
    }

    public function getIlc()
    {
        return $this->ilc;
    }

    /**
     * Gets the flight delay
     * 0 - during a day
     * else days count.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $delay;

    public function setDelay($delay)
    {
        $this->delay = $delay;
        return $this;
    }

    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * Gets the flight status.
     * The second letter is cyrillic.
     * "P" or "П" - in the port.
     * "D" or "У" - flown.
     * "R" or "Р" - registration closed.
     * "C" or "О" - canceled.
     * "M" or "Ц" - ЦОУ????
     * "G" or "Г" - closed by depth.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $status;

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Gets the flight subclasses.
     *
     * @Type("array<Sabre\DTO\AvailabilityResponse\AvailabilityFlightSubClass>")
     * @XmlList(inline = true, entry = "subclass")
     */
    private $subclasses = [];

    public function addSubclass(AvailabilityFlightSubClass $subclass)
    {
        $this->subclasses[] = $subclass;
        return $this;
    }

    public function getSubclasses()
    {
        return $this->subclasses;
    }

    /**
     * Gets the flight classes.
     *
     * @Type("array<Sabre\DTO\AvailabilityResponse\AvailabilityFlightSubClass>")
     * @XmlList(inline = true, entry = "class")
     */
    private $classes = [];

    public function addClass(AvailabilityFlightSubClass $subclass)
    {
        $this->classes[] = $subclass;
        return $this;
    }

    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Gets the flight summary.
     *
     * @Type("Sabre\DTO\AvailabilityResponse\AvailabilityFlightClassInfo")
     * @XmlElement(cdata=false)
     */
    private $summary;

    public function setSummary(AvailabilityFlightClassInfo $summary)
    {
        $this->summary = $summary;
        return $this;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Gets the flight time.
     *
     * @Type("DateTime<'H:i'>")
     * @XmlElement(cdata=false)
     */
    private $flightTime;

    public function setFlightTime(\DateTime $flightTime)
    {
        $this->flightTime = $flightTime;
        return $this;
    }

    public function getFlightTime()
    {
        return $this->flightTime;
    }

    /**
     * Gets the flag indicates e-ticketing is possible.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
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
}
