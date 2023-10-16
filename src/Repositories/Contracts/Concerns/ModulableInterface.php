<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface ModulableInterface
{
    /**
     * Get repository module name.
     */
    public static function getModule(): string;
}
