<?php

namespace Raid\Core\Repository\Traits\Repository;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Raid\Core\Model\Models\Contracts\ModelInterface;

trait Retrievable
{
    /**
     * {@inheritdoc}
     */
    public function retrieve(array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, $options)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrievePaginate(array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, $options)->paginate(intval($options['filters']['perPage'] ?? $this->model()->getPerPage()));
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveBy(array $conditions, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, $options)->where($conditions)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveByPaginate(array $conditions, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, $options)->where($conditions)->paginate($options['filters']['perPage'] ?? $this->model()->getPerPage());
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveByOptional(array $conditions, array $orConditions, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, $options)->where($conditions)->orWhere($orConditions)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveByOptionalPaginate(array $conditions, array $orConditions, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, $options)->where($conditions)->orWhere($orConditions)->paginate($options['filters']['perPage'] ?? $this->model()->getPerPage());
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveWithRelations(array $relations, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, $options)->with($relations)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveWithRelationsBy(array $conditions, array $relations, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, $options)->with($relations)->where($conditions)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveWithRelationsByPaginate(array $conditions, array $relations, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, $options)->with($relations)->where($conditions)->paginate($options['filters']['perPage'] ?? $this->model()->getPerPage());
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveWithRelationsPaginate(array $relations, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, $options)->with($relations)->paginate($options['filters']['perPage'] ?? $this->model()->getPerPage());
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveJoined(array $joins, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, Arr::add($options, 'joins', $joins))->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveJoinedPaginate(array $joins, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, Arr::add($options, 'joins', $joins))->paginate($options['filters']['perPage'] ?? $this->model()->getPerPage());
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveJoinedBy(array $conditions, array $joins, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, Arr::add($options, 'joins', $joins))->where($conditions)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveJoinedByPaginate(array $conditions, array $joins, array $columns = ['*'], array $options = []): LengthAwarePaginator
    {
        return $this->retrieveQuery($columns, Arr::add($options, 'joins', $joins))->where($conditions)->paginate($options['filters']['perPage'] ?? $this->model()->getPerPage());
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveByIds(array $ids, array $columns = ['*'], array $options = []): Collection
    {
        return $this->retrieveQuery($columns, $options)->whereIn($this->prefixTable('id'), $ids)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find(string|ModelInterface $id, array $columns = ['*'], bool $trashed = false): ?ModelInterface
    {
        $isModelInstance = $this->isModelInstance($id);

        if ($isModelInstance) {
            $this->setModel($id);
        }

        $query = $this->select($columns);

        $query = $this->withTrashedModel($query, $trashed);

        return $isModelInstance ? $query->first() : $query->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findBy(array $conditions, array $columns = ['*'], bool $trashed = false): ?ModelInterface
    {
        $query = $this->select($columns);

        $query = $this->withTrashedModel($query, $trashed);

        return $query->where($conditions)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function findOrFail(string|ModelInterface $id, array $columns = ['*'], bool $trashed = false): ModelInterface
    {
        $isModelInstance = $this->isModelInstance($id);

        if ($isModelInstance) {
            $this->setModel($id);
        }

        $query = $this->select($columns);

        $query = $this->withTrashedModel($query, $trashed);

        return $isModelInstance ? $query->first() : $query->findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findOrFailBy(array $conditions, array $columns = ['*'], bool $trashed = false): ModelInterface
    {
        $query = $this->select($columns);

        $query = $this->withTrashedModel($query, $trashed);

        return $query->where($conditions)->firstOrFail();
    }

    /**
     * Prepare with a trashed model.
     */
    public function withTrashedModel(Builder $query, bool $trashed): Builder
    {
        if (method_exists(($this->model()), 'withTrashed')) {
            $query->withTrashed($trashed);
        }

        return $query;
    }
}
