<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Controllers\SectionController;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Parse the request URL
$requestUri = trim($_SERVER['REQUEST_URI'], '/');

// Handle the request
$sectionController = new SectionController();
$response = $sectionController->getSectionArticles($requestUri);

// Output the response
header('Content-Type: application/rss+xml');
echo $response;

