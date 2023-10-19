<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Modulable
{
    /**
     * {@inheritdoc}
     */
    public static function getModule(bool $upper = false): string
    {
        return $upper ? static::utility()::moduleUpper() : static::utility()::module();
    }
}
