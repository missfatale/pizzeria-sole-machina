<?php

/**
 * update-cart-handler.php
 *
 * Handles POST requests to update cart item quantities by increasing or decreasing.
 */

require_once __DIR__ . '/../bootstrap.php';
require_once SRC_DIR . '/helpers/cart-helper.php';

function handleUpdateCart(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit('Method Not Allowed');
    }

    $name = $_POST['product_name'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($name && $action) {
        if ($action === 'increase') {
            increaseQuantity($name);
        } elseif ($action === 'decrease') {
            decreaseQuantity($name);
        }
    }

    header('Location: ' . CART_PAGE);
    exit();
}
