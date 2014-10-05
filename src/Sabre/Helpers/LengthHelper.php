<?php
namespace Sabre\Helpers;

class LengthHelper
{
    public static function validateLength($value, $length = 3)
    {
        return ((is_string($value) || is_numeric($value)) && mb_strlen($value, 'UTF-8') <= $length);
    }
}
