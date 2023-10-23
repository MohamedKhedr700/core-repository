<?php

namespace Raid\Core\Repository\Commands;

use Raid\Core\Command\Commands\CreateCommand;

class CreateRepositoryConfigCommand extends CreateCommand
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'core:make-repo-config {classname}';

    /**
     * The console command description.
     */
    protected $description = 'Make a repository config file';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->createCommand();
    }

    /**
     * Return the class name.
     */
    public function getClassName(): string
    {
        return strtolower($this->argument('classname', ''));
    }

    /**
     * Return the stub file path.
     */
    public function getStubPath(): string
    {
        return __DIR__.'/../../resources/stubs/repository-config.stub';
    }

    /**
     * Map the stub variables present in stub to its value.
     */
    public function getStubVariables(): array
    {
        return [];
    }

    /**
     * Get the full path of generated class.
     */
    public function getSourceFilePath(): string
    {
        $path = config('repository.repository_config_path');

        if (! file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return $path.'/'.$this->getClassName().'.php';
    }
}
