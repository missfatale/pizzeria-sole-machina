<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

require_once BASE_DIR . '/src/routing.php';

$allowedPages = require BASE_DIR . '/src/config/whitelist/page-whitelist.php';

$content = resolvePageContentFile($allowedPages, BASE_DIR . '/public/404.php');

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Sole Machina - <?php echo ucfirst(str_replace('-', ' ', $page)); ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/fontawesome.min.css">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

    <!-- Main Content -->
    <?php require $content; ?>

    <!-- Footer -->
    <?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>

</body>

</html>
