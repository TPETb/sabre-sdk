<?php

namespace Sabre\DTO\FaresRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class FaresQuery
{

    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\FaresRequest\FaresQueryParams")
     * @XmlElement(cdata=false)
     */
    private $fares;

    public function getFares()
    {
        return $this->fares;
    }

    public function setFares(FaresQueryParams $fares)
    {
        $this->fares = $fares;
        return $this;
    }

} 