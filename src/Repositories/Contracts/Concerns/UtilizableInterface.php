<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface UtilizableInterface
{
    /**
     * Get utility name.
     */
    public static function utility(): string;
}
