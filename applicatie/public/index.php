<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

// Sets Page Title
$pageTitle = "Home";

// Gets Current User
$user = currentUser();
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
                <a href="<?= BASE_URL . '/category.php?category=acties'?>"><img src="<?= BASE_URL . '/assets/images/homepage/onze-acties.png'?>" alt="Actie pizzas"></a>
            </div>

            <div class="grid-item grid-item-homepage">
                <a href="<?= BASE_URL . '/category.php?category=pizza'?>"><img src="<?= BASE_URL . '/assets/images/homepage/onze-pizzas.png'?>" alt="Ons pizza aanbod"></a>
            </div>

            <div class="grid-item grid-item-homepage">
                <a href="<?= BASE_URL . '/category.php?category=focaccia'?>"><img src="<?= BASE_URL . '/assets/images/homepage/onze-focaccia.png' ?>" alt="Ons focaccia aanbod"></a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>