<?php


namespace Sabre\Sender\Exception;


class SenderException extends \Exception
{
    const REQUEST_ALREADY_SENT  = __LINE__;
    const REQUEST_DOES_NOT_SENT = __LINE__;
    const WRONG_RESPONSE        = __LINE__;
}