<?php

namespace Gurgentil\LaravelStorable;

use Illuminate\Support\Facades\Facade;

class DeleteStorableFileFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'delete-storable-file';
    }
}
