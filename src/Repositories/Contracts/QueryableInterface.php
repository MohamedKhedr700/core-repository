<?php

namespace Raid\Core\Repository\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface QueryableInterface
{
    /**
     * Get query builder.
     */
    public function builder(): Builder;

    /**
     * Prefix the given column with model table name.
     */
    public function prefixTable(string $column): string;

    /**
     * Set select columns.
     */
    public function select(array $columns = ['*']): Builder;

    /**
     * Build Retrieve query.
     */
    public function retrieveQuery(array $columns = ['*'], array $options = []): Builder;

    /**
     * Load translations data if exist.
     */
    public function loadTranslations(Builder $query): Builder;
}
