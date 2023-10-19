<?php

namespace Raid\Core\Repository\Services\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Raid\Core\Model\Models\Contracts\ModelInterface;

interface ActionServiceInterface
{
    /**
     * Get the service repository.
     */
    public static function repository(): string;

    /**
     * Get columns to be retrieved.
     */
    public function columns(): array;

    /**
     * Create resource.
     */
    public function create(array $data): ModelInterface;

    /**
     * Get all resources.
     */
    public function all(array $filters): Collection;

    /**
     * Get paginated resources.
     */
    public function list(array $filters = []): LengthAwarePaginator;

    /**
     * Find resource.
     */
    public function find(string|ModelInterface $id): ?ModelInterface;

    /**
     * Update resource.
     */
    public function update(string|ModelInterface $id, array $data): ?ModelInterface;

    /**
     * Patch resource.
     */
    public function patch(string|ModelInterface $id, array $data): ?ModelInterface;

    /**
     * Delete resource.
     */
    public function delete(string|ModelInterface $id): ?bool;
}
