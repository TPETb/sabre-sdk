<?php
namespace Sabre\DTO\VoidTicketsResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\ErrorInfoTrait;

class VoidTicketsAnswerBody
{
    use ErrorInfoTrait;

    /**
     * PNR number.
     *
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
     * Whether tickets were returned.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $ticketsReturned;

    public function setTicketsReturned($ticketsReturned)
    {
        $this->ticketsReturned = $ticketsReturned;

        return $this;
    }

    public function getTicketsReturned()
    {
        return $this->ticketsReturned;
    }
}
