<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

// Redirect User IF Not Logged In
if (!userIsLoggedIn()) {
    header('Location: ' . LOGIN_PAGE);
    exit();
}

$userName = $user['username'] ?? null;
$userAddress = $user['address'] ?? null;

$currentOrders = [];
$completedOrders = [];

if ($userName) {
    $orders = getUserOrders($userName);
    $currentOrders = $orders['current'];
    $completedOrders = $orders['completed'];
}

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/cart.css'; ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/order.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-order">
        <section class="flex-container pagina-titel bg-white">
            <h2>Recente Orders</h2>
        </section>

        <section id="section-latest-order">
            <?php if (empty($currentOrders)): ?>
                <p>Je hebt geen lopende orders.</p>
            <?php else: ?>
                <?php renderOrders($currentOrders, $userAddress); ?>
            <?php endif; ?>
        </section>

        <section class="flex-container pagina-titel bg-white">
            <h2>Order Historie</h2>
        </section>

        <section id="section-past-orders">
            <?php if (empty($completedOrders)): ?>
                <p>Je hebt geen eerdere orders.</p>
            <?php else: ?>
                <?php renderOrders($completedOrders, $userAddress); ?>
            <?php endif; ?>
        </section>

    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>
