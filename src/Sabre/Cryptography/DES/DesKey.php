<?php
namespace Sabre\Cryptography\DES;

class DesKey
{
    /** @var integer **/
    protected $id;

    /** @var binary string 8 bytes **/
    protected $key;

    public function __construct($id, $key)
    {
        $this->id  = $id;
        $this->key = $key;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getKey()
    {
        return $this->key;
    }
}
