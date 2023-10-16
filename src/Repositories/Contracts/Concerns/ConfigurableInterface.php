<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface ConfigurableInterface
{
    /**
     * Get module config value.
     */
    public static function getConfig(string $key, mixed $default = null): mixed;
}
