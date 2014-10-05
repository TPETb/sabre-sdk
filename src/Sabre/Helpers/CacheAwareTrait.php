<?php
namespace Sabre\Helpers;

use Doctrine\Common\Cache\Cache;

trait CacheAwareTrait
{
    /** @var Cache */
    protected $cache;

    public function setCache(Cache $cache)
    {
        $this->cache = $cache;

        return $this;
    }

    protected function getCache()
    {
        if (! $this->cache) {
            throw new CacheNotSetException('Cache has not been set. Call setCache.');
        }
        return $this->cache;
    }
}
