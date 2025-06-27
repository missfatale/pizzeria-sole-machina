<?php

/**
 * session-handler.php
 *
 * Starts a secure PHP session if not already active.
 * Enhances session security by setting recommended cookie flags.
 */

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1); // Protect session from JS
    ini_set('session.use_strict_mode', 1); // Prevent session Fixation
    //ini_set('session.cookie_secure', 1); // Consider Adding This Enforces HTTPS-Only Cookie (Production Only)
    session_set_cookie_params(['samesite' => 'Strict']); // CSRF protection
    session_start();
}