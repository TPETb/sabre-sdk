<?php
namespace Sabre\DTO;

class Upt
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}
