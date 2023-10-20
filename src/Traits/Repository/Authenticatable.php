<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Authenticatable
{
    /**
     * Get authenticator.
     */
    public static function getAuthenticator(): ?string
    {
        return static::utility()::getAuthenticator();
    }
}
