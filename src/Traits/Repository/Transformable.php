<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Transformable
{
    /**
     * Get repository transformer class.
     */
    public static function transformer(): string
    {
        return static::utility()::transformer();
    }
}
