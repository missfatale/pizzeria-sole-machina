<?php

/**
 * logout-action.php
 *
 * Public-Facing Entrypoint that handles the logout request.
 * This file is only responsible for routing the request securely to the internal logout logic.
 */

require_once __DIR__ . '/../../src/handlers/logout-handler.php';