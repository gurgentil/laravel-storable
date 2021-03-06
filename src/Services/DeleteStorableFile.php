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
     *
     * @param string|null $disk
     */
    public function __construct(?string $disk = null)
    {
        $this->disk = $disk ?? Config::get('storable.disk');
    }

    /**
     * Remove file from storage.
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
