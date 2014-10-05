<?php
namespace Sabre\DTO\IclientPubKeyResponse;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Info\Info;

class IclientPubKeyAnswerBody
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $digest;

    public function getDigest()
    {
        return $this->digest;
    }

    public function setDigest($digest)
    {
        $this->digest = $digest;
        return $this;
    }

    /**
     * @Type("Sabre\DTO\Error\Error")
     * @XmlElement(cdata=false)
     */
    private $error;

    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
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
