<?php


namespace Sabre\Sender;

use \Sabre\DTO\FaresRequest\FaresRequest;
use Sabre\Sender\Exception\SenderException;

class FaresSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\FaresResponse\FaresResponse';

    public function sendRequest(FaresRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
} 