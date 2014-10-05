<?php


namespace Sabre\DTO\ScheduleRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class ScheduleRequestParams
{

    /**
     * Gets or sets the flag to show connected flights
     * for a single company.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $onlyM2Joints;

    public function getOnlyM2Joints()
    {
        return $this->onlyM2Joints;
    }

    public function setOnlyM2Joints($onlyM2Joints)
    {
        $this->onlyM2Joints = $onlyM2Joints;
        return $this;
    }

} 