<?php
// Hubungkan ke database
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $room_type = $_POST['room_type'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $duration = $_POST['duration'];
    $discount = $_POST['discount'];

    // Query untuk menyimpan data ke tabel bookings
    $stmt = $conn->prepare("INSERT INTO bookings (name, room_type, check_in_date, check_out_date, duration, discount) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $room_type, $check_in_date, $check_out_date, $duration, $discount);

    // Jalankan query dan periksa hasil
    if ($stmt->execute()) {
        echo "Pemesanan berhasil disimpan!";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>
