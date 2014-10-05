<?php
namespace Sabre\DTO\DescribeResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Sabre\DTO\ErrorInfoTrait;

class DescribeAnswerBody
{
    use ErrorInfoTrait;

    /**
     * Data type.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $data;

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * Data code.
     *
     * @Type("string")
     * @XmlAttribute
     */
    private $code;

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
     * Data items.
     *
     * @Type("array<Sabre\DTO\DescribeResponse\DescribeData>")
     * @XmlList(inline = true, entry = "data")
     * @XmlElement(cdata=false)
     */
    private $dataItems = [];

    public function addDataItem(DescribeData $data)
    {
        $this->dataItems[] = $data;

        return $this;
    }

    public function getDataItems()
    {
        return $this->dataItems;
    }
}
