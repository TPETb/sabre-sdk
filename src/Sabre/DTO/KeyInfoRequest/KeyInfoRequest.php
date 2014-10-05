<?php
namespace Sabre\DTO\KeyInfoRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;

/**
 * Represents the Sirena key info request.
 *
 * @XmlRoot("sirena")
 */
class KeyInfoRequest implements RequestInterface
{
    public function __construct()
    {
        $this->query = new KeyInfoQuery();
    }

    /**
     * @Type("Sabre\DTO\KeyInfoRequest\KeyInfoQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(KeyInfoQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
