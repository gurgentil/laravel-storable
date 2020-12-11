<?php

namespace Gurgentil\LaravelStorable;

use Gurgentil\LaravelStorable\Console\Commands\MakeStorableCommand;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
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
