<?php
namespace Sabre\DTO\ScheduleResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class ScheduleAnswer
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
     * @Type("Sabre\DTO\ScheduleResponse\ScheduleAnswerBody")
     * @XmlElement(cdata=false)
     */
    private $schedule;

    public function setSchedule(ScheduleAnswerBody $schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }
}
