<?php

namespace Gurgentil\LaravelStorable;

use Gurgentil\LaravelStorable\Console\Commands\MakeStorableCommand;
use Gurgentil\LaravelStorable\Services\DeleteStorableFile;
use Gurgentil\LaravelStorable\Services\GenerateStorableFile;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function register(): void
    {
        $this->app->bind('delete-storable-file', static function () {
            return new DeleteStorableFile;
        });

        $this->app->bind('generate-storable-file', static function () {
            return new GenerateStorableFile;
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/storable.php', 'storable');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeStorableCommand::class,
            ]);
        }
    }
}
