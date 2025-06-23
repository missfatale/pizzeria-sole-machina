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

// Load View Rendering Functions (like viewLoginForm, viewRegisterForm, etc.)
require_once BASE_DIR . '/src/view/view-functions.php';

// Load Authentication Functions (like isLoggedIn, authenticateUser, logout, etc.)
require_once BASE_DIR . '/src/auth.php';

// Load Authentication Helper Functions (like currentUser, userIsLoggedIn, etc.)
require_once BASE_DIR . '/src/helpers/auth-helper.php';

// Load Configuration (Title, Charset, Language, etc.)
$config = require_once 'config.php';

define('WEBSITE_TITLE', $config['websiteTitle']);
define('CHARSET', $config['websiteCharset']);
define('WEBSITE_LANGUAGE', $config['websiteLanguage']);

// Common Page Paths (Clean, Reusable Constants for Redirects and Navigation)
const LOGIN_PAGE = BASE_URL . '/login.php';
const INDEX_PAGE = BASE_URL . '/index.php';
const ACCOUNT_PAGE = BASE_URL . '/account.php';
const CART_PAGE = BASE_URL . '/cart.php';
const LOGOUT_PAGE = BASE_URL . '/actions/logout-action.php';
const ADMIN_DASHBOARD_PAGE = BASE_URL . '/admin/dashboard.php';