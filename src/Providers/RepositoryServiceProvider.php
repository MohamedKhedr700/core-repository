<?php

use Illuminate\Support\ServiceProvider;
use Modules\Core\Repository\Traits\Provider\WithRepositoryProvider;
use Raid\Core\Repository\Commands\PublishRepositoryCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    use WithRepositoryProvider;

    /**
     * The commands to be registered.
     */
    protected array $commands = [
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