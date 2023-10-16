<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Gateable
{
    /**
     * Get module gates.
     */
    public static function getGates(): array
    {
        return static::utility()::getGates();
    }
}
