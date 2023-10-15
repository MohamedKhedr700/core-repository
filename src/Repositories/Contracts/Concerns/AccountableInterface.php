<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;

interface AccountableInterface
{
    /**
     * Set repository request account instance.
     */
    public function setAccount(?AccountInterface $account): void;

    /**
     * Get repository account instance.
     */
    public function account(): ?AccountInterface;
}
