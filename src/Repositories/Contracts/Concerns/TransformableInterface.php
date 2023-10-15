<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface TransformableInterface
{
    /**
     * Get repository transformer class.
     */
    public static function transformer(): string;
}
