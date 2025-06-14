<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/boostrap.php';

// Sets Page Title
$pageTitle = "Login";

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/login.css">
</head>

<body>
    <!-- Header + Navigation -->
    <?php require_once BASE_DIR . '/templates/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-login">

        <section class="flex-container pagina-titel">
            <h1>Inloggen</h1>
        </section>

        <div class="flex-container flex-container-cart">

            <!-- Registreren -->
            <section>
                <div class="flex-container">
                    <form action="<?= BASE_URL; ?>actions/register-action.php" method="POST" class="register-form">
                        <h2>Registreren</h2>
                        <?php viewRegisterForm(); ?>
                    </form>
                </div>
            </section>

            <!-- Inloggen -->
            <section>
                <div class="flex-container">
                    <form action="<?= BASE_URL; ?>actions/login-action.php" method="POST" class="login-form">
                        <h2>Inloggen</h2>
                        <?php viewLoginForm(); ?>
                    </form>
                </div>
            </section>
        </div>

    </main>

    <!-- Footer -->
    <?php require_once BASE_DIR . '/templates/elements/footer.php'; ?>

</body>

</html>