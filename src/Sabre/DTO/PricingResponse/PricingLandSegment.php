<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class PricingLandSegment
{
    /**
     * Start point location code.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $point1;

    public function setPoint1($point1)
    {
        $this->point1 = $point1;

        return $this;
    }

    public function getPoint1()
    {
        return $this->point1;
    }

    /**
     * End point location code.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $point2;

    public function setPoint2($point2)
    {
        $this->point2 = $point2;

        return $this;
    }

    public function getPoint2()
    {
        return $this->point2;
    }
}
