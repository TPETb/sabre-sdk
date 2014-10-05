<?php
namespace Sabre\DTO\FareremarkRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

class FareremarkQueryParams
{
    /**
     * Gets or sets the company code.
     * The string must contain 3 letters.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $company;

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($company, 3)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                3
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->company = $company;
        return $this;
    }

    /**
     * Gets or sets the fare name gotten
     * gotten from a fare response.
     * The string must contain 5 letters.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $code;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($code, 5)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                5
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->code = $code;
        return $this;
    }

    /**
     * Gets or sets the request params..
     * Optional
     *
     * @Type("Sabre\DTO\FareremarkRequest\FareremarkRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(FareremarkRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\FareremarkRequest\FareremarkAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(FareremarkAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }

}
