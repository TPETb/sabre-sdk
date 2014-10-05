<?php

namespace Sabre\DTO\FaresRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/** @XmlRoot("sirena") */
class FaresRequest implements RequestInterface
{

    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\FaresRequest\FaresQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(FaresQuery $query)
    {
        $this->query = $query;
        return $this;
    }

} 