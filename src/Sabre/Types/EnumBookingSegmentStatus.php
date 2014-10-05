<?php

namespace Sabre\Types;


/**
 * Class EnumBookingSegmentStatus
 * Contains booking segment statuses.
 *
 * @package Sabre\types
 */
class EnumBookingSegmentStatus extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        /**
         * The segment is in a waitlist.
         */
        'waitlist' => true,
        /**
         * The segment is refused.
         */
        'refused' => true,
        /**
         * The segment is confirmed.
         */
        'confirmed' => true,
        /**
         * The segment is uncofirmed.
         */
        'uncofirmed' => true,
    ];
} 