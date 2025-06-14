<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

// Sets Page Title
$pageTitle = "Home";

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/index.css">
</head>

<body>
    <!-- Header + Navigation -->
    <?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-index">

        <section class="flex-container pagina-titel">
            <h1>Welkom bij <?= htmlspecialchars(WEBSITE_TITLE)?></h1>
        </section>

        <div class="grid-container grid-container-homepage">

            <div class="grid-item grid-item-homepage">
                <a href="pages/frontend/acties.html"><img src="<?= BASE_URL; ?>assets/images/homepage/onze-acties.png" alt="Actie pizzas"></a>
            </div>

            <div class="grid-item grid-item-homepage">
                <a href="pages/frontend/pizza.html"><img src="<?= BASE_URL; ?>assets/images/homepage/onze-pizzas.png" alt="Ons pizza aanbod"></a>
            </div>

            <div class="grid-item grid-item-homepage">
                <a href="pages/focaccia.html"><img src="<?= BASE_URL; ?>assets/images/homepage/onze-focaccia.png" alt="Ons focaccia aanbod"></a>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>

</body>

</html>