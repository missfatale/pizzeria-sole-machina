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
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/login.css">
</head>

<body>
    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-login">

        <!-- Title -->
        <section class="flex-container pagina-titel">
            <h1>Inloggen</h1>
        </section>

        <div class="flex-container flex-container-cart">

            <!-- Registreren -->
            <section>
                <div class="flex-container">
                    <form action="<?= BASE_URL; ?>/actions/register-action.php" method="POST" class="register-form">
                        <h2>Registreren</h2>

                        <?php if (isset($_SESSION['register_error'])): ?>
                            <div class="error-message">
                                <?= htmlspecialchars($_SESSION['register_error']) ?>
                            </div>
                            <?php unset($_SESSION['register_error']); ?>
                        <?php endif; ?>

                        <?php viewRegisterForm(); ?>
                    </form>
                </div>
            </section>

            <!-- Inloggen -->
            <section>
                <div class="flex-container">
                    <form action="<?= BASE_URL; ?>/actions/login-action.php" method="POST">
                        <h2>Inloggen</h2>
                        <?php viewLoginForm(); ?>
                    </form>
                </div>
            </section>
        </div>

    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>