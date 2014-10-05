<?php
namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

/**
 * Class BookingQuery
 *
 * @package Sabre\DTO\BookingRequest
 *
 * Represents the query data that used in
 * the Sirena booking request.
 */
class BookingQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\BookingRequest\BookingQueryParams")
     * @XmlElement(cdata=false)
     */
    private $booking;

    public function getBooking()
    {
        return $this->booking;
    }

    public function setBooking(BookingQueryParams $booking)
    {
        $this->booking = $booking;
        return $this;
    }
}
