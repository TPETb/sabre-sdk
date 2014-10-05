<?php
namespace Sabre\DTO\PaymentExtAuthResponse;

use DateTime;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

class PaymentExtAuthReceipts
{
    /**
     * PDF contents creation time.
     *
     * @Type("DateTime<'H:i:s d.m.Y'>")
     * @XmlAttribute
     */
    private $crTime;

    public function setCrTime(DateTime $crTime)
    {
        $this->crTime = $crTime;

        return $this;
    }

    public function getCrTime()
    {
        return $this->crTime;
    }

    /**
     * Receipts in PDF.
     *
     * @Type("string")
     * @XmlValue(cdata=false)
     */
    private $pdf;

    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function getPdf()
    {
        return $this->pdf;
    }
}
