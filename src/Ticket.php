<?php
require_once __DIR__ . '/../config/db.php';

class Ticket {
    public static function create($name, $email, $method, $code, $qr_path) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO tickets (name, email, payment_method, ticket_code, qr_path) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $method, $code, $qr_path]);
    }

    public static function validate($code) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM tickets WHERE ticket_code = ?");
        $stmt->execute([$code]);
        return $stmt->fetch();
    }
}
