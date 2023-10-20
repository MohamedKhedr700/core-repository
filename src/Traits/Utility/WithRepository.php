<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithRepository
{
    /**
     * {@inheritDoc}
     */
    public static function getModel(): ?string
    {
        return static::config('model');
    }

    /**
     * {@inheritDoc}
     */
    public static function getRouteServiceProvider(): ?string
    {
        return static::config('route_service_provider');
    }
}
