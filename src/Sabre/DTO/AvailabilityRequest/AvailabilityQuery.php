<?php

namespace Sabre\DTO\AvailabilityRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

/**
 * Class AvailabilityQuery
 *
 * @package Sabre\DTO\AvailabilityRequest
 *
 * Represents the query data that used in
 * the Sirena availability request.
 */
class AvailabilityQuery
{

    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\AvailabilityRequest\AvailabilityQueryParams")
     * @XmlElement(cdata=false)
     */
    private $availability;

    public function getAvailability()
    {
        return $this->availability;
    }

    public function setAvailability(AvailabilityQueryParams $availability)
    {
        $this->availability = $availability;
        return $this;
    }
}