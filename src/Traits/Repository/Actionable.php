<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Actionable
{
    /**
     * {@inheritdoc}
     */
    public static function getActions(): array
    {
        return static::utility()::getActions();
    }
}
