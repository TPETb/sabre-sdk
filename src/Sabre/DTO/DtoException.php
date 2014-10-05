<?php
namespace Sabre\DTO;

use Sabre\Exceptions\SdkException;

class DtoException extends SdkException
{
    const WRONG_STRING_LENGTH = __LINE__;
    const WRONG_ENUM_VALUE = __LINE__;
}
