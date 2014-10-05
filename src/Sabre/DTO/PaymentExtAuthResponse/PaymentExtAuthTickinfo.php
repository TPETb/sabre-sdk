<?php
namespace Sabre\DTO\PaymentExtAuthResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PaymentExtAuthTickinfo
{
    /**
     * Segment id the ticket was created for.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $segId;

    public function setSegId($segId)
    {
        $this->segId = $segId;

        return $this;
    }

    public function getSegId()
    {
        return $this->segId;
    }

    /**
     * Passenger id the ticket was created for.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $passId;

    public function setPassId($passId)
    {
        $this->passId = $passId;

        return $this;
    }

    public function getPassId()
    {
        return $this->passId;
    }

    /**
     * Ticket number.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $ticknum;

    public function setTicknum($ticknum)
    {
        $this->ticknum = $ticknum;

        return $this;
    }

    public function getTicknum()
    {
        return $this->ticknum;
    }

    /**
     * Ticket series.
     *
     * Always equals to "ЭБМ" (Cyrillic) for e-tickets.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $tickSer;

    public function setTickSer($tickSer)
    {
        $this->tickSer = $tickSer;

        return $this;
    }

    public function getTickSer()
    {
        return $this->tickSer;
    }

    /**
     * Whether ticket is electronic.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $isEtick;

    public function setIsEtick($isEtick)
    {
        $this->isEtick = $isEtick;

        return $this;
    }

    public function getIsEtick()
    {
        return $this->isEtick;
    }

    /**
     * Aircompany accreditation code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $accode;

    public function setAccode($accode)
    {
        $this->accode = $accode;

        return $this;
    }

    public function getAccode()
    {
        return $this->accode;
    }

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $tktPpr;

    public function setTktPpr($tktPpr)
    {
        $this->tktPpr = $tktPpr;

        return $this;
    }

    public function getTktPpr()
    {
        return $this->tktPpr;
    }

    /**
     * Always equals to "ticket".
     *
     * @Type("string")
     * @XmlValue
     */
    private $ticket;

    public function setTicket($ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function getTicket()
    {
        return $this->ticket;
    }
}
