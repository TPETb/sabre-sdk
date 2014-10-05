<?php

namespace Sabre\DTO\BookingRequest;

use Sabre\DTO\DtoException;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use Sabre\Types\EnumBookingPassengerSex;
use Sabre\Types\EnumDocumentType;

class BookingRequestPassenger
{

    /**
     * Gets or sets the passenger id.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets the flag that indicated the passenger is a leader.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $leadPass;

    public function getLeadPass()
    {
        return $this->leadPass;
    }

    public function setLeadPass($leadPass)
    {
        $this->leadPass = $leadPass;
        return $this;
    }

    /**
     * Gets the passenger surname.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $surname;

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Gets the passenger name.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets the passenger category.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $category;

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Gets or sets the passenger sex.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $sex;

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex(EnumBookingPassengerSex $sex)
    {
        $this->sex = $sex->getValue();
        return $this;
    }

    /**
     * Gets or sets the passenger birthdate.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $age;

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(\DateTime $age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * Gets or sets the document type.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $doccode;

    public function getDocCode()
    {
        return $this->doccode;
    }

    public function setDocCode(EnumDocumentType $doccode)
    {
        $this->doccode = $doccode->getValue();
        return $this;
    }

    /**
     * Gets or sets the document number.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $doc;

    public function getDoc()
    {
        return $this->doc;
    }

    public function setDoc($doc)
    {
        $this->doc = $doc;
        return $this;
    }

    /**
     * Gets or sets the document expiration date.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $pspexpire;

    public function getPspexpire()
    {
        return $this->pspexpire;
    }

    public function setPspexpire(\DateTime $pspexpire)
    {
        $this->pspexpire = $pspexpire;
        return $this;
    }

    /**
     * Gets or sets the passenger nationality.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $nationality;

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * Gets or sets the discount document type.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $doccodeDisc;

    public function getDoccodeDisc()
    {
        return $this->doccodeDisc;
    }

    public function setDoccodeDisc($doccodeDisc)
    {
        $this->doccodeDisc = $doccodeDisc;
        return $this;
    }

    /**
     * Gets or sets the discount document number.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $docDisc;

    public function getDocDisc()
    {
        return $this->docDisc;
    }

    public function setDocDisc($docDisc)
    {
        $this->docDisc = $docDisc;
        return $this;
    }

    /**
     * Gets or sets the discount document expiration date.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $pspexpireDisc;

    public function getPspexpireDisc()
    {
        return $this->pspexpireDisc;
    }

    public function setPspexpireDisc(\DateTime $pspexpireDisc)
    {
        $this->pspexpireDisc = $pspexpireDisc;
        return $this;
    }

    /**
     * Gets or sets the passenger phones.
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
     * Gets or sets the passenger contacts.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingContact>")
     * @XmlList(inline = true, entry = "contact")
     * @XmlElement(cdata=false)
     */
    private $contacts = [];

    public function getContact()
    {
        return $this->contacts;
    }

    public function addContact(BookingContact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }

} 