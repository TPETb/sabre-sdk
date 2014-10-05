<?php


namespace Sabre\DTO\AvailabilityResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class AvailabilityFlightSubClass
{

    /**
     * Gets the subclass name.
     *
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

    /**
     * Gets the shift of the initial departure date.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $letter;

    public function setLetter($baseclass)
    {
        $this->letter = $baseclass;
        return $this;
    }

    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * Gets the seats count.
     * if negative:
     * -1 - subclass closed
     * -2 - seat by request
     * -3 - ability to put in the wait list.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $count;

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }
} 