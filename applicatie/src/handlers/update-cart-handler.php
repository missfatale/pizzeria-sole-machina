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

    // CSRF Token Validation
    if (
        empty($_POST['csrf_token']) ||
        empty($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        http_response_code(403);
        exit('Ongeldige CSRF-token.');
    }

    unset($_SESSION['csrf_token']); // Optional for single-use

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

