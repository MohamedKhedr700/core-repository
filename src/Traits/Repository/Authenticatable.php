<?php

namespace Raid\Core\Repository\Traits\Repository;

trait Authenticatable
{
    /**
     * {@inheritDoc}
     */
    public static function getAuthenticator(): ?string
    {
        return static::utility()::getAuthenticator();
    }
}
