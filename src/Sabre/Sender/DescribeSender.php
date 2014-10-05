<?php
namespace Sabre\Sender;

use Sabre\DTO\DescribeRequest\DescribeRequest;

class DescribeSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\DescribeResponse\DescribeResponse';

    public function sendRequest(DescribeRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}
