<?php
namespace Sabre\DTO\FaresRequest;

use Sabre\DTO\DtoException;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use Sabre\Helpers\LengthHelper;

class FaresQueryParams
{
    /**
     * Gets or sets the departure city.
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
     * Gets or sets the arrival city.
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
     * Gets or sets the departure time.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $deptdate;

    public function getDepdate()
    {
        return $this->deptdate;
    }

    public function setDepdate(\DateTime $deptdate)
    {
        $this->deptdate = $deptdate;
        return $this;
    }

    /**
     * Gets or sets the booking date.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $bookdate;

    public function getBookdate()
    {
        return $this->bookdate;
    }

    public function setBookdate(\DateTime $bookdate)
    {
        $this->bookdate = $bookdate;
        return $this;
    }

    /**
     * Gets or sets the aviacompany.
     * Optional.
     * The string must contain 2 letter.
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
        if (!LengthHelper::validateLength($company, 2)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                2
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->company = $company;
        return $this;
    }

    /**
     * Gets or sets the flight number.
     * Optional.
     * The string must contain 5 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $flight;

    public function getFlight()
    {
        return $this->flight;
    }

    public function setFlight($flight)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($flight, 5)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                5
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->flight = $flight;
        return $this;
    }

    /**
     * Gets or sets the subclass.
     * Optional.
     * The string must contain 1 letter.
     *
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "subclass")
     * @XmlElement(cdata=false)
     */
    private $subclasses = [];

    public function getSubclasses()
    {
        return $this->subclasses;
    }

    public function addSubclass($subclass)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($subclass, 1)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                1
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->subclasses[] = $subclass;
        return $this;
    }

    /**
     * Gets or sets the base class.
     * Optional.
     * The string must contain 1 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $baseclass;

    public function getBaseclass()
    {
        return $this->baseclass;
    }

    public function setBaseclass($baseclass)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($baseclass, 1)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                1
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->baseclass = $baseclass;
        return $this;
    }

    /**
     * Gets or sets the passenger category.
     * The string must contain 3 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $passenger;

    public function getPassenger()
    {
        return $this->passenger;
    }

    public function setPassenger($passenger)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($passenger, 3)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                3
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->passenger = $passenger;
        return $this;
    }

    /**
     * Gets or sets the request params..
     * Optional
     *
     * @Type("Sabre\DTO\FaresRequest\FaresRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(FaresRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

}
