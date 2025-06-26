<?php
// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../src/bootstrap.php';
require_once SRC_DIR . '/helpers/cart-helper.php';
require_once SRC_DIR . '/helpers/image-helper.php';

$cartItems = getCartItems();
$totalPrice = getCartTotal();
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">

<head>
    <?php renderDefaultHeadSection() ?>
    <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/cart.css'; ?>">
</head>

<body>

    <!-- Header + Navigation -->
    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <!-- Main content -->
    <main id="main-cart">
        <section class="flex-container pagina-titel">
            <h1>Order</h1>
        </section>

        <div class="flex-container flex-container-cart">

            <!-- Order Section -->
            <section id="section-cart-order" aria-label="Winkelwagen items">
                <?php if (empty($cartItems)): ?>
                    <div class="empty-cart-message" role="alert" aria-live="polite">
                        <p>Je winkelwagen is leeg.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($cartItems as $item): ?>
                        <?php
                        // Zorg dat category slug altijd klein is en fallback naar 'pizza'
                        $categorySlug = isset($item['type_id']) ? strtolower($item['type_id']) : 'pizza';
                        ?>
                        <article class="cart-item" aria-label="<?= htmlspecialchars($item['name'] ?? 'Product') ?>">
                            <div class="cart-item-image bg-white">
                                <img src="<?= htmlspecialchars(getImagePath($item['name'] ?? '', $categorySlug)) ?>" alt="<?= htmlspecialchars($item['name'] ?? 'Product') ?>" height="150" loading="lazy" />
                            </div>

                            <div class="cart-item-information bg-white">
                                <h3><?= htmlspecialchars($item['name'] ?? '') ?></h3>
                                <p><?= htmlspecialchars($item['description'] ?? '') ?></p>
                                <p class="horizontal-flex-start-self">
                                    € <?= number_format(floatval($item['price'] ?? 0), 2, ',', '') ?>
                                </p>

                                <form method="POST" action="<?= BASE_URL ?>/actions/update-cart.php" class="hoeveelheid-selector bg-white" aria-label="Hoeveelheid aanpassen voor <?= htmlspecialchars($item['name']) ?>">
                                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($item['name']) ?>">

                                    <button class="cart-button-quantity" type="submit" name="action" value="decrease" aria-label="Verminder hoeveelheid van <?= htmlspecialchars($item['name']) ?>">
                                        <i class="fas fa-minus bg-white" aria-hidden="true"></i>
                                    </button>

                                    <span class="hoeveelheid bg-white" aria-live="polite"><?= htmlspecialchars($item['quantity'] ?? 0) ?></span>

                                    <button class="cart-button-quantity" type="submit" name="action" value="increase" aria-label="Verhoog hoeveelheid van <?= htmlspecialchars($item['name']) ?>">
                                        <i class="fas fa-plus bg-white" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

            <!-- Checkout Section -->
            <aside id="section-cart-checkout" aria-label="Winkelwagen checkout">
                <div class="flex-container bg-white cart-totaal" role="region" aria-live="polite" aria-atomic="true">
                    <p class="horizontal-flex-start-self">Totaal</p>
                    <p class="horizontal-flex-start-self">€ <?= number_format($totalPrice, 2, ',', '') ?></p>
                </div>

                <?php if (!empty($cartItems)): ?>
                    <button class="btn-secondary btn-checkout" onclick="location.href='<?= BASE_URL ?>/checkout.php'">Checkout</button>
                <?php else: ?>
                    <button class="btn-secondary btn-checkout" disabled>Checkout</button>
                <?php endif; ?>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

</body>

</html>
