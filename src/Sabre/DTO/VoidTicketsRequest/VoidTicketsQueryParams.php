<?php
namespace Sabre\DTO\VoidTicketsRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class VoidTicketsQueryParams
{
    /**
     * PNR number.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $regnum;

    public function setRegnum($regnum)
    {
        $this->regnum = $regnum;
        return $this;
    }

    public function getRegnum()
    {
        return $this->regnum;
    }

    /**
     * Any of passenger's last name.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $surname;

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Gets or sets the request params.
     * Optional
     *
     * @Type("Sabre\DTO\VoidTicketsRequest\VoidTicketsRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function setRequestParams(VoidTicketsRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    public function getRequestParams()
    {
        return $this->requestParams;
    }
}
