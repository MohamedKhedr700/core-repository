<?php

namespace Raid\Core\Repository\Caches;

use Illuminate\Cache\Repository;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Repository\Caches\Contracts\CacheInterface;

abstract class Cache implements CacheInterface
{
    /**
     * Repository class.
     */
    protected $repository;

    /**
     * Cache class.
     */
    protected $cache;

    /**
     * Cache time.
     */
    protected $cacheTime;

    /**
     * Entity name.
     */
    protected string $entityName;

    /**
     * Application locale.
     */
    protected string $locale;

    /**
     * Repository model.
     */
    private $model;

    public function __construct()
    {
        $this->cache = app(Repository::class);
        $this->cacheTime = app(ConfigRepository::class)->get('cache.time', 60);
        $this->locale = app()->getLocale();
    }

    /**
     * {@inheritdoc}
     */
    public function clearCache()
    {
        $store = $this->cache;
        if (method_exists($this->cache->getStore(), 'tags')) {
            $store = $store->tags($this->entityName);
        }

        return $store->flush();
    }

    /**
     * Remember the given callback result.
     */
    protected function remember(\Closure $callback, string $key = null): mixed
    {
        $cacheKey = $this->makeCacheKey($key);
        $store = $this->cache;
        if (method_exists($this->cache->getStore(), 'tags')) {
            $store = $store->tags([$this->entityName, 'global']);
        }

        return $store->remember($cacheKey, $this->cacheTime, $callback);
    }

    /**
     * Generate a cache key with the called method name and its arguments
     * If a key is provided, use that instead.
     */
    private function makeCacheKey(string $key = null): string
    {
        if ($key !== null) {
            return $key;
        }
        $cacheKey = $this->getBaseKey();
        $backtrace = debug_backtrace()[2];

        return sprintf("{$cacheKey} %s %s", $backtrace['function'], \serialize($backtrace['args']));
    }

    /**
     * Get a base cache key.
     */
    protected function getBaseKey(): string
    {
        return sprintf('giraffe -locale:%s -entity:%s', $this->locale, $this->entityName);
    }

