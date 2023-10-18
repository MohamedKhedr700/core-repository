<?php

namespace Raid\Core\Repository\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\FillableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\ModelableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\QueryableInterface;

interface RepositoryInterface extends FillableInterface, ModelableInterface, QueryableInterface
{
    /**
     * Retrieve all data from the database.
     */
    public function retrieve(array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve data paginated from the database.
     */
    public function retrievePaginate(array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all conditioning data from database.
     */
    public function retrieveBy(array $conditions, array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve conditioning data paginated from database.
     */
    public function retrieveByPaginate(array $conditions, array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all optional conditioning data from database.
     */
    public function retrieveByOptional(array $conditions, array $orConditions, array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve optional conditioning data paginated from database.
     */
    public function retrieveByOptionalPaginate(array $conditions, array $orConditions, array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all data with their defined relation from the database.
     */
    public function retrieveWithRelations(array $relations, array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve data with their defined relation paginated from the database.
     */
    public function retrieveWithRelationsPaginate(array $relations, array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all data with their defined relation with conditions from the database.
     */
    public function retrieveWithRelationsBy(array $conditions, array $relations, array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve data with their defined relation with conditions paginated from the database.
     */
    public function retrieveWithRelationsByPaginate(array $conditions, array $relations, array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all joined data ASC from the database.
     */
    public function retrieveJoined(array $joins, array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve joined data paginated from the database.
     */
    public function retrieveJoinedPaginate(array $joins, array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all conditioning joined data from the database.
     */
    public function retrieveJoinedBy(array $conditions, array $joins, array $columns = ['*'], array $options = []): Collection;

    /**
     * Retrieve conditioning joined data paginated from the database.
     */
    public function retrieveJoinedByPaginate(array $conditions, array $joins, array $columns = ['*'], array $options = []): LengthAwarePaginator;

    /**
     * Retrieve all data where id in array from a database.
     */
    public function retrieveByIds(array $ids, array $columns = ['*'], array $options = []): Collection;

    /**
     * Find the given ID.
     */
    public function find(string $id, array $columns = ['*'], bool $trashed = false): ?ModelInterface;

    /**
     * Find by condition.
     */
    public function findBy(array $conditions, array $columns = ['*'], bool $trashed = false): ?ModelInterface;

    /**
     * Find the given id or fail.
     */
    public function findOrFail(string $id, array $columns = ['*'], bool $trashed = false): ModelInterface;

    /**
     * Find or fail by condition.
     */
    public function findOrFailBy(array $conditions, array $columns = ['*'], bool $trashed = false): ModelInterface;

    /**
     * Destroy the given record ID.
     *
     * @throws ModelNotFoundException
     */
    public function destroy(string|ModelInterface $id): ?bool;

    /**
     * Destroy the given records list ids.
     */
    public function destroyMany(array $ids): bool;

    /**
     * Restore the given record ID.
     *
     * @throws ModelNotFoundException
     */
    public function restore(string|ModelInterface $id): ?bool;

    /**
     * Restore the given records list ids.
     */
    public function restoreMany(array $ids): bool;

    /**
     * Force Destroy the given record ID.
     *
     * @throws ModelNotFoundException
     */
    public function forceDestroy(string|ModelInterface $id): ?bool;

    /**
     * Force Destroy the given records list ids.
     */
    public function forceDestroyMany(array $ids): bool;
}
