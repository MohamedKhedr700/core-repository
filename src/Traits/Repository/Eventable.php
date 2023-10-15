<?php

namespace Raid\Core\Repository\Traits\Repository;

use Raid\Core\Event\Events\Contracts\EventManagerInterface;

trait Eventable
{
    /**
     * Events instance.
     */
    protected EventManagerInterface $events;

    /**
     * {@inheritdoc}
     */
    public static function events(): EventManagerInterface
    {
        return events(static::module());
    }

    /**
     * {@inheritdoc}
     */
    public static function trigger(string $actions, ...$data): EventManagerInterface
    {
        return static::events()->trigger($actions, ...$data);
    }
}
