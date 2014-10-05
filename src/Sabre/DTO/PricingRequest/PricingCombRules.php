<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

class PricingCombRules
{

    /**
     * Fly company rules
     *
     * @Type("array<Sabre\DTO\PricingRequest\PricingRule>")
     * @XmlList(inline = true, entry = "rule")
     * @XmlElement(cdata=false)
     */
    protected $rules = [];

    public function addRule(PricingRule $rules)
    {
        $this->rules[] = $rules;

        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

} 