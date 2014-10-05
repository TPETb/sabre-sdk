<?php
namespace Sabre\DTO\OrderResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class OrderResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\OrderResponse\OrderAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(OrderAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError()
    {
        return $this->answer->getOrder()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getOrder()->getInfo();
    }

} 