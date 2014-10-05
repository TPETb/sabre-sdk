<?php
namespace Sabre\Sender;

use Sabre\DTO\KeyInfoRequest\KeyInfoRequest;
use Sabre\Sender\Exception\SenderException;

class KeyInfoSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\KeyInfoResponse\KeyInfoResponse';

    public function sendRequest(KeyInfoRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
