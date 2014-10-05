<?php
namespace Sabre\DTO\BookingCancelRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingCancelQueryParams
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
}
