<?php

use App\Controllers\SectionController;

$router->get('/{section}', [SectionController::class, 'getSectionArticles']);
