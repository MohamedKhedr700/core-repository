<?php

namespace Raid\Core\Repository\Services;

use Exception;
use Raid\Core\Repository\Caches\Contracts\CacheInterface;
use Raid\Core\Repository\Repositories\Contracts\RepositoryInterface;
use Raid\Core\Repository\Services\Contracts\ServiceInterface;

abstract class Service implements ServiceInterface
{
    /**
     * Repository class.
     */
    private RepositoryInterface $repository;

    /**
     * Cache class.
     */
    private CacheInterface $cache;

    /**
     * {@inheritDoc}
     */
    public function setRepository(RepositoryInterface $repository): ServiceInterface
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }

    /**
     * {@inheritDoc}
     */
    public function setCache(CacheInterface $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritDoc}
     */
    public function cache(): CacheInterface
    {
        return $this->cache;
    }

    /**
     * Try to find the called method in the repository layer.
     *
     * @throws Exception
     */
    public function __call(string $method, array $arguments)
    {
        if (method_exists($this->repository(), $method)) {
            return $this->repository()->{$method}(...$arguments);
        }

        throw new Exception(sprintf("Can't find method (%s) on %s class.", $method, static::class));
    }

    /**
     * Try to get the given dependency.
     *
     * @throws Exception
     */
    public function __get(string $dependency)
    {
        if (! method_exists($this, $dependency)) {
            throw new Exception(sprintf(
                'Call undefined (%s) property. [Tip] try to use setRepo() or setCache() methods in your constructor.',
                $dependency
            ));
        }

        return $this->{$dependency}();
    }
}
