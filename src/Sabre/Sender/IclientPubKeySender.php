<?php
namespace Sabre\Sender;

use Sabre\DTO\IclientPubKeyRequest\IclientPubKeyRequest;

class IclientPubKeySender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\IclientPubKeyResponse\IclientPubKeyResponse';

    public function sendRequest(IclientPubKeyRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
