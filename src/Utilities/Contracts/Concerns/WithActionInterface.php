<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithActionInterface
{
    /**
     * Get repository actions.
     */
    public static function getActions(): array;
}
