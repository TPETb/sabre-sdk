<?php
namespace Sabre\Helpers;

use Doctrine\Common\Cache\Cache;

interface CacheAwareInterface
{
    public function setCache(Cache $cache);
}
