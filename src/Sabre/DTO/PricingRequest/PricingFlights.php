<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

class PricingFlights
{
    public static function fromArray(array $acomps)
    {
        $instance = new static();
        foreach ($acomps as $acomp) {
            $instance->addAcomp($acomp);
        }
        return $instance;
    }

    /**
     * Aviacompany
     *
     * @Type("array<Sabre\DTO\PricingRequest\PricingAcomp>")
     * @XmlList(inline = true, entry = "acomp")
     * @XmlElement(cdata=false)
     */
    protected $acomps = [];

    public function addAcomp(PricingAcomp $acomp)
    {
        $this->acomps[] = $acomp;

        return $this;
    }

    public function getAcomps()
    {
        return $this->acomps;
    }

    /**
     * Fare
     *
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "fare")
     * @XmlElement(cdata=false)
     */
    protected $fares = [];

    public function addFare($fare)
    {
        $this->fares[] = $fare;

        return $this;
    }

    public function getFares()
    {
        return $this->fares;
    }
}
