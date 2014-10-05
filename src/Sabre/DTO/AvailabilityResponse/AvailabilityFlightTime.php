<?php


namespace Sabre\DTO\AvailabilityResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class AvailabilityFlightTime
{
    /**
     * Gets the shift of the initial departure date.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $dayshift;

    public function setDayshift($dayshift)
    {
        $this->dayshift = $dayshift;
        return $this;
    }

    public function getDayshift()
    {
        return $this->dayshift;
    }

    /**
     * Gets the time.
     * Only hours and minutes will be used.
     *
     * @Type("DateTime<'H:i'>")
     * @XmlValue
     */
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue(\DateTime $value)
    {
        $this->value = $value;
        return $this;
    }
} 