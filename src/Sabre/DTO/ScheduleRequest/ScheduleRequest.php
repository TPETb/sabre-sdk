<?php

namespace Sabre\DTO\ScheduleRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/** @XmlRoot("sirena") */
class ScheduleRequest implements RequestInterface
{

    /**
     * @Type("Sabre\DTO\ScheduleRequest\ScheduleQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(ScheduleQuery $query)
    {
        $this->query = $query;
        return $this;
    }

}
