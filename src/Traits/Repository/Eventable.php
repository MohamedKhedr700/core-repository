<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Eventable
{
    /**
     * Eventable class name.
     */
    public static function eventableName(): string
    {
        $classname = class_basename(static::eventable());

        return strtolower(str_replace('Repository', '', $classname));
    }

    /**
     * Get repository events.
     */
    public static function getEvents(): array
    {
        return static::utility()::getEvents();
    }
}
