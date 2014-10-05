<?php
namespace Sabre\Connector;

use Sabre\Connector\Header\HeaderFlags;
use Sabre\Connector\Header\HeaderFlagsBuilder;

class ConnectorRequest
{
    const DEFAULT_TIMEOUT = 40;

    /** @var string */
    protected $body;

    /** @var HeaderFlags */
    protected $headerFlags;

    /** @var integer */
    protected $desKeyId;

    /** @var integer */
    protected $timeout;


    public function __construct(
        $body,
        HeaderFlags $headerFlags = null,
        $timeout = self::DEFAULT_TIMEOUT
    ) {
        $this->body         = strval($body);
        $this->headerFlags  = $headerFlags;
        $this->timeout      = intval($timeout);
    }

    public function setDesKeyId($desKeyId)
    {
        $this->desKeyId = $desKeyId;

        return $this;
    }

    // public : RequestInterface //

    /**
     * Returns request body as a binary string.
     *
     *  @return string
    **/
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Returns header flags object.
     *
     * Initializes it if it was not passed to constructor.
     *
     *  @return HeaderFlags
    **/
    public function getHeaderFlags()
    {
        if (! $this->headerFlags) {
            $this->headerFlags = (new HeaderFlagsBuilder())->produce();
        }
        return $this->headerFlags;
    }

    /**
     * Return symmetric key id as by Sirena handshake response.
     *
     *  @return integer
    **/
    public function getDesKeyId()
    {
        return $this->desKeyId;
    }

    /**
     * Returns timeout in seconds.
     *
     *  @return integer
    **/
    public function getTimeout()
    {
        return $this->timeout;
    }
}
