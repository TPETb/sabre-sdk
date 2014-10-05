<?php

namespace Sabre\Types;


/**
 * Class EnumJointType
 * Joint types for a flight.
 *
 * @package Sabre\types
 */
class EnumJointType extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        /**
         * All joints.
         */
        'jtAll' => true,
        /**
         * No joints.
         */
        'jtNone' => true,
        /**
         * All joints for the current avia company.
         */
        'jtAwk' => true,
        /**
         * All joints according to the M2 contract.
         */
        'jtM2' => true,
        /**
         * Joints by direct(interline) contracts.
         */
        'jtInterline' => true,
    ];
} 