<?php
namespace Sabre\DTO\ScheduleRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\AnswerParamsTrait;

class ScheduleAnswerParams
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
     * Gets or sets the full date (dd.MM.yyyy) format in answers.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $fullDate;

    public function getFullDate()
    {
        return $this->fullDate;
    }

    public function setFullDate($fullDate)
    {
        $this->fullDate = $fullDate;
        return $this;
    }

    /**
     * Gets or sets the marker to show a city or an airport in the response.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $markCityport;

    public function getMarkCityPort()
    {
        return $this->markCityport;
    }

    public function setMarkCityPort($markCityport)
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
