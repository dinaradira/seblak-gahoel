<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Alamat & Kontak - Seblak Gahoel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS tambahan khusus untuk tombol dan peta agar pas di dalam card aslimu */
        .contact-actions {
            display: flex;
            gap: 12px;
            margin: 20px 0;
        }
        .contact-actions a {
            flex: 1;
            text-align: center;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }
        .btn-wa {
            background-color: #25D366;
        }
        .btn-ig {
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
        }
        .map-wrapper {
            margin-top: 20px;
        }
        .map-wrapper h4 {
            margin-bottom: 10px;
            font-size: 15px;
        }
        .map-wrapper iframe {
            width: 100%;
            height: 280px;
            border: 0;
            border-radius: 8px;
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
        <div class="card">
            <h3>Informasi Alamat & Kontak Resmi</h3>
            <p>📍 <b>Alamat Outlet:</b> Jl. Raya Kuliner Gahoel No. 45, Bandung, Jawa Barat</p>
            <p>⏰ <b>Jam Buka:</b> Setiap Hari Pukul 13.00 - 21.00 WIB</p>
            
            <!-- Tombol Interaktif WhatsApp & Instagram -->
            <div class="contact-actions">
                <a href="https://wa.me/6281234567890?text=Halo%20Seblak%20Gahoel,%20saya%20mau%20pesan" target="_blank" class="btn-wa">
                    💬 Chat WhatsApp
                </a>
                <a href="https://instagram.com/seblak_gahoel_official" target="_blank" class="btn-ig">
                    📸 Kunjungi Instagram
                </a>
            </div>

            <!-- Google Maps Interaktif -->
            <div class="map-wrapper">
                <h4>Peta Lokasi Outlet</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.048186775241!2d107.61776119999999!3d-7.003608700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9790165b531%3A0x7dcb670cf6bc3655!2sSeblak%20Gahoel!5e0!3m2!1sid!2sid!4v1788668341569!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </div>

    <footer>
    <p>&copy; 2026 Seblak Gahoel. All rights reserved.</p>
    <p>Jam Buka: Senin - Sabtu (09.00 - 20.30) | Minggu: Tutup</p>
</footer>

</body>
</html>