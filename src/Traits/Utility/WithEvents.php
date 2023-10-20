<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithEvents
{
    /**
     * {@inheritdoc}
     */
    public static function getEvents(): array
    {
        return static::config('events', []);
    }
}
