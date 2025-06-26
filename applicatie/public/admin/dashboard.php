<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../../src/bootstrap.php';

// Redirect User IF Not Logged In
if (!isAdmin()) {
    header('Location: ' . INDEX_PAGE);
    exit();
}

$db = maakVerbinding();
$orders = getAllOrders($db);

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/cart.css'; ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/order.css'; ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/dashboard.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-order">
        <section class="flex-container pagina-titel bg-white">
            <h2>Alle Orders</h2>
        </section>

        <section id="section-all-orders">
            <?php if (empty($orders)): ?>
                <p>Geen orders gevonden.</p>
            <?php else: ?>
                <?php renderAdminOrders($orders); ?>
            <?php endif; ?>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>
