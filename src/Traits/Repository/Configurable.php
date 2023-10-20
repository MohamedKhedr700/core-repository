<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Configurable
{
    /**
     * {@inheritdoc}
     */
    public static function config(string $key, mixed $default = null): mixed
    {
        return static::utility()::config($key, $default);
    }
}
