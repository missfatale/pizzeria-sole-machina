<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

// Redirect User IF Not Logged In
if (!userIsLoggedIn()) {
    header('Location: ' . LOGIN_PAGE);
    exit();
}

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection(); ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/account.css' ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-account">
        <section class="flex-container pagina-titel">
            <h1>Welkom, <?= htmlspecialchars($user['firstname']) ?></h1>
        </section>

        <section class="flex-container flex-container-cart">
            <div class="account-box">
                <h2>Accountgegevens</h2>
                <p>Je bent ingelogd als: <strong class="bg-white"><?= htmlspecialchars($user['username']) ?></strong></p>
                <p>Rol: <strong class="bg-white"><?= htmlspecialchars($user['role']) ?></strong></p>

                <form action="<?= BASE_URL . '/actions/logout-action.php' ?>" method="POST" class="bg-white">
                    <button type="submit" class="btn-secondary account-button">Uitloggen</button>
                </form>
            </div>
        </section>

        <section class="flex-container flex-container-cart">
            <div class="account-box">
                <h2>Mijn Bestellingen</h2>
                <p>Bekijk hier al je eerdere bestellingen en de status ervan.</p>
                <button class="btn-secondary account-button" onclick="location.href='<?= ORDER_PAGE ?>'">Bekijk Bestellingen</button>
            </div>
        </section>

        <!-- Only visible to users with the personnel role -->
        <?php if (isAdmin()): ?>
            <section class="flex-container flex-container-cart">
                <div class="account-box">
                    <h2>Admin Dashboard</h2>
                    <p>Bekijk hier het admin overzicht.</p>
                    <button class="btn-secondary account-button" onclick="location.href='<?= ADMIN_DASHBOARD_PAGE ?>'">Dashboard</button>
                </div>
            </section>
        <?php endif; ?>

    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>