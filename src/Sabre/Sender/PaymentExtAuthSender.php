<?php
namespace Sabre\Sender;

use Sabre\DTO\PaymentExtAuthRequest\PaymentExtAuthRequest;

class PaymentExtAuthSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\PaymentExtAuthResponse\PaymentExtAuthResponse';

    public function sendRequest(PaymentExtAuthRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
