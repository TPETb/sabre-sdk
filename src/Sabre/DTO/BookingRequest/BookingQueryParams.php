<?php
namespace Sabre\DTO\BookingRequest;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use Sabre\DTO\DtoException;

/**
 * Class BookingQueryParamas
 *
 * @package Sabre\DTO\BookingRequest
 */
class BookingQueryParams
{
    /**
     * Gets or sets the flight segments.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingRequestSegment>")
     * @XmlList(inline = true, entry = "segment")
     * @XmlElement(cdata=false)
     */
    private $segments = [];

    public function getSegments()
    {
        return $this->segments;
    }

    public function addSegment(BookingRequestSegment $segment)
    {
        $this->segments[] = $segment;
        return $this;
    }

    /**
     * Gets or sets the passengers info.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingRequestPassenger>")
     * @XmlList(inline = true, entry = "passenger")
     * @XmlElement(cdata=false)
     */
    private $passengers = [];

    public function getPassengers()
    {
        return $this->passengers;
    }

    public function addPassenger(BookingRequestPassenger $passenger)
    {
        $this->passengers[] = $passenger;
        return $this;
    }

    /**
     * Gets or sets the general contacts info.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingRequestContacts>")
     * @XmlList(inline = true, entry = "contacts")
     * @XmlElement(cdata=false)
     */
    private $contacts = [];

    public function getContacts()
    {
        return $this->contacts;
    }

    public function addContacts(BookingRequestContacts $contacts)
    {
        $this->contacts[] = $contacts;
        return $this;
    }

    /**
     * Gets or sets the general contacts info.
     *
     * @Type("array<Sabre\DTO\BookingRequest\BookingRequestCustomer>")
     * @XmlList(inline = true, entry = "contacts")
     * @XmlElement(cdata=false)
     */
    private $customer;

    public function addCustomer(BookingRequestCustomer $customer)
    {
        $this->customer[] = $customer;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Gets or set the answer params.
     * Optional
     *
     * @Type("Sabre\DTO\BookingRequest\BookingAnswerParams")
     * @XmlElement(cdata=false)
     */
    private $answerParams;

    public function getAnswerParams()
    {
        return $this->answerParams;
    }

    public function setAnswerParams(BookingAnswerParams $answerParams)
    {
        $this->answerParams = $answerParams;
        return $this;
    }

    /**
     * Gets or sets the request params.
     * Optional
     *
     * @Type("Sabre\DTO\BookingRequest\BookingRequestParams")
     * @XmlElement(cdata=false)
     */
    private $requestParams;

    public function getRequestParams()
    {
        return $this->requestParams;
    }

    public function setRequestParams(BookingRequestParams $requestParams)
    {
        $this->requestParams = $requestParams;
        return $this;
    }
}
