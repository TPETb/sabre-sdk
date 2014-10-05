<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class BookingResponsePassengers
{
    /**
     * @Type("array<Sabre\DTO\BookingResponse\BookingResponsePassenger>")
     * @XmlList(inline = true, entry = "passenger")
     */
    private $passengers = [];

    public function addPassenger(BookingResponsePassenger $passenger)
    {
        $this->passengers[] = $passenger;
        return $this;
    }

    public function getPassengers()
    {
        return $this->passengers;
    }
} 