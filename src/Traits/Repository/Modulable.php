<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Modulable
{
    /**
     * Get repository module name.
     */
    public static function module(): string
    {
        return static::utility()::module();
    }
}
