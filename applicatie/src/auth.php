<?php

/**
 * auth.php
 *
 * Handles User Authentication Logic Including Login Status, Session Handling,
 * and user information retrieval. Used throughout the application for access control.
 *
 * Functions:
 * - authenticateUser()     Stores user session data on login.
 * - isLoggedIn()           Checks if a user is currently authenticated.
 * - getLoggedInUser()      Retrieves user details from the session.
 * - logout()               Destroys session and logs out the user.
 */

function authenticateUser(string $username, string $role, string $firstname): void {
    $_SESSION['hasLoggedIn'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['login_time'] = time();
}

function isLoggedIn(): bool {
    return isset($_SESSION['hasLoggedIn']) && $_SESSION['hasLoggedIn'] === true;
}

function getLoggedInUser(): ?array {
    if (!isLoggedIn()) return null;

    return [
        'username'  => $_SESSION['username'] ?? null,
        'role'      => $_SESSION['role'] ?? null,
        'firstname' => $_SESSION['firstname'] ?? null,
    ];
}

function logout(): void {
    session_unset();
    session_destroy();
}
