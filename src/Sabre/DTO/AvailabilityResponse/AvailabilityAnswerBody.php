<?php


namespace Sabre\DTO\AvailabilityResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Info\Info;
use Sabre\Types\EnumJointType;
use Sabre\Helpers\LengthHelper;

class AvailabilityAnswerBody
{

    /**
     * Gets the departure city.
     * The string must contain 3 letters.
     *
     * @Type("string")
     * @XmlAttribute
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
     * Gets the arrival city.
     * The string must contain 3 letters.
     *
     * @Type("string")
     * @XmlAttribute
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
     * Gets the flight class.
     * The string must contain 1 letter.
     *
     * @Type("string")
     * @XmlAttribute
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

    /**
     * Gets or sets the joint type for a flight.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $jointType;

    public function getJointType()
    {
        $jointType = new EnumJointType($this->jointType);
        return $jointType->getValue();
    }

    public function setJointType(EnumJointType $jointType)
    {
        $this->jointType = $jointType->getValue();
        return $this;
    }

    /**
     * Gets the multi segment flights.
     *
     * @Type("array<Sabre\DTO\AvailabilityResponse\AvailabilitySegmentedFlight>")
     * @XmlList(inline = true, entry = "flights")
     */
    private $flights = [];

    public function addFlights(AvailabilitySegmentedFlight $flights)
    {
        $this->flights[] = $flights;
        return $this;
    }

    public function getFlights()
    {
        return $this->flights;
    }

    /**
     * Gets the single segment flights.
     *
     * @Type("array<Sabre\DTO\AvailabilityResponse\AvailabilityFlight>")
     * @XmlList(inline = true, entry = "flight")
     */
    private $flight = [];

    public function addFlight(AvailabilityFlight $flight)
    {
        $this->flight[] = $flight;
        return $this;
    }

    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * Gets the response error.
     *
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

    /**
     * Gets the date of the request departure time.
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

} 