<?php
require_once '../src/Ticket.php';
require_once '../src/QRGenerator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $method = $_POST['payment_method'];
    $code = uniqid('TKT_');
    $qr_path = QRGenerator::generate($code);
    Ticket::create($name, $email, $method, $code, $qr_path);
    echo "<h3>Ticket Created!</h3>";
    echo "<p>Code: $code</p>";
    echo "<img src='../$qr_path' alt='QR Code'>";
}
?>

<form method="POST">
  <label>Name:</label><input type="text" name="name" required><br>
  <label>Email:</label><input type="email" name="email" required><br>
  <label>Payment Method:</label>
  <select name="payment_method">
    <option value="Cash">Cash</option>
    <option value="EFT">EFT</option>
    <option value="SnapScan">SnapScan</option>
  </select><br>
  <button type="submit">Get Ticket</button>
</form>
