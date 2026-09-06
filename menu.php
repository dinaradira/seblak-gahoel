<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu - Seblak Gahoel</title>
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
        <a href="alamat.php">Alamat & Kontak</a>
    </nav>
    <div class="container">
        <div class="card">
            <h3>Katalog Food Menu & Varian Lengkap</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu / Varian</th>
                        <th>Kategori</th>
                        <th>Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM menu");
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama_menu']}</td>
                            <td>{$row['kategori']}</td>
                            <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>