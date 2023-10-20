<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithAuthenticatorInterface
{
    /**
     * Get a repository authenticator.
     */
    public static function getAuthenticator(): ?string;
}