<?php
function calculateTotal($type, $days, $breakfast) {
    $prices = [
        'Standar' => 300000,
        'Deluxe' => 500000,
        'Family' => 700000,
    ];

    $basePrice = $prices[$type] * $days;

    if ($days > 3) {
        $basePrice *= 0.9; // Diskon 10%
    }

    if ($breakfast) {
        $basePrice += 80000;
    }

    return $basePrice;
}
?>
