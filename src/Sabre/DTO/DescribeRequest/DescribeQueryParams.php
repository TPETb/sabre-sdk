<?php
namespace Sabre\DTO\DescribeRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class DescribeQueryParams
{
    /**
     * Data type.
     *
     * Required. Must be one of:
     *
     *  aircompany
     *  airport
     *  city
     *  country
     *  passenger - passenger category
     *  document
     *  tax
     *  vehicle
     *  pcards - plastic cards accepted by aircompany
     *  pcard_types
     *  region
     *  meal
     *  fop - form of payment
     *  ssr - special service request
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $data;

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * Data code to get one time instead of a list.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $code;

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\DescribeRequest\DescribeAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function setAnswerParams(DescribeAnswerParams $answerParams)
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
     * @Type("Sabre\DTO\DescribeRequest\DescribeRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function setRequestParams(DescribeRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    public function getRequestParams()
    {
        return $this->requestParams;
    }
}
