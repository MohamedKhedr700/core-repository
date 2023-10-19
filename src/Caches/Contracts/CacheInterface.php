<?php

namespace Raid\Core\Repository\Caches\Contracts;

use Raid\Core\Repository\Repositories\Contracts\RepositoryInterface;

interface CacheInterface extends RepositoryInterface
{
    /**
     * Clear cache.
     */
    public function clearCache();
}
