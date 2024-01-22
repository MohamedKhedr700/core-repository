<?php

namespace Raid\Core\Repository\Traits\Repository;

use ArrayKeysCaseTransform\ArrayKeys;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Models\Model;

trait Fillable
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data): ModelInterface
    {
        return $this->model()->create(ArrayKeys::toSnakeCase($data));
    }

    /**
     * {@inheritdoc}
     */
    public function createMany(array $data): bool
    {
        return $this->model()->insert(ArrayKeys::toSnakeCase($data));
    }

    /**
     * {@inheritdoc}
     *
     * @throws ModelNotFoundException
     */
    public function update(string|ModelInterface $id, array $data): bool
    {
        $model = $this->isModelInstance($id) ? $id : $this->findOrFail($id);

        return $model->update(ArrayKeys::toSnakeCase($data), ['upsert' => true]);
    }

    /**
     * {@inheritdoc}
     */
    public function updateMany(array $ids, array $data): int
    {
        return $this->model()->whereIn($this->model()->getKeyName(), $ids)->update(ArrayKeys::toSnakeCase($data));
    }

    /**
     * {@inheritdoc}
     */
    public function updateBy(array $conditions, array $data): int
    {
        return $this->model()->where($conditions)->update(ArrayKeys::toSnakeCase($data));
    }
}
