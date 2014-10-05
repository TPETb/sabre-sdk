<?php
namespace Sabre\DTO\AvailabilityRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerParamsTrait;
use Sabre\DTO\DtoException;

class AvailabilityAnswerParams
{
    use AnswerParamsTrait;

    /**
     * Gets or sets the marker to show the flight time info.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $showFlighttime;

    public function getShowFlightTime()
    {
        return $this->showFlighttime;
    }

    public function setShowFlightTime($showFlightTime)
    {
        $this->showFlighttime = $showFlightTime;
        return $this;
    }

    /**
     * Gets or sets the marker tos show the base class for all flight subclasses.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $showBaseclass;

    public function getShowBaseclass()
    {
        return $this->showBaseclass;
    }

    public function setShowBaseclass($showBaseclass)
    {
        $this->showBaseclass = $showBaseclass;
        return $this;
    }

    /**
     * Gets or sets the date of when getting available places.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $returnDate;

    public function getReturnDate()
    {
        return $this->returnDate;
    }

    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
        return $this;
    }

    /**
     * Gets or sets the marker to show a city or an airport in the response.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $markCityport;

    public function getMarkCityport()
    {
        return $this->markCityport;
    }

    public function setMarkCityport($markCityport)
    {
        $this->markCityport = $markCityport;
        return $this;
    }

    /**
     * Gets or sets the availability for issueing an e-ticket.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $showEt;

    public function getShowEt()
    {
        return $this->showEt;
    }

    public function setShowEt($showEt)
    {
        $this->showEt = $showEt;
        return $this;
    }
}
