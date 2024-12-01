<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Royal Sabrine</title>
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

        /* Main Content */
        .content {
            margin-left: 0;
            transition: all 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }

        /* Hamburger Icon */
        .menu-toggle {
            font-size: 20px;
            cursor: pointer;
            color: white;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        footer p {
            margin: 5px 0;
        }

        /* Product Section */
        .products {
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product h3 {
            margin: 10px 0;
            color: #4CAF50;
        }

        .product button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .product button:hover {
            background-color: #45a049;
        }

        .product .rating {
            color: #FFD700;
            margin: 5px 0;
        }

        /* Detail Modal */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            width: 80%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 1000;
        }

        .modal.active {
            display: block;
        }

        .modal h3 {
            color: #4CAF50;
            margin-bottom: 10px;
        }

        .modal p {
            margin: 10px 0;
        }

        .modal .actions {
            display: flex;
            justify-content: space-between;
        }

        .modal .btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .modal .btn-back {
            background-color: #d32f2f;
            color: white;
        }

        .modal .btn-book {
            background-color: #4CAF50;
            color: white;
        }

        .modal .btn:hover {
            opacity: 0.9;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .overlay.active {
            display: block;
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
    <!-- Main Content -->
    <div class="content" id="content">
        <section id="products">
            <h2>Produk</h2>
            <div class="products">
                <!-- Produk Standar -->
                <div class="product">
                    <img src="assets/images/standard-room.jpg" alt="Standar Room">
                    <h3>Kamar Standar</h3>
                    <h5>Rp 500.000/malam</h5>
                    <div class="rating">⭐⭐⭐⭐</div>
                    <button onclick="showDetail('standar')">Detail</button>
                </div>

                <!-- Produk Deluxe -->
                <div class="product">
                    <img src="assets/images/deluxe-room.jpg" alt="Deluxe Room">
                    <h3>Kamar Deluxe</h3>
                    <h5>Rp 700.000/malam</h5>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <button onclick="showDetail('deluxe')">Detail</button>
                </div>

                <!-- Produk Family -->
                <div class="product">
                    <img src="assets/images/family-room.jpg" alt="Family Room">
                    <h3>Kamar Family</h3>
                    <h5>Rp 1.000.000/malam</h5>
                    <div class="rating">⭐⭐⭐⭐⭐</div>
                    <button onclick="showDetail('family')">Detail</button>
                </div>
            </div>
        </section>
    </div>

    <!-- Detail Modal -->
    <div class="modal" id="modal">
        <h3 id="modal-title"></h3>
        <p id="modal-desc"></p>
        <p id="modal-capacity"></p>
        <p id="modal-facilities"></p>
        <div class="actions">
            <button class="btn btn-back" onclick="closeDetail()">Kembali</button>
            <button class="btn btn-book" onclick="bookNow()">Booking Sekarang</button>
        </div>
    </div>
    <div class="overlay" id="overlay" onclick="closeDetail()"></div>

    <!-- Footer -->
    <footer id="about">
        <p><strong>Hotel Royal Sabrine</strong></p>
        <p>Alamat: Jl. Merdeka No.123, Jakarta</p>
        <p>Email: info@hotelroyalsabrine.com</p>
        <p>Telp: 021-12345678</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        }

        function showDetail(type) {
            const modal = document.getElementById('modal');
            const overlay = document.getElementById('overlay');
            const title = document.getElementById('modal-title');
            const desc = document.getElementById('modal-desc');
            const capacity = document.getElementById('modal-capacity');
            const facilities = document.getElementById('modal-facilities');

        function showPricing() {
        document.getElementById('pricing').scrollIntoView();
        }

        function showAbout() {
            document.getElementById('about').scrollIntoView();
        }

        function showDetail(type) {
            alert('Showing details for ' + type);
        }

            const details = {
                'standar': {
                    title: 'Kamar Standar',
                    desc: 'Kamar nyaman dengan harga terjangkau.',
                    capacity: 'Kapasitas: 2 orang.',
                    facilities: 'Fasilitas: AC, TV, WiFi.'
                },
                'deluxe': {
                    title: 'Kamar Deluxe',
                    desc: 'Kamar dengan desain modern dan fasilitas premium.',
                    capacity: 'Kapasitas: 2 orang.',
                    facilities: 'Fasilitas: AC, TV, WiFi, Mini Bar.'
                },
                'family': {
                    title: 'Kamar Family',
                    desc: 'Kamar luas cocok untuk keluarga.',
                    capacity: 'Kapasitas: 4 orang.',
                    facilities: 'Fasilitas: AC, TV, WiFi, Ruang Tamu.'
                }
            };

            title.textContent = details[type].title;
            desc.textContent = details[type].desc;
            capacity.textContent = details[type].capacity;
            facilities.textContent = details[type].facilities;

            modal.classList.add('active');
            overlay.classList.add('active');
        }

        function closeDetail() {
            const modal = document.getElementById('modal');
            const overlay = document.getElementById('overlay');
            modal.classList.remove('active');
            overlay.classList.remove('active');
        }

        function bookNow() {
            window.location.href = "form.php";
        }
    </script>
</body>
</html>