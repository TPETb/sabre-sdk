<?php


namespace Sabre\DTO\FareremarkResponse;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Info\Info;

class FareremarkAnswerBody
{

    /**
     * @Type("Sabre\DTO\FareremarkResponse\FareremarkRemark")
     * @XmlElement(cdata=false)
     */
    private $remark;

    public function setRemark(FareremarkRemark $remark)
    {
        $this->remark = $remark;
        return $this;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Gets the response error.
     *
     * @Type("Sabre\DTO\Error\Error")
     * @XmlElement(cdata=false)
     */
    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function setError(Error $error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Gets the additional info about the response.
     *
     * @Type("Sabre\DTO\Info\Info")
     * @XmlElement(cdata=false)
     */
    private $info;

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo(Info $info)
    {
        $this->info = $info;
        return $this;
    }
} 