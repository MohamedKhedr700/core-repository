<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithEventInterface
{
    /**
     * Get repository events.
     */
    public static function getEvents(): array;
}