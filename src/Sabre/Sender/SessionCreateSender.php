<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/5/14
 * Time: 8:38 PM
 */

namespace Sabre\Sender;


use Sabre\DTO\SessionCreateRequest\SessionCreateRequest;

class SessionCreateSender extends SenderAbstract implements SenderInterface
{
    const RESPONSE_DTO = 'Sabre\DTO\SessionCreateRequest\SessionCreateRequest';


    public function sendRequest(SessionCreateRequest $request)
    {
        return $this->doSendRequest($request);
    }


    protected function getResponseDtoClassname()
    {
        return self::RESPONSE_DTO;
    }
}