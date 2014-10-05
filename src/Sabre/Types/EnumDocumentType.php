<?php

namespace Sabre\Types;


/**
 * Class EnumDocumentType
 * Joint types for a flight.
 *
 * @package Sabre\types
 */
class EnumDocumentType extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [
        /**
         * birth certificated.
         */
        'SR' => true,
        /**
         * russian passport.
         */
        'PS' => true,
        /**
         * International passport
         */
        'PSP' => true,
        /**
         * foreign passport.
         */
        'NP' => true,
    ];
} 