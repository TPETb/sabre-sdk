<?php


namespace Sabre\DTO\ScheduleResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\Type;

class ScheduleFlightClassInfo
{
    /**
     * Gets the economy class availablity.
     * 1 is available.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $econom;

    public function setEconom($econom)
    {
        $this->econom = $econom;
        return $this;
    }

    public function getEconom()
    {
        return $this->econom;
    }

    /**
     * Gets the business class availablity.
     * 1 is available.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $business;

    public function setBusiness($business)
    {
        $this->business = $business;
        return $this;
    }

    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Gets the first class availablity.
     * 1 is available.
     *
     * @Type("integer")
     * @XmlAttribute
     */
    private $first;

    public function setFirst($first)
    {
        $this->first = $first;
        return $this;
    }

    public function getFirst()
    {
        return $this->first;
    }

} 