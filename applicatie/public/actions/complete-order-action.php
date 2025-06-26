<?php
/**
 * complete-order-action.php
 *
 * Public-facing entrypoint routing to internal complete order handler.
 */

require_once __DIR__ . '/../../src/handlers/complete-order-handler.php';

handleCompleteOrder();
