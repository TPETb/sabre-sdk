<?php
namespace Sabre\Connector\Exceptions;

class UnknownRequestException extends ConnectorException
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $id;
    }
}
