<?php

/**
 * complete-order-handler.php
 *
 * Handles the logic for completing an order:
 * - Validates user login and cart contents.
 * - Processes order placement.
 * - Clears cart on success.
 * - Redirects or returns error messages.
 */

require_once __DIR__ . '/../bootstrap.php';
require_once SRC_DIR . '/helpers/auth-helper.php';
require_once SRC_DIR . '/helpers/cart-helper.php';
require_once SRC_DIR . '/helpers/complete-order-helper.php';

function handleCompleteOrder(): void {
    $user = currentUser();
    if (!$user) {
        header('Location: ' . LOGIN_PAGE);
        exit();
    }

    $cartItems = getCartItems();
    if (empty($cartItems)) {
        header('Location: ' . CART_PAGE);
        exit();
    }

    $error = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $clientUsername = $user['username'];
        $clientName = trim(($user['firstname'] ?? '') . ' ' . ($user['lastname'] ?? ''));
        $address = trim($_POST['address'] ?? '');
        if ($address === '') {
            $address = $user['address'] ?? '';
        }

        try {
            $orderId = placeOrder($clientUsername, $clientName, $cartItems, $address);
            clearCart();
            header('Location: ' . ORDER_CONFIRMATION_PAGE . '?order_id=' . $orderId);
            exit();
        } catch (Exception $e) {
            $error = "Er is een fout opgetreden bij het plaatsen van je bestelling: " . htmlspecialchars($e->getMessage());
        }
    }

    renderCheckoutPage($error);
}

function clearCart(): void {
    unset($_SESSION['cart']);
}

/**
 * Renders the checkout form page with an optional error message.
 */
function renderCheckoutPage(?string $error = null, string $address = ''): void {
    ?>
    <!DOCTYPE html>
    <html lang="<?= htmlspecialchars(WEBSITE_LANGUAGE) ?>">
    <head>
        <?php renderDefaultHeadSection(); ?>
        <link rel="stylesheet" href="<?= BASE_URL . '/assets/css/checkout.css'; ?>">
    </head>
    <body>

    <?php require_once TEMPLATES_DIR . '/elements/header.php'; ?>

    <main id="main-checkout">
        <section class="flex-container pagina-titel">
            <h1>Bestelling afronden</h1>
        </section>

        <?php if ($error): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL . '/complete-order-action.php' ?>" class="checkout-form">
            <label for="address">Afleveradres</label>
            <textarea name="address" id="address" required><?= htmlspecialchars($address) ?></textarea>

            <button type="submit" class="btn-primary">Bestelling plaatsen</button>
        </form>
    </main>

    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>

    </body>
    </html>
    <?php
}

