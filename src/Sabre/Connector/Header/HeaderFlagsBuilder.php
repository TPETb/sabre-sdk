<?php
namespace Sabre\Connector\Header;

use Sabre\Connector\Header\HeaderFlags;

class HeaderFlagsBuilder
{
    /** @var boolean */
    private $isZipped = false;

    /** @var boolean */
    private $acceptZip = false;

    /** @var boolean */
    private $desEncrypted = false;

    /** @var boolean */
    private $rsaEncrypted = false;

    /** @var boolean */
    private $notHandled = false;

    public function setIsZipped($isZipped = true)
    {
        $this->isZipped = !! $isZipped;

        return $this;
    }

    public function setAcceptZip($acceptZip = true)
    {
        $this->acceptZip = !! $acceptZip;

        return $this;
    }

    public function setDesEncrypted($desEncrypted = true)
    {
        $this->desEncrypted = !! $desEncrypted;

        return $this;
    }

    public function setRsaEncrypted($rsaEncrypted = true)
    {
        $this->rsaEncrypted = !! $rsaEncrypted;

        return $this;
    }

    public function setNotHandled($notHandled = true)
    {
        $this->notHandled = !! $notHandled;

        return $this;
    }

    public function produce()
    {
        return new HeaderFlags(
            $this->isZipped,
            $this->acceptZip,
            $this->desEncrypted,
            $this->rsaEncrypted,
            $this->notHandled
        );
    }
}
