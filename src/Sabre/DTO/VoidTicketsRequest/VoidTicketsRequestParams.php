<?php
namespace Sabre\DTO\VoidTicketsRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class VoidTicketsRequestParams
{
    /**
     * Whether to return seats booked in PNR.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $returnSeats;

    public function setReturnSeats($returnSeats)
    {
        $this->returnSeats = $returnSeats;

        return $this;
    }

    public function getReturnSeats()
    {
        return $this->returnSeats;
    }
}
