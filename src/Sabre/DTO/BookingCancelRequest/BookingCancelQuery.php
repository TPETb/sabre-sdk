<?php
namespace Sabre\DTO\BookingCancelRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingCancelQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\BookingCancelRequest\BookingCancelQueryParams")
     * @XmlElement(cdata=false)
     */
    private $bookingCancelQuery;

    public function setBookingCancel(BookingCancelQueryParams $bookingCancelQuery)
    {
        $this->bookingCancelQuery = $bookingCancelQuery;

        return $this;
    }

    public function getBookingCancel()
    {
        return $this->bookingCancelQuery;
    }
}
