<?php
$query = isset($_GET['query']) ? $_GET['query'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h1>Hasil Pencarian untuk "<?= htmlspecialchars($query) ?>"</h1>
        <p>Fitur pencarian ini dapat dihubungkan dengan database atau logika pencarian.</p>
    </div>

    <footer>
        <p>&copy; 2024 Hotel Royal Sabrine. All Rights Reserved.</p>
    </footer>
</body>
</html>
