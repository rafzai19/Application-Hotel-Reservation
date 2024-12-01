<?php
// Array untuk data harga kamar dan menu restoran
$room_prices = [
    "Standar" => 500000,
    "Deluxe" => 700000,
    "Family" => 1000000,
];

$menu_food = [
    "Nasgor Spesial" => 50000,
    "Steak Sapi" => 120000,
    "Ayam Bakar" => 60000,
    "Salad Caesar" => 40000,
];

$menu_drinks = [
    "Kopi" => 30000,
    "Teh Tarik" => 25000,
    "Jus Jeruk" => 35000,
    "Es Kelapa" => 20000,
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga - Hotel Royal Sabrine</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .my-logo {
            height: 50px;
            width: auto;
            margin: 0;
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
            margin: 0;
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

        h1, h2, h3 {
            text-align: center;
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f4f4f9;
        }

        .menu-section {
            margin-top: 30px;
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
        <h1>Daftar Harga - Hotel Royal Sabrine</h1>

        <section>
            <h2>Harga Kamar</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tipe Kamar</th>
                        <th>Harga per Malam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($room_prices as $room_type => $price): ?>
                    <tr>
                        <td><?= htmlspecialchars($room_type) ?></td>
                        <td>Rp<?= number_format($price, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class="menu-section">
            <h3>Menu Makanan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Menu Makan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($menu_food as $food => $price): ?>
                    <tr>
                        <td><?= htmlspecialchars($food) ?> </td>
                        <td>Rp<?= number_format($price, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Menu Minuman</h3>
            <table>
                <thead>
                    <tr>
                        <th>Menu Minum</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($menu_drinks as $drink => $price): ?>
                    <tr>
                        <td><?= htmlspecialchars($drink) ?></td>
                        <td>Rp<?= number_format($price, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer>
        <p><strong>Hotel Royal Sabrine</strong></p>
        <p>Alamat: Jl. Merdeka No.123, Jakarta</p>
        <p>Email: info@hotelroyalsabrine.com</p>
        <p>Telp: 021-12345678</p>
    </footer>
</body>
</html>