<?php
namespace Sabre\DTO\Error;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class Error
{
    /**
     * @Type("integer")
     * @XmlAttribute
     */
    private $code;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($state)
    {
        $this->code = $state;
        return $this;
    }

    /**
     * @Type("integer")
     * @XmlAttribute
     */
    private $cryptError;

    public function getCryptError()
    {
        return $this->cryptError;
    }

    public function setCryptError($state)
    {
        $this->cryptError = $state;
        return $this;
    }

    /**
     * @Type("string")
     * @XmlValue
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

    public function __toString()
    {
        return sprintf('Error code: %d, Error message: %s', $this->code, $this->value);
    }
}
