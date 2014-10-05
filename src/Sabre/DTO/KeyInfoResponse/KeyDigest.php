<?php
namespace Sabre\DTO\KeyInfoResponse;

use Sabre\Types\EnumKeyState;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class KeyDigest
{
    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $state;

    public function getState()
    {
        return $this->state;
    }

    public function setState(EnumKeyState $state)
    {
        $this->state = $state->getValue();
        return $this;
    }

    /**
     * @Type("string")
     * @XmlValue(cdata = false)
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
