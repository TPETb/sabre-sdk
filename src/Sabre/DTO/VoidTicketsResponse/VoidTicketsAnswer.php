<?php
namespace Sabre\DTO\VoidTicketsResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;
use Sabre\DTO\ErrorInfoTrait;

class VoidTicketsAnswer
{
    use AnswerAttributesTrait;
    use ErrorInfoTrait;

    /**
     * @Type("Sabre\DTO\VoidTicketsResponse\VoidTicketsAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $voidTickets;

    public function setVoidTickets(VoidTicketsAnswerBody $voidTickets)
    {
        $this->voidTickets = $voidTickets;

        return $this;
    }

    public function getVoidTickets()
    {
        return $this->voidTickets;
    }
}
