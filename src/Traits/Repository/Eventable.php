<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Eventable
{
    /**
     * Eventable class name.
     */
    public static function eventableName(): string
    {
        return static::getModule();
    }

    /**
     * Get repository events.
     */
    public static function getEvents(): array
    {
        return static::utility()::getEvents();
    }
}
