<?php
require_once '../config/db.php';
require_once '../src/Ticket.php';
require_once '../src/QRGenerator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $method = $_POST['payment_method'];

    // Generate unique ticket code
    $code = uniqid('TKT_');

    // Generate QR code image and get its path
    $qr_path = QRGenerator::generate($code);

    // Save ticket to database
    Ticket::create($name, $email, $method, $code, $qr_path);

    // Display confirmation and QR code
    echo "<h3>✅ Ticket Created!</h3>";
    echo "<p><strong>Code:</strong> $code</p>";
    echo "<img src='../$qr_path' alt='QR Code'>";
    echo "<hr>";
}
?>

<h2>🎟️ Get Your Event Ticket</h2>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Payment Method:</label><br>
    <select name="payment_method">
        <option value="Cash">Cash</option>
        <option value="EFT">EFT</option>
        <option value="SnapScan">SnapScan</option>
    </select><br><br>

    <button type="submit">Generate Ticket</button>
</form>
