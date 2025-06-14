<?php

// Adds Path Handling Functionality
require_once __DIR__ . '/../path-handler.php';

$LOGIN_PAGE = BASE_URL . '/../login.php';
$INDEX_PAGE = BASE_URL . '/../index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["login-username"]);
    $password = $_POST["login-password"];

    if (empty($username) || empty($password)) {
        header("Location: $LOGIN_PAGE");
        exit();
    }
}

else {
    header("Location: $LOGIN_PAGE");
    exit();
}