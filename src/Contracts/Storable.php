<?php

namespace Gurgentil\LaravelStorable\Contracts;

interface Storable
{
    /**
     * Get file path in storage.
     *
     * @return string
     */
    public function getCacheFilePath(): string;

    /**
     * Get string representation of object to store.
     *
     * @return string
     */
    public function getCacheContents(): string;
}
