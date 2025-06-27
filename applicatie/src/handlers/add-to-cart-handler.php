<?php
/**
 * add-to-cart-handler.php
 *
 * Handles adding a product to the cart from POST data.
 * Validates CSRF token to prevent unauthorized form submissions.
 */

require_once __DIR__ . '/../bootstrap.php';
require_once SRC_DIR . '/helpers/cart-helper.php';

function handleAddToCart(): void {
    // CSRF Token Validation
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||
        empty($_POST['csrf_token']) ||
        empty($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        http_response_code(403);
        exit('Ongeldige CSRF-token.');
    }

    unset($_SESSION['csrf_token']);

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
