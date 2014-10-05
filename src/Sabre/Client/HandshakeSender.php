<?php
namespace Sabre\Client;

use Exception;
use Sabre\Client\Exceptions\DesKeyDiffersException;
use Sabre\Client\Exceptions\DesKeyNotVerifiedException;
use Sabre\Client\Exceptions\ResponseNotRsaEncryptedException;
use Sabre\Connector\ConnectorInterface;
use Sabre\Connector\ConnectorRequest;
use Sabre\Connector\Header\HeaderFlagsBuilder;
use Sabre\Cryptography\RSA\RsaCryptography;
use Sabre\Helpers\BitConverter;

class HandshakeSender
{
    /** @var RsaCryptography */
    protected $rsaCryptography;

    /** @var binary string */
    protected $desKey;

    /** @var pem string */
    protected $serverPublicKey;

    /** @var pem string */
    protected $clientPrivateKey;

    /** @var ConnectorInterface */
    protected $connector;

    /** @var integer */
    protected $requestId;

    // public : dependency setters //

    public function setDesKey($desKey)
    {
        $this->desKey = $desKey;

        return $this;
    }

    public function setServerPublicKey($serverPublicKey)
    {
        $this->serverPublicKey = $serverPublicKey;

        return $this;
    }

    public function setClientPrivateKey($clientPrivateKey)
    {
        $this->clientPrivateKey = $clientPrivateKey;

        return $this;
    }

    public function setConnector(ConnectorInterface $connector)
    {
        $this->connector = $connector;

        return $this;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    // public : HandshakeSender //

    public function sendHandshake()
    {
        // Get dependencies.
        $rsaCryptography    = $this->getRsaCryptography();
        $desKey             = $this->getDesKey();
        $serverPublicKey    = $this->getServerPublicKey();
        $clientPrivateKey   = $this->getClientPrivateKey();
        $connector          = $this->getConnector();
        $requestId          = $this->getRequestId();

        // Create body and signature.
        $encryptedDesKeyRequest = $rsaCryptography->encrypt($serverPublicKey, $desKey);
        $signatureRequest = $rsaCryptography->sign($clientPrivateKey, $encryptedDesKeyRequest);
        $keyLength = BitConverter::getBigEndianFromInt(strlen($encryptedDesKeyRequest), 4);
        $requestBody = implode('', [
            $keyLength,
            $encryptedDesKeyRequest,
            $signatureRequest,
        ]);
        $connectorResponse = $connector
            ->addRequest($requestId, new ConnectorRequest(
                $requestBody,
                (new HeaderFlagsBuilder())
                    ->setRsaEncrypted()
                    ->produce()
            ))
            ->awaitResponse($requestId)
        ;

        /**
         * Verify response structure.
         *
         *  Offset  Length  Content
         *  0       4       message length (n)
         *  4       n       encrypted des key
         *  4+n     128     signature
        **/
        if (! $connectorResponse->getHeader()->getFlags()->getRsaEncrypted()) {
            throw (new ResponseNotRsaEncryptedException('Handshake response is not RSA-encrypted'))
                ->setConnectorResponse($connectorResponse);
        }

        $responseBody = $connectorResponse->getBody();
        $messageLength = BitConverter::getIntFromBigEndian(substr($responseBody, 0, 4));
        $encryptedDesKeyResponse = substr($responseBody, 4, $messageLength);
        $signatureResponse = substr($responseBody, 4 + $messageLength, 128);
        $desKeyResponse = $rsaCryptography->decrypt($clientPrivateKey, $encryptedDesKeyResponse);
        if ($desKey !== $desKeyResponse) {
            throw (new DesKeyDiffersException('Server did not respond with the same DES key as was sent'))
                ->setExpectedValue($desKey)
                ->setActualValue($desKeyResponse)
            ;
        }
        if (! $rsaCryptography->verify($serverPublicKey, $encryptedDesKeyResponse, $signatureResponse)) {
            throw (new DesKeyNotVerifiedException('DES key verification with server public key failed'))
                ->setServerPublicKey($serverPublicKey)
                ->setDesKey($desKey)
                ->setSignature($signatureResponse)
            ;
        }

        return $connectorResponse;
    }

    // protected : service creation //

    protected function getRsaCryptography()
    {
        if (! $this->rsaCryptography) {
            $this->rsaCryptography = new RsaCryptography();
        }
        return $this->rsaCryptography;
    }

    // protected : dependency getters //

    protected function getDesKey()
    {
        if (! $this->desKey) {
            // TODO: Organize exceptions.
            throw new Exception();
        }
        return $this->desKey;
    }

    protected function getServerPublicKey()
    {
        if (! $this->serverPublicKey) {
            // TODO: Organize exceptions.
            throw new Exception();
        }
        return $this->serverPublicKey;
    }

    protected function getClientPrivateKey()
    {
        if (! $this->clientPrivateKey) {
            // TODO: Organize exceptions.
            throw new Exception();
        }
        return $this->clientPrivateKey;
    }

    protected function getConnector()
    {
        if (! $this->connector) {
            // TODO: Organize exceptions.
            throw new Exception();
        }
        return $this->connector;
    }

    protected function getRequestId()
    {
        if (is_null($this->requestId)) {
            // TODO: Organize exceptions.
            throw new Exception();
        }
        return $this->requestId;
    }
}
