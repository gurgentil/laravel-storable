<?php

namespace Gurgentil\LaravelStorable\Test;

use Gurgentil\LaravelStorable\Services\DeleteStorableFile;
use Gurgentil\LaravelStorable\Test\Doubles\StorableStub;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class DeleteStorableFileTest extends TestCase
{
    /** @test */
    public function it_calls_storage_with_the_correct_params(): void
    {
        $disk = Config::get('storable.disk');

        $storable = new StorableStub;

        Storage::shouldReceive('disk')
            ->with($disk)
            ->andReturnSelf()
            ->shouldReceive('delete')
            ->with($storable->getFilePath())
            ->once();

        (new DeleteStorableFile)->handle($storable);
    }
}
