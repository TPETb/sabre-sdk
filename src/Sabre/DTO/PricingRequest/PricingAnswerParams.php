<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerParamsTrait;

class PricingAnswerParams
{
    use AnswerParamsTrait;

    /**
     * Add back information about availability for subclass
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showAvailable;

    public function setShowAvailable($showAvailable)
    {
        $this->showAvailable = $showAvailable;

        return $this;
    }

    public function getShowAvailable()
    {
        return $this->showAvailable;
    }

    /**
     * Adds a line segment information Segment query response
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showIoMatching;

    public function setShowIoMatching($showIoMatching)
    {
        $this->showIoMatching = $showIoMatching;

        return $this;
    }

    public function getShowIoMatching()
    {
        return $this->showIoMatching;
    }

    /**
     * Enhance response time information and follow-up time flight segment
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showFlighttime;

    public function setShowFlighttime($showFlighttime)
    {
        $this->showFlighttime = $showFlighttime;

        return $this;
    }

    public function getShowFlighttime()
    {
        return $this->showFlighttime;
    }

    /**
     * Add response information on the total cost of transportation in the embodiment
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showVarianttotal;

    public function setShowVarianttotal($showVarianttotal)
    {
        $this->showVarianttotal = $showVarianttotal;

        return $this;
    }

    public function getShowVarianttotal()
    {
        return $this->showVarianttotal;
    }

    /**
     * Added to each subclass code of the base class
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showBaseclass;

    public function setShowBaseclass($showBaseclass)
    {
        $this->showBaseclass = $showBaseclass;

        return $this;
    }

    public function getShowBaseclass()
    {
        return $this->showBaseclass;
    }

    /**
     * Indicate whether the ticket be issued in Latin
     * When specifying regroup = 'true' to the tag attribute is added <flights> "latin_registration"
     * with the value, respectively, 'true' or 'false'. If realignment is not requested, this attribute
     * will be added to the tag <variant>. Below is an example for both cases.
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showRegLatin;

    public function setShowRegLatin($showRegLatin)
    {
        $this->showRegLatin = $showRegLatin;

        return $this;
    }

    public function getShowRegLatin()
    {
        return $this->showRegLatin;
    }

    /**
     * Release the information for specifying display UPT
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showUptRec;

    public function setShowUptRec($showUptRec)
    {
        $this->showUptRec = $showUptRec;

        return $this;
    }

    public function getShowUptRec()
    {
        return $this->showUptRec;
    }

    /**
     * Section estimates indicate an expiration date tariff
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showFareexpdate;

    public function setShowFareexpdate($showFareexpdate)
    {
        $this->showFareexpdate = $showFareexpdate;

        return $this;
    }

    public function getShowFareexpdate()
    {
        return $this->showFareexpdate;
    }

    /**
     * Signs of possible return of e-tickets
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showEt;

    public function setShowEt($showEt)
    {
        $this->showEt = $showEt;

        return $this;
    }

    public function getShowEt()
    {
        return $this->showEt;
    }

    /**
     * Return the number of tickets required for issuing transportation
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showNBlanks;

    public function setShowNBlanks($showNBlanks)
    {
        $this->showNBlanks = $showNBlanks;

        return $this;
    }

    public function getShowNBlanks()
    {
        return $this->showNBlanks;
    }

    /**
     * Regrouping response.
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $regroup;

    public function setRegroup($regroup)
    {
        $this->regroup = $regroup;

        return $this;
    }

    public function getRegroup()
    {
        return $this->regroup;
    }

    /**
     * The rearrangement of response combined into one option only one airline flights.
     * Automatically includes "mix_ac = 'false'"
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $splitCompanies;

    public function setSplitCompanies($splitCompanies)
    {
        $this->splitCompanies = $splitCompanies;

        return $this;
    }

    public function getSplitCompanies()
    {
        return $this->splitCompanies;
    }

    /**
     * Return codes airlines rules adopted by reference requests (Latin code can return air company instead of Russian)
     * default=true
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $referenceStyleCodes;

    public function setReferenceStyleCodes($referenceStyleCodes)
    {
        $this->referenceStyleCodes = $referenceStyleCodes;

        return $this;
    }

    public function getReferenceStyleCodes()
    {
        return $this->referenceStyleCodes;
    }

    /**
     * Add tags to the items in the response signs 'city' or 'airport'
     * default=false
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $markCityport;

    public function setMarkCityport($markCityport)
    {
        $this->markCityport = $markCityport;

        return $this;
    }

    public function getMarkCityport()
    {
        return $this->markCityport;
    }
}
