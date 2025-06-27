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

function registerUser(string $first_name, string $last_name, string $username, string $password, string $address, string $role = 'Client'): bool|string {
    $db = maakVerbinding();

    // Check if User Exists
    $sql = "SELECT COUNT(*) FROM [User] WHERE username = :username";
    $check = $db->prepare($sql);
    $check->bindParam(':username', $username, PDO::PARAM_STR);
    $check->execute();

    if ($check->fetchColumn() > 0) {
        return "Gebruikersnaam bestaat al.";
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

    if (!$query->execute()) {
        return "Registratie mislukt door een databasefout.";
    }

    return true; // Registration succeeded
}
