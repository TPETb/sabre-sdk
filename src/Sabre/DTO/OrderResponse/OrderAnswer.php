<?php
namespace Sabre\DTO\OrderResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;

class OrderAnswer
{
    use AnswerAttributesTrait;

    /**
     * @Type("Sabre\DTO\OrderResponse\OrderAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $order;

    public function setOrder(OrderAnswerBody $order)
    {
        $this->order = $order;

        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
