<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface ActionableInterface
{
    /**
     * Get module actions.
     */
    public static function actions(): array;
}
