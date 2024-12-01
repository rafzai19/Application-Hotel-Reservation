<?php
// Ambil data dari form sebelumnya
$fullName = isset($_POST['name']) ? $_POST['name'] : '';
$identityNumber = isset($_POST['identity_number']) ? $_POST['identity_number'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$roomType = isset($_POST['room_type']) ? $_POST['room_type'] : ''; // Cek apakah ada tipe kamar
$checkInDate = isset($_POST['check_in_date']) ? $_POST['check_in_date'] : '';
$checkOutDate = isset($_POST['check_out_date']) ? $_POST['check_out_date'] : '';
$includeBreakfast = isset($_POST['breakfast']); // Menangkap apakah breakfast dipilih

// Jika $roomType kosong, set default atau hentikan eksekusi
if (empty($roomType)) {
    die("Tipe kamar tidak ditemukan, silakan kembali ke halaman sebelumnya.");
}

// Biaya breakfast
$breakfastCost = 80000; // Biaya breakfast per malam

// Data gambar kamar
$roomImages = [
    "Standar" => "assets/images/standard-room.jpg",
    "Deluxe" => "assets/images/deluxe-room.jpg",
    "Family" => "assets/images/family-room.jpg"
];

// Tentukan harga kamar
$roomPrices = [
    "Standar" => 500000,
    "Deluxe" => 700000,
    "Family" => 1000000
];

// Fungsi untuk menghitung total biaya
function calculateTotalCost($roomType, $checkInDate, $checkOutDate, $includeBreakfast)
{
    global $roomPrices, $breakfastCost;

    $daysStayed = (strtotime($checkOutDate) - strtotime($checkInDate)) / (60 * 60 * 24);
    $roomCost = $roomPrices[$roomType] * $daysStayed;
    $breakfastCostTotal = $includeBreakfast ? $breakfastCost * $daysStayed : 0;

    // Cek jika $roomType ada dalam $roomPrices
    if (!isset($roomPrices[$roomType])) {
        die("Tipe kamar tidak valid.");
    }

    $daysStayed = (strtotime($checkOutDate) - strtotime($checkInDate)) / (60 * 60 * 24);
    $roomCost = $roomPrices[$roomType] * $daysStayed;
    $breakfastCostTotal = $includeBreakfast ? $breakfastCost * $daysStayed : 0;

    // Diskon 10% jika menginap lebih dari 3 malam
    $discount = $daysStayed > 3 ? 0.1 : 0;
    $discountAmount = $roomCost * $discount;

    $totalCost = $roomCost + $breakfastCostTotal - $discountAmount;

    return [
        'roomCost' => $roomCost,
        'breakfastCost' => $breakfastCostTotal,
        'discountAmount' => $discountAmount,
        'totalCost' => $totalCost
    ];
}

// Hitung biaya total berdasarkan data yang ada
$costDetails = calculateTotalCost($roomType, $checkInDate, $checkOutDate, $includeBreakfast);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Pembayaran - Hotel Royal Sabrine</title>
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

        .container {
            width: 100%;
            max-width: 900px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .payment-methods {
            margin-bottom: 30px;
        }

        .payment-methods label {
            text-align: center;
            display: inline-block;
            margin: 10px;
        }

        .payment-methods img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .total-cost {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #e9f7e9;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #45a049;
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
        <h1>Rincian Pembayaran</h1>

        <!-- Rincian Pemesanan Tabel -->
        <table>
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($fullName) ?></td>
            </tr>
            <tr>
                <th>Nomor ID</th>
                <td><?= htmlspecialchars($identityNumber) ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= htmlspecialchars($gender) ?></td>
            </tr>
            <tr>
                <th>Tipe Kamar</th>
                <td><?= htmlspecialchars($roomType) ?></td>
            </tr>
            <tr>
                <th>Durasi Penginapan</th>
                <td><?= (strtotime($checkOutDate) - strtotime($checkInDate)) / (60 * 60 * 24) ?> malam</td>
            </tr>
            <tr>
                <th>Total Harga Kamar</th>
                <td>Rp <?= number_format($costDetails['roomCost'], 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Breakfast</th>
                <td><?= $includeBreakfast ? "Ya (Rp 80.000 per malam)" : "Tidak" ?></td>
            </tr>
            <tr>
                <th>Harga Sebelum Diskon</th>
                <td>Rp <?= number_format($costDetails['roomCost'] + $costDetails['breakfastCost'], 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Diskon (10%)</th>
                <td>Rp <?= number_format($costDetails['discountAmount'], 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Total Biaya</th>
                <td>Rp <?= number_format($costDetails['totalCost'], 0, ',', '.') ?></td>
            </tr>
        </table>
        
        <!-- Metode Pembayaran -->
        <div class="payment-methods">
            <p><strong>Pilih Metode Pembayaran:</strong></p>

            <label>
                <input type="radio" name="payment_method" value="qris">
                <img src="assets/images/qris-logo.png" alt="QRIS">
            </label>

            <label>
                <input type="radio" name="payment_method" value="bca">
                <img src="assets/images/bca-logo.png" alt="BCA">
            </label>

            <label>
                <input type="radio" name="payment_method" value="bri">
                <img src="assets/images/bri-logo.png" alt="BRI">
            </label>

            <label>
                <input type="radio" name="payment_method" value="mandiri">
                <img src="assets/images/mandiri-logo.png" alt="Mandiri">
            </label>

            <label>
                <input type="radio" name="payment_method" value="bni">
                <img src="assets/images/bni-logo.png" alt="BNI">
            </label>

            <label>
                <input type="radio" name="payment_method" value="gopay">
                <img src="assets/images/gopay-logo.png" alt="Gopay">
            </label>

            <label>
                <input type="radio" name="payment_method" value="ovo">
                <img src="assets/images/ovo-logo.png" alt="Ovo">
            </label>

            <label>
                <input type="radio" name="payment_method" value="dana">
                <img src="assets/images/dana-logo.png" alt="Dana">
            </label>
        </div>

        <!-- Total Biaya -->
        <div class="total-cost">
            <p><strong>Total Pembayaran: Rp <?= number_format($costDetails['totalCost'], 0, ',', '.') ?></p>
        </div>

        <button onclick="alert('Pembayaran Berhasil!')">Lanjutkan Pembayaran</button>
    </div>
</body>
</html>

    <!-- Footer -->
    <footer>
        <p><strong>Hotel Royal Sabrine</strong></p>
        <p>Alamat: Jl. Merdeka No.123, Jakarta</p>
        <p>Email: info@hotelroyalsabrine.com</p>
        <p>Telp: 021-12345678</p>
    </footer>

    <script>
        function showUniqueCode() {
            const paymentMethod = document.getElementById('payment-method').value;
            const uniqueCode = document.getElementById('unique-code');
            if (paymentMethod) {
                uniqueCode.style.display = 'block';
            } else {
                uniqueCode.style.display = 'none';
            }
        }
    </script>
</body>
</html>