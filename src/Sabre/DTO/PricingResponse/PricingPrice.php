<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\Upt;

class PricingPrice
{
    /**
     * Passenger category code used for calculation.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $code;

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Passenger category code as was requested.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $origCode;

    public function setOrigCode($origCode)
    {
        $this->origCode = $origCode;

        return $this;
    }

    public function getOrigCode()
    {
        return $this->origCode;
    }

    /**
     * Skip count attribute, as it is marked as deprecated in the docs.
    **/

    /**
     * Currency code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $currency;

    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Tour code if present.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $tourCode;

    public function setTourCode($tourCode)
    {
        $this->tourCode = $tourCode;

        return $this;
    }

    public function getTourCode()
    {
        return $this->tourCode;
    }

    /**
     * Free baggage limit if defined.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $baggage;

    public function setBaggage($baggage)
    {
        $this->baggage = $baggage;

        return $this;
    }

    public function getBaggage()
    {
        return $this->baggage;
    }

    /**
     * Skip ticket attribute, as it is going to be filled with dummy data.
    **/

    /**
     * Validating carrier code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $validatingCompany;

    public function setValidatingCompany($validatingCompany)
    {
        $this->validatingCompany = $validatingCompany;

        return $this;
    }

    public function getValidatingCompany()
    {
        return $this->validatingCompany;
    }

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $accode;

    public function setAccode($accode)
    {
        $this->accode = $accode;

        return $this;
    }

    public function getAccode()
    {
        return $this->accode;
    }

    /**
     * Base fare.
     *
     * @Type("Sabre\DTO\PricingResponse\PricingFare")
     * @XmlElement(cdata=false)
     */
    private $fare;

    public function setFare(PricingFare $fare)
    {
        $this->fare = $fare;

        return $this;
    }

    public function getFare()
    {
        return $this->fare;
    }

    /**
     * Taxes added by agencies and aircompanies.
     *
     * @Type("array<Sabre\DTO\PricingResponse\PricingTax>")
     * @XmlList(inline = true, entry = "tax")
     * @XmlElement(cdata=false)
     */
    private $taxes = [];

    public function getTaxes()
    {
        return $this->taxes;
    }

    public function addTax(PricingTax $tax)
    {
        $this->taxes[] = $tax;

        return $this;
    }

    /**
     * Total amount including taxes.
     *
     * @Type("double")
     * @XmlElement
     */
    private $total;

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Arbitrary parameters to use in UPT request.
     *
     * Only present if request had show_upt_rec.
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
