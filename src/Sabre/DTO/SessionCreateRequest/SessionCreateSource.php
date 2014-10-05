<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/5/14
 * Time: 8:33 PM
 */
namespace Sabre\DTO\SessionCreateRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class SessionCreateSource
 * @package Sabre\DTO\SessionCreateRequest
 */
class SessionCreateSource
{

    /**
     * @XmlAttribute
     * @SerializedName("PseudoCityCode")
     */
    private $PseudoCityCode;


    /**
     * @return mixed
     */
    public function getPseudoCityCode()
    {
        return $this->PseudoCityCode;
    }


    /**
     * @param mixed $PseudoCityCode
     * @return SessionCreateSource
     */
    public function setPseudoCityCode($PseudoCityCode)
    {
        $this->PseudoCityCode = $PseudoCityCode;
        return $this;
    }

} 