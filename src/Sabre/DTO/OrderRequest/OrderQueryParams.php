<?php
namespace Sabre\DTO\OrderRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

class OrderQueryParams
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $surname;

    public function setSurname($surname)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($surname, 60)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                60
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->surname = $surname;

        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $regnum;

    public function setRegnum($regnum)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($regnum, 6)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                6
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->regnum = $regnum;

        return $this;
    }

    public function getRegnum()
    {
        return $this->regnum;
    }

    /**
     * Gets or sets the request params..
     * Optional
     *
     * @Type("Sabre\DTO\OrderRequest\OrderRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(OrderRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\OrderRequest\OrderAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(OrderAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }
} 