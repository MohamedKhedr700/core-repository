<?php

namespace Raid\Core\Repository\Utilities;

use Raid\Core\Repository\Traits\Utility\Translatable;
use Raid\Core\Repository\Traits\Utility\WithUtilityResolver;
use Raid\Core\Repository\Utilities\Contracts\UtilityInterface;

abstract class Utility implements UtilityInterface
{
    use Translatable;
    use WithUtilityResolver;

    /**
     * {@inheritdoc}
     */
    public static function trans(string $key, array $replace = [], string $locale = null): ?string
    {
        $key = static::module().'::'.$key;

        return static::translate($key, $replace, $locale);
    }

    /**
     * {@inheritdoc}
     */
    public static function getConfig(string $key, $default = null): mixed
    {
        return config(static::module().'.'.$key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public static function getActions(): array
    {
        return static::getConfig('actions');
    }

    /**
     * {@inheritdoc}
     */
    public static function getGates(): array
    {
        return static::getConfig('gates');
    }
}
