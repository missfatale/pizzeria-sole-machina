<?php

/**
 * complete-order-helper.php
 *
 * Creates a new order and its products in the database transactionally.
 *
 */

require_once __DIR__ . '/../database/connect.php';

function placeOrder(string $clientUsername, string $clientName, array $cartItems, string $address = ''): int {
    $db = maakVerbinding();

    $personnelUsername = 'admin';
    $status = 0; // Pending

    try {
        $db->beginTransaction();

        $stmt = $db->prepare('
            INSERT INTO Pizza_Order (client_username, client_name, personnel_username, datetime, status, address)
            VALUES (:client_username, :client_name, :personnel_username, GETDATE(), :status, :address)
        ');

        $stmt->bindParam(':client_username', $clientUsername);
        $stmt->bindParam(':client_name', $clientName);
        $stmt->bindParam(':personnel_username', $personnelUsername);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':address', $address);

        $stmt->execute();

        $orderId = $db->lastInsertId();

        $stmtItem = $db->prepare('
            INSERT INTO Pizza_Order_Product (order_id, product_name, quantity)
            VALUES (:order_id, :product_name, :quantity)
        ');

        foreach ($cartItems as $item) {
            $stmtItem->execute([
                ':order_id' => $orderId,
                ':product_name' => $item['name'],
                ':quantity' => $item['quantity'],
            ]);
        }

        $db->commit();

        return $orderId;
    } catch (Exception $e) {
        $db->rollBack();
        throw $e;
    }
}
