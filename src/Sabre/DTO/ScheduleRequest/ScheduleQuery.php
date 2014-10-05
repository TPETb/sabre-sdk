<?php

namespace Sabre\DTO\ScheduleRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class ScheduleQuery
{

    /**
     * @Type("Sabre\DTO\ScheduleRequest\ScheduleQueryParams")
     * @XmlElement(cdata=false)
     */
    private $schedule;

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function setSchedule(ScheduleQueryParams $schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }

} 