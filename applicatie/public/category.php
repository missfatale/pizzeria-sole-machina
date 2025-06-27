<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

// Routing Logic
require_once BASE_DIR . '/src/routing.php';

// Load Allowlist: Load allowed categories and their subcategories.
$allowedPages = require BASE_DIR . '/src/config/whitelist/page-whitelist.php';
$allowedCategories = require BASE_DIR . '/src/config/whitelist/category-whitelist.php';

// Determine Which Category to Show based on 'category' GET parameter
// Falls back to 404 page if the category is invalid or missing.
$content = resolveContentToServe($allowedPages, $allowedCategories, BASE_DIR . '/public/404.php');

// Check if $content is the 404 page
if ($content === BASE_DIR . '/public/404.php') {
    header("HTTP/1.0 404 Not Found");
    header('Location: ' . FOURZEROFOUR_PAGE);
    exit();
}

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection(); ?>
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

    <!-- Main Content -->
    <main class="main-category">
        <?php require $content; ?>
    </main>

    <!-- Footer -->
    <?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>

</body>

</html>
