<?php
$host = 'shinkansen.proxy.rlwy.net';           // Public Railway host
$port = 26593;                                  // Port for public access
$db   = 'railway';                              // Default database name
$user = 'root';                                 // Username
$pass = 'CLLEalwgSpDVGxCEjnUNwKbonlxvEBNy';     // Password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected successfully\n";
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
