<?php

namespace Sabre\DTO\AvailabilityRequest;

use Sabre\Types\EnumJointType;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class AvailabilityRequestParams
{

    /**
     * Gets or sets the joint type for a flight.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $jointType;

    public function getJointType()
    {
        return $this->jointType;
    }

    public function setJointType(EnumJointType $jointType)
    {
        $this->jointType = $jointType->getValue();
        return $this;
    }

    /**
     * Gets or sets restriction in a Tch selling session.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $сheckTchRestrictions;

    public function getCheckTchRestrictions()
    {
        return $this->сheckTchRestrictions;
    }

    public function setCheckTchRestrictions($сheckTchRestrictions)
    {
        $this->сheckTchRestrictions = $сheckTchRestrictions;
        return $this;
    }
} 