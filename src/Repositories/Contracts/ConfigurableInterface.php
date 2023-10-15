<?php

namespace Raid\Core\Repository\Repositories\Contracts;

interface ConfigurableInterface
{
    /**
     * Get module config value.
     */
    public static function config(string $key, mixed $default = null): mixed;
}
