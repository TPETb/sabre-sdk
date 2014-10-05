<?php

namespace Sabre\Types;


/**
 * Class EnumBookingPassengerSex
 * Passenger genders.
 *
 * @package Sabre\types
 */
class EnumBookingPassengerSex extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        'female' => true,
        'male' => true,
    ];
} 