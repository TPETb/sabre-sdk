<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena pricing request.
 *
 * @XmlRoot("sirena")
 */
class PricingRequest implements RequestInterface
{
    /**
     * @Type("Sabre\DTO\PricingRequest\PricingQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(PricingQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
