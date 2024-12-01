document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const idNumberInput = document.querySelector("input[name='id_number']");
    const durationInput = document.querySelector("input[name='duration']");
    const roomTypeSelect = document.querySelector("select[name='room_type']");
    const breakfastCheckbox = document.querySelector("input[name='breakfast']");
    const totalButton = document.querySelector("#calculate-total");
    const totalField = document.querySelector("#total-payment");

    // Validasi Nomor Identitas (16 digit angka)
    idNumberInput.addEventListener("input", () => {
        const idValue = idNumberInput.value;
        if (idValue.length !== 16 || isNaN(idValue)) {
            idNumberInput.setCustomValidity("Nomor identitas harus 16 digit angka.");
        } else {
            idNumberInput.setCustomValidity("");
        }
    });

    // Validasi Durasi Menginap (hanya angka)
    durationInput.addEventListener("input", () => {
        const durationValue = durationInput.value;
        if (isNaN(durationValue) || durationValue <= 0) {
            durationInput.setCustomValidity("Durasi menginap harus berupa angka positif.");
        } else {
            durationInput.setCustomValidity("");
        }
    });

    // Perhitungan Total Bayar
    totalButton.addEventListener("click", (event) => {
        event.preventDefault(); // Mencegah form submit langsung
        const roomType = roomTypeSelect.value;
        const duration = parseInt(durationInput.value, 10);
        const includeBreakfast = breakfastCheckbox.checked;

        if (!roomType || !duration) {
            alert("Lengkapi semua data sebelum menghitung total bayar.");
            return;
        }

        // Harga per tipe kamar
        const roomPrices = {
            Standar: 300000,
            Deluxe: 500000,
            Family: 700000,
        };

        let total = roomPrices[roomType] * duration;

        // Diskon untuk lama menginap lebih dari 3 hari
        if (duration > 3) {
            total *= 0.9; // Diskon 10%
        }

        // Tambahan biaya untuk sarapan
        if (includeBreakfast) {
            total += 80000;
        }

        // Tampilkan hasil total bayar
        totalField.textContent = `Total Bayar: Rp${total.toLocaleString("id-ID")}`;
    });
});
