<?php
namespace Sabre\Sender;

use Sabre\DTO\Interfaces\RequestInterface;

interface SenderInterface
{

    public function awaitResponse();
}
