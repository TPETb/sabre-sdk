<?php
namespace Sabre\DTO\FaresResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

class FaresCurrencyRate
{
    /**
     * Gets the currency name in Cyrillic.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $currency;

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Gets the currency value.
     *
     * @Type("string")
     * @XmlValue
     */
    private $value;

    public function getValue()
    {
        return doubleval(number_format(doubleval($this->value), 2, '.', ''));
    }

    public function setValue($value)
    {
        $this->value = number_format(doubleval($value), 2, '.', '');
        return $this;
    }
}
