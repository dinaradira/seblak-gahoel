<?php
include 'koneksi.php';
$id = intval($_GET['id']);
$pemesan = $_GET['pemesan'];

mysqli_query($conn, "DELETE FROM pesanan WHERE id='$id'");
header("Location: pesan.php?pemesan=" . urlencode($pemesanan) . "#keranjang");
exit();
?>