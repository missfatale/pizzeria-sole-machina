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
    unset($_SESSION['csrf_token']);

    $first_name = trim($_POST["register-first_name"] ?? '');
    $last_name  = trim($_POST["register-last_name"] ?? '');
    $username   = trim($_POST["register-username"] ?? '');
    $password   = $_POST["register-password"] ?? '';
    $address    = trim($_POST["register-address"] ?? '');

    if ($first_name === '' || $last_name === '' || $username === '' || $password === '') {
        $_SESSION["register_error"] = "Alle verplichte velden moeten worden ingevuld.";
        header('Location: ' . LOGIN_PAGE);
        exit();
    }

    // Attempt to Register the User
    $result = registerUser($first_name, $last_name, $username, $password, $address);

    if ($result === true) {
        // After Successful Registration, Automatically Login the User
        $user = loginUser($username, $password);
        if ($user) {
            authenticateUser($user["username"], $user["role"], $user["first_name"], $user["address"]);
            $_SESSION["is_logged_in"] = true;
            header('Location: ' . INDEX_PAGE);
            exit();
        } else {
            // Something went wrong during login after registration
            $_SESSION["register_error"] = "Registratie gelukt, maar inloggen mislukt. Probeer opnieuw.";
            header('Location: ' . LOGIN_PAGE);
            exit();
        }
    } else {
        // $result contains error message string
        $_SESSION["register_error"] = $result;
        header('Location: ' . LOGIN_PAGE);
        exit();
    }
}

header('Location: ' . INDEX_PAGE);
exit();