<?php
namespace Sabre\DTO\BookingCancelRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingCancelParams
{

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $regnum;

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
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $surname;

    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }
} 