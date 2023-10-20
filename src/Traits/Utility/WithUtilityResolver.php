<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithUtilityResolver
{
    /**
     * Get a model.
     */
    public static function getModel(): ?string
    {
        return static::config('model');
    }

    /**
     * Get a route service provider.
     */
    public static function getRouteServiceProvider(): ?string
    {
        return static::config('route_service_provider');
    }
}
