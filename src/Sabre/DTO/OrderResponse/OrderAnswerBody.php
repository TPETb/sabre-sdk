<?php
namespace Sabre\DTO\OrderResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\BookingResponse\BookingPassengerNameRecord;
use Sabre\DTO\ErrorInfoTrait;

class OrderAnswerBody
{
    use ErrorInfoTrait;

    /**
     * @Type("Sabre\DTO\BookingResponse\BookingPassengerNameRecord")
     * @XmlElement(cdata=false)
     */
    private $pnr;

    public function setPnr(BookingPassengerNameRecord $pnr)
    {
        $this->pnr = $pnr;
        return $this;
    }

    public function getPnr()
    {
        return $this->pnr;
    }

    /**
     * @Type("Sabre\DTO\OrderResponse\OrderTickinfo")
     * @XmlElement(cdata=false)
     */
    private $tickinfo;

    public function setTickinfo(OrderTickinfo $tickinfo)
    {
        $this->tickinfo = $tickinfo;

        return $this;
    }

    public function getTickinfo()
    {
        return $this->tickinfo;
    }

} 