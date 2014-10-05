<?php

namespace Sabre\DTO\AvailabilityRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/** @XmlRoot("sabre") */
class AvailabilityRequest implements RequestInterface
{

    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\AvailabilityRequest\AvailabilityQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(AvailabilityQuery $availabilityQuery)
    {
        $this->query = $availabilityQuery;
        return $this;
    }
}