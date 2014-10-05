<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

/**
 * Represents the query data that used in
 * the Sirena pricing request.
 */
class PricingQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\PricingRequest\PricingQueryParams")
     * @XmlElement(cdata=false)
     */
    private $pricing;

    public function getPricing()
    {
        return $this->pricing;
    }

    public function setPricing(PricingQueryParams $pricing)
    {
        $this->pricing = $pricing;

        return $this;
    }
}
