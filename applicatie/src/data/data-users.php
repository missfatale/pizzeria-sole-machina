<?php

// Connects to Database
require_once __DIR__ . '/../database/connect.php';

function loginUser($username, $password): ? array {
    $db = maakVerbinding();
    $sql = "SELECT * FROM [User] WHERE username = :username";
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    // If Password is Hashed we Check it.
    if ($user && password_verify($password, $user['password'])) {
        unset($user['password']);
        return $user;
    }
    return null;
}

function registerUser($first_name, $last_name, $username, $password, $address, $role = 'Client') {
    $db = maakVerbinding();

    // Check if User Exists
    $sql = "SELECT COUNT(*) FROM [User] WHERE username = :username";
    $check = $db->prepare($sql);
    $check->bindParam(':username', $username, PDO::PARAM_STR);
    $check->execute();
    if ($check->fetchColumn() > 0) {
        return null;
    }

    // Hash Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert User
    $sql = "INSERT INTO [User] (first_name, last_name, username, password, address, role)
            VALUES (:first_name, :last_name, :username, :password, :address, :role)";
    $query = $db->prepare($sql);
    $query->bindParam(':first_name', $first_name);
    $query->bindParam(':last_name', $last_name);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $hashedPassword);
    $query->bindParam(':address', $address);
    $query->bindParam(':role', $role);
    $query->execute();

    // Give New Registered User Back
    $sql = "SELECT * FROM [User] WHERE username = :username";
    $select = $db->prepare($sql);
    $select->bindParam(':username', $username);
    $select->execute();
    $user = $select->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        unset($user['password']);
        return $user;
    }
    return null;
}
