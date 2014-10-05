<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\Types\EnumPricingComb;

class PricingRule
{
    /**
     * Combine or not the following flights
     *
     * @Type("string")
     * @XmlAttribute
     */
    protected $comb;

    public function setComb(EnumPricingComb $comb)
    {
        $this->comb = $comb->getValue();

        return $this;
    }

    public function getComb()
    {
        return $this->comb;
    }

    /**
     * Fly comapnies
     * Can by wildcard
     *
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "acomp")
     * @XmlElement(cdata=false)
     */
    protected $acomps = [];

    public function addAcomp($acomp)
    {
        $this->acomps[] = $acomp;

        return $this;
    }

    public function getAcomps()
    {
        return $this->acomps;
    }

} 