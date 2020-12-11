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
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->disk = $config->get('storable.disk');
    }

    /**
     * Remove cache file from storage.
     *
     * @param Storable $storable
     */
    public function handle(Storable $storable): void
    {
        $path = $storable->getCacheFilePath();

        Storage::disk($this->disk)
            ->delete($path);
    }
}
