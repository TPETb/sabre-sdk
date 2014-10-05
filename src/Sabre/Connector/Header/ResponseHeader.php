<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/5/14
 * Time: 9:49 PM
 */

namespace Sabre\Connector\Header;


/**
 * Class ResponseHeader
 * @package Sabre\Connector\Header
 * @todo add methods to retrieve data from header
 */
class ResponseHeader {

    /**
     * @return ResponseHeader
     */
    static public function fromString()
    {
        return new self;
    }
} 