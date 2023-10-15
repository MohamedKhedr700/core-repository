<?php

namespace Raid\Core\Repository\Traits\Repository;

use ArrayKeysCaseTransform\ArrayKeys;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Core\Models\Contracts\ModelInterface;
use Modules\Core\Models\Model;

trait Fillable
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data): Model
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
    public function update(string|ModelInterface $id, array $data): ?Model
    {
        $model = $this->isModelInstance($id) ? $id : $this->findOrFail($id);

        return $model->update(ArrayKeys::toSnakeCase($data), ['upsert' => true]) ? $model : null;
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
