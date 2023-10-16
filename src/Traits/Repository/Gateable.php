<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Gateable
{
    /**
     * {@inheritdoc}
     */
    public static function getGates(): array
    {
        return static::utility()::getGates();
    }
}
