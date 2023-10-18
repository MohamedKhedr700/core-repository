<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Gateable
{
    /**
     * Get gateable name.
     */
    public static function gateableName(): string
    {
        $classname = class_basename(static::gateable());

        return strtolower(str_replace('Repository', '', $classname));
    }

    /**
     * Get repository gates.
     */
    public static function getGates(): array
    {
        return static::utility()::getGates();
    }
}
