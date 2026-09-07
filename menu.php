<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri & Testimoni - Seblak Gahoel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .gallery-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }
        .gallery-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
        }
        .gallery-card:hover {
            transform: translateY(-5px);
            border-color: #ffca28;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }
        .gallery-img-wrap {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #121212;
        }
        .gallery-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
            cursor: pointer;
        }
        .gallery-img-wrap img:hover {
            transform: scale(1.08);
        }
        .gallery-desc {
            padding: 15px;
            text-align: left;
        }
        .gallery-desc h4 {
            margin: 0 0 5px 0;
            color: #ffca28;
            font-size: 16px;
        }
        .gallery-desc p {
            margin: 0;
            color: #ccc;
            font-size: 13px;
        }
        
        /* Modal Lightbox (Supaya foto bisa nge-zoom besar pas diklik) */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.85);
            justify-content: center;
            align-items: center;
        }
        .modal img {
            max-width: 85%;
            max-height: 85%;
            border-radius: 10px;
            border: 2px solid #ffca28;
        }
        .modal-close {
            position: absolute;
            top: 20px; right: 30px;
            color: #fff;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
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
        <div class="card gallery-container">
            <div>
                <h3>✨ Galeri Suasana & Testimoni Seblak Gahoel</h3>
                <p style="color: #bbb; font-size: 14px; margin-top: 5px;">Intip keseruan kedai kami dan ulasan seru dari para pelanggan setia!</p>
            </div>

            <!-- Grid Galeri Foto -->
            <div class="gallery-grid">
                <!-- Foto 1 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <img src="img/galeri1.jpg" alt="Suasana Kedai" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <h4>Suasana Kedai Seblak Gahoel</h4>
                        <p>Ramai dan selalu dipadati pencinta seblak setiap harinya!</p>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <img src="img/galeri2.jpg" alt="Racikan Seblak" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <h4>Racikan Topping Melimpah</h4>
                        <p>Fresh dibuat langsung dengan bumbu rahasia turun-temurun.</p>
                    </div>
                </div>

                <!-- Foto 3 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <img src="img/galeri3.jpg" alt="Testimoni Pelanggan" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <h4>Pelanggan Setia</h4>
                        <p>"Level 5-nya beneran nagih parah, pedesnya juara!" - Kak Rara</p>
                    </div>
                </div>

                <!-- Foto 4 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <img src="img/galeri4.jpg" alt="Menu Andalan" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <h4>Andalan Sejak 15 Tahun</h4>
                        <p>Cilok dan karedok legendaris buatan rumah sendiri.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Elemen Modal Lightbox untuk Zoom Foto -->
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