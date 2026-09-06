<?php
// Kumpulan fungsi bantuan helper sistem
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

function bersihkanInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data)));
}
?>