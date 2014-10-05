<?php


namespace Sabre\Sender;

use \Sabre\DTO\FareremarkRequest\FareremarkRequest;
use Sabre\Sender\Exception\SenderException;

class FareremarkSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\FareremarkResponse\FareremarkResponse';

    public function sendRequest(FareremarkRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}