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
}
