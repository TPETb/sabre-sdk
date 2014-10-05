<?php
namespace Sabre\DTO\BookingCancelResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;
use Sabre\DTO\ErrorInfoTrait;

class BookingCancelAnswer
{
    use AnswerAttributesTrait;
    use ErrorInfoTrait;

    /**
     * @Type("Sabre\DTO\BookingCancelResponse\BookingCancelAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $bookingCancel;

    public function setBookingCancel(BookingCancelAnswerBody $bookingCancel)
    {
        $this->bookingCancel = $bookingCancel;

        return $this;
    }

    public function getBookingCancel()
    {
        return $this->bookingCancel;
    }
}
