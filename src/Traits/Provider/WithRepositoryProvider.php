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
        $repositories = config('repository.repositories', []);

        foreach ($repositories as $repository) {
            $this->registerRepositoryConfig($repository);
            $this->registerRepositoryInstance($repository);
        }
    }

    /**
     * Register repository config.
     */
    private function registerRepositoryConfig(string $repository): void
    {
        $configPath = config('repository.repository_config_path');

        $repositoryConfigPath = $configPath.'/'.$repository::getModule().'.php';

        if (! file_exists($repositoryConfigPath)) {
            return;
        }

        $this->publishes([
            $repositoryConfigPath => config_path($repository::getModule().'.php'),
        ], 'config');

        $this->mergeConfigFrom($repositoryConfigPath, $repository::getModule());
    }

    /**
     * Register repository instance.
     */
    private function registerRepositoryInstance(string $repository): void
    {
        $model = $repository::getModel();

        if (! $model) {
            return;
        }

        $this->app->singleton($repository, function () use ($repository, $model) {
            return new $repository(new $model);
        });
    }
}
