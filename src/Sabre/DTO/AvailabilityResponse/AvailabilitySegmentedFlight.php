<?php
namespace Sabre\DTO\AvailabilityResponse;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class AvailabilitySegmentedFlight
{
    /**
     * Gets the single segment flights.
     *
     * @Type("array<Sabre\DTO\AvailabilityResponse\AvailabilityFlight>")
     * @XmlList(inline = true, entry = "flights")
     */
    private $flights = [];

    public function addFlight(AvailabilityFlight $flight)
    {
        $this->flights[] = $flight;
        return $this;
    }

    public function getFlights()
    {
        return $this->flights;
    }
}
