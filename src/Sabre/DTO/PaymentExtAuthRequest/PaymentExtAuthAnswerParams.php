<?php
namespace Sabre\DTO\PaymentExtAuthRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\AnswerParamsTrait;

/**
 * Class PaymentExtAuthAnswerParams
 *
 * Represents the payment-ext-auth answer params.
 *
 * @package Sabre\DTO\PaymentExtAuthRequest
 */
class PaymentExtAuthAnswerParams
{
    use AnswerParamsTrait;

    /**
     * Whether receipts in PDF format should be returned.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $returnReceipt;

    public function setReturnReceipt($returnReceipt)
    {
        $this->returnReceipt = $returnReceipt;

        return $this;
    }

    public function getReturnReceipt()
    {
        return $this->returnReceipt;
    }
}
