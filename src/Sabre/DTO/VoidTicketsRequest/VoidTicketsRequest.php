<?php
namespace Sabre\DTO\VoidTicketsRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena <void_tickets> request.
 *
 * @XmlRoot("sirena")
 */
class VoidTicketsRequest implements RequestInterface
{
    /**
     * @Type("Sabre\DTO\VoidTicketsRequest\VoidTicketsQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(VoidTicketsQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
