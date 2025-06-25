<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

// Routing Logic
require_once BASE_DIR . '/src/routing.php';

// Load Allowlist: Load allowed categories and their subcategories.
$allowedPages = require BASE_DIR . '/src/config/whitelist/page-whitelist.php';

// Determine Which Page to Show based on 'page' GET parameter
// Falls back to 404 page if the page is invalid or missing.
$page = $_GET['page'] ?? '';
$content = resolvePageContentFile($page, $allowedPages, PUBLIC_DIR . '/404.php');

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/privacy.css' ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main>
        <?php require $content; ?>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>
