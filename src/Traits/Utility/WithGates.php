<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithGates
{
    /**
     * {@inheritdoc}
     */
    public static function getGates(): array
    {
        return static::config('gates', []);
    }
}