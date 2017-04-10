<?php

namespace Spiral\Charts\Google\Storage;

use Psr\SimpleCache\CacheInterface;
use Spiral\Charts\Google\StorageInterface;

class CacheStorage implements StorageInterface
{
    /** @var CacheInterface */
    private $cache;

    /**
     * Storage constructor.
     *
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function store(string $name, $value)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function retrieve(string $name, $default = null)
    {

    }
}