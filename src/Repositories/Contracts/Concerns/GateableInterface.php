<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface GateableInterface
{
    /**
     * Get module gates.
     */
    public static function gates(): array;
}
