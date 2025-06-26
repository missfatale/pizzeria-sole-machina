<?php

/**
 * update-order-status-handler.php
 *
 * Handles POST requests to update an order's status.
 * Validates user permissions and input, updates DB, then redirects.
 *
 * Access:
 * - Only logged-in admins allowed.
 *
 */

require_once __DIR__ . '/../bootstrap.php';
require_once SRC_DIR . '/helpers/auth-helper.php';
require_once SRC_DIR . '/database/connect.php';

function handleUpdateOrderStatus(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit('Method Not Allowed');
    }

    if (!userIsLoggedIn() || !isAdmin()) {
        http_response_code(403);
        exit('Forbidden: You do not have permission to perform this action.');
    }

    $orderId = $_POST['order_id'] ?? null;
    $status = $_POST['status'] ?? null;

    $allowedStatuses = [0, 1, 2, 3, 4];

    if (!is_numeric($orderId) || !in_array((int)$status, $allowedStatuses, true)) {
        $_SESSION['admin_error'] = 'Ongeldige invoer voor order update.';
        header('Location: ' . ADMIN_DASHBOARD_PAGE);
        exit();
    }

    $orderId = (int)$orderId;
    $status = (int)$status;

    try {
        $db = maakVerbinding();

        $sql = "UPDATE Pizza_Order SET status = :status WHERE order_id = :order_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['admin_success'] = "Order #$orderId status succesvol bijgewerkt.";
    } catch (PDOException $e) {
        $_SESSION['admin_error'] = "Fout bij het updaten van de orderstatus.";
    }

    header('Location: ' . ADMIN_DASHBOARD_PAGE);
    exit();
}
