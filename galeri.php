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
        /* Grid 10 Foto Modern & Estetik */
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
        
        /* Modal Lightbox untuk Zoom Foto */
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
        <div class="card gallery-container">
            <div class="gallery-header">
                <h3>✨ Galeri Suasana, Menu & Testimoni Seblak Gahoel</h3>
                <p>Intip keseruan kedai kami, racikan bumbu khas, hingga momen bahagia para pelanggan setia!</p>
            </div>

            <!-- Grid 10 Foto Estetik -->
            <div class="gallery-grid">
                <!-- Foto 1 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Suasana</span>
                        <img src="img/galeri1.jpg" alt="Kedai" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Suasana Kedai Utama</h4>
                            <p>Ramai dikunjungi pencinta seblak setiap hari.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Menu Andalan</span>
                        <img src="img/galeri2.jpg" alt="Seblak Komplit" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Seblak Kuah Pedas Komplit</h4>
                            <p>Topping melimpah dengan kuah merah membara.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 3 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Testimoni</span>
                        <img src="img/galeri3.jpg" alt="Pelanggan" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Pelanggan Setia Level 5</h4>
                            <p>"Pedasnya bikin ketagihan, nggak pernah bosan!"</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 4 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Legendaris</span>
                        <img src="img/galeri4.jpg" alt="Cilok" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Cilok Buatan Rumah</h4>
                            <p>Resep rahasia turun-temurun sejak 15 tahun lalu.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 5 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Spesial</span>
                        <img src="img/galeri5.jpg" alt="Karedok" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Karedok Segar Autentik</h4>
                            <p>Sayuran segar pilihan dengan bumbu kacang kental.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 6 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Dapur</span>
                        <img src="img/galeri6.jpg" alt="Proses Masak" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Proses Peracikan Fresh</h4>
                            <p>Dimasak langsung mendadak sesuai pesanan.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 7 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Testimoni</span>
                        <img src="img/galeri7.jpg" alt="Review" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Seru-seruan Bareng Sahabat</h4>
                            <p>"Tempat nongkrong kuliner pedas paling hits!"</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 8 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Varian</span>
                        <img src="img/galeri8.jpg" alt="Topping" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Aneka Kerupuk Unik</h4>
                            <p>Pilihan kerupuk renyah terlengkap se-kota.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 9 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Suasana</span>
                        <img src="img/galeri9.jpg" alt="Suasana Malam" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Suasana Malam Gahoel</h4>
                            <p>Selalu ramai dipadati pemburu kuliner malam.</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 10 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Signature</span>
                        <img src="img/galeri10.jpg" alt="Karamel" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Sajian Karamel Spesial</h4>
                            <p>Sentuhan rasa manis gurih penutup yang pas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Foto 10 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Signature</span>
                        <img src="img/galeri11.jpg" alt="Karamel" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Sajian Karamel Spesial</h4>
                            <p>Sentuhan rasa manis gurih penutup yang pas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                  

    <!-- Foto 10 -->
                <div class="gallery-card">
                    <div class="gallery-img-wrap">
                        <span class="gallery-badge">Signature</span>
                        <img src="img/galeri12.jpg" alt="Karamel" onclick="openModal(this.src)">
                    </div>
                    <div class="gallery-desc">
                        <div>
                            <h4>Sajian Karamel Spesial</h4>
                            <p>Sentuhan rasa manis gurih penutup yang pas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Elemen Modal Lightbox (Zoom Foto) -->
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