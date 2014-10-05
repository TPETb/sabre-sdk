<?php
namespace Sabre\DTO\PaymentExtAuthRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;
use Sabre\DTO\Cost;

/**
 * Class PaymentExtAuthQueryParamas
 *
 * @package Sabre\DTO\PaymentExtAuthRequest
 */
class PaymentExtAuthQueryParams
{
    /**
     * PNR number as received from booking response.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $regnum;

    public function setRegnum($regnum)
    {
        $this->regnum = $regnum;

        return $this;
    }

    public function getRegnum()
    {
        return $this->regnum;
    }

    /**
     * Any passenger's last name.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $surname;

    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Payment step.
     *
     * "query" initiates the payment process, "confirm" finishes it.
     * "cancel" can be used to cancel initiated process.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $action;

    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    /**
     * Payment medium info.
     *
     * Not needed when mode="refund".
     *
     * @Type("Sabre\DTO\PaymentExtAuthRequest\PaymentExtAuthPaydoc")
     * @XmlElement(cdata=false)
     */
    private $paydoc;

    public function setPaydoc($paydoc)
    {
        $this->paydoc = $paydoc;

        return $this;
    }

    public function getPaydoc()
    {
        return $this->paydoc;
    }

    /**
     * Query mode.
     *
     * May be absent for usual payment.
     * May be "refund" for refund query.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $mode;

    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Payment amount.
     *
     * Only needed for payment with action="confirm".
     *
     * @Type("Sabre\DTO\Cost")
     * @XmlElement(cdata=false)
     */
    private $cost;

    public function setCost(Cost $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Answer parameters.
     *
     * Optional.
     *
     * @Type("Sabre\DTO\PaymentExtAuthRequest\PaymentExtAuthAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function setAnswerParams(PaymentExtAuthAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    /**
     * Gets or sets the request params.
     * Optional
     *
     * @Type("Sabre\DTO\PaymentExtAuthRequest\PaymentExtAuthRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function setRequestParams(PaymentExtAuthRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    public function getRequestParams()
    {
        return $this->requestParams;
    }
}
