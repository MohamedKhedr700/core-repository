<?php

namespace Raid\Core\Repository\Utilities\Contracts;

interface UtilityInterface
{
    /**
     * Translate repository given message.
     */
    public static function trans(string $key, array $replace = [], string $locale = null): ?string;

    /**
     * Get repository view.
     */
    public static function view(string $view): string;
}
