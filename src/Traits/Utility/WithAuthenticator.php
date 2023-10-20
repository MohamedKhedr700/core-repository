<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithAuthenticator
{
    /**
     * {@inheritdoc}
     */
    public static function getAuthenticator(): ?string
    {
        return static::config('authenticator');
    }
}
