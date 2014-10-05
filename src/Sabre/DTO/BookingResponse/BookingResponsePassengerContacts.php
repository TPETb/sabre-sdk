<?php


namespace Sabre\DTO\BookingResponse;

use Sabre\DTO\BookingRequest\BookingContact;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class BookingResponsePassengerContacts
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
     * Gets or sets the contact.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingContact>")
     * @XmlList(inline = true, entry = "contact")
     * @XmlElement(cdata=false)
     */
    private $contacts = [];

    public function addContact(BookingContact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
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