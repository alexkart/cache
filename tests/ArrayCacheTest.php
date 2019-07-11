<?php
namespace Yiisoft\Cache\Tests;

use Psr\SimpleCache\CacheInterface as PsrCacheInterface;
use Yiisoft\Cache\ArrayCache;
use Yiisoft\Cache\Cache;
use Yiisoft\Cache\CacheInterface;

/**
 * Class for testing file cache backend
 * @group caching
 */
class ArrayCacheTest extends CacheTest
{
    protected function createCacheInstance(): CacheInterface
    {
        return new Cache(new ArrayCache());
    }

    public function testExpire(): void
    {
        $cache = $this->createCacheInstance();

        static::$microtime = \microtime(true);
        $this->assertTrue($cache->set('expire_test', 'expire_test', 2));
        static::$microtime++;
        $this->assertEquals('expire_test', $cache->get('expire_test'));
        static::$microtime++;
        $this->assertNull($cache->get('expire_test'));
    }

    public function testExpireAdd(): void
    {
        $cache = $this->createCacheInstance();

        static::$microtime = \microtime(true);
        $this->assertTrue($cache->add('expire_testa', 'expire_testa', 2));
        static::$microtime++;
        $this->assertEquals('expire_testa', $cache->get('expire_testa'));
        static::$microtime++;
        $this->assertNull($cache->get('expire_testa'));
    }
}
