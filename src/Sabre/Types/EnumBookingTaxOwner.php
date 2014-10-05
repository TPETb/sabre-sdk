<?php

namespace Sabre\Types;


/**
 * Class EnumBookingTaxOwner
 * Contains tax owners.
 *
 * @package Sabre\types
 */
class EnumBookingTaxOwner extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        /**
         * Tax owner is aircompany.
         */
        'aircompany' => true,
        /**
         * Tax owner is agency.
         */
        'agency' => true,
        /**
         * Tax owner is neutral.
         */
        'neutral' => true,
    ];
} 