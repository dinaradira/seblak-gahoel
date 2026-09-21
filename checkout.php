<?php
include 'koneksi.php';
$pemesan = isset($_GET['pemesan']) ? $_GET['pemesan'] : '';
?>
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
    <style>
        /* Penyesuaian khusus header agar logo dan judul menyatu di kiri */
        header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
            padding: 15px 30px;
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .header-brand img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffca28;
        }
        .header-brand h1 {
            font-size: 22px;
            color: #ffca28;
            margin: 0;
        }
        /* Tombol aksi checkout yang kontras dan jelas dibaca */
        .btn-checkout-action {
            display: inline-block;
            background: #ffca28;
            color: #121212;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(255,202,40,0.3);
            transition: 0.2s;
            margin-bottom: 10px;
        }
        .btn-checkout-action:hover {
            background: #ffa000;
        }
        .btn-secondary-action {
            display: inline-block;
            background: #333;
            color: #ffca28;
            font-weight: bold;
            border: 1px solid #ffca28;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.2s;
        }
        .btn-secondary-action:hover {
            background: #444;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-brand">
            <img src="logo.jpg" alt="Logo Seblak Gahoel">
            <h1>Seblak Gahoel</h1>
        </div>
    </header>

    <div class="container">
        <div class="card" style="text-align: center; padding: 30px;">
            <h2 style="color: #ffca28; margin-bottom: 15px;">Konfirmasi Pesanan Berhasil!</h2>
            <p style="font-size: 16px; color: #ddd; margin-bottom: 25px;">
                Terima kasih <b><?= htmlspecialchars($pemesan) ?></b>, pesanan Seblak Gahoel kamu sudah tercatat di sistem dapur kami.
            </p>
            
            <a href="struk.php?pemesan=<?= urlencode($pemesan) ?>" class="btn-checkout-action" target="_blank">📄 Cetak Struk Pembayaran</a>
            <br>
            <a href="index.php" class="btn-secondary-action">🏠 Selesai / Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>