<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

use Raid\Core\Model\Models\Contracts\ModelInterface;

interface FillableInterface
{
    /**
     * Create new record.
     */
    public function create(array $data): ModelInterface;

    /**
     * Create new record.
     */
    public function createMany(array $data): bool;

    /**
     * Update the given record id.
     */
    public function update(string|ModelInterface $id, array $data): ?ModelInterface;

    /**
     * Update the given records ids.
     */
    public function updateMany(array $ids, array $data): int;

    /**
     * Update data by conditions.
     */
    public function updateBy(array $conditions, array $data): int;
}
