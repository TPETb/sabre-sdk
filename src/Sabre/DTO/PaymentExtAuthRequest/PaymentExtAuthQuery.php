<?php
namespace Sabre\DTO\PaymentExtAuthRequest;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class PaymentExtAuthQuery
 *
 * @package Sabre\DTO\PaymentExtAuthRequest
 *
 * Represents the query data that used in
 * the Sirena payment-ext-auth request.
 */
class PaymentExtAuthQuery
{
    /**
     * Gets or sets the query params.
     * Required.
     *
     * @SerializedName("payment-ext-auth")
     * @Type("Sabre\DTO\PaymentExtAuthRequest\PaymentExtAuthQueryParams")
     * @XmlElement(cdata=false)
     */
    private $paymentExtAuth;

    public function setPaymentExtAuth(PaymentExtAuthQueryParams $paymentExtAuth)
    {
        $this->paymentExtAuth = $paymentExtAuth;
        return $this;
    }

    public function getPaymentExtAuth()
    {
        return $this->paymentExtAuth;
    }
}
