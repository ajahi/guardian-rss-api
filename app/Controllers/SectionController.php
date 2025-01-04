<?php

namespace App\Controllers;

use App\Services\GuardianApiService;
use Illuminate\Http\Request;

class SectionController
{
    private $apiService;

    public function __construct()
    {
        $this->apiService = new GuardianApiService();
    }

    public function getSectionArticles($section)
    {
        try {
            $data = $this->apiService->getArticlesBySection($section);
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
