<?php

namespace Raid\Core\Repository\Repositories\Contracts;

interface ModulableInterface
{
    /**
     * Get repository module name.
     */
    public static function module(): string;
}
