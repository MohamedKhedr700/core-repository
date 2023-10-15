<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Gateable
{
    /**
     * Get module gates.
     */
    public static function gates(): array
    {
        return static::utility()::gates();
    }
}
