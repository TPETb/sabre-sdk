<?php
namespace Sabre\DTO\PaymentExtAuthRequest;

use DateTime;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class PaymentExtAuthQueryParamas
 *
 * @package Sabre\DTO\PaymentExtAuthRequest
 */
class PaymentExtAuthPaydoc
{
    /**
     * Form of payment code.
     *
     * Mandatory. See 'fop' dictionary for possible values.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $formpay;

    public function setFormpay($formpay)
    {
        $this->formpay = $formpay;

        return $this;
    }

    public function getFormpay()
    {
        return $this->formpay;
    }

    /**
     * Card type.
     *
     * Mandatory for 'CC' (credit card) form of payment.
     * Not needed for 'CA' (cash) form of payment.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $type;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * Card number.
     *
     * Only needed for 'CC' form of payment on action='confirm' step.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $num;

    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    public function getNum()
    {
        return $this->num;
    }

    /**
     * Card expiry date.
     *
     * Only needed for 'CC' form of payment on action='confirm' step.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $expDate;

    public function setExpDate(DateTime $expDate)
    {
        $this->expDate = $expDate;

        return $this;
    }

    public function getExpDate()
    {
        return $this->expDate;
    }

    /**
     * Card holder.
     *
     * Only needed for 'CC' form of payment on action='confirm' step.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $holder;

    public function setHolder($holder)
    {
        $this->holder = $holder;

        return $this;
    }

    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Authorization code.
     *
     * Only needed for 'CC' form of payment on action='confirm' step.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $authCode;

    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;

        return $this;
    }

    public function getAuthCode()
    {
        return $this->authCode;
    }
}
