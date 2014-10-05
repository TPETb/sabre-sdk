<?php
namespace Sabre\Client;

use Sabre\DTO\Interfaces\RequestInterface;
use Sabre\DTO\Interfaces\ResponseInterface;

/**
 * Usage:
 *  ($client instanceof ClientInterface)
 *  ($request instanceof RequestInterface)
 *  $id = $client->sendRequest($request); // stores the request and sends it.
 *  $response = $client->awaitResponse($id); // awaits response and returns it.
 *  ($response instanceof ResponseInterface)
**/
interface ClientInterface
{
    /**
     * Add request and return its id.
     *
     *  @param  RequestInterface $requestDto
     *  @param  bool $desEncrypt
     *  @return integer
    **/
    public function sendRequest(RequestInterface $requestDto, $desEncrypt = true);

    /**
     * Await response specified by id and return it.
     *
     *  @param  integer             $id         As returned by sendRequest.
     *  @param  string              $className  Fully-qualified class name of response dto.
     *  @return ResponseInterface
    **/
    public function awaitResponse($id, $className);
}
