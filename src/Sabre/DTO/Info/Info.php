<?php
namespace Sabre\DTO\Info;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

class Info
{
    /**
     * @Type("array<Sabre\DTO\Info\Warning>")
     * @XmlList(inline = true, entry = "warning")
     */
    private $warnings = [];

    public function getWarnings()
    {
        return $this->warnings;
    }

    public function addWarning(Warning $warning)
    {
        $this->warnings[] = $warning;
        return $this;
    }
}
