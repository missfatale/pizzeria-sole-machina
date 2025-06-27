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
require_once SRC_DIR . '/data/data-complete-order.php';
require_once SRC_DIR . '/view/view-checkout.php';

function handleCompleteOrder(): void
{
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
    $address = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // CSRF Token Validation
        if (
            empty($_POST['csrf_token']) ||
            empty($_SESSION['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
        ) {
            http_response_code(403);
            exit('Ongeldige CSRF-token.');
        }
        // Optionally invalidate token after use
        unset($_SESSION['csrf_token']);

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

    // Generate CSRF token if not present (for initial GET or after errors)
    if (empty($_SESSION['csrf_token'])) {
        try {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        } catch (Exception $e) {
            $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
    }

    renderCheckoutPage($error, $address);
}

function clearCart(): void
{
    unset($_SESSION['cart']);
}
