<?php
include 'koneksi.php';
$pemesan = isset($_GET['pemesan']) ? $_GET['pemesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembayaran - Seblak Gahoel</title>
    <style>
        body { font-family: monospace; background: #fff; color: #000; padding: 20px; }
        .struk-box { max-width: 400px; margin: auto; border: 1px dashed #000; padding: 20px; }
        h2, p { text-align: center; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border-bottom: 1px dashed #ccc; padding: 6px; text-align: left; font-size: 13px; }
    </style>
</head>
<body onload="window.print()">
    <div class="struk-box">
        <h2>SEBLAK GAHOEL</h2>
        <p>Jl. Raya Kuliner Gahoel No. 45, Bandung</p>
        <hr style="border: 0; border-top: 1px dashed #000;">
        <p style="text-align: left;">Nama Pemesan: <b><?= htmlspecialchars($pemesan) ?></b></p>
        <p style="text-align: left;">Tanggal: <?= date('d-m-Y H:i:s') ?></p>
        <table>
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Jml</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM pesanan WHERE nama_pemesan='$pemesan'");
                $tot = 0;
                while($row = mysqli_fetch_assoc($q)){
                    $tot += $row['subtotal'];
                    echo "<tr>
                        <td>{$row['nama_menu']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>Rp " . number_format($row['subtotal'], 0, ',', '.') . "</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <h3 style="text-align: right; margin-top: 15px;">Total: Rp <?= number_format($tot, 0, ',', '.') ?></h3>
        <p style="margin-top: 20px; font-size: 12px;">* TERIMA KASIH TELAH BERBELANJA *<br>Pedasnya Nampol, Rasanya Gahoel!</p>
    </div>
</body>
</html>