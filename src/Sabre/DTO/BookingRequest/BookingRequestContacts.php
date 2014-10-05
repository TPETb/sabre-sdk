<?php

namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

/**
 * Class BookingRequestContacts
 * Represents the booking request common contacts info.
 *
 * @package Sabre\DTO\BookingRequest
 */
class BookingRequestContacts
{

    /**
     * Gets or sets the phone.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingContact>")
     * @XmlList(inline = true, entry = "phone")
     * @XmlElement(cdata=false)
     */
    private $phones = [];

    public function getPhones()
    {
        return $this->phones;
    }

    public function addPhone(BookingContact $phone)
    {
        $this->phones[] = $phone;
        return $this;
    }

    /**
     * Gets or sets the email.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $email;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

} 