    /**
     * Retrieve data from the database.
     */
    public function retrieve(array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($columns, $options) {
            return $this->repository->retrieve($columns, $options);
        });
    }

    /**
     * Retrieve data paginated from the database.
     */
    public function retrievePaginate(array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($columns, $options) {
            return $this->repository->retrievePaginate($columns, $options);
        });
    }

    /**
     * Retrieve all conditioning data from database.
     */
    public function retrieveBy(array $conditions, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($conditions, $columns, $options) {
            return $this->repository->retrieveBy($conditions, $columns, $options);
        });
    }

    /**
     * Retrieve conditioning data paginated from database.
     */
    public function retrieveByPaginate(array $conditions, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($conditions, $columns, $options) {
            return $this->repository->retrieveByPaginate($conditions, $columns, $options);
        });
    }

    /**
     * Retrieve all optional conditioning data from database.
     */
    public function retrieveByOptional(array $conditions, array $orConditions, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($conditions, $orConditions, $columns, $options) {
            return $this->repository->retrieveByOptional($conditions, $orConditions, $columns, $options);
        });
    }

    /**
     * Retrieve optional conditioning data paginated from database.
     */
    public function retrieveByOptionalPaginate(array $conditions, array $orConditions, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($conditions, $orConditions, $columns, $options) {
            return $this->repository->retrieveByOptionalPaginate($conditions, $orConditions, $columns, $options);
        });
    }

    /**
     * Retrieve all data with their defined relation from the database.
     */
    public function retrieveWithRelations(array $relations, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($relations, $columns, $options) {
            return $this->repository->retrieveWithRelations($relations, $columns, $options);
        });
    }

    /**
     * Retrieve data with their defined relation paginated from the database.
     */
    public function retrieveWithRelationsPaginate(array $relations, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($relations, $columns, $options) {
            return $this->repository->retrieveWithRelationsPaginate($relations, $columns, $options);
        });
    }

    /**
     * Retrieve all data with their defined relation with conditions from the database.
     */
    public function retrieveWithRelationsBy(array $conditions, array $relations, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($conditions, $relations, $columns, $options) {
            return $this->repository->retrieveWithRelationsBy($conditions, $relations, $columns, $options);
        });
    }

    /**
     * Retrieve data with their defined relation with conditions paginated from the database.
     */
    public function retrieveWithRelationsByPaginate(array $conditions, array $relations, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($conditions, $relations, $columns, $options) {
            return $this->repository->retrieveWithRelationsByPaginate($conditions, $relations, $columns, $options);
        });
    }

    /**
     * Retrieve all joined data ASC from the database.
     */
    public function retrieveJoined(array $joins, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($joins, $columns, $options) {
            return $this->repository->retrieveJoined($joins, $columns, $options);
        });
    }

    /**
     * Retrieve joined data paginated from the database.
     */
    public function retrieveJoinedPaginate(array $joins, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($joins, $columns, $options) {
            return $this->repository->retrieveJoinedPaginate($joins, $columns, $options);
        });
    }

    /**
     * Retrieve all conditioning joined data from the database.
     */
    public function retrieveJoinedBy(array $conditions, array $joins, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($conditions, $joins, $columns, $options) {
            return $this->repository->retrieveJoinedBy($conditions, $joins, $columns, $options);
        });
    }

    /**
     * Retrieve all conditioning joined data from the database.
     */
    public function retrieveJoinedByPaginate(array $conditions, array $joins, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->remember(function () use ($conditions, $joins, $columns, $options) {
            return $this->repository->retrieveJoinedByPaginate($conditions, $joins, $columns, $options);
        });
    }

    /**
     * Retrieve all data where id in array from database.
     */
    public function retrieveByIds(array $ids, array $columns = ['*'], array $options = []): Collection
    {
        return $this->remember(function () use ($ids, $columns, $options) {
            return $this->repository->retrieveByIds($ids, $columns, $options);
        });
    }

    /**
     * Find the given id.
     */
    public function find(string $id, array $columns = ['*'], bool $trashed = false): ?ModelInterface
    {
        return $this->remember(function () use ($id, $columns, $trashed) {
            return $this->repository->find($id, $columns, $trashed);
        });
    }

    /**
     * Find by condition.
     */
    public function findBy(array $conditions, array $columns = ['*'], bool $trashed = false): ?ModelInterface
    {
        return $this->remember(function () use ($conditions, $columns, $trashed) {
            return $this->repository->findBy($conditions, $columns, $trashed);
        });
    }

    /**
     * Find the given id or fail.
     */
    public function findOrFail(string $id, array $columns = ['*'], bool $trashed = false): ModelInterface
    {
        return $this->remember(function () use ($id, $columns, $trashed) {
            return $this->repository->findOrFail($id, $columns, $trashed);
        });
    }

    /**
     * Find or fail by condition.
     */
    public function findOrFailBy(array $conditions, array $columns = ['*'], bool $trashed = false): ModelInterface
    {
        return $this->remember(function () use ($conditions, $columns, $trashed) {
            return $this->repository->findOrFailBy($conditions, $columns, $trashed);
        });
    }

    /**
     * Create new record.
     */
    public function create(array $data): ModelInterface
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->create($data);
    }

    /**
     * createMany new record.
     */
    public function createMany(array $data): bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->createMany($data);
    }

    /**
     * Update the given record id.*
     */
    public function update(string|ModelInterface $id, array $data): ?ModelInterface
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->update($id, $data);
    }

    /**
     * Update the given records ids.
     */
    public function updateMany(array $ids, array $data): int
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->updateMany($ids, $data);
    }

    /**
     * Update data by conditions.
     */
    public function updateBy(array $conditions, array $data): int
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->updateBy($conditions, $data);
    }

    /**
     * Destroy the given record id.
     */
    public function destroy(string|ModelInterface $id): ?bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->destroy($id);
    }

    /**
     * Destroy the given records list ids.
     */
    public function destroyMany(array $ids): bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->destroyMany($ids);
    }

    /**
     * Restore the given record id.
     */
    public function restore(string|ModelInterface $id): ?bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->restore($id);
    }

    /**
     * Restore the given records list ids.
     */
    public function restoreMany(array $ids): bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->restoreMany($ids);
    }

    /**
     * Force Destroy the given record id.
     */
    public function forceDestroy(string|ModelInterface $id): ?bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->forceDestroy($id);
    }

    /**
     * Force Destroy the given records list ids.
     */
    public function forceDestroyMany(array $ids): bool
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->forceDestroyMany($ids);
    }
}
