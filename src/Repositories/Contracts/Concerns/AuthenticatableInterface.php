<?php

namespace Raid\Core\Repository\Repositories\Contracts\Concerns;

interface AuthenticatableInterface
{
    /**
     * Get authenticator.
     */
    public static function getAuthenticator(): ?string;
}
