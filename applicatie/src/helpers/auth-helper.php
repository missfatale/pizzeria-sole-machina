<?php

/**
 * auth-helper.php
 *
 * Helper Functions to simplify Access to Authentication State and User Data.
 * These are Safe to use across Views and Controllers.
 *
 * Functions:
 * - currentUser() returns the logged-in user's data or null.
 * - userIsLoggedIn() checks if the user is authenticated.
 * - isAdmin() Checks if the logged-in user has the 'Admin' role.
 */

function currentUser(): ?array {
    return isLoggedIn() ? getLoggedInUser() : null;
}

function userIsLoggedIn(): bool {
    return isLoggedIn();
}

function isAdmin(): bool {
    $user = currentUser();
    return $user && isset($user['role']) && $user['role'] === 'Admin';
}