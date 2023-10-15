<?php

namespace Raid\Core\Repository\Traits\Repository;

use Raid\Core\Model\Models\Contracts\ModelInterface;

trait Deletable
{
    /**
     * {@inheritdoc}
     */
    public function destroy(string|ModelInterface $id): ?bool
    {
        $model = $this->isModelInstance($id) ? $id : $this->findOrFail($id);

        return $model->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function destroyMany(array $ids): bool
    {
        return $this->builder()->whereIn($this->model()->getKeyName(), $ids)->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function restore(string|ModelInterface $id): ?bool
    {
        $model = $this->isModelInstance($id) ? $id : $this->findOrFail($id, [$this->model()->getKeyName()], true);

        return $model->restore();
    }

    /**
     * {@inheritdoc}
     */
    public function restoreMany(array $ids): bool
    {
        return $this->builder()->whereIn($this->model()->getKeyName(), $ids)->restore();
    }

    /**
     * {@inheritdoc}
     */
    public function forceDestroy(string|ModelInterface $id): ?bool
    {
        $model = $this->isModelInstance($id) ? $id : $this->findOrFail($id, [$this->model()->getKeyName()], true);

        return $model->forceDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function forceDestroyMany(array $ids): bool
    {
        return $this->builder()->whereIn($this->model()->getKeyName(), $ids)->forceDelete();
    }
}
