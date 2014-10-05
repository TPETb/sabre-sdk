<?php
namespace Sabre\DTO\PricingResponse;

use DateTime;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PricingFare
{
    /**
     * Fare code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $code;

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Base fare code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $baseCode;

    public function setBaseCode($baseCode)
    {
        $this->baseCode = $baseCode;

        return $this;
    }

    public function getBaseCode()
    {
        return $this->baseCode;
    }

    /**
     * Fare remark code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $remark;

    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Whether the fare is applied to the whole segment.
     *
     * Set to "true" if the fare is applied to the whole segment.
     * Such fare is placed into the first <flight> element and its
     * price is added to the <total> element of that flight.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $unpoundable;

    public function setUnpoundable($unpoundable)
    {
        $this->unpoundable = $unpoundable;

        return $this;
    }

    public function getUnpoundable()
    {
        return $this->unpoundable;
    }

    /**
     * Expiry date for the current fare.
     *
     * Only present if request had show_fareexpdate="true".
     *
     * @Type("DateTime<'Y-m-d H:i'>")
     * @XmlAttribute
     */
    private $fareExpdate;

    public function setFareExpdate(DateTime $fareExpdate)
    {
        $this->fareExpdate = $fareExpdate;

        return $this;
    }

    public function getFareExpdate()
    {
        return $this->fareExpdate;
    }

    /**
     * Fare amount.
     *
     * @Type("double")
     * @XmlValue(cdata=false)
     */
    private $amount;

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
