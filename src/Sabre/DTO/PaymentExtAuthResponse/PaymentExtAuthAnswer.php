<?php
namespace Sabre\DTO\PaymentExtAuthResponse;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;

class PaymentExtAuthAnswer
{
    use AnswerAttributesTrait;

    /**
     * @SerializedName("payment-ext-auth")
     * @Type("Sabre\DTO\PaymentExtAuthResponse\PaymentExtAuthAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $paymentExtAuth;

    public function setPaymentExtAuth(PaymentExtAuthAnswerBody $paymentExtAuth)
    {
        $this->paymentExtAuth = $paymentExtAuth;

        return $this;
    }

    public function getPaymentExtAuth()
    {
        return $this->paymentExtAuth;
    }
}
