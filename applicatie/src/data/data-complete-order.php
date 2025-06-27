<?php

/**
 * data-complete-order.php
 *
 * Creates a new order and its products in the database transactionally.
 */

require_once __DIR__ . '/../database/connect.php';

function placeOrder(string $clientUsername, string $clientName, array $cartItems, string $address = ''): int
{
    $db = maakVerbinding();

    $personnelUsername = 'admin';
    $status = 0; // Pending

    try {
        $db->beginTransaction();

        $query = $db->prepare('
            INSERT INTO Pizza_Order (client_username, client_name, personnel_username, datetime, status, address)
            VALUES (:client_username, :client_name, :personnel_username, GETDATE(), :status, :address)
        ');

        $query->bindParam(':client_username', $clientUsername);
        $query->bindParam(':client_name', $clientName);
        $query->bindParam(':personnel_username', $personnelUsername);
        $query->bindParam(':status', $status, PDO::PARAM_INT);
        $query->bindParam(':address', $address);

        $query->execute();

        $orderId = (int) $db->lastInsertId(); // Cast to int for Type Safety

        $queryItem = $db->prepare('
            INSERT INTO Pizza_Order_Product (order_id, product_name, quantity)
            VALUES (:order_id, :product_name, :quantity)
        ');

        foreach ($cartItems as $item) {
            $queryItem->execute([
                ':order_id'     => $orderId,
                ':product_name' => $item['name'],
                ':quantity'     => $item['quantity'],
            ]);
        }

        $db->commit();
        return $orderId;
    } catch (Exception $e) {
        $db->rollBack();
        throw $e;
    }
}
