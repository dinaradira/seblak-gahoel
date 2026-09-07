<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri - Seblak Gahoel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .gallery-container {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        .gallery-header {
            text-align: center;
            margin-bottom: 10px;
        }
        .gallery-header h3 {
            color: #ffca28;
            font-size: 24px;
            margin-bottom: 8px;
        }
        .gallery-header p {
            color: #ccc;
            font-size: 15px;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }
        .gallery-card {
            background: linear-gradient(145deg, rgba(30, 30, 47, 0.9), rgba(18, 18, 25, 0.9));
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
        }
        .gallery-card:hover {
            transform: translateY(-8px);
            border-color: #ffca28;
            box-shadow: 0 12px 30px rgba(255, 202, 40, 0.2);
        }
        .gallery-img-wrap {
            width: 100%;
            height: 210px;
            overflow: hidden;
            position: relative;
            background: #121212;
        }
        .gallery-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
            cursor: pointer;
        }
        .gallery-card:hover .gallery-img-wrap img {
            transform: scale(1.1);
        }
        .gallery-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(74, 21, 75, 0.85);
            color: #ffca28;
            font-size: 11px;
            font-weight: bold;
            padding: 4px 10px;
            border-radius: 6px;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 202, 40, 0.3);
            z-index: 2;
        }
        .gallery-desc {
            padding: 18px;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }
        .gallery-desc h4 {
            margin: 0 0 6px 0;
            color: #fff;
            font-size: 17px;
        }
        .gallery-desc p {
            margin: 0;
            color: #aaa;
            font-size: 13px;
            line-height: 1.4;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }
        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 12px;
            border: 2px solid #ffca28;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .modal-close {
            position: absolute;
            top: 25px; right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }
        .modal-close:hover {
            color: #ffca28;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-brand">
            <img src="logo.jpg" alt="Logo Seblak Gahoel" class="logo-img">
            <h1>Seblak Gahoel</h1>
        </div>
    </header>
    
    <nav>
        <a href="index.php">Beranda</a>
        <a href="galeri.php">Galeri</a>
        <a href="pesan.php">Pesan Sekarang</a>
        <a href="alamat.php">Alamat & Kontak</a>
    </nav>

    <div class="container">
        <div class="card gallery-container">
            <div class="gallery-header">
                <h3>✨ Galeri Suasana, Menu & Testimoni Seblak Gahoel</h3>
                <p>Intip keseruan kedai kami, racikan bumbu khas, hingga momen bahagia para pelanggan setia!</p>
            </div>

            <!-- Grid 12 Foto -->
            <div class="gallery-grid">
                <?php
                // Daftar 12 data foto dan keterangan galeri
                $galeri_data = [
                    ["img" => "img/galeri1.jpg", "badge" => "Suasana", "judul" => "Suasana Kedai Utama", "desc" => "Ramai dikunjungi pencinta seblak setiap hari."],
                    ["img" => "img/galeri2.jpg", "badge" => "Menu Andalan", "judul" => "Seblak Kuah Pedas Komplit", "desc" => "Topping melimpah dengan kuah merah membara."],
                    ["img" => "img/galeri3.jpg", "badge" => "Testimoni", "judul" => "Pelanggan Setia Level 5", "desc" => "\"Pedasnya bikin ketagihan, nggak pernah bosan!\""],
                    ["img" => "img/galeri4.jpg", "badge" => "Legendaris", "judul" => "Cilok Buatan Rumah", "desc" => "Resep rahasia turun-temurun sejak 15 tahun lalu."],
                    ["img" => "img/galeri5.jpg", "badge" => "Spesial", "judul" => "Karedok Segar Autentik", "desc" => "Sayuran segar pilihan dengan bumbu kacang kental."],
                    ["img" => "img/galeri6.jpg", "badge" => "Dapur", "judul" => "Proses Peracikan Fresh", "desc" => "Dimasak langsung mendadak sesuai pesanan."],
                    ["img" => "img/galeri7.jpg", "badge" => "Testimoni", "judul" => "Seru-seruan Bareng Sahabat", "desc" => "\"Tempat nongkrong kuliner pedas paling hits!\""],
                    ["img" => "img/galeri8.jpg", "badge" => "Varian", "judul" => "Aneka Kerupuk Unik", "desc" => "Pilihan kerupuk renyah terlengkap se-kota."],
                    ["img" => "img/galeri9.jpg", "badge" => "Suasana", "judul" => "Suasana Malam Gahoel", "desc" => "Selalu ramai dipadati pemburu kuliner malam."],
                    ["img" => "img/galeri10.jpg", "badge" => "Signature", "judul" => "Sajian Karamel Spesial", "desc" => "Sentuhan rasa manis gurih penutup yang pas."],
                    ["img" => "img/galeri11.jpg", "badge" => "Dokumentasi", "judul" => "Keseruan Tim Dapur", "desc" => "Kompak menyajikan rasa terbaik untuk pelanggan."],
                    ["img" => "img/galeri12.jpg", "badge" => "Favorit", "judul" => "Paket Spesial Gahoel", "desc" => "Porsi puas harga pas untuk dinikmati bersama."]
                ];

                foreach($galeri_data as $g) {
                    echo '
                    <div class="gallery-card">
                        <div class="gallery-img-wrap">
                            <span class="gallery-badge">'.$g['badge'].'</span>
                            <img src="'.$g['img'].'" alt="'.$g['judul'].'" onclick="openModal(this.src)">
                        </div>
                        <div class="gallery-desc">
                            <h4>'.$g['judul'].'</h4>
                            <p>'.$g['desc'].'</p>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox (Zoom Foto) -->
    <div id="imgModal" class="modal" onclick="closeModal()">
        <span class="modal-close">&times;</span>
        <img id="modalImage" src="">
    </div>

    <script>
        function openModal(src) {
            document.getElementById('imgModal').style.display = 'flex';
            document.getElementById('modalImage').src = src;
        }
        function closeModal() {
            document.getElementById('imgModal').style.display = 'none';
        }
    </script>
</body>
</html>