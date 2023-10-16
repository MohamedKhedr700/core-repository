<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Modulable
{
    /**
     * {@inheritdoc}
     */
    public static function getModule(): string
    {
        return static::utility()::getModule();
    }
}
