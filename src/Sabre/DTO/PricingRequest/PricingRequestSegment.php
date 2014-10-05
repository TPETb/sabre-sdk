<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

class PricingRequestSegment
{
    // TODO: Create validator class and move these there.
    const CLASS_LENGTH      = 1;
    const COMPANY_LENGTH    = 2;
    const CONNECTION_LENGTH = 4;
    const FLIGHT_LENGTH     = 5;
    const LOCATION_LENGTH   = 3;

    /**
     * Gets or sets the segment id.
     *
     * Optional. When provided, Sirena sorts segments by ascending ids.
     *
     * @Type("integer")
     * @XmlAttribute
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
     * Gets or sets the departure city or airport.
     * Required.
     * The string must contain self::LOCATION_LENGTH letters.
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
        if (! LengthHelper::validateLength($departure, self::LOCATION_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::LOCATION_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->departure = $departure;
        return $this;
    }

    /**
     * Gets or sets the arrival city or airport.
     * Required.
     * The string must contain self::LOCATION_LENGTH letters.
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
        if (!LengthHelper::validateLength($arrival, self::LOCATION_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::LOCATION_LENGTH
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
     *
     * Optional. The string must contain self::COMPANY_LENGTH letter.
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
        if (!LengthHelper::validateLength($company, self::COMPANY_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::COMPANY_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->company = $company;
        return $this;
    }

    /**
     * Gets or sets the flight number.
     *
     * Optional.
     *
     * @Type("integer")
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
        if (!LengthHelper::validateLength($flight, self::FLIGHT_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::FLIGHT_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }

        $this->flight = $flight;

        return $this;
    }

    /**
     * Gets or sets the subclass.
     *
     * Required if class is empty. The string must contain self::CLASS_LENGTH letter.
     *
     * @Type("array<string>")
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
        if (!LengthHelper::validateLength($subclass, self::CLASS_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::CLASS_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->subclasses[] = $subclass;
        return $this;
    }

    /**
     * Gets or sets the service class.
     *
     * Required if no subclasses provded. The string must contain self::CLASS_LENGTH letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $class;

    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($class, self::CLASS_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::CLASS_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->class = $class;
        return $this;
    }

    /**
     * Whether to restrict results to direct flights only.
     *
     * Optional, defaults to true. Must be either "true" or "false".
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
        // TODO: Verfiy it is either "true" or "false".
        $this->direct = $direct;

        return $this;
    }

    /**
     * Connection rule.
     *
     * Optional. Cannot be set if direct is not set to "false".
     * Must be either "only" or connection location code.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection($connection)
    {
        // TODO: Verify it is either "only" or location code.
        $this->connection = $connection;

        return $this;
    }

    /**
     * The earliest time to depart
     *
     * Optional.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $timeFrom;

    public function getTimeFrom()
    {
        return $this->timeFrom;
    }

    public function setTimeFrom($timeFrom)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($timeFrom, self::CONNECTION_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::CONNECTION_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->timeFrom = $timeFrom;

        return $this;
    }

    /**
     * The latest time to depart
     *
     * Optional.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $timeTill;

    public function getTimeTill()
    {
        return $this->timeTill;
    }

    public function setTimeTill($timeTill)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($timeTill, self::CONNECTION_LENGTH)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                self::CONNECTION_LENGTH
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->timeTill = $timeTill;

        return $this;
    }

    /**
     * Flights to be processed.
     *
     * Optional. If set, any other flights are ignored.
     *
     * @Type("Sabre\DTO\PricingRequest\PricingFlights")
     * @XmlElement(cdata=false)
     */
    private $desire;

    public function getDesire()
    {
        return $this->desire;
    }

    public function setDesire(PricingFlights $desire)
    {
        $this->desire = $desire;
        return $this;
    }

    /**
     * Flights to be ignored.
     *
     * Optional. If set, these flights are ignored when processing.
     *
     * @Type("Sabre\DTO\PricingRequest\PricingFlights")
     * @XmlElement(cdata=false)
     */
    private $ignore;

    public function getIgnore()
    {
        return $this->ignore;
    }

    public function setIgnore(PricingFlights $ignore)
    {
        $this->ignore = $ignore;
        return $this;
    }
}
