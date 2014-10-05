<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\Error\Error;

class PricingAnswerBody
{
    /**
     * Whether the result set is complete or have been limited.
     *
     * Either "all" or "cut".
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $results;

    public function setResults($results)
    {
        $this->results = $results;

        return $this;
    }

    public function getResults()
    {
        return $this->results;
    }

    /**
     * Pricing variants
     *
     * @Type("array<Sabre\DTO\PricingResponse\PricingVariant>")
     * @XmlList(inline = true, entry = "variant")
     * @XmlElement(cdata=false)
     */
    private $variants = [];

    public function getVariants()
    {
        return $this->variants;
    }

    public function addVariant(PricingVariant $variant)
    {
        $this->variants[] = $variant;
        return $this;
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
     * @Type("Sabre\DTO\PricingResponse\PricingInfo")
     * @XmlElement(cdata=false)
     */
    private $info;

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo(PricingInfo $info)
    {
        $this->info = $info;
        return $this;
    }
}
