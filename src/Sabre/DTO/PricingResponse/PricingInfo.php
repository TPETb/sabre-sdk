<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\Info\Info;

class PricingInfo extends Info
{
    /**
     * Additional land segments.
     *
     * @Type("array<Sabre\DTO\PricingResponse\PricingLandSegment>")
     * @XmlList(inline = true, entry = "land_segment")
     * @XmlElement(cdata=false)
     */
    private $landSegments = [];

    public function getLandSegments()
    {
        return $this->landSegments;
    }

    public function addLandSegment(PricingLandSegment $landSegment)
    {
        $this->landSegments[] = $landSegment;

        return $this;
    }
}
