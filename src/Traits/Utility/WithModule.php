<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithModule
{
    /**
     * Repository name lower.
     */
    public const MODULE_LOWER = '';

    /**
     * Repository name upper.
     */
    public const MODULE_UPPER = '';

    /**
     * Get module name.
     */
    public static function module(bool $upper = false): string
    {
        return $upper ? static::moduleUpper() : static::moduleLower();
    }

    /**
     * Get module name upper.
     */
    public static function moduleLower(): string
    {
        return static::MODULE_LOWER;
    }

    /**
     * Get module name upper.
     */
    public static function moduleUpper(): string
    {
        return static::MODULE_UPPER;
    }
}
