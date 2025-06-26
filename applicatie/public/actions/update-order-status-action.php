<?php

/**
 * update-order-status-action.php
 *
 * Public-Facing Entrypoint that routes to the internal update order status handler.
 */

require_once __DIR__ . '/../../src/handlers/update-order-status-handler.php';

handleUpdateOrderStatus();