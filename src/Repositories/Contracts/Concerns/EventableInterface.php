<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

use Raid\Core\Event\Events\Contracts\EventManagerInterface;

interface EventableInterface
{
    /**
     * Get events instance.
     */
    public static function events(): EventManagerInterface;

    /**
     * Trigger actions.
     */
    public static function trigger(string $actions, ...$data): EventManagerInterface;
}
