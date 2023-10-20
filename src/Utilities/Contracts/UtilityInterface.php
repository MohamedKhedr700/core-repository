<?php

namespace Raid\Core\Repository\Utilities\Contracts;

interface UtilityInterface
{
    /**
     * Translate repository given message.
     */
    public static function trans(string $key, array $replace = [], string $locale = null): ?string;

    /**
     * Get repository config value.
     */
    public static function config(string $key, $default = null): mixed;

    /**
     * Get repository actions.
     */
    public static function getActions(): array;

    /**
     * Get repository events.
     */
    public static function getEvents(): array;

    /**
     * Get repository gates.
     */
    public static function getGates(): array;
}
