<?php

namespace Gurgentil\LaravelStorable\Contracts;

interface Storable
{
    /**
     * Get file path in storage.
     *
     * @return string
     */
    public function getFilePath(): string;

    /**
     * Get string representation of object to store.
     *
     * @return string
     */
    public function getContents(): string;
}
