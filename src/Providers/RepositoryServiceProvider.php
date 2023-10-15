<?php

use Illuminate\Support\ServiceProvider;
use Modules\Core\Repository\Traits\WithRepositoryProvider;

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