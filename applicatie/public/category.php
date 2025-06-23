<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

// Routing Logic
require_once BASE_DIR . '/src/routing.php';

// Load Whitelist
$allowedCategories = require BASE_DIR . '/src/config/whitelist/category-whitelist.php';

// Determine Which Category to Show
$content = resolveCategoryContentFile($_GET['category'] ?? '', $allowedCategories, BASE_DIR . '/public/404.php');

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection(); ?>
</head>

<body>

<?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

<main>
    <?php require $content; ?>
</main>

<?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>

</body>
</html>
