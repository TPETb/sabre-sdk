<?php
namespace Sabre\DTO\OrderRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/** @XmlRoot("sirena") */
class OrderRequest implements RequestInterface
{

    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\OrderRequest\OrderQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(OrderQuery $availabilityQuery)
    {
        $this->query = $availabilityQuery;
        return $this;
    }

} 