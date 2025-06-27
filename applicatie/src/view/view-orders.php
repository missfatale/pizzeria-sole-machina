<?php

/**
 * view-orders.php
 *
 * Renders order views for clients and admins.
 * These functions should be used in views only, with preloaded data passed in.
 *
 * Functions:
 * - renderOrders(): Outputs order list for clients.
 * - renderAdminOrders(): Outputs order list with status form for admins.
 */

function renderOrders(array $orders, ?string $userAddress): void
{
    if (empty($orders)) {
        echo '<p>Geen orders gevonden.</p>';
        return;
    }

    foreach ($orders as $order) {
        ?>
        <div class="cart-item cart-header">
            <h3>Status: <?= htmlspecialchars(mapOrderStatus((int) $order['status'])) ?></h3>
            <div class="pagina-titel bg-white order-status order-details-panel">
                <p><?= formatOrderDate($order['datetime']) ?></p>
                <p>Adres: <?= htmlspecialchars(getOrderAddress($order, $userAddress)) ?></p>
            </div>
            <div class="order-items bg-white">
                <?php
                $orderDetails = $order['details'] ?? [];
                if (!empty($orderDetails)):
                    ?>
                    <ul>
                        <?php foreach ($orderDetails as $item): ?>
                            <li>
                                <?= htmlspecialchars($item['product_name']) ?>
                                &times; <?= (int) $item['quantity'] ?> -
                                € <?= number_format((float) $item['price'], 2, ',', '') ?>
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

function renderAdminOrders(array $orders): void
{
    if (empty($orders)) {
        echo '<p>Geen orders gevonden.</p>';
        return;
    }

    foreach ($orders as $order) {
        ?>
        <form method="POST" action="<?= BASE_URL . '/actions/update-order-status-action.php' ?>"
              class="cart-item cart-header admin-order-form">
            <input type="hidden" name="order_id" value="<?= (int) $order['order_id'] ?>">

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
                        $selected = ((int) $order['status'] === $code) ? 'selected' : '';
                        echo "<option value=\"$code\" $selected>$label</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="order-details-panel">
                <p><strong class="bg-white">Order ID:</strong> <?= (int) $order['order_id'] ?></p>
                <p><strong class="bg-white">Client:</strong> <?= htmlspecialchars($order['client_username'] ?? 'Onbekend') ?></p>
                <p><strong class="bg-white">Datum:</strong> <?= htmlspecialchars($order['datetime'] ?? '') ?></p>
                <p><strong class="bg-white">Adres:</strong> <?= htmlspecialchars($order['address'] ?: 'Geen adres opgegeven') ?></p>

                <div class="order-items bg-white">
                    <?php
                    $orderDetails = $order['details'] ?? [];
                    if (!empty($orderDetails)):
                        ?>
                        <ul>
                            <?php foreach ($orderDetails as $item): ?>
                                <li>
                                    <?= htmlspecialchars($item['product_name']) ?>
                                    &times; <?= (int) $item['quantity'] ?> -
                                    € <?= number_format((float) $item['price'], 2, ',', '') ?>
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
