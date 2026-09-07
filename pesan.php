<?php 
include 'koneksi.php'; 

// Proses jika tombol tambah diklik
if(isset($_POST['tambah_menu'])){
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $level_pedas = mysqli_real_escape_string($conn, $_POST['level_pedas']);
    
    if(isset($_POST['menu_item']) && is_array($_POST['menu_item'])) {
        foreach($_POST['menu_item'] as $menu_id => $is_checked) {
            $menu_id = intval($menu_id);
            $jumlah = intval($_POST['jumlah'][$menu_id]);
            
            if($jumlah > 0) {
                $get_menu = mysqli_query($conn, "SELECT * FROM menu WHERE id='$menu_id'");
                $m = mysqli_fetch_assoc($get_menu);
                $nama_menu = $m['nama_menu'] . " (" . $level_pedas . ")";
                $subtotal = $m['harga'] * $jumlah;

                mysqli_query($conn, "INSERT INTO pesanan (nama_pemesan, nama_menu, jumlah, subtotal) VALUES ('$nama_pemesan', '$nama_menu', '$jumlah', '$subtotal')");
            }
        }
    }
    header("Location: pesan.php?pemesan=" . urlencode($nama_pemesan) . "#keranjang");
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
        .order-container { display: flex; flex-direction: column; gap: 25px; }
        .form-section-title { color: #ffca28; font-size: 20px; margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 8px; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 15px; margin-bottom: 20px; }
        .menu-card { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; padding: 15px; text-align: left; transition: 0.2s; display: flex; flex-direction: column; justify-content: space-between; }
        .menu-card:hover { border-color: #ffca28; background: rgba(255, 255, 255, 0.08); }
        .menu-info h4 { margin: 0 0 5px 0; font-size: 16px; color: #fff; }
        .menu-info .badge-kat { display: inline-block; background: #4a154b; color: #ffca28; font-size: 11px; padding: 3px 8px; border-radius: 4px; margin-bottom: 8px; }
        .menu-info .price { font-weight: bold; color: #25D366; font-size: 14px; margin-bottom: 12px; }
        .menu-action { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 10px; display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .menu-action label { font-size: 13px; color: #ccc; cursor: pointer; }
        .menu-action input[type="checkbox"] { width: 18px; height: 18px; accent-color: #ffca28; cursor: pointer; }
        .qty-input { width: 50px; padding: 5px; background: #121212; border: 1px solid #4a154b; color: #fff; text-align: center; border-radius: 4px; }
        .input-box { background: #1e1e2f; padding: 15px; border-radius: 10px; margin-bottom: 20px; border: 1px solid rgba(255,255,255,0.1); }
        .input-box label { font-weight: bold; color: #ffca28; display: block; margin-bottom: 5px; }
        .input-box input[type="text"], .input-box select { width: 100%; padding: 10px; background: #121212; color: #fff; border: 1px solid #4a154b; border-radius: 6px; font-size: 15px; box-sizing: border-box; }
        .btn-main-order { background: #ffca28; color: #121212; font-weight: bold; padding: 12px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; width: 100%; box-shadow: 0 4px 10px rgba(0,0,0,0.3); transition: 0.2s; }
        .btn-main-order:hover { background: #ffa000; }
    </style>
</head>
<body>
    <header>
        <img src="logo.jpg" alt="Logo Seblak Gahoel">
        <h1>Seblak Gahoel</h1>
    </header>
    
   <nav>
        <a href="index.php">Beranda</a>
        <a href="galeri.php">Galeri</a>
        <a href="pesan.php">Pesan Sekarang</a>
        <a href="alamat.php">Alamat & Kontak</a>
    </nav>

    <div class="container">
        <div class="card order-container">
            <h3>Pesan Menu & Atur Kepedasan</h3>
            <p style="color: #bbb; font-size: 14px; margin-top: -10px;">Pilih menu, tentukan level pedas, lalu masukkan ke keranjang!</p>

            <form method="POST" action="">
                <!-- Input Nama Pemesan -->
                <div class="input-box">
                    <label>Nama Pemesan:</label>
                    <input type="text" name="nama_pemesan" value="<?= htmlspecialchars($pemesan) ?>" placeholder="Masukkan nama kamu di sini..." required>
                </div>

                <!-- Pilihan Level Kepedasan -->
                <div class="input-box">
                    <label>Pilih Level Kepedasan 🔥:</label>
                    <select name="level_pedas" required>
                        <option value="Level 0 (Tidak Pedas)">Level 0 - Tidak Pedas</option>
                        <option value="Level 1 (Sedang)">Level 1 - Santai (Sedikit Pedas)</option>
                        <option value="Level 2 (Normal)">Level 2 - Standar Gahoel</option>
                        <option value="Level 3 (Pedas)">Level 3 - Pedas Mantap</option>
                        <option value="Level 4 (Garang)">Level 4 - Garang Abis</option>
                        <option value="Level 5 (Dewa Pedas)">Level 5 - Setan / Dewa Pedas 🔥🔥🔥</option>
                    </select>
                </div>

                <div class="form-section-title">Pilih Menu / Topping Seblak:</div>

                <!-- Grid Kartu Menu -->
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

        <!-- Tabel Keranjang Belanja Pelanggan dengan Jangkar #keranjang -->
        <?php if($pemesan): ?>
        <div id="keranjang" class="card" style="margin-top: 25px;">
            <h3 style="color: #ffca28;">Keranjang Belanja Atas Nama: <?= htmlspecialchars($pemesan) ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu & Level</th>
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
                            <td><a href='hapus_item.php?id={$c['id']}&pemesan=" . urlencode($pemesan) . "#keranjang' style='color: #ff6b6b; text-string: none; font-weight: bold;'>Hapus</a></td>
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