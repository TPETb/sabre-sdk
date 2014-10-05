<?php
namespace Sabre\Sender;

use Sabre\DTO\BookingCancelRequest\BookingCancelRequest;

class BookingCancelSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\BookingCancelResponse\BookingCancelResponse';

    public function sendRequest(BookingCancelRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
