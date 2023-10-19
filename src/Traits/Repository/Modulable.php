<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Modulable
{
    /**
     * {@inheritdoc}
     */
    public static function getModule(string $format = 'lower'): string
    {
        return $format === 'upper' ? static::utility()::moduleUpper() : static::utility()::module();
    }
}
