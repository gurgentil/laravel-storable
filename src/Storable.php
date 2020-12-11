<?php

namespace Gurgentil\LaravelStorable;

use Gurgentil\LaravelStorable\Contracts\Storable as StorableContract;
use Gurgentil\LaravelStorable\Services\DeleteStorableFile;
use Gurgentil\LaravelStorable\Services\GenerateStorableFile;

abstract class Storable implements StorableContract
{
    /**
     * Save storable to storage.
     *
     * @param string|null $disk
     */
    public function save(?string $disk = null): void
    {
        (new GenerateStorableFile($disk))->handle($this);
    }

    /**
     * Remove storable from storage.
     *
     * @param string|null $disk
     */
    public function delete(?string $disk = null): void
    {
        (new DeleteStorableFile($disk))->handle($this);
    }
}
