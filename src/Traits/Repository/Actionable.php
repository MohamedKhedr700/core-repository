<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Actionable
{
    /**
     * Actionable execute name.
     */
    public static function actionableName(): string
    {
        $classname = class_basename(static::actionable());

        return strtolower(str_replace('Repository', '', $classname));
    }

    /**
     * Get repository actions.
     */
    public static function getActions(): array
    {
        return static::utility()::getActions();
    }
}
