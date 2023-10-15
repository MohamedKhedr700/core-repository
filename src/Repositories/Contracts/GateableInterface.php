<?php

namespace Raid\Core\Repository\Repositories\Contracts;

interface GateableInterface
{
    /**
     * Get module gates.
     */
    public static function gates(): array;
}
