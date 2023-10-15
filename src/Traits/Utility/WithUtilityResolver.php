<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithUtilityResolver
{
    /**
     * Module name.
     */
    public const MODULE_NAME = '';

    /**
     * Route service provider.
     */
    public const ROUTE_SERVICE_PROVIDER = '';

    /**
     * Module repository.
     */
    public const REPOSITORY = '';

    /**
     * Module repository interface.
     */
    public const REPOSITORY_INTERFACE = '';

    /**
     * Module model.
     */
    public const MODEL = '';

    /**
     * Module transformer.
     */
    public const TRANSFORMER = '';

    /**
     * Get route service provider.
     */
    public static function routeServiceProvider(): string
    {
        return static::ROUTE_SERVICE_PROVIDER;
    }

    /**
     * Get module name.
     */
    public static function module(): string
    {
        return static::MODULE_NAME;
    }

    /**
     * Get module repository.
     */
    public static function repository(): string
    {
        return static::REPOSITORY;
    }

    /**
     * Get module repository interface.
     */
    public static function repositoryInterface(): string
    {
        return static::REPOSITORY_INTERFACE;
    }

    /**
     * Get a module model.
     */
    public static function model(): string
    {
        return static::MODEL;
    }

    /**
     * Get a module transformer.
     */
    public static function transformer(): string
    {
        return static::TRANSFORMER;
    }
}
