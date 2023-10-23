<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Actionable
{
    /**
     * Actionable execute name.
     */
    public static function actionableName(): string
    {
        return static::getModule();
    }

    /**
     * Get repository actions.
     */
    public static function getActions(): array
    {
        return static::utility()::getActions();
    }
}
