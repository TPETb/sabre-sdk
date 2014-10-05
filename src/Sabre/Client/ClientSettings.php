<?php
namespace Sabre\Client;

class ClientSettings
{
    /** @var string */
    protected $host;

    /** @var integer */
    protected $port;

    /** @var string */
    protected $CPAId;

    /** @var string */
    protected $sessionToken;


    public function __construct(
        $host,
        $port,
        $userId,
        $sessionToken = null
    )
    {
        $this->host = $host;
        $this->port = $port;
        $this->CPAId = $userId;
        $this->sessionToken = $sessionToken;
    }


    /**
     * @return string
     */
    public function getCPAId()
    {
        return $this->CPAId;
    }


    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }


    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }


    /**
     * @return string
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }



}
