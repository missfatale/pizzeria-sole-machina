<?php

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
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">
            <button type="submit" class="btn-primary">Bestelling plaatsen</button>
        </form>
    </main>

    <?php require_once TEMPLATES_DIR . '/elements/footer.php'; ?>
    </body>
    </html>
    <?php
}
