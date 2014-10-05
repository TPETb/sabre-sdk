<?php
namespace Sabre\Cryptography\DES;

use Doctrine\Common\Cache\Cache;
use Sabre\Cryptography\DES\Exceptions\NoCurrentDesKeyException;
use Sabre\Cryptography\DES\Exceptions\UnknownDesKeyIdException;
use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Math\Rand;

class DesCryptography
{
    const BLOCK_CIPHER_MODE = MCRYPT_MODE_ECB;

    const CACHE_KEY_PREFIX = 'sirena_des_key_';
    const CACHE_EXPIRATION = 5400; // 90 mins

    const PASS_PHRASE = '9<K5(2j/b+2QrPnE';
    const GENERATE_KEY_BYTES = 8;
    const GENERATE_ITERATIONS = 10000;

    /** @var Cache */
    protected $cache;

    /** @var DesKey */
    protected $current;

    // public //

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Generate a key.
     *
     *  @return binary string 8 bytes
    **/
    public function generate()
    {
        return Pbkdf2::calc(
            'sha256',
            self::PASS_PHRASE,
            Rand::getBytes(self::GENERATE_KEY_BYTES, true),
            self::GENERATE_ITERATIONS,
            self::GENERATE_KEY_BYTES
        );
    }

    public function confirm($id, $key)
    {
        $this->cache->save($this->getCacheId('current'), ['id' => $id, 'key' => $key], self::CACHE_EXPIRATION);
        $this->cache->save($this->getCacheId($id), $key, self::CACHE_EXPIRATION);
        $this->current = new DesKey($id, $key);
    }

    public function restore()
    {
        if(
            !$this->cache->contains($this->getCacheId('current')) ||
            !($cached = $this->cache->fetch($this->getCacheId('current'))) ||
            !isset($cached['id']) ||
            !isset($cached['key'])
        ) {
            throw (new UnknownDesKeyIdException('DES key is unknown'));
        }
        $this->current = new DesKey($cached['id'], $cached['key']);
    }

    public function reset()
    {
        $this->cache->delete($this->getCacheId('current'));
    }

    public function getCurrentId()
    {
        return $this->getCurrent()->getId();
    }

    public function update($id)
    {
        $cacheId = $this->getCacheId($id);
        if ($this->cache->contains($cacheId)) {
            $key = $this->cache->fetch($cacheId);
            $this->current = new DesKey($id, $key);
            return $this;
        }
        throw (new UnknownDesKeyIdException('DES key id=' . $id . ' is unknown'))
            ->setId($id);
    }

    public function encrypt($text)
    {
        return mcrypt_encrypt(
            'des',
            $this->getCurrentKey(),
            $this->pad($text),
            self::BLOCK_CIPHER_MODE
        );
    }

    public function decrypt($ciphertext)
    {
        return $this->unpad(mcrypt_decrypt(
            'des',
            $this->getCurrentKey(),
            $ciphertext,
            self::BLOCK_CIPHER_MODE
        ));
    }

    // protected //

    protected function pad($text)
    {
        $keyLength = $this->getKeyLength();
        $padLength = $keyLength - (strlen($text) % $keyLength);
        return $text . str_repeat(chr($padLength), $padLength);
    }

    protected function unpad($text)
    {
        $lastChar = substr($text, -1);
        $padLength = ord($lastChar);
        $textLength = strlen($text) - $padLength;
        if (substr($text, $textLength) === str_repeat($lastChar, $padLength)) {
            return substr($text, 0, -$padLength);
        }
        return $text;
    }

    protected function getKeyLength()
    {
        return strlen($this->getCurrentKey());
    }

    protected function getCurrentKey()
    {
        return $this->getCurrent()->getKey();
    }

    /**
     * Get key from cache or fallback to generating a new one.
    **/
    protected function getCurrent()
    {
        if (! $this->current) {
            throw new NoCurrentDesKeyException('No DES key is set as current. Call ' . get_called_class() . '::confirm');
        }
        return $this->current;
    }

    protected function getCacheId($id)
    {
        return self::CACHE_KEY_PREFIX . $id;
    }
}
