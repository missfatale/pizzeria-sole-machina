<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

// Overrides Page Title
$pageTitle = "Home";

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/index.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-index">

        <section class="flex-container pagina-titel">
            <h1>Welkom bij <?= htmlspecialchars(WEBSITE_TITLE)?></h1>
        </section>

        <div class="grid-container grid-container-homepage">

            <div class="grid-item grid-item-homepage">
                <a href="<?= BASE_URL . '/category.php?category=voorgerecht'?>"><img src="<?= BASE_URL . '/assets/images/homepage/onze-voorgerechten.png'?>" alt="Onze Voorgerechten"></a>
            </div>

            <div class="grid-item grid-item-homepage">
                <a href="<?= BASE_URL . '/category.php?category=maaltijd'?>"><img src="<?= BASE_URL . '/assets/images/homepage/onze-maaltijden.png'?>" alt="Onze Maaltijden"></a>
            </div>

            <div class="grid-item grid-item-homepage">
                <a href="<?= BASE_URL . '/category.php?category=pizza'?>"><img src="<?= BASE_URL . '/assets/images/homepage/onze-pizzas.png' ?>" alt="Onze Pizza"></a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>