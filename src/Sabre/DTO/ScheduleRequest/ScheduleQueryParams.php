<?php

namespace Sabre\DTO\ScheduleRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

class ScheduleQueryParams
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
     * Gets or sets the departure or period start date.
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
     * Gets or sets the period finish date.
     * Optional.
     * The date format is DD.MM.YY.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $date2;

    public function getDate2()
    {
        return $this->date2;
    }

    public function setDate2(\DateTime $date2)
    {
        $this->date2 = $date2;
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
     * Gets or sets the flag to search only direct flights.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $direct;

    public function getDirect()
    {
        return $this->direct;
    }

    public function setDirect($direct)
    {
        $this->direct = $direct;
        return $this;
    }

    /**
     * Gets or sets the request params..
     * Optional
     *
     * @Type("Sabre\DTO\ScheduleRequest\ScheduleRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(ScheduleRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\ScheduleRequest\ScheduleAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(ScheduleAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }

}
