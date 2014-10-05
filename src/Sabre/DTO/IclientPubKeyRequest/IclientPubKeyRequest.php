<?php
namespace Sabre\DTO\IclientPubKeyRequest;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\RequestInterface;
use Sabre\DTO\Interfaces\UnprotectedRequestInterface;

/**
 * Represents the Sirena key info request.
 *
 * @XmlRoot("sirena")
 */
class IclientPubKeyRequest implements RequestInterface, UnprotectedRequestInterface
{
    public static function factory($strippedPublicKey)
    {
        return (new self())
            ->setQuery((new IclientPubKeyQuery())
                ->setIclientPubKey((new IclientPubKeyQueryParams())
                    ->setPubKey($strippedPublicKey)
                )
            )
        ;
    }

    /**
     * @Type("Sabre\DTO\IclientPubKeyRequest\IclientPubKeyQuery")
     * @XmlElement(cdata=false)
     */
    private $query;

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery(IclientPubKeyQuery $query)
    {
        $this->query = $query;
        return $this;
    }
}
