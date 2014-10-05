<?php
namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\Types\EnumBookingPassengerSex;

class BookingResponsePassenger
{
    /**
     * @Type("integer")
     * @XmlAttribute
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
     * @Type("string")
     * @XmlAttribute
     */
    private $leadPass;

    public function setLeadPass($leadPass)
    {
        $this->leadPass = $leadPass;
        return $this;
    }

    public function getLeadPass()
    {
        return $this->leadPass;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $surname;

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $name;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $category;

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
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
        $sex = new EnumBookingPassengerSex($this->sex);
        return $sex->getValue();
    }

    public function setSex(EnumBookingPassengerSex $sex)
    {
        $this->sex = $sex->getValue();
        return $this;
    }

    /**
     * Gets or sets the passenger birthdate.
     *
     * @Type("DateTime<'d.m.Y'>")
     * @XmlElement(cdata=false)
     */
    private $birthdate;

    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    private $age;

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    /**
     * Gets or sets the document type.
     * Possible values:
     * "SR" - birth certificated.
     * "PS" - russian passport.
     * "NP" - foreign passport.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */

    private $doccode;

    public function setDoccode($doccode)
    {
        $this->doccode = $doccode;
        return $this;
    }

    public function getDoccode()
    {
        return $this->doccode;
    }

    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $doc;

    public function setDoc($doc)
    {
        $this->doc = $doc;
        return $this;
    }

    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Gets or sets the document expiration date.
     * Optional.
     * The date format is DD.MM.YY.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $pspexpire;

    public function setPspexpire(\DateTime $pspexpire)
    {
        $this->pspexpire = $pspexpire;
        return $this;
    }

    public function getPspexpire()
    {
        return $this->pspexpire;
    }

    /**
     * Gets the passenger nationality.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $nationality;

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
        return $this;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Gets the discount document type.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $doccodeDisc;

    public function setDoccodeDisc($doccodeDisc)
    {
        $this->doccodeDisc = $doccodeDisc;
        return $this;
    }

    public function getDoccodeDisc()
    {
        return $this->doccodeDisc;
    }

    /**
     * Gets the discount document number.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $docDisc;

    public function setDocDisc($docDisc)
    {
        $this->docDisc = $docDisc;
        return $this;
    }

    public function getDocDisc()
    {
        return $this->docDisc;
    }

    /**
     * Gets or sets the discount document expiration date.
     * Optional.
     * The date format is DD.MM.YY.
     *
     * @Type("DateTime<'d.m.y'>")
     * @XmlElement(cdata=false)
     */
    private $pspexpireDisc;

    public function setPspexpireDisc(\DateTime $pspexpireDisc)
    {
        $this->pspexpireDisc = $pspexpireDisc;
        return $this;
    }

    public function getPspexpireDisc()
    {
        return $this->pspexpireDisc;
    }

    /**
     * Gets the passenger contacts.
     *
     * @Type("Sabre\DTO\BookingResponse\BookingResponsePassengerContacts")
     * @XmlElement(cdata=false)
     */
    private $contacts;

    public function setContacts(BookingResponsePassengerContacts $contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }
}
