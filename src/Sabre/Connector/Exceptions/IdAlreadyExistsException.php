<?php
namespace Sabre\Connector\Exceptions;

class IdAlreadyExistsException extends ConnectorException
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
