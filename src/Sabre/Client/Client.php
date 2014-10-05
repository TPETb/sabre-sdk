<?php
namespace Sabre\Client;

use Exception;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Sabre\Client\Exceptions\ErrorResponseException;
use Sabre\Client\Exceptions\LoggerNotSetException;
use Sabre\Client\Exceptions\RequestNotHandledException;
use Sabre\Connector\Connector;
use Sabre\Connector\ConnectorRequest;
use Sabre\Connector\ConnectorResponse;
use Sabre\Connector\Header\HeaderFlagsBuilder;
use Sabre\DTO\Error\Error;
use Sabre\DTO\Interfaces\RequestInterface;
use Sabre\DTO\KeyInfoRequest;
use Sabre\DTO\KeyInfoResponse;
use Sabre\Exceptions\SdkException;
use Sabre\Serializer\SerializerTrait;

/**
 * Class Client
 * @package Sabre\Client
 * @todo move methods related with envelop composition and extraction to separate class
 * @todo create separate class related to Envelop Header
 */
class Client implements
    ClientInterface,
    LoggerAwareInterface
{
    use SerializerTrait;

    const CONNECTION_TIMEOUT = 10;

    const STATUS_NEW = __LINE__;
    const STATUS_CONNECTING = __LINE__;
    const STATUS_READY = __LINE__;
    const STATUS_CLOSED = __LINE__;
    const STATUS_ERROR = __LINE__;

    // var : external dependencies //

    /** @var ClientSettings */
    protected $settings;

    /** @var LoggerInterface */
    protected $logger;

    // var : constructed services //

    /** @var Connector */
    protected $connector;

    // var : inner state //

    /** @var array<integer, RequestDto> */
    protected $requests = [];

    /** @var array<integer, ResponseDto> */
    protected $responses = [];

    /** @var STATUS_* */
    protected $status = self::STATUS_NEW;


    // public : dependencies //

    public function __construct(ClientSettings $settings)
    {
        $this->settings = $settings;

    }


    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    // public : ClientInterface //

    /**
     * @inheritdoc
     */
    public function sendRequest(RequestInterface $requestDto, $desEncrypt = true)
    {
        // Lazy connect.
        $this->connect($desEncrypt);

        // Store request.
        $id = $this->addRequest($requestDto);

        // Send request.
        $this->getConnector()
            ->addRequest($id, $this->createConnectorRequest($requestDto, $desEncrypt))
            ->send();

        return $id;
    }


    public function awaitResponse($id, $className)
    {
        if (!isset($this->responses[$id])) {
            $connectorResponse = $this->getConnector()->awaitResponse($id);

//            if ($connectorResponse->getHeader()->getFlags()->getNotHandled()) {
//                throw new RequestNotHandledException('Request was not handled by Sirena, please retry');
//            }

            $responseBody = $connectorResponse->getBody();

            $this->getLogger()->info(__METHOD__ . ': responseBody = {responseBody}', ['responseBody' => $responseBody]);

            // Extract header and body from envelop
            $parsedResponse = new \SimpleXMLElement($responseBody);
            $envelopHeader = $parsedResponse->children('http://schemas.xmlsoap.org/soap/envelope/')->Header[0]->asXML();
            $envelopBody = $parsedResponse->children('http://schemas.xmlsoap.org/soap/envelope/')->Body[0];
            // Retrieve first child from Envelop Body
            // todo rework this shit =)
            $bingo = null;
            foreach ($envelopBody->children('http://schemas.xmlsoap.org/soap/envelope/') as $tmp) {
                $bingo = $tmp->asXML();
            }

            $this->handleErrorResponse($bingo);

            $this->responses[$id] = $this->deserialize($envelopBody, $className);
        }
        return $this->responses[$id];
    }


    // protected : connect //

    protected function connect()
    {
        if ($this->status === self::STATUS_NEW) {
            $this->status = self::STATUS_CONNECTING;

            // @todo do the connection
        }
    }


    // protected : request creation //

    protected function addRequest($requestDto)
    {
        $id = count($this->requests);
        $this->requests[$id] = $requestDto;
        return $id;
    }


    protected function createConnectorRequest($requestDto)
    {
        $requestBody = $this->buildEnvelop($requestDto);

        $this->getLogger()->info(__METHOD__ . ': requestBody = {requestBody}', ['requestBody' => $requestBody]);

        $flagsBuilder = new HeaderFlagsBuilder();

        $request = new ConnectorRequest(
            $requestBody,
            $flagsBuilder->produce()
        );

        return $request;
    }


    // protected : body parsing //

    /**
     * Throws an exception if the response is of <error> kind.
     *
     * Does nothing otherwise.
     *
     * @param  ConnectorResponse $connectorResponse
     * @throws ErrorResponseException if it is.
     **/
    protected function handleErrorResponse($body)
    {
        $errorDto = $this->deserialize(
            $body,
            'Sabre\DTO\ErrorResponse\ErrorResponse'
        );
        if ($errorDto->getFaultstring()) {
            // TODO: Organize exceptions.
            throw new ErrorResponseException($errorDto->getFaultstring());
        }
    }


    // protected : simple service creation //

    protected function getConnector()
    {
        if (!$this->connector) {
            $this->connector = new Connector(
                $this->settings->getHost(),
                $this->settings->getPort(),
                self::CONNECTION_TIMEOUT
            );
        }
        return $this->connector;
    }


    // protected : received services //

    protected function getLogger()
    {
        if (!$this->logger) {
            throw new LoggerNotSetException('Logger has not been set. Call setLogger.');
        }
        return $this->logger;
    }


    protected function buildEnvelop($requestDto)
    {
        return trim('
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eb="http://www.ebxml.org/namespaces/messageHeader" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsd="http://www.w3.org/1999/XMLSchema">
  <SOAP-ENV:Header>
    ' . $this->buildEnvelopHeader($requestDto) . '
  </SOAP-ENV:Header>
  <SOAP-ENV:Body>
    ' . $this->buildEnvelopBody($requestDto) . '
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>');
    }


    protected function buildEnvelopHeader($requestDto)
    {
        $header = '
    <eb:MessageHeader SOAP-ENV:mustUnderstand="1" eb:version="1.0">
      <eb:From>
        <eb:PartyId type="urn:x12.org:IO5:01">999999</eb:PartyId>
      </eb:From>
      <eb:To>
        <eb:PartyId type="urn:x12.org:IO5:01">123123</eb:PartyId>
      </eb:To>
      <eb:CPAId>' . $this->settings->getCPAId() . '</eb:CPAId>
      <eb:ConversationId>webservices.support@sabre.com</eb:ConversationId>
      <eb:Service eb:type="OTA">' . $requestDto::SERVICE . '</eb:Service>
      <eb:Action>' . $requestDto::ACTION . '</eb:Action>
      <eb:MessageData>
        <eb:MessageId>1000</eb:MessageId>
        <eb:Timestamp>' . (new \DateTime())->format('Y-m-d\Th:i:sP') . '</eb:Timestamp>
      </eb:MessageData>
    </eb:MessageHeader>';

        if ($this->settings->getSessionToken()) {
            $header .= '
    <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext" xmlns:wsu="http://schemas.xmlsoap.org/ws/2002/12/utility">
      <wsse:BinarySecurityToken>' . $this->settings->getSessionToken() . '</wsse:BinarySecurityToken>
    </wsse:Security>';
        }

        return $header;
    }


    protected function buildEnvelopBody($requestDto)
    {
        return trim($this->serialize($requestDto));
    }
}
