<?php
namespace Sabre\DTO\DescribeResponse;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\ErrorInfoTrait;
use Sabre\DTO\LangElement;

class DescribeData
{
    use ErrorInfoTrait;

    /**
     * Codes in various languages.
     *
     * @Type("array<Sabre\DTO\LangElement>")
     * @XmlList(inline = true, entry = "code")
     */
    private $codes = [];

    public function addCode(LangElement $code)
    {
        $this->codes[] = $code;

        return $this;
    }

    public function getCodes()
    {
        return $this->codes;
    }

    public function getCode($lang)
    {
        foreach ($this->codes as $code) {
            if ($code->getLang() === $lang) {
                return $code->getValue();
            }
        }
        return null;
    }

    /**
     * Names in various languages.
     *
     * @Type("array<Sabre\DTO\LangElement>")
     * @XmlList(inline = true, entry = "name")
     */
    private $names = [];

    public function addName(LangElement $name)
    {
        $this->names[] = $name;

        return $this;
    }

    public function getNames()
    {
        return $this->names;
    }

    public function getName($lang)
    {
        foreach ($this->names as $name) {
            if ($name->getLang() === $lang) {
                return $name->getValue();
            }
        }
        return null;
    }

    // aircompany //

    /**
     * @SerializedName("account-code")
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $accountCode;

    public function setAccountCode($accountCode)
    {
        $this->accountCode = $accountCode;

        return $this;
    }

    public function getAccountCode()
    {
        return $this->accountCode;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $latinCodeInRef;

    public function setLatinCodeInRef($latinCodeInRef)
    {
        $this->latinCodeInRef = $latinCodeInRef;

        return $this;
    }

    public function getLatinCodeInRef()
    {
        return $this->latinCodeInRef;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $latinRegistration;

    public function setLatinRegistration($latinRegistration)
    {
        $this->latinRegistration = $latinRegistration;

        return $this;
    }

    public function getLatinRegistration()
    {
        return $this->latinRegistration;
    }

    /**
     * Additional fields specific for each data type:
     *
     *  aircompnay  => subclasses
     *  city        => timezone, country (in each language)
     *  airport     => city (in each language)
     *  passenger   => agecat (0 adult, 1 child, 3 infant), group, seats, spec_cat
     *  document    => international
     *  pcards      => acomp attribute (in each language), pcode (multiple)
     *  region      => country (in each language)
     *  ssr         => for_segment, for_passenger, free_text, travelport_allowed
    **/
}
