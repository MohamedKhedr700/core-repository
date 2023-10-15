<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Utilizable
{
    /**
     * Repository utility.
     */
    public const UTILITY = '';

    /**
     * Get utility name.
     */
    public static function utility(): string
    {
        return static::UTILITY;
    }
}
