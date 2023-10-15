<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Configurable
{
    /**
     * Get module config value.
     */
    public static function config(string $key, mixed $default = null): mixed
    {
        return config(static::module().'.'.$key, $default);
    }
}
