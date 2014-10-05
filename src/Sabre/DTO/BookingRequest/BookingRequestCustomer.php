<?php


namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;

class BookingRequestCustomer
{
    /**
     * Gets or sets the customer phones.
     *
     * @Type("Sabre\DTO\BookingRequest\BookingContact")
     * @XmlElement(cdata=false)
     */
    private $phone;

    public function getPhone()
    {
        return $this->phones;
    }

    public function setPhone(BookingContact $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Gets or sets the customer phones.
     *
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

} 