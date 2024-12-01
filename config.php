<?php
// config.php
$host = "localhost"; // Server database
$dbname = "hotel_booking"; // Nama database
$username = "root"; // Username MySQL
$password = ""; // Password MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
