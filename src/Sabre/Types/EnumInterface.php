<?php

namespace Sabre\Types;


interface EnumInterface
{
    public function __construct($value);

    public function getValue();
}