<?php
namespace Sabre\DTO\VoidTicketsRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class VoidTicketsQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\VoidTicketsRequest\VoidTicketsQueryParams")
     * @XmlElement(cdata=false)
     */
    private $voidTickets;

    public function getVoidTickets()
    {
        return $this->voidTickets;
    }

    public function setVoidTickets(VoidTicketsQueryParams $voidTickets)
    {
        $this->voidTickets = $voidTickets;

        return $this;
    }
}
