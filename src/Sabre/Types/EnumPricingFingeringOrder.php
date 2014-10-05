<?php
namespace Sabre\Types;

/**
 * Class EnumPricingFingeringOrder
 *
 * @package Sabre\types
 */
class EnumPricingFingeringOrder extends EnumAbstract implements EnumInterface
{

    protected $_valueList = [

        /**
         * Brute force according to a preliminary screening by the appraised value (default)
         */
        'ordinary'                  => true,

        /**
         * Evaluated first routes with direct flights, then everyone else
         */
        'directFirst'               => true,

        /**
         * Evaluated first routes with connecting flights, then everyone else
         */
        'jointFirst'                => true,

        /**
         * Evaluated first options that differ shipping companies, different flights and then finally booking subclasses
         */
        'differentFirst'            => true,

        /**
         * Evaluated first options that differ combinations of flights, then subclasses booking
         */
        'differentFlightsCombFirst' => true,

        /**
         * First evaluated the options differ in the maximum combinations of flights, then subclasses booking
         */
        'differentFlightsFirst'     => true,

        /**
         * valuated first versions with different tariff applies, then all the others
         */
        'differentPricesFirst'      => true,
    ];
}
