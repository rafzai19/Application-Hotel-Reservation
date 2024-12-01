<?php
$host = 'localhost'; // Lokasi server database
$username = 'root'; // Username MySQL (default: root)
$password = ''; // Password MySQL (kosong jika default)
$dbname = 'hotel_booking'; // Nama database yang Anda buat

// Buat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
