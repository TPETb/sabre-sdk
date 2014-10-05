<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/5/14
 * Time: 8:25 PM
 */
namespace Sabre\DTO\SessionCreateRequest;

use JMS\Serializer\Annotation\SerializedName;
use Sabre\DTO\Interfaces\RequestInterface;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

/** @XmlRoot("SessionCreateRQ") */
class SessionCreateRequest implements RequestInterface
{

    const SERVICE = 'SessionValidateRQ';
    const ACTION = 'SessionValidateRQ';


    /**
     * @Type("Sabre\DTO\SessionCreateRequest\SessionCreatePOS")
     * @XmlElement(cdata=false)
     * @SerializedName("POS")
     */
    private $POS;


    /**
     * @return mixed
     */
    public function getPOS()
    {
        return $this->POS;
    }


    /**
     * @param mixed $POS
     * @return SessionCreateRequest
     */
    public function setPOS($POS)
    {
        $this->POS = $POS;
        return $this;
    }


}