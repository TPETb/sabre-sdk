<?php
namespace Sabre\Cryptography\DES;

use Zend\Crypt\Symmetric\Mcrypt;

class McryptEcb extends Mcrypt
{
    public function __construct($options = [])
    {
        $this->supportedModes['ecb'] = 'ecb';
        parent::__construct($options);
    }
}
