<?php
namespace Sabre\Sender;

use Sabre\DTO\ScheduleRequest\ScheduleRequest;
use Sabre\Sender\Exception\SenderException;

class ScheduleSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\ScheduleResponse\ScheduleResponse';

    public function sendRequest(ScheduleRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
