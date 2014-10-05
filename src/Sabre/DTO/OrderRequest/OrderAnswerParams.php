<?php
namespace Sabre\DTO\OrderRequest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use Sabre\DTO\AnswerParamsTrait;

class OrderAnswerParams
{
    use AnswerParamsTrait;


    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $tickinfo;

    public function setTickinfo($tickinfo)
    {
        $this->tickinfo = $tickinfo;

        return $this;
    }

    public function getTickinfo()
    {
        return $this->tickinfo;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showActions;

    public function setShowActions($showActions)
    {
        $this->showActions = $showActions;

        return $this;
    }

    public function getShowActions()
    {
        return $this->showActions;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $addCommonStatus;

    public function setAddCommonStatus($addCommonStatus)
    {
        $this->addCommonStatus = $addCommonStatus;

        return $this;
    }

    public function getAddCommonStatus()
    {
        return $this->addCommonStatus;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showUptRec;

    public function setShowUptRec($showUptRec)
    {
        $this->showUptRec = $showUptRec;

        return $this;
    }

    public function getShowUptRec()
    {
        return $this->showUptRec;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $addRemarks;

    public function setAddRemarks($addRemarks)
    {
        $this->addRemarks = $addRemarks;

        return $this;
    }

    public function getAddRemarks()
    {
        return $this->addRemarks;
    }

    /**
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    protected $showErsp;

    public function setShowErsp($showErsp)
    {
        $this->showErsp = $showErsp;

        return $this;
    }

    public function getShowErsp()
    {
        return $this->showErsp;
    }
} 