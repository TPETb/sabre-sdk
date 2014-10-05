<?php
namespace Sabre\Sender;

use Sabre\DTO\OrderRequest\OrderRequest;

class OrderSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\OrderResponse\OrderResponse';

    public function sendRequest(OrderRequest $request)
    {
        return $this->doSendRequest($request);
    }

    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
} 