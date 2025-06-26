<?php
require_once SRC_DIR . '/database/connect.php';
require_once __DIR__ . '/../data/data-orders.php';

/**
 * order-helper.php
 *
 * Provides functions to retrieve and render order data for clients and admins.
 * Functions:
 * - getUserOrders(): Fetches current and completed orders for a user.
 * - mapOrderStatus(): Converts status codes to readable strings.
 * - formatOrderDate(): Formats datetime strings for display.
 * - getOrderAddress(): Returns the appropriate address for an order.
 * - renderOrders(): Outputs HTML for client order lists.
 * - renderAdminOrders(): Outputs HTML forms for admin order management.
 */

function getUserOrders(string $username): array {
    $db = maakVerbinding();

    $currentOrders = getCurrentOrdersByUser($db, $username);
    $completedOrders = getCompletedOrdersByUser($db, $username);

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

function renderOrders(array $orders, ?string $userAddress): void {
    if (empty($orders)) {
        echo '<p>Geen orders gevonden.</p>';
        return;
    }

    foreach ($orders as $order) {
        ?>
        <div class="cart-item cart-header">
            <h3>Status: <?= htmlspecialchars(mapOrderStatus((int)$order['status'])) ?></h3>
            <div class="pagina-titel bg-white order-status order-details-panel">
                <p><?= formatOrderDate($order['datetime']) ?></p>
                <p>Adres: <?= htmlspecialchars(getOrderAddress($order, $userAddress)) ?></p>
            </div>
            <div class="order-items bg-white">
                <?php
                $orderDetails = getOrderDetails(maakVerbinding(), $order['order_id']);
                if (!empty($orderDetails)):
                    ?>
                    <ul>
                        <?php foreach ($orderDetails as $item): ?>
                            <li>
                                <?= htmlspecialchars($item['product_name']) ?>
                                &times; <?= (int)$item['quantity'] ?> -
                                € <?= number_format((float)$item['price'], 2, ',', '') ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Geen producten gevonden voor deze order.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}

/**
 *
 * Renders a list of orders for admin with a status dropdown to update.
 *
 */
function renderAdminOrders(array $orders): void {
    if (empty($orders)) {
        echo '<p>Geen orders gevonden.</p>';
        return;
    }

    foreach ($orders as $order) {
        ?>
        <form method="POST" action="<?= BASE_URL . '/actions/update-order-status-action.php' ?>" class="cart-item cart-header admin-order-form">
            <input type="hidden" name="order_id" value="<?= (int)$order['order_id'] ?>">

            <div class="order-status-panel">
                <select name="status" class="order-status-select">
                    <?php
                    $statuses = [
                        0 => 'Wordt Voorbereid',
                        1 => 'In De Oven',
                        2 => 'Onderweg',
                        3 => 'Afgeleverd',
                        4 => 'Geannuleerd',
                    ];
                    foreach ($statuses as $code => $label) {
                        $selected = ((int)$order['status'] === $code) ? 'selected' : '';
                        echo "<option value=\"$code\" $selected>$label</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="order-details-panel">
                <p><strong class="bg-white">Order ID:</strong> <?= (int)$order['order_id'] ?></p>
                <p><strong class="bg-white">Client:</strong> <?= htmlspecialchars($order['client_username'] ?? 'Onbekend') ?></p>
                <p><strong class="bg-white">Datum:</strong> <?= htmlspecialchars($order['datetime'] ?? '') ?></p>
                <p><strong class="bg-white">Adres:</strong> <?= htmlspecialchars($order['address'] ?: 'Geen adres opgegeven') ?></p>

                <div class="order-items bg-white">
                    <?php
                    $orderDetails = getOrderDetails(maakVerbinding(), $order['order_id']);
                    if (!empty($orderDetails)):
                        ?>
                        <ul>
                            <?php foreach ($orderDetails as $item): ?>
                                <li>
                                    <?= htmlspecialchars($item['product_name']) ?>
                                    &times; <?= (int)$item['quantity'] ?> -
                                    € <?= number_format((float)$item['price'], 2, ',', '') ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Geen producten gevonden voor deze order.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="admin-order-update-btn-container">
                <button type="submit" class="btn-update-status">Update</button>
            </div>
        </form>
        <?php
    }
}
