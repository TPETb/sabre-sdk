<?php
namespace Sabre\DTO\ScheduleResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Info\Info;

class ScheduleAnswerBody
{
    /**
     * Gets the departure city.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $departure;

    public function getDeparture()
    {
        return $this->departure;
    }

    public function setDeparture($departure)
    {
        $this->departure = $departure;
        return $this;
    }

    /**
     * Gets the arrival city.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $arrival;

    public function getArrival()
    {
        return $this->arrival;
    }

    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * Gets the departure time.
     *
     * @Type("DateTime<'d.m.Y'>")
     * @XmlAttribute
     */
    private $date;

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    /**
     * Gets the response error.
     *
     * @Type("Sabre\DTO\Error\Error")
     * @XmlElement(cdata=false)
     */
    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function setError(Error $error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Gets the additional info about the response.
     *
     * @Type("Sabre\DTO\Info\Info")
     * @XmlElement(cdata=false)
     */
    private $info;

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo(Info $info)
    {
        $this->info = $info;
        return $this;
    }

    /**
     * Gets the single segment flights.
     *
     * @Type("array<Sabre\DTO\ScheduleResponse\ScheduleFlight>")
     * @XmlList(inline = true, entry = "flight")
     */
    private $flight = [];

    public function addFlight(ScheduleFlight $flight)
    {
        $this->flight[] = $flight;
        return $this;
    }

    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * Gets the multi segment flights.
     *
     * @Type("array<Sabre\DTO\ScheduleResponse\ScheduleSegmentedFlight>")
     * @XmlList(inline = true, entry = "flights")
     */
    private $flights = [];

    public function addFlights(ScheduleSegmentedFlight $flights)
    {
        $this->flights[] = $flights;
        return $this;
    }

    public function getFlights()
    {
        return $this->flights;
    }
}
