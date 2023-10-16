<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Actionable
{
    /**
     * Get module actions.
     */
    public static function getActions(): array
    {
        return static::utility()::getActions();
    }
}
