<?php


namespace Sabre\DTO\ErrorResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

class ErrorResponseDetail implements ResponseInterface
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     * @SerializedName("StackTrace")
     */
    private $StackTrace;


    /**
     * @return mixed
     */
    public function getStackTrace()
    {
        return $this->StackTrace;
    }


    /**
     * @param mixed $StackTrace
     * @return ErrorResponseDetail
     */
    public function setStackTrace($StackTrace)
    {
        $this->StackTrace = $StackTrace;
        return $this;
    }


}