<?php

namespace Raid\Core\Repository\Traits\Repository;

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
        return static::utility()::model();
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
