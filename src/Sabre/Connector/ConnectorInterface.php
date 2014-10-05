<?php
namespace Sabre\Connector;

use Sabre\Connector\ConnectorRequest;
use Sabre\Connector\ConnectorResponse;
use Sabre\Connector\Exceptions\RequestTimeoutException;
use Sabre\Connector\Exceptions\UnknownRequestException;

interface ConnectorInterface
{
    /**
     * Stores a request internally and associates it with given id.
     *
     *  @param  integer             $id         Identifier used later to retrieve request/response info.
     *  @param  ConnectorRequest    $request
     *  @return self
    **/
    public function addRequest($id, ConnectorRequest $request);

    /**
     * Shorthand for multiple calls to addRequest.
     *
     *  @param  array<integer, ConnectorRequest>  $idRequestMap
     *  @return self
    **/
    public function addRequests(array $idRequestMap);

    /**
     * Writes all unsent requests to the socket. If connection is not yet open, establishes it.
     *
     *  @return self
    **/
    public function send();

    /**
     * Stops execution and reads socket until response with given id is read; then returns it.
     *
     *  @param  integer             $id Identifier of the request as set by addRequest[s] method.
     *  @return ConnectorResponse       Response header and body.
     *  @throws RequestTimeoutException(request) if response cannot be read from socket within timeout defined by request.
     *  @throws UnknownRequestException(id) if id is unknown.
    **/
    public function awaitResponse($id);

    /**
     * Reads socket until all requests with given ids are successfully read from socket.
     *
     *  @param  array<integer>                      $ids    Identifiers of the requests as set by addRequest[s] method.
     *  @return array<integer, ConnectorResponse>           Response map from ids to responses.
     *  @throws RequestTimeoutException(request) if at least one response cannot be read from socket within timeout defined by its request.
     *  @throws UnknownRequestException(id) if there is an unknown id passed.
    **/
    public function awaitResponses(array $ids);
}
