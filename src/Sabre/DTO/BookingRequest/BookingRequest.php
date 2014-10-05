<?php
namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena booking request.
 *
 * @XmlRoot("sirena")
 */
class BookingRequest implements RequestInterface
{
    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\BookingRequest\BookingQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(BookingQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
