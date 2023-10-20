<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithAuthenticator
{
    /**
     * Get authenticator.
     */
    public static function getAuthenticator(): ?string
    {
        return static::config('authenticator');
    }
}
