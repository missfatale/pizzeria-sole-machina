<?php

// Adds Path Handling Functionality
require_once __DIR__ . '/../path-handler.php';

$REGISTER_PAGE = BASE_URL . '/../register.php';
$INDEX_PAGE = BASE_URL . '/../index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST["register-first_name"]);
    $lastName = htmlspecialchars($_POST["register-last_name"]);
    $geboortedatum = htmlspecialchars($_POST["register-geboortedatum"]);
    $username = htmlspecialchars($_POST["register-username"]);
    $password = htmlspecialchars($_POST["register-password"]);
    $email = htmlspecialchars($_POST["register-email"]);
    $mobile = htmlspecialchars($_POST["register-mobile"]);
    $postcode = htmlspecialchars($_POST["register-postcode"]);
    $address = htmlspecialchars($_POST["register-address"]);

    if (empty($firstName) || empty($lastName) || empty($geboortedatum) || empty($username) || empty($password) || empty($email) || empty($mobile) || empty($postcode) || empty($address)) {
        header("Location: $REGISTER_PAGE");
        exit();
    }
}

else {
    header("Location: $REGISTER_PAGE");
    exit();
}