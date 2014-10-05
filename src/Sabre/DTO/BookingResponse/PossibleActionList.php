<?php
namespace Sabre\DTO\BookingResponse;

use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;

class PossibleActionList
{
    /**
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "action")
     */
    private $actions = [];

    public function addAction($action)
    {
        $this->actions[] = $action;

        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

} 