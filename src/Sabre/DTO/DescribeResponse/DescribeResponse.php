<?php
namespace Sabre\DTO\DescribeResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use Sabre\DTO\Interfaces\ResponseInterface;

/**
 * @XmlRoot("sirena")
**/
class DescribeResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\DescribeResponse\DescribeAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(DescribeAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError()
    {
        $error = $this->answer->getError();
        if ($error) {
            return $error;
        }
        return $this->answer->getDescribe()->getError();
    }

    public function getInfo()
    {
        return $this->answer->getDescribe()->getInfo();
    }
}
