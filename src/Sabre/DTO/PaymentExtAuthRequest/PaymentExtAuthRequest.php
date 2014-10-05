<?php
namespace Sabre\DTO\PaymentExtAuthRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena ticketing request.
 *
 * @XmlRoot("sirena")
 */
class PaymentExtAuthRequest implements RequestInterface
{
    /**
     * Gets or sets the query data.
     * Required.
     *
     * @Type("Sabre\DTO\PaymentExtAuthRequest\PaymentExtAuthQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function setQuery(PaymentExtAuthQuery $query)
    {
        $this->query = $query;
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }
}
