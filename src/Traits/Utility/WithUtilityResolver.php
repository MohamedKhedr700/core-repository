<?php

namespace Raid\Core\Repository\Traits\Utility;

trait WithUtilityResolver
{
    /**
     * Repository name.
     */
    public const MODULE = '';

    /**
     * Repository name upper.
     */
    public const MODULE_UPPER = '';

    /**
     * Repository model.
     */
    public const MODEL = '';

    /**
     * Repository repository.
     */
    public const REPOSITORY = '';

    /**
     * Repository transformer.
     */
    public const TRANSFORMER = '';

    /**
     * Repository Route service provider.
     */
    public const ROUTE_SERVICE_PROVIDER = '';

    /**
     * Get module name.
     */
    public static function module(): string
    {
        return static::MODULE;
    }

    /**
     * Get module name upper.
     */
    public static function moduleUpper(): string
    {
        return static::MODULE_UPPER;
    }

    /**
     * Get a model.
     */
    public static function model(): string
    {
        return static::MODEL;
    }

    /**
     * Get repository.
     */
    public static function repository(): string
    {
        return static::REPOSITORY;
    }

    /**
     * Get a transformer.
     */
    public static function transformer(): string
    {
        return static::TRANSFORMER;
    }

    /**
     * Get a route service provider.
     */
    public static function routeServiceProvider(): string
    {
        return static::ROUTE_SERVICE_PROVIDER;
    }
}
