<?php
namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\ErrorInfoTrait;

class BookingAnswerBody
{
    use ErrorInfoTrait;

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $regnum;

    public function setRegnum($regnum)
    {
        $this->regnum = $regnum;
        return $this;
    }

    public function getRegnum()
    {
        return $this->regnum;
    }

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $agency;

    public function setAgency($agency)
    {
        $this->agency = $agency;
        return $this;
    }

    public function getAgency()
    {
        return $this->agency;
    }

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
}
