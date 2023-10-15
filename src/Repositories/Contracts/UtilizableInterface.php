<?php

namespace Raid\Core\Repository\Repositories\Contracts;

interface UtilizableInterface
{
    /**
     * Get utility name.
     */
    public static function utility(): string;
}
