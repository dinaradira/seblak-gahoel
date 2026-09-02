<?php
include 'db.php';
$query = "SELECT * FROM menu";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seblak Gahoel - Pesan Online</title>
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; margin: 0; padding: 0; }
        body { background-color: #f8f9fa; color: #333; }
        header { background: #e63946; color: white; padding: 20px; text-align: center; font-size: 24px; font-weight: bold; }
        .banner { background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5') center/cover; color: white; text-align: center; padding: 60px 20px; }
        .container { max-width: 1000px; margin: 20px auto; padding: 0 15px; display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
        .card { background: white; border-radius: 10px; padding: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .card img { width: 100%; height: 120px; object-fit: cover; border-radius: 8px; }
        .card h3 { font-size: 16px; margin: 10px 0 5px; }
        .card .harga { color: #e63946; font-weight: bold; font-size: 14px; }
        .btn-add { background: #e63946; color: white; border: none; padding: 8px 12px; margin-top: 10px; border-radius: 5px; cursor: pointer; width: 100%; }
        .cart-box { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); height: fit-content; }
        .cart-box h2 { border-bottom: 2px solid #eee; padding-bottom: 10px; font-size: 18px; }
        .cart-item { display: flex; justify-content: space-between; margin: 10px 0; font-size: 14px; }
        .total { font-weight: bold; font-size: 16px; margin-top: 15px; border-top: 2px solid #eee; padding-top: 10px; }
        input, select { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px; }
        .btn-checkout { background: #28a745; color: white; border: none; padding: 10px; border-radius: 5px; width: 100%; font-size: 16px; cursor: pointer; }
        @media(max-width: 768px) { .container { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<header>SEBLAK GAHOEL</header>

<div class="banner">
    <h1>Pedas Gurih Bikin Nagih!</h1>
    <p>Pesan seblak favoritmu langsung dari web secara praktis.</p>
</div>

<div class="container">
    <div class="menu-section">
        <h2>Pilih Menu</h2>
        <div class="menu-grid" style="margin-top: 15px;">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <img src="https://via.placeholder.com/150" alt="<?= $row['nama']; ?>">
                <h3><?= $row['nama']; ?></h3>
                <div class="harga">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></div>
                <button class="btn-add" onclick="addToCart('<?= $row['nama']; ?>', <?= $row['harga']; ?>)">+ Tambah</button>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="cart-box">
        <h2>Pesanan Kamu</h2>
        <div id="cart-list">
            <p style="color: #888; font-size: 14px; margin-top: 10px;">Keranjang masih kosong.</p>
        </div>
        <div class="total">Total: Rp <span id="cart-total">0</span></div>

        <form action="proses.php" method="POST" style="margin-top: 15px;">
            <input type="text" name="nama" placeholder="Nama Pemesan" required>
            <input type="text" name="nohp" placeholder="Nomor WhatsApp" required>
            <select name="pembayaran" required>
                <option value="QRIS">QRIS / E-Wallet</option>
                <option value="Cash">Bayar di Kasir (Cash)</option>
            </select>
            <input type="hidden" name="cart_data" id="cart-data-input">
            <input type="hidden" name="total_harga" id="total-harga-input">
            <button type="submit" class="btn-checkout">Pesan Sekarang</button>
        </form>
    </div>
</div>

<script>
    let cart = [];
    let total = 0;

    function addToCart(nama, harga) {
        cart.push({ nama, harga });
        total += harga;
        updateCartUI();
    }

    function updateCartUI() {
        const cartList = document.getElementById('cart-list');
        const cartTotal = document.getElementById('cart-total');
        
        if(cart.length === 0) {
            cartList.innerHTML = '<p style="color: #888; font-size: 14px; margin-top: 10px;">Keranjang masih kosong.</p>';
        } else {
            cartList.innerHTML = '';
            cart.forEach((item) => {
                cartList.innerHTML += `<div class="cart-item"><span>${item.nama}</span><span>Rp ${item.harga.toLocaleString('id-ID')}</span></div>`;
            });
        }

        cartTotal.innerText = total.toLocaleString('id-ID');
        document.getElementById('cart-data-input').value = JSON.stringify(cart);
        document.getElementById('total-harga-input').value = total;
    }
</script>

</body>
</html>