<?php
namespace Sabre\DTO\DescribeResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerAttributesTrait;

class DescribeAnswer
{
    use AnswerAttributesTrait;

    /**
     * @Type("Sabre\DTO\DescribeResponse\DescribeAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $describe;

    public function setDescribe(DescribeAnswerBody $describe)
    {
        $this->describe = $describe;

        return $this;
    }

    public function getDescribe()
    {
        return $this->describe;
    }

    /**
     * Gets the response error.
     *
     * @Type("Sabre\DTO\Error\Error")
     * @XmlElement(cdata=false)
     */
    private $error;

    public function setError(Error $error)
    {
        $this->error = $error;
        return $this;
    }

    public function getError()
    {
        return $this->error;
    }

    /**
     * Gets the additional info about the response.
     *
     * @Type("Sabre\DTO\Info\Info")
     * @XmlElement(cdata=false)
     */
    private $info;

    public function setInfo(Info $info)
    {
        $this->info = $info;
        return $this;
    }

    public function getInfo()
    {
        return $this->info;
    }
}
