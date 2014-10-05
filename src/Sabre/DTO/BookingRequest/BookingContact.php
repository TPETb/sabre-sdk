<?php

namespace Sabre\DTO\BookingRequest;

use Sabre\Types\EnumBookingContact;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\Type;

/**
 * Class BookingContact
 * Represents the booking contact info.
 */
class BookingContact
{


    /**
     * Gets or sets the contact type.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $type;

    public function getType()
    {
        return $this->type;
    }

    public function setType(EnumBookingContact $type)
    {
        $this->type = $type->getValue();
        return $this;
    }

    /**
     * Gets or sets the contact comment.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $comment;

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Gets or sets the contact value such as an email or phone.
     *
     * @Type("string")
     * @XmlValue(cdata=false)
     */
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

} 