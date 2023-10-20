<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithGateInterface
{
    /**
     * Get repository gates.
     */
    public static function getGates(): array;
}