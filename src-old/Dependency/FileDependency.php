<?php
namespace Yiisoft\CacheOld\DependencyOld;

use Yiisoft\CacheOld\CacheInterface;

/**
 * FileDependency represents a dependency based on a file's last modification time.
 *
 * If the last modification time of the file specified via {@see FileDependency::$fileName} is changed,
 * the dependency is considered as changed.
 */
final class FileDependency extends Dependency
{
    private $fileName;

    /**
     * @param string $fileName the file path whose last modification time is used to
     * check if the dependency has been changed.
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    protected function generateDependencyData(CacheInterface $cache)
    {
        clearstatcache(false, $this->fileName);
        return @filemtime($this->fileName);
    }
}