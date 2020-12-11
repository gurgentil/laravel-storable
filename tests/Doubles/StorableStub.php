<?php

namespace Gurgentil\LaravelStorable\Test\Doubles;

use Gurgentil\LaravelStorable\Storable;

class StorableStub extends Storable
{
    public function getFilePath(): string
    {
        return 'storable-stub.json';
    }

    public function getContents(): string
    {
        return json_encode([
            'name' => 'my-storable-stub',
        ]);
    }
}
