<?php

namespace Raid\Core\Repository\Traits\Provider;

trait WithRepositoryProvider
{
    /**
     * Register config.
     */
    private function registerConfig(): void
    {
        $configResourcePath = glob(__DIR__.'/../../../config/*.php');

        foreach ($configResourcePath as $config) {

            $this->publishes([
                $config => config_path(basename($config)),
            ], 'repository-config');
        }
    }

    /**
     * Register commands.
     */
    private function registerCommands(): void
    {
        $this->commands($this->commands);
    }

    /**
     * Register repository.
     */
    private function registerRepository(): void
    {
        $this->registerRepositories();
    }

    /**
     * Register repositories.
     */
    private function registerRepositories(): void
    {
        $repositories = config('repository.repositories');

        foreach ($repositories as $repository) {
            $model = $repository::getModel();

            $this->app->singleton($repository, function () use ($repository, $model) {
                return new $repository(new $model);
            });
        }
    }
}