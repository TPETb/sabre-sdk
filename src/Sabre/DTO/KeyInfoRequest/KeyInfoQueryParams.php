<?php
namespace Sabre\DTO\KeyInfoRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class KeyInfoQueryParams
{
    public function __construct()
    {
        $this->answerParams = new KeyInfoAnswerParams();
    }

    /**
     * @Type("Sabre\DTO\KeyInfoRequest\KeyInfoAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(KeyInfoAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }
}
