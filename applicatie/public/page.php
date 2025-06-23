<?php

/**
 * page.php
 *
 * Dynamically Renders Whitelisted pages from templates/pages/ via ?page=... parameter.
 * Uses the Whitelist to Prevent Unauthorized file access.
 */

require_once __DIR__ . '/../src/boostrap.php';
require_once BASE_DIR . '/src/routing.php';

$allowedPages = require BASE_DIR . '/src/config/whitelist/page-whitelist.php';

$page = $_GET['page'] ?? '';
$content = resolvePageContentFile($page, $allowedPages, PUBLIC_DIR . '/404.php');

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/privacy.css">
</head>

<body>

<!-- Header + Navigation -->
<?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

<!-- Main Content -->
<?php require $content; ?>

<!-- Footer -->
<?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>
</html>
