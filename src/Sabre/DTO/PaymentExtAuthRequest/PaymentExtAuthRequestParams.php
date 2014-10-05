<?php
namespace Sabre\DTO\PaymentExtAuthRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class PaymentExtAuthRequestParams
 * Represents the booking request params.
 *
 * @package Sabre\DTO\PaymentExtAuthRequest
 */
class PaymentExtAuthRequestParams
{
    /**
     * Gets or sets the ticket series to pay.
     *
     * Must be "ЭБМ" (Cyrillic) to create etickets.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $tickSer;

    public function setTickSer($tickSer)
    {
        $this->tickSer = $tickSer;

        return $this;
    }

    public function getTickSer()
    {
        return $this->tickSer;
    }
}
