<?php

namespace App\Services;

use App\Services\CacheService;
use Illuminate\Http\Request;

class GuardianApiService
{
    private $cacheService;
    private $baseUrl = 'https://content.guardianapis.com';
    private $apiKey;

    public function __construct()
    {
        $this->cacheService = new CacheService();
        $this->apiKey = getenv('GUARDIAN_API_KEY');
    }

    public function getArticlesBySection(string $section)
    {
        $cacheKey = 'section_' . $section;
        $cachedData = $this->cacheService->get($cacheKey);

        if ($cachedData) {
            return $cachedData;
        }

        $url = "{$this->baseUrl}/{$section}?api-key={$this->apiKey}";
        $response = file_get_contents($url);
        $data = json_decode($response, true)['response']['results'];

        $this->cacheService->set($cacheKey, $data);
        return $data;
    }
}
