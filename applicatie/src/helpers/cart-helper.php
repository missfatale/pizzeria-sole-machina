<?php

/**
 * cart-helper.php
 *
 * Provides functions to manage the shopping cart stored in the session.
 * Functions:
 * - addToCart(): Adds an item to the cart or increases its quantity.
 * - removeFromCart(): Removes an item from the cart.
 * - getCartItems(): Retrieves all items in the cart.
 * - getCartTotal(): Calculates the total price of items in the cart.
 * - increaseQuantity(): Increases the quantity of an item by one.
 * - decreaseQuantity(): Decreases the quantity of an item by one.
 */

require_once __DIR__ . '/../bootstrap.php';

function addToCart(string $productName, float $price, int $quantity = 1, string $description = ''): void {
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if (isset($_SESSION['cart'][$productName])) {
        $_SESSION['cart'][$productName]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$productName] = [
            'name' => $productName,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
        ];
    }
}

function removeFromCart(string $productName): void {
    unset($_SESSION['cart'][$productName]);
}

function getCartItems(): array {
    return array_values($_SESSION['cart'] ?? []);
}

function getCartTotal(): float {
    $total = 0.0;
    foreach ($_SESSION['cart'] ?? [] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

function increaseQuantity(string $productName): void {
    if (isset($_SESSION['cart'][$productName])) {
        $_SESSION['cart'][$productName]['quantity']++;
    }
}

function decreaseQuantity(string $productName): void {
    if (isset($_SESSION['cart'][$productName])) {
        $_SESSION['cart'][$productName]['quantity']--;
        if ($_SESSION['cart'][$productName]['quantity'] <= 0) {
            removeFromCart($productName);
        }
    }
}
