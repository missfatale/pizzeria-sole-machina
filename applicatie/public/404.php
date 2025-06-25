<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/404.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-404">
        <section class="not-found-box">
            <div class="not-found-content bg-white">
                <div class="not-found-text bg-white">
                    <h1>404</h1>
                    <p>Deze pagina bestaat niet of is verplaatst.</p>
                    <a class="bg-white" href="<?= INDEX_PAGE ?>"><button class="btn-secondary not-found-button">Terug naar Home</button></a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>