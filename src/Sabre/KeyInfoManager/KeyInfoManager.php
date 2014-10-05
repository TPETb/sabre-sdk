<?php
namespace Sabre\KeyInfoManager;

use Sabre\Cryptography\RSA\RsaKeyManagerAwareInterface;
use Sabre\Cryptography\RSA\RsaKeyManagerAwareTrait;
use Sabre\DTO\KeyInfoResponse\KeyInfoResponse;
use Sabre\Helpers\CacheAwareInterface;
use Sabre\Helpers\CacheAwareTrait;
use Sabre\KeyInfoManager\Exceptions\CallbackNotSetException;
use Sabre\KeyInfoManager\Exceptions\CallbackReturnsWrongTypeException;
use Sabre\KeyInfoManager\Exceptions\KeyManagerMissingException;
use Sabre\KeyInfoManager\Exceptions\ResponseContainsErrorException;

class KeyInfoManager implements CacheAwareInterface, RsaKeyManagerAwareInterface
{
    use CacheAwareTrait;
    use RsaKeyManagerAwareTrait;

    const SERVER_PUBLIC_KEY_CACHE_KEY = 'sirena_server_public_key';
    const SERVER_PUBLIC_KEY_CACHE_EXPIRATION = 3600; // 1 hour

    /** @var callable **/
    protected $callback;

    /**
     * Set a callback to be called when storage lookup misses.
     *
     * Callback will not be passed any arguments, and it must return an instance of KeyInfoResponse.
     *
     *  @param  KeyInfoResponse(void)   $callback
     *  @return self
    **/
    public function setCallback(callable $callback)
    {
        $this->callback = $callback;

        return $this;
    }

    public function update(KeyInfoResponse $keyInfoResponse)
    {
        // Check for errors.
        $keyInfo = $keyInfoResponse->getAnswer()->getKeyInfo();
        $error = $keyInfo->getError();
        if ($error) {
            throw (new ResponseContainsErrorException(
                '<key_info> response contains error: code = ' . $error->getCode() . '; message = "' . $error->getValue() . '"'
            ))
                ->setError($error)
            ;
        }

        // Extract the only node of interest.
        $keyManager = $keyInfo->getKeyManager();
        if (! $keyManager) {
            throw (new KeyManagerMissingException('<key_manager> node is missing from <key_info> response'))
                ->setKeyInfoResponse($keyInfoResponse);
        }

        // Update client key info.
        (new KeyInfoUpdater($keyManager, $this->getRsaKeyManager()))->run();

        // Update server key info.
        $this->getCache()->save(
            self::SERVER_PUBLIC_KEY_CACHE_KEY,
            $keyManager->getServerPublicKey(),
            self::SERVER_PUBLIC_KEY_CACHE_EXPIRATION
        );
    }

    public function getServerPublicKey()
    {
        $cache = $this->getCache();
        if (! $cache->contains(self::SERVER_PUBLIC_KEY_CACHE_KEY)) {
            $this->updateFromCallback();
        }
        return $cache->fetch(self::SERVER_PUBLIC_KEY_CACHE_KEY);
    }

    public function getClientCurrentKey()
    {
        $rsaKeyManager = $this->getRsaKeyManager();
        if (! $rsaKeyManager->getCurrentId()) {
            $this->updateFromCallback();
        }
        return $rsaKeyManager->getCurrent();
    }

    // protected //

    protected function updateFromCallback()
    {
        $callback = $this->getCallback();
        $keyInfoResponse = $callback();
        if (! $keyInfoResponse instanceof KeyInfoResponse) {
            throw (new CallbackReturnsWrongTypeException('Callback did not return an instance of KeyInfoResponse'))
                ->setCallback($callback);

        }
        $this->update($keyInfoResponse);
    }

    protected function getCallback()
    {
        if (! $this->callback) {
            throw new CallbackNotSetException('Callback has not been set. Call setCallback');
        }
        return $this->callback;
    }
}
