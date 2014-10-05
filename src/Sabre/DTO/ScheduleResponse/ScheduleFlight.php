<?php
namespace Sabre\DTO\ScheduleResponse;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class ScheduleFlight
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
     * @Type("integer")
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
     * @Type("Sabre\DTO\ScheduleResponse\ScheduleFlightTime")
     * @XmlElement(cdata=false)
     */
    private $depttime;

    public function setDepttime(ScheduleFlightTime $depttime)
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
     * @Type("Sabre\DTO\ScheduleResponse\ScheduleFlightTime")
     * @XmlElement(cdata=false)
     */
    private $arrvtime;

    public function setArrvtime(ScheduleFlightTime $arrvtime)
    {
        $this->arrvtime = $arrvtime;
        return $this;
    }

    public function getArrvtime()
    {
        return $this->arrvtime;
    }

    /**
     * Gets the period info for the schedule.
     *
     * @Type("Sabre\DTO\ScheduleResponse\ScheduleFlightTime")
     * @XmlElement(cdata=false)
     */
    private $period;

    public function setPeriod(ScheduleFlightTime $period)
    {
        $this->period = $period;
        return $this;
    }

    public function getPeriod()
    {
        return $this->period;
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
     * Gets the flight summary.
     *
     * @Type("Sabre\DTO\ScheduleResponse\ScheduleFlightClassInfo")
     * @XmlElement(cdata=false)
     */
    private $classes;

    public function setClasses(ScheduleFlightClassInfo $classes)
    {
        $this->classes = $classes;
        return $this;
    }

    public function getClasses()
    {
        return $this->classes;
    }


    /**
     * Gets the flight time.
     *
     * @SerializedName("flightTime")
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
