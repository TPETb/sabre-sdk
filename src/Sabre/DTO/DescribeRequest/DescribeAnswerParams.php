<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerParamsTrait;

class PricingAnswerParams
{
    use AnswerParamsTrait;

    /**
     * Whether to return cyrillic codes for airlines that are usually displayed in latin.
     *
     * Defaults to false.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showRealCodes;

    public function setShowRealCodes($showRealCodes)
    {
        $this->showRealCodes = $showRealCodes;

        return $this;
    }

    public function getShowRealCodes()
    {
        return $this->showRealCodes;
    }
}
