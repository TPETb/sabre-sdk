<?php

namespace Sabre\DTO\FareremarkRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/** @XmlRoot("sirena") */
class FareremarkRequest implements RequestInterface
{

    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\FareremarkRequest\FareremarkQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(FareremarkQuery $query)
    {
        $this->query = $query;
        return $this;
    }

} 