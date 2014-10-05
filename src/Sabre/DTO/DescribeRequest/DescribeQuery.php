<?php
namespace Sabre\DTO\DescribeRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class DescribeQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\DescribeRequest\DescribeQueryParams")
     * @XmlElement(cdata=false)
     */
    private $describe;

    public function getDescribe()
    {
        return $this->describe;
    }

    public function setDescribe(DescribeQueryParams $describe)
    {
        $this->describe = $describe;

        return $this;
    }
}
