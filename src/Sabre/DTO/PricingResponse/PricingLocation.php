<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PricingLocation
{
    /**
     * Airport terminal.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $terminal;

    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;

        return $this;
    }

    public function getTerminal()
    {
        return trim($this->terminal);
    }

    /**
     * IATA location code.
     *
     * @Type("string")
     * @XmlValue
     */
    private $code;

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return trim($this->code);
    }
}
