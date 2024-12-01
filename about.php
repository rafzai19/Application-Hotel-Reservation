<?php
// Array untuk informasi tentang hotel
$hotel_info = [
    "name" => "Hotel Royal Sabrine",
    "description" => "Hotel Royal Sabrine adalah hotel bintang 5 yang menawarkan kenyamanan dan kemewahan untuk setiap tamu. Terletak di pusat kota Jakarta, hotel ini menyediakan berbagai fasilitas terbaik, termasuk restoran dengan menu lokal dan internasional, kolam renang, spa, dan layanan kamar 24 jam.",
    "address" => "Jl. Merdeka No.123, Jakarta",
    "email" => "info@hotelroyalsabrine.com",
    "phone" => "021-12345678",
    "map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.212968366998!2d110.361998214781!3d-7.782743778741559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1fa3d6fe219d%3A0xa59dbfeb0a55e6!2sJl.%20Merdeka%20No.123!5e0!3m2!1sid!2sid!4v1676091532275!5m2!1sid!2sid",
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Hotel Royal Sabrine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        logo-center{
            height: 100px;
            width: auto;
            margin: 0;
            background-color: #4CAF50;
            align-items: center;
        }
        .my-logo {
            height: 100px;
            width: auto;
            margin: 0;
            background-color: #4CAF50;
            align-items: center;
        }

        /* Navbar */
        .navbar {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antara logo dan teks */
        }

        .navbar-brand .logo {
            height: 50px !important; /* Sesuaikan tinggi logo */
            width: auto !important; /* Pertahankan proporsi logo */
        }
        .navbar-brand h1 {
            font-size: 24px;
            margin: 0;
            color: white;
        }
        .navbar h1 {
            font-size: 24px;
            color: white;
        }

        .navbar input[type="text"] {
            padding: 5px;
            border-radius: 4px;
            border: none;
            width: 200px;
        }

        /* Tab Navigation */
        .tab-navigation {
            display: flex;
            justify-content: center;
            background-color: #f4f4f4;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tab-navigation a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .tab-navigation a:hover {
            background-color: #4CAF50;
            color: white;
        }

        /* Section Styling */
        section {
            padding: 20px;
        }

        section h2 {
            color: #4CAF50;
            margin-bottom: 15px;
        }

        /* Search Results Highlight */
        .highlight {
            background-color: yellow;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
        }

        .about-text {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

        footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-brand">
            <img src="assets/images/logohotel.png" alt="Logo Hotel Royal Sabrine" class="logo my-logo">
            <h1>Hotel Royal Sabrine</h1>
        </div>
        <input type="text" id="search-bar" placeholder="Cari...">
    </div>

    <!-- Tab Navigation -->
    <div class="tab-navigation">
        <a href="index.php">Produk</a>
        <a href="pricing.php">Daftar Harga</a>
        <a href="form.php">Pesan Kamar</a>
        <a href="about.php">Tentang Kami</a>
    </div>

    <div class="container">
        <h1>Tentang Kami - <?= htmlspecialchars($hotel_info['name']) ?></h1>
        <center><img src="assets/images/colorlogohotel.png" alt="Logo Hotel Royal Sabrine"class="logo my-logo"></center>

        <section class="about-text">
            <p><?= htmlspecialchars($hotel_info['description']) ?></p>
            <p><strong>Alamat:</strong> <?= htmlspecialchars($hotel_info['address']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($hotel_info['email']) ?></p>
            <p><strong>Telp:</strong> <?= htmlspecialchars($hotel_info['phone']) ?></p>
        </section>

        <section>
            <h2>Lokasi Kami</h2>
            <iframe src="<?= htmlspecialchars($hotel_info['map']) ?>" allowfullscreen></iframe>
        </section>
    </div>

    <footer>
        <p><strong>Hotel Royal Sabrine</strong></p>
        <p>Alamat: <?= htmlspecialchars($hotel_info['address']) ?></p>
        <p>Email: <?= htmlspecialchars($hotel_info['email']) ?></p>
        <p>Telp: <?= htmlspecialchars($hotel_info['phone']) ?></p>
    </footer>
</body>
</html>