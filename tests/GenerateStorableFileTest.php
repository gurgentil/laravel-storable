<?php

namespace Gurgentil\LaravelStorable\Test;

use Gurgentil\LaravelStorable\Services\GenerateStorableFile;
use Gurgentil\LaravelStorable\Test\Doubles\StorableStub;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class GenerateStorableFileTest extends TestCase
{
    /** @test */
    public function it_calls_storage_with_the_correct_params(): void
    {
        $disk = Config::get('storable.disk');

        $storable = new StorableStub;

        Storage::shouldReceive('disk')
            ->with($disk)
            ->andReturnSelf()
            ->shouldReceive('put')
            ->with($storable->getFilePath(), $storable->getContents())
            ->once();

        (new GenerateStorableFile)->handle($storable);
    }
}
