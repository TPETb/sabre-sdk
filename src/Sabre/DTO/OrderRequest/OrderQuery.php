<?php
namespace Sabre\DTO\OrderRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class OrderQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\OrderRequest\OrderQueryParams")
     * @XmlElement(cdata=false)
     */
    private $order;

    public function setOrder(OrderQueryParams $order)
    {
        $this->order = $order;

        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }
} 