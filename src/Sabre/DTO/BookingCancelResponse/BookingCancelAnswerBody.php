<?php
namespace Sabre\DTO\BookingCancelResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\ErrorInfoTrait;

class BookingCancelAnswerBody
{
    use ErrorInfoTrait;

    /**
     * Empty ok element.
     *
     * @Type("string")
     * @XmlElement
     */
    private $ok;

    public function setOk($ok)
    {
        $this->ok = $ok;

        return $this;
    }

    public function getOk()
    {
        return $this->ok;
    }
}
