<?php


namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class BookingPriceTaxes
{
    /**
     * @Type("array<Sabre\DTO\BookingResponse\BookingPriceTax>")
     * @XmlList(inline = true, entry = "tax")
     */
    private $taxes = [];

    public function addTax(BookingPriceTax $tax)
    {
        $this->taxes[] = $tax;
        return $this;
    }

    public function getTaxes()
    {
        return $this->taxes;
    }

} 