<?php

namespace Raid\Core\Repository\Traits\Repository;

use Raid\Core\Auth\Models\Authentication\Contracts\AccountInterface;

trait Accountable
{
    /**
     * Repository account instance.
     */
    protected ?AccountInterface $account;

    /**
     * Set repository request account instance.
     */
    public function setAccount(?AccountInterface $account): void
    {
        $this->account = $account;
    }

    /**
     * Get repository account instance.
     */
    public function account(): ?AccountInterface
    {
        return $this->account;
    }
}
