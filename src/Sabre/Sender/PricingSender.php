<?php
namespace Sabre\Sender;

use Sabre\DTO\PricingRequest\PricingRequest;

class PricingSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\PricingResponse\PricingResponse';

    public function sendRequest(PricingRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
