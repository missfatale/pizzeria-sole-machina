<?php

/**
 * image-helper.php
 *
 * Provides a helper function to determine the correct image path for products
 * based on their name and category. Automatically falls back to a placeholder
 * if the image does not exist and supports multiple extensions.
 *
 * Function:
 * - getImagePath($productName, $category): returns a valid image path or fallback
 */

function getImagePath(string $productName, string $category): string {
    $safeName = preg_replace('/[^a-z0-9\-]/', '', str_replace(' ', '-', strtolower($productName)));
    $safeCategory = strtolower($category);

    $baseDir = PUBLIC_DIR . '/assets/images/' . $safeCategory;
    $baseUrl = BASE_URL . '/assets/images/' . $safeCategory;

    $extensions = ['jpg', 'png'];

    foreach ($extensions as $ext) {
        $fullPath = "$baseDir/$safeName.$ext";
        if (file_exists($fullPath)) {
            return "$baseUrl/$safeName.$ext";
        }
    }

    return BASE_URL . '/assets/images/no-image.jpg';
}