<?php


namespace Sabre\DTO\BookingResponse;

use Sabre\DTO\BookingRequest;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingResponseContacts
{

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $email;

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @Type("Sabre\DTO\BookingRequest\BookingContact")
     * @XmlElement(cdata=false)
     */
    private $contact;

    public function setContact(BookingRequest\BookingContact $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    public function getContact()
    {
        return $this->contact;
    }
} 