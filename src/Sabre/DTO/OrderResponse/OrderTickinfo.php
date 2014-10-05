<?php
namespace Sabre\DTO\OrderResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlValue;

class OrderTickinfo
{

    /**
     * @Type("string")
     * @XmlAttribute
     */
    protected $ticknum;

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
     * @Type("string")
     * @XmlAttribute
     */
    protected $segId;

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
     * @Type("string")
     * @XmlAttribute
     */
    protected $passId;

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
     * @Type("string")
     * @XmlValue
     */
    protected $value;

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }
} 