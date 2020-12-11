<?php

namespace Gurgentil\LaravelStorable\Services;

use Gurgentil\LaravelStorable\Contracts\Storable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class DeleteStorableFile
{
    /**
     * @var string
     */
    protected $disk;

    /**
     * GenerateStorableFile constructor.
     */
    public function __construct()
    {
        $this->disk = Config::get('storable.disk');
    }

    /**
     * Remove cache file from storage.
     *
     * @param Storable $storable
     */
    public function handle(Storable $storable): void
    {
        $path = $storable->getFilePath();

        Storage::disk($this->disk)
            ->delete($path);
    }
}
