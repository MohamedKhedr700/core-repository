<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Actionable
{
    /**
     * Get module actions.
     */
    public static function actions(): array
    {
        return static::utility()::actions();
    }
}
