<?php
namespace Sabre\Client;

use Sabre\Client\Exceptions\ClientNotSetException;

trait ClientAwareTrait
{
    /** @var Client */
    protected $client;

    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    protected function getClient()
    {
        if (! $this->client) {
            throw new ClientNotSetException('Client has not been set. Call setClient');
        }
        return $this->client;
    }
}
