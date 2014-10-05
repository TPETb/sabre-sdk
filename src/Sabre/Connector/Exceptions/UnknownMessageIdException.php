<?php
namespace Sabre\Connector\Exceptions;

class UnknownMessageIdException extends ConnectorException
{
    protected $messageId;

    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }

    public function getMessageId()
    {
        return $this->messageId;
    }
}
