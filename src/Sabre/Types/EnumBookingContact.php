<?php

namespace Sabre\Types;


/**
 * Class EnumBookingContact
 * Joint types for a flight.
 *
 * @package Sabre\types
 */
class EnumBookingContact extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        'agency' => true,
        'mobile' => true,
        'home' => true,
        'work' => true,
        'hotel' => true,
        'fax' => true,
        'email' => true,
    ];
} 