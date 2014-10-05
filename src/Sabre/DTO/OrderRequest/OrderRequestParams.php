<?php
namespace Sabre\DTO\OrderRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;
use Sabre\Helpers\LengthHelper;

class OrderRequestParams
{
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $tickSer;

    public function setTickSer($tickSer)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($tickSer, 6)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                6
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->tickSer = $tickSer;

        return $this;
    }

    public function getTickSer()
    {
        return $this->tickSer;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $prevPricingParams;

    public function setPrevPricingParams($prevPricingParams)
    {
        $this->prevPricingParams = $prevPricingParams;

        return $this;
    }

    public function getPrevPricingParams()
    {
        return $this->prevPricingParams;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $noPricing;

    public function setNoPricing($noPricing)
    {
        $this->noPricing = $noPricing;

        return $this;
    }

    public function getNoPricing()
    {
        return $this->noPricing;
    }
} 