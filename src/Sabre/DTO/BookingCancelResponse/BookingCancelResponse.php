<?php
namespace Sabre\DTO\BookingCancelResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class BookingCancelResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\BookingCancelResponse\BookingCancelAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(BookingCancelAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError()
    {
        $error = $this->answer->getError();
        if ($error) {
            return $error;
        }
        return $this->answer->getBookingCancel()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getBookingCancel()->getInfo();
    }
}
