<?php

namespace Raid\Core\Repository\Traits\Repository;

use Raid\Core\Model\Models\Contracts\ModelInterface;

trait Modelable
{
    /**
     * Repository model instance.
     */
    private object $model;

    /**
     * {@inheritdoc}
     */
    public static function getModel()
    {
        return static::utility()::getModel();
    }

    /**
     * {@inheritdoc}
     */
    public function setModel(object $model): void
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function model(string $key = null, $default = null): mixed
    {
        return $key ? ($this->model->{$key} ?? $default) : $this->model;
    }
}
