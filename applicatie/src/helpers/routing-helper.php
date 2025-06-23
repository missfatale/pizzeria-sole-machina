<?php

/**
 * routing-helper.php
 *
 * Contains Helper Functions to Resolve Dynamic Routes to Specific Content Files.
 * Uses Whitelists for Security to Prevent Arbitrary File Inclusion.
 */

// Resolves a Whitelisted Page Name to a File Path in /templates/pages
function resolvePageContentFile($page, $whitelist, $defaultFile) {
    if (in_array($page, $whitelist)) {
        return BASE_DIR . "/templates/pages/{$page}.php";
    }
    http_response_code(404);
    return $defaultFile;
}

// Resolves a Whitelisted Category Name to a File Path in /templates/categories
function resolveCategoryContentFile($category, $whitelist, $defaultFile) {
    foreach ($whitelist as $folder => $allowed) {
        if (in_array($category, $allowed)) {
            return BASE_DIR . "/templates/categories/{$category}.php";
        }
    }
    http_response_code(404);
    return $defaultFile;
}

// Resolves a Whitelisted Item Name to a File Path in /templates/items
/* CONSIDERATION
function resolveItemContentFile($item, $whitelist, $defaultFile) {
    if (in_array($item, $whitelist)) {
        return BASE_DIR . "/templates/items/{$item}.php";
    }
    http_response_code(404);
    return $defaultFile;
}
*/