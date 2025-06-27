<?php
/**
 * session-handler.php
 *
 * Starts a secure PHP session if not already active.
 * Enhances session security by setting recommended cookie flags.
 * Generates CSRF token once per session.
 */

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_strict_mode', 1);
    // ini_set('session.cookie_secure', 1); // Enable in production with HTTPS
    session_set_cookie_params(['samesite' => 'Strict']);
    session_start();
}

if (empty($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32)); // Fallback less secure
    }
}
