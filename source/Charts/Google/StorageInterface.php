<?php

namespace Spiral\Charts\Google;

interface StorageInterface
{
    /**
     * Store some value by name.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function store(string $name, $value);

    /**
     * @param string     $name
     * @param null|mixed $default
     * @return mixed
     */
    public function retrieve(string $name, $default = null);
}