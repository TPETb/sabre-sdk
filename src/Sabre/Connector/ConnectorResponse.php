<?php
namespace Sabre\Connector;

use Sabre\Connector\Header\Header;
use Sabre\Connector\Header\HeaderFlags;
use Sabre\Connector\Header\ResponseHeader;

class ConnectorResponse
{
    /** @var ResponseHeader */
    private $header;

    /** @var string */
    private $body;

    public function __construct(ResponseHeader $header, $body)
    {
        $this->header = $header;
        $this->body   = $body;
    }

    public static function factory(
        $userId,
        $messageId,
        $body,
        HeaderFlags $flags = null,
        $symmetricKeyId = null
    ) {
        return new self(
            new Header(
                $userId,
                $messageId,
                strlen($body),
                $flags,
                $symmetricKeyId
            ),
            $body
        );
    }

    /**
     *  @return Header
    **/
    public function getHeader()
    {
        return $this->header;
    }

    /**
     *  @return string
    **/
    public function getBody()
    {
        return $this->body;
    }
}
