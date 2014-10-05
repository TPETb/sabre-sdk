<?php
namespace Sabre\DTO;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlValue;

class LangElement
{
    public static function factory($lang, $value)
    {
        return (new self())
            ->setLang($lang)
            ->setValue($value)
        ;
    }

    /**
     * Element's language code.
     *
     * Either "en" or "ru".
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $lang;

    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @Type("string")
     * @XmlValue
     */
    private $value;

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }
}
