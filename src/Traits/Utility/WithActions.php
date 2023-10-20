<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithActions
{
    /**
     * {@inheritdoc}
     */
    public static function getActions(): array
    {
        return static::config('actions', []);
    }
}