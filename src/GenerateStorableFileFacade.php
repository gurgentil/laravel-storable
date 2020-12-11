<?php

namespace Gurgentil\LaravelStorable;

use Illuminate\Support\Facades\Facade;

class GenerateStorableFileFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'generate-storable-file';
    }
}
