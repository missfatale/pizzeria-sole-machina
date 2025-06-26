<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

// Redirect User IF Not Logged In
if (!userIsLoggedIn()) {
    header('Location: ' . LOGIN_PAGE);
    exit();
}

$orderId = $_GET['order_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/order-success.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-order-success" class="flex-container pagina-titel">
        <section class="bg-white">
            <h1 class="order-success-title">Bedankt voor je bestelling!</h1>
            <?php if ($orderId): ?>
                <p >Je bestelling met nummer <strong class="bg-white"><?= htmlspecialchars($orderId) ?></strong> is succesvol geplaatst.</p>
                <p>We gaan direct aan de slag om jouw bestelling te verwerken.</p>
                <p><a href="<?= BASE_URL . '/order.php'?>">Bekijk je orders</a></p>
            <?php else: ?>
                <p>Je bestelling is succesvol geplaatst.</p>
                <p><a href="<?= BASE_URL . '/order.php'?>">Bekijk je orders</a></p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>