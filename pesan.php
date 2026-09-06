<?php 
include 'koneksi.php'; 

if(isset($_POST['tambah'])){
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $menu_id = intval($_POST['menu_id']);
    $jumlah = intval($_POST['jumlah']);

    $get_menu = mysqli_query($conn, "SELECT * FROM menu WHERE id='$menu_id'");
    $m = mysqli_fetch_assoc($get_menu);
    $nama_menu = $m['nama_menu'];
    $subtotal = $m['harga'] * $jumlah;

    mysqli_query($conn, "INSERT INTO pesanan (nama_pemesan, nama_menu, jumlah, subtotal) VALUES ('$nama_pemesan', '$nama_menu', '$jumlah', '$subtotal')");
    header("Location: pesan.php?pemesan=" . urlencode($nama_pemesan));
    exit();
}

$pemesan = isset($_GET['pemesan']) ? $_GET['pemesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan - Seblak Gahoel</title>
    <link rel="stylesheet" href="style.css">
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
    </nav>
    <div class="container">
        <div class="card">
            <h3>Form Input Pesanan Pelanggan</h3>
            <form method="POST" action="">
                <label>Nama Pemesan:</label><br>
                <input type="text" name="nama_pemesan" value="<?= htmlspecialchars($pemesan) ?>" required style="width:100%; padding:10px; margin:8px 0; background:#2b0d2e; color:#fff; border:1px solid #4a154b; border-radius:4px;"><br>
                
                <label>Pilih Menu / Topping / Varian:</label><br>
                <select name="menu_id" style="width:100%; padding:10px; margin:8px 0; background:#2b0d2e; color:#fff; border:1px solid #4a154b; border-radius:4px;">
                    <?php
                    $menus = mysqli_query($conn, "SELECT * FROM menu");
                    while($mn = mysqli_fetch_assoc($menus)){
                        echo "<option value='{$mn['id']}'>{$mn['nama_menu']} ({$mn['kategori']}) - Rp " . number_format($mn['harga'], 0, ',', '.') . "</option>";
                    }
                    ?>
                </select><br>

                <label>Jumlah Pesanan:</label><br>
                <input type="number" name="jumlah" value="1" min="1" required style="width:100%; padding:10px; margin:8px 0; background:#2b0d2e; color:#fff; border:1px solid #4a154b; border-radius:4px;"><br><br>

                <button type="submit" name="tambah">Tambah ke Keranjang</button>
            </form>
        </div>

        <?php if($pemesan): ?>
        <div class="card">
            <h3>Keranjang Belanja Atas Nama: <?= htmlspecialchars($pemesan) ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
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
                            <td><a href='hapus_item.php?id={$c['id']}&pemesan=" . urlencode($pemesan) . "' class='btn btn-danger'>Kurangi/Hapus</a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h3>Total Pembayaran: Rp <?= number_format($total, 0, ',', '.') ?></h3>
            <br>
            <a href="checkout.php?pemesan=<?= urlencode($pemesan) ?>" class="btn">Lanjut ke Checkout</a>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>