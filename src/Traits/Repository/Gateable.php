<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Gateable
{
    /**
     * Get gateable name.
     */
    public static function gateableName(): string
    {
        return static::getModule();
    }

    /**
     * Get repository gates.
     */
    public static function getGates(): array
    {
        return static::utility()::getGates();
    }
}
