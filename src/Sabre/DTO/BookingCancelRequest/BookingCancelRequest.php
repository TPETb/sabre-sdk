<?php
namespace Sabre\DTO\BookingCancelRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena <booking-cancel> request.
 *
 * @XmlRoot("sirena")
 */
class BookingCancelRequest implements RequestInterface
{
    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\BookingCancelRequest\BookingCancelQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(BookingCancelQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
