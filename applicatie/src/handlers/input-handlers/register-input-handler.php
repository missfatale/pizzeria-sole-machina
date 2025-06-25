<?php

// Bootstrap: Loads all Core Configurations and Path Handlers for the Project.
require_once __DIR__ . '/../../bootstrap.php';

require_once BASE_DIR . '/src/data/data-users.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["register-first_name"] ?? '';
    $last_name  = $_POST["register-last_name"] ?? '';
    $username   = $_POST["register-username"] ?? '';
    $password   = $_POST["register-password"] ?? '';
    $address    = trim($_POST["register-address"] ?? '');

    // Check verplichte velden
    if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($address)) {
        $_SESSION["register_error"] = "Alle velden zijn verplicht.";
        header('Location: ' . LOGIN_PAGE);
        exit();
    }

    // Probeer gebruiker aan te maken
    $user = registerUser($first_name, $last_name, $username, $password, $address);

    if (!$user) {
        $_SESSION["register_error"] = "Registratie mislukt. Gebruikersnaam bestaat mogelijk al.";
        header('Location: ' . LOGIN_PAGE);
        exit();
    }

    // Inloggen na succesvolle registratie
    authenticateUser($user["username"], $user["role"], $user["first_name"]);
    $_SESSION["is_logged_in"] = true;
    header('Location: ' . INDEX_PAGE);
    exit();
}

header('Location: ' . LOGIN_PAGE);
exit();
