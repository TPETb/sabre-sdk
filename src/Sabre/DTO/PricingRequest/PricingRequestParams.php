<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\Types\EnumPricingFingeringOrder;

class PricingRequestParams
{
    /**
     * Minimal results.
     * Integer or string "spOnePass"
     * "spOnePass" work only if <fingering_order> set in
     * differentFirst, differentFlightsFirst or differentFlightsCombFirst
     * default = 10
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $minResults;

    public function setMinResults($minResults)
    {
        //TODO add checking integer or spOnePass
        $this->minResults = $minResults;

        return $this;
    }

    public function getMinResults()
    {
        return $this->minResults;
    }

    /**
     * Maximal results.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    protected $maxResults;

    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;

        return $this;
    }

    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * Combine subclasses segments along the transportation route
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $mixScls;

    public function setMixScls($mixScls)
    {
        $this->mixScls = $mixScls;

        return $this;
    }

    public function getMixScls()
    {
        return $this->mixScls;
    }

    /**
     * Combine airlines on the route segments of transportation
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $mixAc;

    public function setMixAc($mixAc)
    {
        $this->mixAc = $mixAc;

        return $this;
    }

    public function getMixAc()
    {
        return $this->mixAc;
    }

    /**
     * Combine rules.
     *
     * @Type("Sabre\DTO\PricingRequest\PricingCombRules")
     * @XmlElement(cdata=false)
     */
    protected $combRules;

    public function setCombRules(PricingCombRules $combRules)
    {
        $this->combRules = $combRules;

        return $this;
    }

    public function getCombRules()
    {
        return $this->combRules;
    }

    /**
     * Order sorting options when evaluating
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $fingeringOrder;

    public function setFingeringOrder(EnumPricingFingeringOrder $fingeringOrder)
    {
        $this->fingeringOrder = $fingeringOrder->getValue();

        return $this;
    }

    public function getFingeringOrder()
    {
        return $this->fingeringOrder;
    }

    /**
     * Series tickets for evaluating transportation
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $tickSer;

    public function setTickSer($tickSer)
    {
        $this->tickSer = $tickSer;

        return $this;
    }

    public function getTickSer()
    {
        return $this->tickSer;
    }

    /**
     * Tariffed child on the adult rate if found discounts
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $priceChildAaa;

    public function setPriceChildAaa($priceChildAaa)
    {
        $this->priceChildAaa = $priceChildAaa;

        return $this;
    }

    public function getPriceChildAaa()
    {
        return $this->priceChildAaa;
    }

    /**
     * Not apply tariffs while booking and registration
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $asynchronousFares;

    public function setAsynchronousFares($asynchronousFares)
    {
        $this->asynchronousFares = $asynchronousFares;

        return $this;
    }

    public function getAsynchronousFares()
    {
        return $this->asynchronousFares;
    }

    /**
     * Query timeout (seconds)
     * from 7 till 150
     * default 50
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    protected $timeout;

    public function setTimeout($timeout)
    {
        //TODO add checking timeout
        $this->timeout = $timeout;

        return $this;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Produce billing to e-ticket, if applicable
     * <et_if_possible> Parameter tells the system that in the case of design options to DL this embodiment
     * transportation assessment shall be subject to an electronic form, otherwise - in the
     * main form (form or default form specified in the parameter <tick_ser>).
     * For each option, the carriage will be entered in the response sign (et_blanks),
     * indicating what type of form was used for evaluation.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $etIfPossible;

    public function setEtIfPossible($etIfPossible)
    {
        $this->etIfPossible = $etIfPossible;

        return $this;
    }

    public function getEtIfPossible()
    {
        return $this->etIfPossible;
    }

    /**
     * Payment method for evaluating
     *
     * @Type("Sabre\DTO\PricingRequest\PricingFormpay")
     * @XmlElement(cdata=false)
     */
    protected $formpay;

    public function setFormpay(PricingFormpay $formpay)
    {
        $this->formpay = $formpay;

        return $this;
    }

    public function getFormpay()
    {
        return $this->formpay;
    }
}
