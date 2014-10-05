<?php
namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

class BookingRequestSegment
{
    /**
     * Gets or sets the segment id.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets or sets the aviacompany.
     * Required.
     * The string must contain 3 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $company;

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($company, 3)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                3
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->company = $company;
        return $this;
    }

    /**
     * Gets or sets the flight number.
     * Required.
     * The string must contain 5 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $num;

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($num, 5)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                5
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->num = $num;
        return $this;
    }

    /**
     * Gets or sets the departure city or airport.
     * Required.
     * The string must contain 3 letters.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $departure;

    public function getDeparture()
    {
        return $this->departure;
    }

    public function setDeparture($departure)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($departure, 3)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                3
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->departure = $departure;
        return $this;
    }

    /**
     * Gets or sets the arrival city or airport.
     * Required.
     * The string must contain 3 letters.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $arrival;

    public function getArrival()
    {
        return $this->arrival;
    }

    public function setArrival($arrival)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($arrival, 3)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                3
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * Gets or sets the departure date.
     * Optional.
     * The date format is DD.MM.YY.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $date;

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Gets or sets the airplane.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $airplane;

    public function getAirplane()
    {
        return $this->airplane;
    }

    public function setAirplane($airplane)
    {
        $this->airplane = $airplane;
        return $this;
    }

    /**
     * Gets or sets the subclass.
     * Required.
     * The string must contain 1 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $subclass;

    public function getSubclasses()
    {
        return $this->subclass;
    }

    public function setSubclass($subclass)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($subclass, 1)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                1
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->subclass = $subclass;
        return $this;
    }

    /**
     * Gets or sets the subclass.
     * Required.
     * The string must contain 1 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $class;

    public function setClass($class)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($class, 1)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                1
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->class = $class;

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }
}
