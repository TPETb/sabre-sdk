<?php
namespace Sabre\DTO\AvailabilityRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

/**
 * Class AvailabilityQueryParams
 *
 * @package Sabre\DTO\AvailabilityRequest
 */
class AvailabilityQueryParams
{
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
     * Gets or sets the aviacompany.
     * Optional.
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
     * Gets or sets the minimal departure time.
     * Optional.
     * The date format is HH24MI.
     *
     * @Type("DateTime<'Hi'>")
     * @XmlElement(cdata=false)
     */
    private $timeFrom;

    public function getTimeFrom()
    {
        return $this->timeFrom;
    }

    public function setTimeFrom(\DateTime $timeFrom)
    {
        $this->timeFrom = $timeFrom;
        return $this;
    }

    /**
     * Gets or sets the maximal departure time.
     * Optional.
     * The date format is HH24MI.
     *
     * @Type("DateTime<'Hi'>")
     * @XmlElement(cdata=false)
     */
    private $timeTill;

    public function getTimeTill()
    {
        return $this->timeTill;
    }

    public function setTimeTill(\DateTime $timeTill)
    {
        $this->timeTill = $timeTill;
        return $this;
    }

    /**
     * Gets or sets the request params..
     * Optional
     *
     * @Type("Sabre\DTO\AvailabilityRequest\AvailabilityRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(AvailabilityRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\AvailabilityRequest\AvailabilityAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(AvailabilityAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }
}
