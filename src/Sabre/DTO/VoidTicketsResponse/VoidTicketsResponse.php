<?php
namespace Sabre\DTO\VoidTicketsResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class VoidTicketsResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\VoidTicketsResponse\VoidTicketsAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(VoidTicketsAnswer $answer)
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
        $error = $this->answer->getError();
        if ($error) {
            return $error;
        }
        return $this->answer->getVoidTickets()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getVoidTickets()->getInfo();
    }
}
