<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithConfigInterface
{
    /**
     * Get repository config value.
     */
    public static function config(string $key, $default = null): mixed;
}
