<?php

/**
 * order-helper.php
 *
 * Provides functions to retrieve and render order data for clients and admins.
 * Functions:
 * - getUserOrders(): Fetches current and completed orders for a user.
 * - mapOrderStatus(): Converts status codes to readable strings.
 * - formatOrderDate(): Formats datetime strings for display.
 * - getOrderAddress(): Returns the appropriate address for an order.
 */

require_once SRC_DIR . '/database/connect.php';
require_once __DIR__ . '/../data/data-orders.php';

function getUserOrders(string $username): array {
    $db = maakVerbinding();

    $currentOrders = getCurrentOrdersByUser($db, $username);
    foreach ($currentOrders as &$order) {
        $order['details'] = getOrderDetails($db, $order['order_id']);
    }

    $completedOrders = getCompletedOrdersByUser($db, $username);
    foreach ($completedOrders as &$order) {
        $order['details'] = getOrderDetails($db, $order['order_id']);
    }

    return [
        'current' => $currentOrders,
        'completed' => $completedOrders
    ];
}


function mapOrderStatus(int $status): string {
    return match($status) {
        0 => 'Wordt Voorbereid',
        1 => 'In De Oven',
        2 => 'Onderweg',
        3 => 'Afgeleverd',
        4 => 'Geannuleerd',
        default => 'Onbekend',
    };
}

function formatOrderDate(string $datetime): string {
    try {
        $date = new DateTime($datetime);
        return $date->format('d-m-Y H:i');
    } catch (Exception $e) {
        return htmlspecialchars($datetime);
    }
}

function getOrderAddress(array $order, ?string $userAddress): string {
    return $order['address'] ?: $userAddress ?: 'Geen adres opgegeven';
}