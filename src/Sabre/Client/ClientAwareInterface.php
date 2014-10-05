<?php
namespace Sabre\Client;

interface ClientAwareInterface
{
    public function setClient(Client $client);
}
