<?php
namespace Sabre\DTO\FaresResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Info\Info;

class FaresAnswerBody
{

    /**
     * Gets the departure city.
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
        $this->departure = $departure;
        return $this;
    }

    /**
     * Gets the arrival city.
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
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * Gets the departure time.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlAttribute
     */
    private $deptdate;

    public function setDeptdate(\DateTime $deptdate)
    {
        $this->deptdate = $deptdate;
        return $this;
    }

    public function getDeptdate()
    {
        return $this->deptdate;
    }

    /**
     * Gets the booking date.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlAttribute
     */
    private $bookdate;

    public function setBookdate(\DateTime $bookdate)
    {
        $this->bookdate = $bookdate;
        return $this;
    }

    public function getBookdate()
    {
        return $this->bookdate;
    }

    /**
     * Gets the company name.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $company;

    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Gets the passenger category.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $passenger;

    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;
        return $this;
    }

    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * Gets the fares.
     *
     * @Type("array<Sabre\DTO\FaresResponse\Fare>")
     * @XmlList(inline = true, entry = "fare")
     */
    private $fares = [];

    public function addFare(Fare $fare)
    {
        $this->fares[] = $fare;
        return $this;
    }

    public function getFares()
    {
        return $this->fares;
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
}
