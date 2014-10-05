<?php
namespace Sabre\DTO\DescribeRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena <describe> request.
 *
 * @XmlRoot("sirena")
 */
class DescribeRequest implements RequestInterface
{
    public static function factory($data, $code = null)
    {
        $queryParams = (new DescribeQueryParams())
            ->setData($data);

        if ($code) {
            $queryParams->setCode($code);
        }

        return (new DescribeRequest())
            ->setQuery((new DescribeQuery())
                ->setDescribe($queryParams)
            )
        ;
    }

    /**
     * @Type("Sabre\DTO\DescribeRequest\DescribeQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(DescribeQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
