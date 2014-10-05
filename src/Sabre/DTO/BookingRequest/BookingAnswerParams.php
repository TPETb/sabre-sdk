<?php
namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\AnswerParamsTrait;

/**
 * Class BookingAnswerParams
 * Represents the booking asnwer params.
 *
 * @package Sabre\DTO\BookingRequest
 */
class BookingAnswerParams
{
    use AnswerParamsTrait;

    /**
     * Gets or sets the flag to show the airplane type.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $showTts;

    public function getShowTts()
    {
        return $this->showTts;
    }

    public function setShowTts($showTts)
    {
        $this->showTts = $showTts;
        return $this;
    }

    /**
     * Gets or sets the flag to show the Upt info.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $showUptRec;

    public function getShowUptRecord()
    {
        return $this->showUptRec;
    }

    public function setShowUptRecord($showUptRec)
    {
        $this->showUptRec = $showUptRec;
        return $this;
    }

    /**
     * Gets or sets the flag to show remarks about passengers.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $addRemarks;

    public function getAddRemarks()
    {
        return $this->addRemarks;
    }

    public function setAddRemarks($addRemarks)
    {
        $this->addRemarks = $addRemarks;
        return $this;
    }
}
