<?php


namespace Sabre\DTO\FaresResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class FaresAnswer
{

    /**
     * Gets the pult name.
     *
     * @XmlAttribute
     * @Type("string")
     */
    private $pult;

    public function setPult($pult)
    {
        $this->pult = $pult;
        return $this;
    }

    public function getPult()
    {
        return $this->pult;
    }

    /**
     * Gets the message id.
     *
     * @XmlAttribute
     * @Type("string")
     */
    private $msgid;

    public function setMsgid($msgid)
    {

        $this->msgid = $msgid;
        return $this;
    }

    public function getMsgid()
    {
        return $this->msgid;
    }

    /**
     * Gets the time when response was processed.
     *
     * @XmlAttribute
     * @Type("DateTime<'H:i:s d.m.Y'>")
     */
    private $time;

    public function setTime(\DateTime $time)
    {
        $this->time = $time;
        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    /**
     * @Type("Sabre\DTO\FaresResponse\FaresAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $fares;

    public function setFares(FaresAnswerBody $fares)
    {
        $this->fares = $fares;
        return $this;
    }

    public function getFares()
    {
        return $this->fares;
    }
} 