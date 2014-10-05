<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class BookingResponseSegments
{
    /**
     * @Type("array<Sabre\DTO\BookingResponse\BookingResponseSegment>")
     * @XmlList(inline = true, entry = "segment")
     */
    private $segments = [];

    public function addSegment(BookingResponseSegment $segment)
    {
        $this->segments[] = $segment;
        return $this;
    }

    public function getSegments()
    {
        return $this->segments;
    }
} 