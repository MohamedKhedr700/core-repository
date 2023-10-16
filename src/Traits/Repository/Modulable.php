<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Modulable
{
    /**
     * Get repository module name.
     */
    public static function getModule(): string
    {
        return static::utility()::getModule();
    }
}
