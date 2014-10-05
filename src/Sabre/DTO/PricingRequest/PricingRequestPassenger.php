<?php
namespace Sabre\DTO\PricingRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class PricingRequestPassenger
{
    /**
     * Category code or multicategory.
     * Mandatory.
     * Multicategory for children:
     * INFANT - children from 0 till 2 years old
     * CHILD - children from 2 till 12 years old
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $code;

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    /**
     * Passengers count in category.
     * Mandatory.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    protected $count;

    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }

    /**
     * Passengers age in category.
     * Required if the code set Multicategories.
     *
     * @Type("integer")
     * @XmlElement(cdata=false)
     */
    protected $age;

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
     * Passenger document.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $doc;

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
     * Passenger document of privilege.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $doc2;

    public function setDoc2($doc2)
    {
        $this->doc2 = $doc2;

        return $this;
    }

    public function getDoc2()
    {
        return $this->doc2;
    }
}
