<?php
namespace Sabre\DTO\PricingResponse;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PricingSegmentTransferTime
{
    /**
     * Identifies corresponding segment from the request.
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("iSegmentNum")
     */
    private $iSegmentNum;

    public function setISegmentNum($iSegmentNum)
    {
        $this->iSegmentNum = $iSegmentNum;

        return $this;
    }

    public function getISegmentNum()
    {
        return $this->iSegmentNum;
    }

    /**
     * Identifies corresponding segment origin.
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("iSegmentOrig")
     */
    private $iSegmentOrig;

    public function setISegmentOrig($iSegmentOrig)
    {
        $this->iSegmentOrig = $iSegmentOrig;

        return $this;
    }

    public function getISegmentOrig()
    {
        return $this->iSegmentOrig;
    }

    /**
     * Identifies corresponding segment destination.
     *
     * @Type("string")
     * @XmlAttribute
     * @SerializedName("iSegmentDest")
     */
    private $iSegmentDest;

    public function setISegmentDest($iSegmentDest)
    {
        $this->iSegmentDest = $iSegmentDest;

        return $this;
    }

    public function getISegmentDest()
    {
        return $this->iSegmentDest;
    }

    /**
     * Flight duration.
     *
     * @Type("DateTime<'H:i'>")
     * @XmlValue(cdata=false)
     */
    private $duration;

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDuration()
    {
        return $this->duration;
    }
}
