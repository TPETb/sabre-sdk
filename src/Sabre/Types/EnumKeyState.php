<?php

namespace Sabre\Types;


/**
 * @package Sabre\types
 */
class EnumKeyState extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        'current' => true,
        'future' => true,
    ];
}
