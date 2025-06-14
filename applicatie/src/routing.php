<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

// Helper Functionality
require_once BASE_DIR . '/src/helpers/routing-helper.php';

// Load Whitelists
$allowedPages = require BASE_DIR . '/src/config/whitelist/page-whitelist.php';
$allowedCategories = require BASE_DIR . '/src/config/whitelist/category-whitelist.php';

function resolveContentToServe($allowedPages, $allowedCategories, $default404) {

    // Page Resolving
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        return resolvePageContentFile($page, $allowedPages, $default404);
    }

    // Category Resolving
    elseif (isset($_GET['category'])) {
        $category = $_GET['category'];
        return resolveCategoryContentFile($category, $allowedCategories, $default404);
    }

    // Default: 404
    else {
        http_response_code(404);
        return $default404;
    }
}