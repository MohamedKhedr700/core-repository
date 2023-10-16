<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Configurable
{
    /**
     * {@inheritdoc}
     */
    public static function getConfig(string $key, mixed $default = null): mixed
    {
        return static::utility()::getConfig($key, $default);
    }
}
