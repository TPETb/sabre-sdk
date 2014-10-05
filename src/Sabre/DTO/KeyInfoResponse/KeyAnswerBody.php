<?php
namespace Sabre\DTO\KeyInfoResponse;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Info\Info;

class KeyAnswerBody
{
    /**
     * @Type("Sabre\DTO\KeyInfoResponse\KeyManager")
     * @XmlElement(cdata=false)
     */
    private $keyManager;

    public function getKeyManager()
    {
        return $this->keyManager;
    }

    public function setKeyManager(KeyManager $keyManager)
    {
        $this->keyManager = $keyManager;
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

    public function setError(Error $error)
    {
        $this->error = $error;
        return $this;
    }

    /**
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
