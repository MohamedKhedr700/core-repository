<?php

namespace Raid\Core\Repository\Commands;

use Raid\Core\Command\Commands\PublishCommand;

class PublishModuleCommand extends PublishCommand
{
    /**
     * The console command name.
     */
    protected $name = 'core:publish-repository';

    /**
     * The console command description.
     */
    protected $description = 'Publish core repository config files.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->publishCommand('repository-config');
        $this->publishCommand('repository-stubs');
    }
}
