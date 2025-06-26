<?php

// Establishes DB Connection
require_once __DIR__ . '/../database/connect.php';

/**
 * Retrieves all current (ongoing) orders for a given user.
 *
 * Current orders are defined as orders with status codes 0, 1, or 2:
 * 0 = Wordt Voorbereid (Being Prepared)
 * 1 = In De Oven (In the Oven)
 * 2 = Onderweg (On the Way)
 *
 */
function getCurrentOrdersByUser(PDO $db, string $username): array {
    $sql = "
        SELECT
            o.order_id,
            o.datetime,
            o.status,
            o.address
        FROM Pizza_Order o
        WHERE o.client_username = :username
        AND o.status IN (0, 1, 2)  -- Recente orders: status 0,1,2
        ORDER BY o.datetime DESC
    ";
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Retrieves all completed or cancelled orders for a given user.
 *
 * Completed orders are defined as orders with status codes 3 or 4:
 * 3 = Afgeleverd (Delivered)
 * 4 = Geannuleerd (Cancelled)
 *
 */
function getCompletedOrdersByUser(PDO $db, string $username): array {
    $sql = "
        SELECT
            o.order_id,
            o.datetime,
            o.status,
            o.address
        FROM Pizza_Order o
        WHERE o.client_username = :username
        AND o.status IN (3, 4)  -- Order historie: status 3,4
        ORDER BY o.datetime DESC
    ";
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Retrieves detailed product information for a given order.
 *
 * Joins the Pizza_Order_Product table with the Product table to get product
 * names, quantities, and prices for the specific order ID.
 *
 */
function getOrderDetails(PDO $db, int $orderId): array {
    $sql = "
        SELECT
            pop.product_name,
            pop.quantity,
            p.price
        FROM Pizza_Order_Product pop
        JOIN Product p ON p.name = pop.product_name
        WHERE pop.order_id = :order_id
    ";
    $query = $db->prepare($sql);
    $query->bindParam(':order_id', $orderId, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Retrieves all orders regardless of user, ordered by datetime descending.
 * Excluding Completed/Canceled (3,4)
 *
 */
function getAllOrders(PDO $db): array {
    $sql = "
        SELECT
            o.order_id,
            o.client_username,
            o.datetime,
            o.status,
            o.address
        FROM Pizza_Order o
        WHERE o.status IN (0, 1, 2)  -- Exclude Completed/Canceled (3,4)
        ORDER BY o.datetime DESC
    ";
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}


