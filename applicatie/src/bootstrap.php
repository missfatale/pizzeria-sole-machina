<?php

/**
 * bootstrap.php
 *
 * Core Initializer for the Application.
 * Loads Path Handling, Session Handling, View Functions, Authentication, Config, and Shared Constants.
 */

// Load Path Handler (defines BASE_DIR and BASE_URL)
require_once __DIR__ . '/../src/handlers/path-handler.php';

// Start Session and Manage Session Defaults
require_once BASE_DIR . '/src/handlers/session-handler.php';

// Load Authentication Functions (like isLoggedIn, authenticateUser, logout, etc.)
require_once BASE_DIR . '/src/auth.php';

// Load View Rendering (like view-functions, view-orders, etc.)
require_once BASE_DIR . '/src/view/view-functions.php';
require_once BASE_DIR . '/src/view/view-orders.php';

// Load Helper Functions
require_once BASE_DIR . '/src/helpers/auth-helper.php';
require_once BASE_DIR . '/src/helpers/order-helper.php';
require_once BASE_DIR . '/src/helpers/image-helper.php';
require_once BASE_DIR . '/src/helpers/cart-helper.php';

// Load Configuration (Title, Charset, Language, etc.)
$config = require_once 'config.php';

define('WEBSITE_TITLE', $config['websiteTitle']);
define('CHARSET', $config['websiteCharset']);
define('WEBSITE_LANGUAGE', $config['websiteLanguage']);
define('COPYRIGHT_YEAR', $config['websiteCopyrightYear']);

// Common Page Paths (Clean, Reusable Constants for Redirects and Navigation)
const LOGIN_PAGE = BASE_URL . '/login.php';
const INDEX_PAGE = BASE_URL . '/index.php';
const ACCOUNT_PAGE = BASE_URL . '/account.php';
const CART_PAGE = BASE_URL . '/cart.php';
const ORDER_PAGE = BASE_URL . '/order.php';
const ADMIN_DASHBOARD_PAGE = BASE_URL . '/admin/dashboard.php';
const ORDER_CONFIRMATION_PAGE = BASE_URL . '/order-success.php';
const FOURZEROFOUR_PAGE = BASE_URL . '/404.php';

/**
 * Get the currently logged-in user, if any.
 *
 * This function checks the session and retrieves the user data from the database.
 * It returns an associative array with user information or null if not logged in.
 *
 */
$user = getLoggedInUser();
