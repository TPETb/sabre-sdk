<?php
namespace Sabre\Connector\Header;

class HeaderFlags
{
    /** @var boolean */
    private $isZipped;

    /** @var boolean */
    private $acceptZip;

    /** @var boolean */
    private $desEncrypted;

    /** @var boolean */
    private $rsaEncrypted;

    /** @var boolean */
    private $notHandled;

    public function __construct(
        $isZipped,
        $acceptZip,
        $desEncrypted,
        $rsaEncrypted,
        $notHandled
    ) {
        $this->isZipped     = !! $isZipped;
        $this->acceptZip    = !! $acceptZip;
        $this->desEncrypted = !! $desEncrypted;
        $this->rsaEncrypted = !! $rsaEncrypted;
        $this->notHandled   = !! $notHandled;
    }

    public function getIsZipped()
    {
        return $this->isZipped;
    }

    public function getAcceptZip()
    {
        return $this->acceptZip;
    }

    public function getDesEncrypted()
    {
        return $this->desEncrypted;
    }

    public function getRsaEncrypted()
    {
        return $this->rsaEncrypted;
    }

    public function getNotHandled()
    {
        return $this->notHandled;
    }
}
