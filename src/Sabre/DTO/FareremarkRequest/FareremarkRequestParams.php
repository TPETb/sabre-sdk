<?php
namespace Sabre\DTO\FareremarkRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\Upt;

class FareremarkRequestParams
{
    /**
     * Gets or sets the sixteenth category for UTP.
     * Uses only for new UTPs.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $cat_16;

    public function getCatSixteen()
    {
        return $this->cat_16;
    }

    public function setCatSixteen($cat_16)
    {
        $this->cat_16 = $cat_16;
        return $this;
    }

    /**
     * Gets or sets the UPT parameters gotten from a fare response.
     *
     * @Type("Sabre\DTO\Upt")
     * @XmlElement(cdata=false)
     */
    private $upt;

    public function setUpt(Upt $upt)
    {
        $this->upt = $upt;
        return $this;
    }

    public function getUpt()
    {
        return $this->upt;
    }
}
