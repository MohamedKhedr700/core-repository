<?php

namespace Raid\Core\Repository\Utilities\Contracts;

interface UtilityInterface
{
    /**
     * Translate module given message.
     */
    public static function trans(string $key, array $replace = [], string $locale = null): ?string;

    /**
     * Get module config value.
     */
    public static function getConfig(string $key, $default = null): mixed;

    /**
     * Get module actions.
     */
    public static function getActions(): array;

    /**
     * Get module gates.
     */
    public static function getGates(): array;
}
