<?php
namespace Sabre\DTO;

use JMS\Serializer\Annotation\PreSerialize;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class Cost
{
    /**
     * Currency code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $curr;

    public function setCurr($curr)
    {
        $this->curr = $curr;

        return $this;
    }

    public function getCurr()
    {
        return $this->curr;
    }

    /**
     * Total amount.
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

    /**
     * Format amount.
     *
     *  @PreSerialize
    **/
    public function preSerialize()
    {
        $this->amount = sprintf('%.2f', $this->amount);
    }
}
