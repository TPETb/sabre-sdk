<?php


namespace Sabre\DTO\FareremarkResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class FareremarkRemark
{
    /**
     * @Type("boolean")
     * @XmlAttribute
     */
    private $newFare;

    public function setNewFare($newFare)
    {
        $this->newFare = $newFare;
        return $this;
    }

    public function getNewFare()
    {
        return $this->newFare;
    }

    /**
     * @Type("string")
     * @XmlValue
     */
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

} 