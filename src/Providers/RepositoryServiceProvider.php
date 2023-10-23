<?php

namespace Raid\Core\Repository\Providers;

use Illuminate\Support\ServiceProvider;
use Raid\Core\Repository\Commands\CreateRepositoryCommand;
use Raid\Core\Repository\Commands\CreateRepositoryConfigCommand;
use Raid\Core\Repository\Commands\CreateTransformerCommand;
use Raid\Core\Repository\Commands\CreateUtilityCommand;
use Raid\Core\Repository\Commands\PublishRepositoryCommand;
use Raid\Core\Repository\Traits\Provider\WithRepositoryProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    use WithRepositoryProvider;

    /**
     * The commands to be registered.
     */
    protected array $commands = [
        CreateRepositoryCommand::class,
        CreateRepositoryConfigCommand::class,
        CreateTransformerCommand::class,
        CreateUtilityCommand::class,
        PublishRepositoryCommand::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerConfig();
        $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerRepository();
    }
}
