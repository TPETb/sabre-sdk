<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/5/14
 * Time: 8:29 PM
 */

namespace Sabre\DTO\SessionCreateRequest;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

/**
 * Class SessionCreatePOS
 * @package Sabre\DTO\SessionCreateRequest
 */
class SessionCreatePOS
{
    /**
     * @Type("Sabre\DTO\SessionCreateRequest\SessionCreateSource")
     * @XmlElement(cdata=false)
     * @SerializedName("Source")
     */
    private $Source;


    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->Source;
    }


    /**
     * @param mixed $Source
     * @return SessionCreatePOS
     */
    public function setSource($Source)
    {
        $this->Source = $Source;
        return $this;
    }

} 