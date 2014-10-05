<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

/**
 * @package Sabre\DTO\PricingRequest
 */
class PricingQueryParams
{
    /**
     * Gets or sets the flight segments.
     *
     * @Type("array<Sabre\DTO\PricingRequest\PricingRequestSegment>")
     * @XmlList(inline = true, entry = "segment")
     * @XmlElement(cdata=false)
     */
    private $segments = [];

    public function getSegments()
    {
        return $this->segments;
    }

    public function addSegment(PricingRequestSegment $segment)
    {
        $this->segments[] = $segment;
        return $this;
    }

    /**
     * Gets or sets the passengers info.
     *
     * @Type("array<Sabre\DTO\PricingRequest\PricingRequestPassenger>")
     * @XmlList(inline = true, entry = "passenger")
     * @XmlElement(cdata=false)
     */
    private $passengers = [];

    public function getPassengers()
    {
        return $this->passengers;
    }

    public function addPassenger(PricingRequestPassenger $passenger)
    {
        $this->passengers[] = $passenger;
        return $this;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\PricingRequest\PricingAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(PricingAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }

    /**
     * Gets or sets the request params.
     * Optional
     *
     * @Type("Sabre\DTO\PricingRequest\PricingRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(PricingRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }
}
