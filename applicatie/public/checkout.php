<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';

$cartItems = getCartItems();
$totalPrice = getCartTotal();

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection(); ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/login.css'; ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/checkout.css'; ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/cart.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main Content -->
    <main id="main-checkout">
        <section class="flex-container pagina-titel">
            <h1>Checkout</h1>
        </section>

        <div class="flex-container flex-container-cart">

            <?php if (!userIsLoggedIn()): ?>
                <section class="register-section">
                    <div class="flex-container">
                        <form action="<?= BASE_URL . '/actions/register-action.php' ?>" method="POST" class="register-form">
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

            <?php endif; ?>

            <!-- Checkout Summary -->
            <section id="flex-container">
                <?php if (empty($cartItems)): ?>
                    <p>Je winkelwagen is leeg.</p>
                <?php else: ?>
                    <?php foreach ($cartItems as $item): ?>
                        <?php
                        $categorySlug = isset($item['type_id']) ? strtolower($item['type_id']) : 'pizza';
                        ?>
                        <div class="cart-item">
                            <div class="cart-item-image bg-white">
                                <img src="<?= htmlspecialchars(getImagePath($item['name'] ?? '', $categorySlug)) ?>"
                                     alt="<?= htmlspecialchars($item['name'] ?? '') ?>" height="150">
                            </div>
                            <div class="cart-item-checkout bg-white">
                                <h3><?= htmlspecialchars($item['name'] ?? '') ?></h3>
                                <p class="horizontal-flex-start-self">€ <?= number_format($item['price'], 2, ',', '') ?> × <?= (int)($item['quantity'] ?? 1) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (userIsLoggedIn()): ?>
                        <div class="cart-item checkout-actions">
                            <p>Totaal: € <?= number_format($totalPrice, 2, ',', '') ?></p>
                            <form method="POST" action="<?= BASE_URL . '/actions/complete-order-action.php'?>" style="margin:0;">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">
                                <button type="submit" class="btn-checkout">Checkout</button>
                            </form>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <!-- Footer + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>
