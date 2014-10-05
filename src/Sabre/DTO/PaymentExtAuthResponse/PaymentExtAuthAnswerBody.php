<?php
namespace Sabre\DTO\PaymentExtAuthResponse;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\Cost;
use Sabre\DTO\ErrorInfoTrait;

class PaymentExtAuthAnswerBody
{
    use ErrorInfoTrait;

    /**
     * @SerializedName("regnum")
     * @Type("string")
     * @XmlAttribute
     */
    private $regnumRequest;

    public function setRegnumRequest($regnumRequest)
    {
        $this->regnumRequest = $regnumRequest;

        return $this;
    }

    public function getRegnumRequest()
    {
        return $this->regnumRequest;
    }

    /**
     * @Type("Sabre\DTO\Cost")
     * @XmlElement(cdata=false)
     */
    private $cost;

    public function setCost(Cost $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Time in minutes to finish payment.
     *
     * @Type("integer")
     * @XmlElement
     */
    private $timeout;

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @Type("Sabre\DTO\PaymentExtAuthResponse\PaymentExtAuthReceipts")
     * @XmlElement(cdata=false)
     */
    private $receipts;

    public function setReceipts(PaymentExtAuthReceipts $receipts)
    {
        $this->receipts = $receipts;

        return $this;
    }

    public function getReceipts()
    {
        return $this->receipts;
    }

    /**
     * @Type("string")
     * @XmlElement
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
     * @XmlElement
     */
    private $timelimit;

    public function setTimelimit($timelimit)
    {
        $this->timelimit = $timelimit;

        return $this;
    }

    public function getTimelimit()
    {
        return $this->timelimit;
    }

    /**
     * Number of booked seats.
     *
     * @Type("integer")
     * @XmlElement
     */
    private $nseats;

    public function setNseats($nseats)
    {
        $this->nseats = $nseats;

        return $this;
    }

    public function getNseats()
    {
        return $this->nseats;
    }

    /**
     * @Type("string")
     * @XmlElement
     */
    private $agn;

    public function setAgn($agn)
    {
        $this->agn = $agn;

        return $this;
    }

    public function getAgn()
    {
        return $this->agn;
    }

    /**
     * @Type("string")
     * @XmlElement
     */
    private $ppr;

    public function setPpr($ppr)
    {
        $this->ppr = $ppr;

        return $this;
    }

    public function getPpr()
    {
        return $this->ppr;
    }

    /**
     * Number of segments booked.
     *
     * @Type("integer")
     * @XmlElement
     */
    private $nseg;

    public function setNseg($nseg)
    {
        $this->nseg = $nseg;

        return $this;
    }

    public function getNseg()
    {
        return $this->nseg;
    }

    /**
     * @Type("array<Sabre\DTO\PaymentExtAuthResponse\PaymentExtAuthTickinfo>")
     * @XmlElement(cdata=false)
     * @XmlList(inline = true, entry = "tickinfo")
     */
    private $tickinfos;

    public function addTickinfo(PaymentExtAuthTickinfo $tickinfo)
    {
        $this->tickinfos[] = $tickinfo;

        return $this;
    }

    public function getTickinfos()
    {
        return $this->tickinfos;
    }

    /**
     * Empty ok element.
     *
     * @Type("string")
     * @XmlElement
     */
    private $ok;

    public function setOk($ok)
    {
        $this->ok = $ok;

        return $this;
    }

    public function getOk()
    {
        return $this->ok;
    }
}
