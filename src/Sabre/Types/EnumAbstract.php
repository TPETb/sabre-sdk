<?php
namespace Sabre\Types;

use Sabre\DTO\DtoException;

abstract class EnumAbstract
{
    protected $_valueList = [];
    protected $_value;

    public function __construct($value)
    {
        $this->_value = $this->checkValue($value);
    }

    public function getValue()
    {
        return $this->_value;
    }

    protected function checkValue($value)
    {
        if (!isset($this->_valueList[$value])) {
            //@TODO Make the exception hierarchy.
            throw new DtoException('Wrong enum value.', DtoException::WRONG_ENUM_VALUE);
        }
        return $value;
    }
}
