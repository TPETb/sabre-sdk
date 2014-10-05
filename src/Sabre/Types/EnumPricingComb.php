<?php

namespace Sabre\Types;


/**
 * Class EnumPricingComb
 *
 * @package Sabre\types
 */
class EnumPricingComb extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        'yes' => true,
        'no'  => true,
    ];
} 