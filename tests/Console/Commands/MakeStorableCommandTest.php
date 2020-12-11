<?php

namespace Gurgentil\LaravelStorable\Test\Console\Commands;

use Gurgentil\LaravelStorable\Test\TestCase;

class MakeStorableCommandTest extends TestCase
{
    /** @test */
    public function it_exits_with_status_0(): void
    {
        $this->artisan('make:storable MyStorable')
            ->assertExitCode(0);
    }
}
