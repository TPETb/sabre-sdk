<?php
namespace Sabre\DTO;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Info\Info;

trait ErrorInfoTrait
{
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
