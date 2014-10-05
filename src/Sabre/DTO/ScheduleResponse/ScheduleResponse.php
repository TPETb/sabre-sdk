<?php
namespace Sabre\DTO\ScheduleResponse;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\Interfaces\ResponseInterface;

/** XmlRoot */
class ScheduleResponse implements ResponseInterface
{
    /**
     * @Type("Sabre\DTO\ScheduleResponse\ScheduleAnswer")
     * @XmlElement(cdata=false)
     */
    private $answer;

    public function setAnswer(ScheduleAnswer $answer)
    {
        $this->answer = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getError() {
        return $this->answer->getSchedule()->getError();
    }

    public function getInfo() {
        return $this->answer->getSchedule()->getInfo();
    }
}
