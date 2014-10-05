<?php


namespace Sabre\Sender;

use \Sabre\DTO\AvailabilityRequest\AvailabilityRequest;
use Sabre\Sender\Exception\SenderException;

class AvailabilitySender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\AvailabilityResponse\AvailabilityResponse';

    public function sendRequest(AvailabilityRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}