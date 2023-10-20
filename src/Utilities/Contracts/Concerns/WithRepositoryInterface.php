<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithRepositoryInterface
{
    /**
     * Get a model.
     */
    public static function getModel(): ?string;

    /**
     * Get a route service provider.
     */
    public static function getRouteServiceProvider(): ?string;
}
