<?php

namespace Raid\Core\Repository\Traits\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Queryable
{
    /**
     * {@inheritDoc}
     */
    public function builder(): Builder
    {
        return $this->model()->query();
    }

    /**
     * {@inheritDoc}
     */
    public function prefixTable(string $column): string
    {
        return (Str::contains($column, '.')) ? $column : $this->model()->getTable().'.'.$column;
    }

    /**
     * {@inheritDoc}
     */
    public function select(array $columns = ['*']): Builder
    {
        return $this->builder()->select($columns);
    }

    /**
     * {@inheritDoc}
     */
    public function retrieveQuery(array $columns = ['*'], array $options = []): Builder
    {
        $builder = $this->select($columns);

        $sort = $options['filters']['sort'] ?? config('repository.order_by', 'created_at');

        $direction = $options['filters']['direction'] ?? config('repository.direction');

        $sortArray = is_array($sort) ? $sort : [$sort];

        $directionArray = is_array($direction) ? $direction : [$direction];

        foreach ($sortArray as $key => $sort) {
            $builder->orderBy($sort, $directionArray[$key] ?? config('repository.direction'));
        }

        $builder->limit($options['filters']['perPage'] ?? -1);

        if (array_key_exists('joins', $options) && is_array($options['joins']) && count($options['joins'])) {
            foreach ($options['joins'] as $join) {
                $builder->{$join}();
            }
        }

        if (in_array('distinct', $options) && $options['distinct']) {
            $builder->distinct();
        }

        $builder = $this->loadTranslations($builder);

        if (array_key_exists('filters', $options) && Arr::except($options['filters'], ['sort', 'direction'])) {
            $builder->filter($options['filters'] ?? []);
        }

        if (array_key_exists('groupBy', $options)) {
            $builder->groupBy($options['groupBy']);
        }

        return $builder;
    }

    /**
     * {@inheritDoc}
     */
    public function loadTranslations(Builder $query): Builder
    {
        if (method_exists($this->model(), 'translations')) {
            $query->with('translations');
        }

        // load translations by joins if translation eloquent relationship not exist.
        if (method_exists($this->model(), 'scopeTranslations') && ! array_key_exists('translations', $query->getEagerLoads())) {
            $query->translations();
        }

        return $query;
    }
}
