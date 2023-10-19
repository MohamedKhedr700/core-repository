<?php

namespace Raid\Core\Repository\Services\Contracts;

use Raid\Core\Repository\Caches\Contracts\CacheInterface;
use Raid\Core\Repository\Repositories\Contracts\RepositoryInterface;

interface ServiceInterface
{
    /**
     * Get repository class.
     */
    public static function repositoryClass(): string;

    /**
     * Get repository actions.
     */
    public function actions(): array;

    /**
     * Get action class.
     */
    public function getActionClass(string $action): ?string;

    /**
     * Get columns to be retrieved.
     */
    public function columns(): array;

    /**
     * Set repository.
     */
    public function setRepository(RepositoryInterface $repository): ServiceInterface;

    /**
     * Get the repository object.
     */
    public function repository(): RepositoryInterface;

    /**
     * Set cache.
     */
    public function setCache(CacheInterface $cache): void;

    /**
     * Get the cache object.
     */
    public function cache(): CacheInterface;
}
