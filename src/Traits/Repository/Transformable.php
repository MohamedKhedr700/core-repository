<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Transformable
{
    /**
     * {@inheritdoc}
     */
    public static function getTransformer(): string
    {
        return static::utility()::transformer();
    }
}
