<?php 
include 'koneksi.php'; 

// Proses jika tombol tambah diklik
if(isset($_POST['tambah_menu'])){
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    
    // Cek apakah ada menu yang dipilih
    if(isset($_POST['menu_item']) && is_array($_POST['menu_item'])) {
        foreach($_POST['menu_item'] as $menu_id => $is_checked) {
            $menu_id = intval($menu_id);
            $jumlah = intval($_POST['jumlah'][$menu_id]);
            
            if($jumlah > 0) {
                // Ambil data menu dari database
                $get_menu = mysqli_query($conn, "SELECT * FROM menu WHERE id='$menu_id'");
                $m = mysqli_fetch_assoc($get_menu);
                $nama_menu = $m['nama_menu'];
                $subtotal = $m['harga'] * $jumlah;

                // Masukkan ke tabel pesanan/keranjang
                mysqli_query($conn, "INSERT INTO pesanan (nama_pemesan, nama_menu, jumlah, subtotal) VALUES ('$nama_pemesan', '$nama_menu', '$jumlah', '$subtotal')");
            }
        }
    }
    header("Location: pesan.php?pemesan=" . urlencode($nama_pemesan));
    exit();
}

$pemesan = isset($_GET['pemesan']) ? $_GET['pemesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Sekarang - Seblak Gahoel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Gaya Katalog Menu Ala Resto Modern (Gacoan Style) */
        .order-container {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        .form-section-title {
            color: #ffca28;
            font-size: 20px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 8px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        .menu-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            text-align: left;
            transition: 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .menu-card:hover {
            border-color: #ffca28;
            background: rgba(255, 255, 255, 0.08);
        }
        .menu-info h4 {
            margin: 0 0 5px 0;
            font-size: 16px;
            color: #fff;
        }
        .menu-info .badge-kat {
            display: inline-block;
            background: #4a154b;
            color: #ffca28;
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 4px;
            margin-bottom: 8px;
        }
        .menu-info .price {
            font-weight: bold;
            color: #25D366;
            font-size: 14px;
            margin-bottom: 12px;
        }
        .menu-action {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .menu-action label {
            font-size: 13px;
            color: #ccc;
            cursor: pointer;
        }
        .menu-action input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #ffca28;
            cursor: pointer;
        }
        .qty-input {
            width: 50px;
            padding: 5px;
            background: #121212;
            border: 1px solid #4a154b;
            color: #fff;
            text-align: center;
            border-radius: 4px;
        }
        .input-nama-box {
            background: #1e1e2f;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .input-nama-box label {
            font-weight: bold;
            color: #ffca28;
            display: block;
            margin-bottom: 5px;
        }
        .input-nama-box input[type="text"] {
            width: 100%;
            padding: 10px;
            background: #121212;
            color: #fff;
            border: 1px solid #4a154b;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
        }
        .btn-main-order {
            background: #ffca28;
            color: #121212;
            font-weight: bold;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: 0.2s;
        }
        .btn-main-order:hover {
            background: #ffa000;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.jpg" alt="Logo Seblak Gahoel">
        <h1>Seblak Gahoel</h1>
    </header>
    
    <nav>
        <a href="index.php">Beranda</a>
        <a href="menu.php">Menu & Varian</a>
        <a href="pesan.php">Pesan Sekarang</a>
        <a href="alamat.php">Alamat & Kontak</a>
    </nav>

    <div class="container">
        <div class="card order-container">
            <h3>Pesan Menu & Topping Favoritmu</h3>
            <p style="color: #bbb; font-size: 14px; margin-top: -10px;">Pilih menu sebanyak yang kamu mau, masukkan jumlahnya, lalu masukkan nama pemesan!</p>

            <form method="POST" action="">
                <div class="input-nama-box">
                    <label>Nama Pemesan:</label>
                    <input type="text" name="nama_pemesan" value="<?= htmlspecialchars($pemesan) ?>" placeholder="Masukkan nama kamu di sini..." required>
                </div>

                <div class="form-section-title">Pilih Menu / Topping Seblak:</div>

                <div class="menu-grid">
                    <?php
                    $menus = mysqli_query($conn, "SELECT * FROM menu");
                    while($mn = mysqli_fetch_assoc($menus)){
                        $id = $mn['id'];
                        echo '
                        <div class="menu-card">
                            <div class="menu-info">
                                <span class="badge-kat">'.$mn['kategori'].'</span>
                                <h4>'.$mn['nama_menu'].'</h4>
                                <div class="price">Rp ' . number_format($mn['harga'], 0, ',', '.') . '</div>
                            </div>
                            <div class="menu-action">
                                <div>
                                    <input type="checkbox" name="menu_item['.$id.']" value="1" id="menu_'.$id.'">
                                    <label for="menu_'.$id.'">Pilih</label>
                                </div>
                                <div>
                                    <span style="font-size:12px; color:#aaa;">Qty:</span>
                                    <input type="number" name="jumlah['.$id.']" value="1" min="1" class="qty-input">
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>

                <button type="submit" name="tambah_menu" class="btn-main-order">🛒 Masukkan ke Keranjang Pesanan</button>
            </form>
        </div>

        <?php if($pemesan): ?>
        <div class="card" style="margin-top: 25px;">
            <h3 style="color: #ffca28;">Keranjang Belanja Atas Nama: <?= htmlspecialchars($pemesan) ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu / Topping</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cart = mysqli_query($conn, "SELECT * FROM pesanan WHERE nama_pemesan='$pemesan'");
                    $total = 0;
                    while($c = mysqli_fetch_assoc($cart)){
                        $total += $c['subtotal'];
                        echo "<tr>
                            <td>{$c['nama_menu']}</td>
                            <td>{$c['jumlah']}</td>
                            <td>Rp " . number_format($c['subtotal'], 0, ',', '.') . "</td>
                            <td><a href='hapus_item.php?id={$c['id']}&pemesan=" . urlencode($pemesan) . "' style='color: #ff6b6b; text-decoration: none; font-weight: bold;'>Hapus</a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h3 style="margin-top: 15px;">Total Pembayaran: Rp <?= number_format($total, 0, ',', '.') ?></h3>
            <br>
            <a href="checkout.php?pemesan=<?= urlencode($pemesan) ?>" class="btn" style="display:inline-block; background:#25D366; color:#fff; padding:10px 20px; border-radius:6px; text-decoration:none; font-weight:bold;">✅ Lanjut ke Checkout WhatsApp</a>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>