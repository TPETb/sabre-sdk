<?php
namespace Sabre\KeyInfoManager;

use DateTime;
use Sabre\KeyInfoManager\Exceptions\UnknownCurrentKeyDigestException;
use Sabre\KeyInfoManager\Exceptions\UnknownFutureKeyDigestException;
use Sabre\Cryptography\RSA\RsaKeyManager;
use Sabre\DTO\KeyInfoResponse\KeyManager;

/**
 * Analyze <key_manager> node from <key_info> response and update rsa key storage appropriately.
 *
 *  @TODO: Remove code reduplication between processCurrent and processFuture.
**/
class KeyInfoUpdater
{
    /** @var KeyManager */
    protected $keyManager;

    /** @var RsaKeyManager */
    protected $rsaKeyManager;

    // public //

    public function __construct(
        KeyManager $keyManager,
        RsaKeyManager $rsaKeyManager
    ) {
        $this->keyManager = $keyManager;
        $this->rsaKeyManager = $rsaKeyManager;
    }

    public function run()
    {
        $this->processCurrent();
        $this->processFuture();
        $this->processUnconfirmed();
    }

    // protected : processing steps //

    protected function processCurrent()
    {
        $serverCurrentKeyNode = $this->getKeyByState('current');
        $currentKeyId = $this->rsaKeyManager->getCurrentId();
        if (! $serverCurrentKeyNode) {
            // No current key in response => expire current key in storage.
            $this->rsaKeyManager->expire($currentKeyId);
        } else {
            // Response has some key marked as current. Do we know it?
            $serverCurrentKeyDigest = $serverCurrentKeyNode->getValue();
            $serverCurrentKey = $this->rsaKeyManager->getByDigest($serverCurrentKeyDigest);
            if (! $serverCurrentKey) {
                // Server thinks something we don't know about is a current key.
                throw (new UnknownCurrentKeyDigestException(
                    'Unknown key digest "' . $serverCurrentKeyDigest . '" while server thinks it is the current key'
                ))
                    ->setDigest($serverCurrentKeyDigest);
            }
            // If server returned the same current key as stored on our side, it's all fine.
            // But what if not?
            $serverCurrentKeyId = $serverCurrentKey->getId();
            if ($serverCurrentKeyId !== $currentKeyId) {
                // Store the key returned from server as current.
                $this->rsaKeyManager->enable($serverCurrentKeyId, $this->getExpiration());
            }
        }
    }

    protected function processFuture()
    {
        $serverFutureKeyNode = $this->getKeyByState('future');
        $futureKeyId = $this->rsaKeyManager->getFutureId();
        if (! $serverFutureKeyNode) {
            // No future key in response => expire future key in storage.
            $this->rsaKeyManager->expire($futureKeyId);
        } else {
            // Response has some key marked as future. Do we know it?
            $serverFutureKeyDigest = $serverFutureKeyNode->getValue();
            $serverFutureKey = $this->rsaKeyManager->getByDigest($serverFutureKeyDigest);
            if (! $serverFutureKey) {
                // Server thinks something we don't know about is a future key.
                throw (new UnknownFutureKeyDigestException(
                    'Unknown key digest "' . $serverFutureKeyDigest . '" while server thinks it is the future key'
                ))
                    ->setDigest($serverFutureKeyDigest);
            }
            // If server returned the same future key as stored on our side, it's all fine.
            // But what if not?
            $serverFutureKeyId = $serverFutureKey->getId();
            if ($serverFutureKeyId !== $futureKeyId) {
                // Store the key returned from server as future.
                $this->rsaKeyManager->confirm($serverFutureKeyId);
            }
        }
    }

    protected function processUnconfirmed()
    {
        // TODO: What to do?
    }

    // protected : dto traversal //

    protected function getKeyByState($state)
    {
        $keys = $this->keyManager->getKeys();
        foreach ($keys as $key) {
            if ($key->getState() === $state) {
                return $key;
            }
        }
        return null;
    }

    protected function getExpiration()
    {
        // Response format is "18:30 21.05.2009". Reverse the parts to make them recognizable by DateTime constructor.
        return new DateTime(implode(' ', array_reverse(explode(' ', $this->keyManager->getExpiration()))));
    }
}
