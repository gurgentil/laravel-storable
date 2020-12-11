<?php

namespace Gurgentil\LaravelStorable\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeStorableCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:storable {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new storable class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Storable';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/../stubs/storable.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Storables';
    }
}
