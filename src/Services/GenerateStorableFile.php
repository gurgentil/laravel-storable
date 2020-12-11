<?php

namespace Gurgentil\LaravelStorable\Services;

use Gurgentil\LaravelStorable\Contracts\Storable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class GenerateStorableFile
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
     * Add cache file to storage.
     *
     * @param Storable $storable
     */
    public function handle(Storable $storable): void
    {
        $path = $storable->getCacheFilePath();
        $contents = $storable->getCacheContents();

        Storage::disk($this->disk)
            ->put($path, $contents);
    }
}
