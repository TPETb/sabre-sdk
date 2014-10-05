<?php
namespace Sabre\DTO\FareremarkRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class FareremarkQuery
{

    /**
     * Gets or sets the query params.
     * Required.
     *
     * @Type("Sabre\DTO\FareremarkRequest\FareremarkQueryParams")
     * @XmlElement(cdata=false)
     */
    private $fareremark;

    public function getFareremark()
    {
        return $this->fareremark;
    }

    public function setFareremark(FareremarkQueryParams $fareremark)
    {
        $this->fareremark = $fareremark;
        return $this;
    }
}
