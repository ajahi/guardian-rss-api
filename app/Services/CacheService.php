<?php

namespace App\Services;

class CacheService
{
    private $cachePath;
    private $defaultTTL;

    public function __construct()
    {
        // Path to cache directory
        $this->cachePath = __DIR__ . '/../../resources/cache/';
        // Default Time-To-Live for cached items (in seconds)
        $this->defaultTTL = 600; // 10 minutes

        // Ensure the cache directory exists
        if (!is_dir($this->cachePath)) {
            mkdir($this->cachePath, 0777, true);
        }
    }
}