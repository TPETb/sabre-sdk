<?php
namespace Sabre\DTO\FaresResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\Upt;

class Fare
{
    /**
     * Gets the fares name.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $name;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the fare subclasses.
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
        $this->subclasses[] = $subclass;
        return $this;
    }

    /**
     * Gets the flight direction.
     * Possible values in Cyrillic:
     * Т - there
     * Х - there and back
     * М - route
     * И - interline
     * К - round
     * С - throughout
     * В - round throughout
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $direction;

    public function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Gets the flight cost in the specified currencies.
     *
     * @Type("array<Sabre\DTO\FaresResponse\FaresCurrencyRate>")
     * @XmlList(inline = true, entry = "rate")
     * @XmlElement(cdata=false)
     */
    private $rates = [];

    public function addRate(FaresCurrencyRate $rate)
    {
        $this->rates[] = $rate;
        return $this;
    }

    public function getRates()
    {
        return $this->rates;
    }

    /**
     * Gets the company name.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
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
     * Gets the flight number.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $num;

    public function setNum($num)
    {
        $this->num = $num;
        return $this;
    }

    public function getNum()
    {
        return $this->num;
    }

    /**
     * Gets the UPT code.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $remark;

    public function setRemark($remark)
    {
        $this->remark = $remark;
        return $this;
    }

    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Gets the passenger categories.
     *
     * @Type("array<string>")
     * @XmlElement(cdata=false)
     * @XmlList(inline = true, entry = "category")
     */
    private $categoryes = [];

    public function addCategory($category)
    {
        $this->categoryes[] = $category;
        return $this;
    }

    public function getCategoryes()
    {
        return $this->categoryes;
    }

    /**
     * Gets the code for the route fare.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $route;

    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Gets the fare expiration date.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $validto;

    public function setValidto(\DateTime $validto)
    {
        $this->validto = $validto;
        return $this;
    }

    public function getValidto()
    {
        return $this->validto;
    }

    /**
     * Gets the minimum stay.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $minstay;

    public function setMinstay($minstay)
    {
        $this->minstay = $minstay;
        return $this;
    }

    public function getMinstay()
    {
        return $this->minstay;
    }

    /**
     * Gets the maximum stay.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $maxstay;

    public function setMaxstay($maxstay)
    {
        $this->maxstay = $maxstay;
        return $this;
    }

    public function getMaxstay()
    {
        return $this->maxstay;
    }

    /**
     * Gets the UPT parameters for getting the additional fare info.
     *
     * @Type("Sabre\DTO\Upt")
     * @XmlElement(cdata=false)
     */
    private $upt;

    public function setUpt(Upt $upt)
    {
        $this->upt = $upt;
        return $this;
    }

    public function getUpt()
    {
        return $this->upt;
    }
}
