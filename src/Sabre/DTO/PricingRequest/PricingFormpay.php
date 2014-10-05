<?php
namespace Sabre\DTO\PricingRequest;

use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PricingFormpay
{
    // TODO: Create validator class and move these there.
    const FORMPAY_LENGTH = 2;

    /**
     * Payment type for evaluating
     *
     * @Type("string")
     * @XmlAttribute
     */
    protected $type;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * Payment method for evaluating
     *
     * @Type("string")
     * @XmlValue
     */
    protected $value;

    public function setValue($value)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($value, self::FORMPAY_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::FORMPAY_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }

        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

} 