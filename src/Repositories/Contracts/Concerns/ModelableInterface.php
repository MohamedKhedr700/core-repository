<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface ModelableInterface
{
    /**
     * Get model class.
     */
    public static function getModel();

    /**
     * Set model instance.
     */
    public function setModel(object $model): void;

    /**
     * Get model instance or its property.
     */
    public function model(string $key = null, $default = null): mixed;
}
