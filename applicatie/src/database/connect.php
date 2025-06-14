<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$serverName = $_ENV['DB_HOST'];
$database   = $_ENV['DB_NAME'];
$username   = $_ENV['DB_USER'];
$password   = $_ENV['DB_PASS'];

try {
    $dsn = "sqlsrv:Server=$serverName;Database=$database";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Database verbinding geslaagd!";
} catch (PDOException $e) {
    //echo "Database verbinding mislukt: " . $e->getMessage();
}

function connect() {
    global $conn;
    return $conn;
}