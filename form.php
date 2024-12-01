<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kamar - Hotel Royal Sabrine</title>
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

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 10px;
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

        .room-image {
            width: 100%;
            margin-top: 20px;
            object-fit: cover;
            border-radius: 8px;
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
        .warning {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
    <?php
// Sertakan file konfigurasi database
include 'config.php';

// Data gambar kamar berdasarkan tipe kamar
$roomImages = [
    "Standar" => "assets/images/standard-room.jpg",
    "Deluxe" => "assets/images/deluxe-room.jpg",
    "Family" => "assets/images/family-room.jpg"
];

$errorMessages = [];

// Validasi Backend Saat Form Dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['name'] ?? ''; // Pastikan ini diambil dengan benar dari form
    $identityNumber = $_POST['identity_number'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $roomType = $_POST['room_type'] ?? '';
    $checkInDate = $_POST['check_in_date'] ?? '';
    $checkOutDate = $_POST['check_out_date'] ?? '';

    // Validasi Nama Lengkap
    if (empty($fullName)) {
        $errorMessages[] = "Nama lengkap wajib diisi.";
    }

    // Validasi Nomor Identitas
    if (strlen($identityNumber) !== 16 || !ctype_digit($identityNumber)) {
        $errorMessages[] = "Nomor identitas harus 16 digit angka.";
    }

    // Validasi Tanggal Check-In
    $today = date('Y-m-d');
    if (empty($checkInDate) || $checkInDate < $today) {
        $errorMessages[] = "Tanggal check-in harus hari ini atau lebih.";
    }

    // Validasi Tanggal Check-Out
    if (empty($checkOutDate) || $checkOutDate <= $checkInDate) {
        $errorMessages[] = "Tanggal check-out harus lebih besar dari tanggal check-in.";
    }

    // Tentukan gambar kamar berdasarkan tipe kamar
    $roomImage = $roomImages[$roomType] ?? ''; // Pastikan $roomImage terisi sesuai pilihan tipe kamar

    // Jika tidak ada error, simpan data
    if (empty($errorMessages)) {
        try {
            // Koneksi ke database (ganti dengan koneksi asli Anda)
            include 'config.php'; // Pastikan koneksi database sudah benar

            // Query SQL untuk menyimpan data
            $stmt = $conn->prepare("INSERT INTO bookings (full_name, identity_number, gender, room_type, check_in_date, check_out_date, room_image) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$fullName, $identityNumber, $gender, $roomType, $checkInDate, $checkOutDate, $roomImage]);

            echo "<script>alert('Pemesanan berhasil disimpan!');</script>";
        } catch (PDOException $e) {
            // Tangani error jika terjadi kesalahan saat menyimpan ke database
            echo "Error: " . $e->getMessage();
        }
         // Redirect ke payment.php
         header("Location: payment.php");
         exit; // Pastikan script berhenti setelah redirect
    }
}
?>
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
        <h1>Form Pemesanan Kamar</h1>
        <form action="payment.php" method="POST">
            <label for="name">Nama Lengkap:</label>
            <input type="text" name="name" id="name" required>

            <label for="identity_number">Nomor Identitas:</label>
            <input type="text" name="identity_number" id="identity_number" maxlength="16" required>
            <p class="warning" id="identity_warning" style="display: none;">Nomor identitas harus 16 digit angka.</p>

            <label for="gender">Jenis Kelamin:</label>
            <select name="gender" id="gender" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <!-- Form fields lainnya -->
            <label for="room_type">Tipe Kamar:</la>
            <select name="room_type" id="room_type" required>
                <option value="Standar">Standar</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Family">Family</option>
            </select>
            <!-- Tipe kamar yang dipilih akan dikirim ke payment.php -->

             <!-- Gambar Kamar -->
             <img id="room-image" src="<?= $roomImages['Standar'] ?>" alt="Room Image" class="room-image">


             <label for="check_in_date">Tanggal Check-In:</label>
            <input type="date" name="check_in_date" id="check_in_date" required>
            <p class="warning" id="check_in_warning" style="display: none;">Tanggal check-in tidak valid.</p>

            <label for="check_out_date">Tanggal Check-Out:</label>
            <input type="date" name="check_out_date" id="check_out_date" required>
            <p class="warning" id="check_out_warning" style="display: none;">Tanggal check-out tidak boleh lebih awal dari check-in.</p>

            <!-- Pilihan Breakfast -->
            <label for="breakfast">Tambahkan Breakfast (Rp 80.000 per malam):</label>
            <input type="checkbox" name="breakfast" id="breakfast" <?= isset($_POST['breakfast']) ? 'checked' : '' ?>>

            <button type="submit">Pesan Kamar</button>
        </form>    
        </div>

    <!-- Footer -->
    <footer>
        <p><strong>Hotel Royal Sabrine</strong></p>
        <p>Alamat: Jl. Merdeka No.123, Jakarta</p>
        <p>Email: info@hotelroyalsabrine.com</p>
        <p>Telp: 021-12345678</p>
    </footer>

    <script>
        // Menampilkan gambar berdasarkan tipe kamar yang dipilih
        document.addEventListener("DOMContentLoaded", () => {
            const roomTypeSelect = document.getElementById("room_type");
            const roomImage = document.getElementById("room-image");

            const images = {
                "Standar": "assets/images/standard-room.jpg",
                "Deluxe": "assets/images/deluxe-room.jpg",
                "Family": "assets/images/family-room.jpg"
            };

            roomTypeSelect.addEventListener("change", () => {
                const selectedType = roomTypeSelect.value;
                roomImage.src = images[selectedType];
            });
        });

         // Data gambar kamar berdasarkan tipe (diambil dari PHP)
        const roomImages = <?= json_encode($roomImages) ?>;

        // Perbarui gambar kamar berdasarkan pilihan tipe kamar
        document.getElementById('room_type').addEventListener('change', function () {
            const selectedRoomType = this.value;
            const roomImageElement = document.getElementById('room-image');

            // Perbarui src gambar sesuai tipe kamar yang dipilih
            roomImageElement.src = roomImages[selectedRoomType];
        });

       // Validasi Nomor Identitas
       document.getElementById('identity_number').addEventListener('input', function () {
            const value = this.value;
            const warning = document.getElementById('identity_warning');
            if (value.length !== 16 || isNaN(value)) {
                warning.style.display = 'block';
            } else {
                warning.style.display = 'none';
            }
        });

        // Validasi Tanggal Check-In
        document.getElementById('check_in_date').addEventListener('change', function () {
            const today = new Date();
            const checkInDate = new Date(this.value);
            const warning = document.getElementById('check_in_warning');
            if (checkInDate < today.setHours(0, 0, 0, 0)) {
                warning.style.display = 'block';
                this.value = ''; // Reset jika tidak valid
            } else {
                warning.style.display = 'none';
            }
        });

        // Validasi Tanggal Check-Out
        document.getElementById('check_out_date').addEventListener('change', function () {
            const checkInDate = new Date(document.getElementById('check_in_date').value);
            const checkOutDate = new Date(this.value);
            const warning = document.getElementById('check_out_warning');
            if (checkOutDate <= checkInDate) {
                warning.style.display = 'block';
                this.value = ''; // Reset jika tidak valid
            } else {
                warning.style.display = 'none';
            }
        });

        // Perbarui gambar kamar
        document.getElementById('room_type').addEventListener('change', function () {
            const selectedRoomType = this.value;
            document.getElementById('room-image').src = roomImages[selectedRoomType];
        });

        // Validasi akhir saat form disubmit
        form.addEventListener('submit', function (event) {
            let valid = true;

            // Validasi Nomor Identitas
            const identityNumber = document.getElementById('identity_number').value;
            if (identityNumber.length !== 16 || isNaN(identityNumber)) {
                valid = false;
                document.getElementById('identity_warning').style.display = 'block';
            }

            // Validasi Tanggal Check-In
            const checkInDate = document.getElementById('check_in_date').value;
            const today = new Date();
            if (!checkInDate || new Date(checkInDate) < today.setHours(0, 0, 0, 0)) {
                valid = false;
                document.getElementById('check_in_warning').style.display = 'block';
            }

            // Validasi Tanggal Check-Out
            const checkOutDate = document.getElementById('check_out_date').value;
            if (!checkOutDate || new Date(checkOutDate) <= new Date(checkInDate)) {
                valid = false;
                document.getElementById('check_out_warning').style.display = 'block';
            }

            if (!valid) {
                event.preventDefault();
                // Pindah ke elemen pertama yang memiliki kesalahan
                document.querySelector('.warning[style*="block"]').scrollIntoView({ behavior: 'smooth' });
                alert('Silakan perbaiki kesalahan input sebelum melanjutkan.');
            }
        }); 

    </script>
</body>
</html>