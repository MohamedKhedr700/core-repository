<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithConfig
{
    /**
     * {@inheritdoc}
     */
    public static function config(string $key, $default = null): mixed
    {
        return config(static::module().'.'.$key, $default);
    }
}
