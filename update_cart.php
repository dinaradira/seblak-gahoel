<?php
include 'koneksi.php';
if(isset($_POST['update'])){
    $id = intval($_POST['id']);
    $jumlah = intval($_POST['jumlah']);
    $pemesan = $_POST['pemesan'];

    // Proses modifikasi jumlah item pesanan di keranjang
    mysqli_query($conn, "UPDATE pesanan SET jumlah='$jumlah' WHERE id='$id'");
    header("Location: pesan.php?pemesan=" . urlencode($pemesan));
    exit();
}
?>