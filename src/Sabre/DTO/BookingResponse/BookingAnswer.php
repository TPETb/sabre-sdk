<?php
namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;

class BookingAnswer
{
    use AnswerAttributesTrait;

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $booking;

    public function setBooking(BookingAnswerBody $booking)
    {
        $this->booking = $booking;

        return $this;
    }

    public function getBooking()
    {
        return $this->booking;
    }
}
