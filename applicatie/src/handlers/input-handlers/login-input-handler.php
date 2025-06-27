<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../../bootstrap.php';

require_once BASE_DIR . '/src/data/data-users.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // CSRF Token Validation
    if (
        empty($_POST['csrf_token']) ||
        empty($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        http_response_code(403);
        exit('Ongeldige CSRF-token.');
    }
    unset($_SESSION['csrf_token']); // Invalidate token after use

    $username = trim($_POST["login-username"] ?? '');
    $password = $_POST["login-password"] ?? '';

    // Username or Password Empty
    if (empty($username) || empty($password)) {
        $_SESSION["login_error"] = "Gebruikersnaam en wachtwoord zijn verplicht.";
        header('Location: ' . LOGIN_PAGE);
        exit();
    }

    $user = loginUser($username, $password);

    // Password Incorrect
    if (!$user) {
        $_SESSION["login_error"] = "Gebruikersnaam of wachtwoord is incorrect.";
        header('Location: ' . LOGIN_PAGE);
        exit();
    }

    // Logged In
    authenticateUser($user["username"], $user["role"], $user["first_name"], $user["address"]);
    $_SESSION["is_logged_in"] = true;

    header('Location: ' . INDEX_PAGE);
    exit();
}

// If not POST, redirect to homepage
header('Location: ' . INDEX_PAGE);
exit();
