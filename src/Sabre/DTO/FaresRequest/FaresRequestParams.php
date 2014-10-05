<?php

namespace Sabre\DTO\FaresRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class FaresRequestParams
{

    /**
     * Gets or sets the ticket series.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $tickSer;

    public function getTickSer()
    {
        return $this->tickSer;
    }

    public function setTickSer($tickSer)
    {
        $this->tickSer = $tickSer;
        return $this;
    }

    /**
     * Gets or sets the flag to show special fares.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $tripflag;

    public function getTripflag()
    {
        return $this->tripflag;
    }

    public function setTripflag($tripflag)
    {
        $this->tripflag = $tripflag;
        return $this;
    }

} 