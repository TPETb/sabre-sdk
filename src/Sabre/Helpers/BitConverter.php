<?php
namespace Sabre\Helpers;

class BitConverter
{
    public static function getBigEndianFromInt($integer, $length = 4)
    {
        $bytes = '';
        for ($i = 0; $i < $length; ++$i) {
            $bytes = chr($integer & 0xff) . $bytes;
            $integer >>= 8;
        }
        return $bytes;
    }

    public static function getIntFromBigEndian($bytes)
    {
        $integer = 0;
        for ($i = 0; $i < strlen($bytes); ++$i) {
            $integer <<= 8;
            $integer += ord($bytes[$i]);
        }
        return $integer;
    }
}
