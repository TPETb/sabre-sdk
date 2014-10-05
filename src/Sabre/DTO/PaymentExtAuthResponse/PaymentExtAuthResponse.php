<?php
namespace Sabre\DTO\PaymentExtAuthResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("sirena") */
class PaymentExtAuthResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\PaymentExtAuthResponse\PaymentExtAuthAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(PaymentExtAuthAnswer $answer)
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
        return $this->answer->getPaymentExtAuth()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getPaymentExtAuth()->getInfo();
    }
}
