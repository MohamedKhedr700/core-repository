<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithTransformer
{
    /**
     * {@inheritdoc}
     */
    public static function getTransformer(): ?string
    {
        return static::config('transformer');
    }
}
