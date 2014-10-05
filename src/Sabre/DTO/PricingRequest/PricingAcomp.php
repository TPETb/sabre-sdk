<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

class PricingAcomp
{
    /**
     * Aviacompany name
     *
     * @Type("string")
     * @XmlAttribute
     */
    protected $name;

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Flight number. Can be wildcard.
     *
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "flight")
     * @XmlElement(cdata=false)
     */
    protected $flights = [];

    public function addFlight($flight)
    {
        $this->flights[] = $flight;

        return $this;
    }

    public function getFlights()
    {
        return $this->flights;
    }

    /**
     * Fare
     *
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "fare")
     * @XmlElement(cdata=false)
     */
    protected $fares = [];

    public function addFare($fare)
    {
        $this->fares[] = $fare;

        return $this;
    }

    public function getFares()
    {
        return $this->fares;
    }
}
