<?php
namespace Sabre\DTO\ScheduleResponse;

use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class ScheduleSegmentedFlight
{
    /**
     * Gets the single segment flights.
     *
     * @Type("array<Sabre\DTO\ScheduleResponse\ScheduleFlight>")
     * @XmlList(inline = true, entry = "flight")
     */
    private $flights = [];

    public function addFlight(ScheduleFlight $flight)
    {
        $this->flights[] = $flight;
        return $this;
    }

    public function getFlights()
    {
        return $this->flights;
    }
}
