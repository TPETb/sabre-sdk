<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

/**
 * Represents the booking segment point.
 */
class BookingResponseSegmentPoint
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $city;

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $airport;

    public function setAirport($airport)
    {
        $this->airport = $airport;
        return $this;
    }

    public function getAirport()
    {
        return $this->airport;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $terminal;

    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;
        return $this;
    }

    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
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
     * @Type("DateTime<'H:s'>")
     * @XmlElement(cdata=false)
     */
    private $time;

    public function setTime(\DateTime $time)
    {
        $this->time = $time;
        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }
} 