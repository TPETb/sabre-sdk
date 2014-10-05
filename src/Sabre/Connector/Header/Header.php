<?php
namespace Sabre\Connector\Header;

use Sabre\Connector\Exceptions\WrongHeaderLengthException;
use Sabre\Connector\Header\HeaderFlags;
use Sabre\Connector\Header\HeaderFlagsBuilder;
use Sabre\Helpers\BitConverter;

class Header
{
    const HEADER_LENGTH = 100;

    // var //

    /** @var HeaderFlags */
    private $flags;

    /** @var string */
    private $headerData;

    /** @var integer */
    private $messageId;

    /** @var integer */
    private $messageLength;

    /** @var integer */
    private $symmetricKeyId;

    /** @var integer */
    private $userId;


    // public //

    public function __construct(
        $userId,
        $messageId,
        $messageLength,
        HeaderFlags $flags = null,
        $symmetricKeyId = null
    )
    {
        $this->userId = $userId;
        $this->messageId = $messageId;
        $this->messageLength = $messageLength;
        $this->flags = $flags ?: (new HeaderFlagsBuilder())->produce();
        $this->symmetricKeyId = $symmetricKeyId;
    }


    public static function fromHeaderData($headerData)
    {
        $headerLength = strlen($headerData);
        if ($headerLength !== static::HEADER_LENGTH) {
            throw (new WrongHeaderLengthException('Header size must be exactly ' . static::HEADER_LENGTH . ' bytes; ' . $headerLength . ' bytes received'))
                ->setHeaderData($headerData)
                ->setExpectedLength(static::HEADER_LENGTH)
                ->setActualLength($headerLength);
        }

        $messageLength = BitConverter::getIntFromBigEndian(substr($headerData, 0, 4));
        $messageId = BitConverter::getIntFromBigEndian(substr($headerData, 8, 4));
        $userId = BitConverter::getIntFromBigEndian(substr($headerData, 44, 2));
        $flagsCode = BitConverter::getIntFromBigEndian(substr($headerData, 46, 2));
        $symmetricKeyId = BitConverter::getIntFromBigEndian(substr($headerData, 48, 4));

        $flags = static::getHeaderFlagsFromCode($flagsCode);

        $header = new static(
            $userId,
            $messageId,
            $messageLength,
            $flags,
            $symmetricKeyId
        );
        $header->headerData = $headerData;

        return $header;
    }


    public function getHeaderData()
    {
        if (!$this->headerData) {
            $messageLength = BitConverter::getBigEndianFromInt($this->messageLength);
            $date = BitConverter::getBigEndianFromInt(time());
            $messageId = BitConverter::getBigEndianFromInt($this->messageId);
            $userId = BitConverter::getBigEndianFromInt($this->userId, 2);
            $flagsCode = BitConverter::getBigEndianFromInt($this->getCodeFromHeaderFlags($this->flags), 2);
            $symmetricKeyId = BitConverter::getBigEndianFromInt($this->symmetricKeyId);

            $this->headerData = implode('', [
                $messageLength,
                $date,
                $messageId,
                str_repeat(chr(0), 32),
                $userId,
                $flagsCode,
                $symmetricKeyId,
                str_repeat(chr(0), 48),
            ]);
        }
        return $this->headerData;
    }


    public function getMessageId()
    {
        return $this->messageId;
    }


    public function getMessageLength()
    {
        return $this->messageLength;
    }


    public function getFlags()
    {
        return $this->flags;
    }


    public function getSymmetricKeyId()
    {
        return $this->symmetricKeyId;
    }


    public function getUserId()
    {
        return $this->userId;
    }


    // private //

    private function getCodeFromHeaderFlags(HeaderFlags $flags)
    {
        $code = 0x0000;
        if ($flags->getIsZipped()) {
            $code |= 0x0400;
        }
        if ($flags->getAcceptZip()) {
            $code |= 0x1000;
        }
        if ($flags->getDesEncrypted()) {
            $code |= 0x0800;
        }
        if ($flags->getRsaEncrypted()) {
            $code |= 0x4000;
        }
        if ($flags->getNotHandled()) {
            $code |= 0x0001;
        }
        return $code;
    }


    private static function getHeaderFlagsFromCode($code)
    {
        $qfb = new HeaderFlagsBuilder();
        if ($code & 0x0400) {
            $qfb->setIsZipped();
        }
        if ($code & 0x1000) {
            $qfb->setAcceptZip();
        }
        if ($code & 0x0800) {
            $qfb->setDesEncrypted();
        }
        if ($code & 0x4000) {
            $qfb->setRsaEncrypted();
        }
        if ($code & 0x0001) {
            $qfb->setNotHandled();
        }
        return $qfb->produce();
    }


}
