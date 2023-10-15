<?php

namespace Raid\Core\Repository\Repositories\Contracts;

interface ActionableInterface
{
    /**
     * Get module actions.
     */
    public static function actions(): array;
}
