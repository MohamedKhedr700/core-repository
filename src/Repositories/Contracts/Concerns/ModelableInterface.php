<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

use Raid\Core\Model\Models\Contracts\ModelInterface;

interface ModelableInterface
{
    /**
     * Set model instance.
     */
    public function setModel(ModelInterface $model): void;

    /**
     * Get model instance or its property.
     */
    public function model(string $key = null, $default = null): mixed;
}
