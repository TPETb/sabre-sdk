<?php


namespace Sabre\Sender;

use \Sabre\DTO\BookingRequest\BookingRequest;
use Sabre\Sender\Exception\SenderException;

class BookingSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\BookingResponse\BookingResponse';

    public function sendRequest(BookingRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
} 