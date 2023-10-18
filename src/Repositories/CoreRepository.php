<?php

namespace Raid\Core\Repository\Repositories;

use Raid\Core\Action\Traits\Action\Actionable;
use Raid\Core\Event\Traits\Event\Eventable;
use Raid\Core\Gate\Traits\Gate\Gateable;
use Raid\Core\Repository\Traits\Repository\Utilizable;

abstract class CoreRepository
{
    use Actionable;
    use Eventable;
    use Gateable;
    use Utilizable;

    /**
     * Get repository actions.
     */
    public function getActions(): array
    {
        return static::utility()::getActions();
    }

    /**
     * Get repository events.
     */
    public function getEvents(): array
    {
        return static::utility()::getEvents();
    }

    /**
     * Get repository gates.
     */
    public function getGates(): array
    {
        return static::utility()::getGates();
    }
}
