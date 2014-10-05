<?php
namespace Sabre\DTO\BookingRequest;

use Sabre\DTO\DtoException;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\Type;
use Sabre\Helpers\LengthHelper;

/**
 * Class BookingRequestParams
 * Represents the booking request params.
 *
 * @package Sabre\DTO\BookingRequest
 */
class BookingRequestParams
{
    /**
     * Gets or sets the ticket series to estimate the fare.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $tickSer;

    public function getTickSer()
    {
        return $this->tickSer;
    }

    public function setTickSer($tickSer)
    {
        $this->tickSer = $tickSer;
        return $this;
    }

    /**
     * Gets or sets the parcel agency
     * The string must contain 5 letter.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $parcelAgency;

    public function getParcelAgency()
    {
        return $this->parcelAgency;
    }

    public function setParcelAgency($parcelAgency)
    {
        //@TODO Make the exception hierarchy.
        if (!LengthHelper::validateLength($parcelAgency, 5)) {
            throw new DtoException(sprintf(
                'The string must contain %d letters.',
                5
            ), DtoException::WRONG_STRING_LENGTH);
        }
        $this->parcelAgency = $parcelAgency;
        return $this;
    }
}
