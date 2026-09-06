<?php
include 'koneksi.php';
$pemesan = isset($_GET['pemesan']) ? $_GET['pemesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Seblak Gahoel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.jpg" alt="Logo Seblak Gahoel">
        <h1>Seblak Gahoel</h1>
    </header>
    <div class="container">
        <div class="card" style="text-align: center;">
            <h2>Konfirmasi Pesanan Berhasil!</h2>
            <p>Terima kasih <b><?= htmlspecialchars($pemesan) ?></b>, pesanan Seblak Gahoel kamu sudah tercatat di sistem dapur kami.</p>
            <br>
            <a href="struk.php?pemesan=<?= urlencode($pemesan) ?>" class="btn" target="_blank">Cetak Struk Pembayaran</a>
            <br><br>
            <a href="index.php" class="btn" style="background-color: #333;">Selesai / Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>