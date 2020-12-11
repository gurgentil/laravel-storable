<?php

namespace Gurgentil\LaravelStorable\Test;

use Gurgentil\LaravelStorable\Test\Doubles\StorableStub;
use Illuminate\Support\Facades\Storage;

class StorableTest extends TestCase
{
    /** @test */
    public function it_saves_the_storable_to_storage(): void
    {
        $storable = new StorableStub;

        Storage::shouldReceive('disk')
            ->with('local')
            ->andReturnSelf()
            ->shouldReceive('put')
            ->once();

        $storable->save();
    }

    /** @test */
    public function it_saves_the_storable_to_any_given_disk(): void
    {
        $storable = new StorableStub;

        Storage::shouldReceive('disk')
            ->with('test-disk')
            ->andReturnSelf()
            ->shouldReceive('put')
            ->once();

        $storable->save('test-disk');
    }

    /** @test */
    public function it_deletes_the_storable_from_storage(): void
    {
        $storable = new StorableStub;

        Storage::shouldReceive('disk')
            ->with('local')
            ->andReturnSelf()
            ->shouldReceive('delete')
            ->once();

        $storable->delete();
    }

    /** @test */
    public function it_removes_the_storable_from_any_given_disk(): void
    {
        $storable = new StorableStub;

        Storage::shouldReceive('disk')
            ->with('test-disk')
            ->andReturnSelf()
            ->shouldReceive('delete')
            ->once();

        $storable->delete('test-disk');
    }
}
