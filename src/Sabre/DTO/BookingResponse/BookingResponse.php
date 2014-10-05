<?php
namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class BookingResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\BookingResponse\BookingAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(BookingAnswer $answer)
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
        return $this->answer->getBooking()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getBooking()->getInfo();
    }
}
