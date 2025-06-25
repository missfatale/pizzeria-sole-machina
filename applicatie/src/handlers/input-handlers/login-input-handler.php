<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../../bootstrap.php';

require_once BASE_DIR . '/src/data/data-users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["login-username"]);
    $password = $_POST["login-password"];

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
    else {
        authenticateUser($user["username"], $user["role"], $user["first_name"]);
        $_SESSION["is_logged_in"] = true;

        header('Location: ' . INDEX_PAGE);
        exit();
    }
}

header('Location: ' . INDEX_PAGE);
exit();