<?php


namespace Sabre\DTO\ErrorResponse;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** @XmlRoot("Fault") */
class ErrorResponse implements ResponseInterface
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     * @SerializedName("faultcode")
     */
    private $faultcode;

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     * @SerializedName("faultstring")
     */
    private $faultstring;

    /**
     * @Type("Sabre\DTO\ErrorResponse\ErrorResponseDetail")
     * @XmlElement(cdata=false)
     * @SerializedName("Source")
     */
    private $detail;


    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }


    /**
     * @param mixed $detail
     * @return ErrorResponse
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getFaultcode()
    {
        return $this->faultcode;
    }


    /**
     * @param mixed $faultcode
     * @return ErrorResponse
     */
    public function setFaultcode($faultcode)
    {
        $this->faultcode = $faultcode;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getFaultstring()
    {
        return $this->faultstring;
    }


    /**
     * @param mixed $faultstring
     * @return ErrorResponse
     */
    public function setFaultstring($faultstring)
    {
        $this->faultstring = $faultstring;
        return $this;
    }



}