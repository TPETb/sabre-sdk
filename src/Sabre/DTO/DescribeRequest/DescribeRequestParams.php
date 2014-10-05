<?php
namespace Sabre\DTO\DescribeRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class DescribeRequestParams
{
    /**
     * Whether to return cities, airports, airlines, countries which doesn't have any flights.
     *
     * Setting this to "true" also makes test data to be returned.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $showAll;

    public function setShowAll($showAll)
    {
        $this->showAll = $showAll;

        return $this;
    }

    public function getShowAll()
    {
        return $this->showAll;
    }

    /**
     * Aircompany to filter cities and airports present in its schedule.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    protected $company;

    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }
}
