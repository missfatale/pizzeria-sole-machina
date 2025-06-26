<?php
/**
 * add-to-cart-handler.php
 *
 * Handles adding a product to the cart from POST data.
 */

require_once __DIR__ . '/../bootstrap.php';
require_once SRC_DIR . '/helpers/cart-helper.php';

function handleAddToCart(): void {
    $product = $_POST['product'] ?? null;
    $price = $_POST['price'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;
    $description = $_POST['description'] ?? '';
    $type_id = $_POST['type_id'] ?? 'pizza';

    if ($product && $price) {
        addToCart($product, (float)$price, (int)$quantity, $description, $type_id);
    }

    header("Location: " . CART_PAGE);
    exit();
}
