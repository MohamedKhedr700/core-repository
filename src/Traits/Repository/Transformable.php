<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Transformable
{
    /**
     * Get repository transformer class.
     */
    public static function getTransformer(): string
    {
        return static::utility()::getTransformer();
    }
}
