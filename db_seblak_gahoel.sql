-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2026 pada 05.32
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_seblak_gahoel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `kategori`, `harga`) VALUES
(1, 'Kerupuk Inul', 'Food Menu', 2500),
(2, 'Kerupuk Tata', 'Food Menu', 2500),
(3, 'Kerupuk The Jack', 'Food Menu', 2500),
(4, 'Kerupuk Uvo', 'Food Menu', 2500),
(5, 'Kerupuk Rafael', 'Food Menu', 2500),
(6, 'Kerupuk Potato', 'Food Menu', 2500),
(7, 'Kerupuk Lakar', 'Food Menu', 2500),
(8, 'Kerupuk Mie', 'Food Menu', 2500),
(9, 'Markonah Hitam', 'Food Menu', 2500),
(10, 'Markonah Kuning', 'Food Menu', 2500),
(11, 'Markonah Spiral', 'Food Menu', 2500),
(12, 'Mie Golosor', 'Food Menu', 2500),
(13, 'Mie Ayam', 'Food Menu', 2500),
(14, 'Mie Telor', 'Food Menu', 2500),
(15, 'Bihun', 'Food Menu', 2500),
(16, 'Kwetiaw', 'Food Menu', 2500),
(17, 'Babangi', 'Food Menu', 3000),
(18, 'Tahu Baleendah', 'Food Menu', 2500),
(19, 'Tahu Putih', 'Food Menu', 2500),
(20, 'Tahu Kuning', 'Food Menu', 2500),
(21, 'Tahu Isi', 'Food Menu', 2500),
(22, 'Telor Puyuh', 'Food Menu', 2500),
(23, 'Baso Sapi', 'Food Menu', 2500),
(24, 'Baso Ikan', 'Food Menu', 2500),
(25, 'Basreng', 'Food Menu', 2500),
(26, 'Cilok Rainbow', 'Food Menu', 2500),
(27, 'Citul (Cilok Tulang Rangu)', 'Food Menu', 2500),
(28, 'Cireng Sweet', 'Food Menu', 2500),
(29, 'Ceuli Monyet', 'Food Menu', 2500),
(30, 'Siomay Tuyul', 'Food Menu', 2500),
(31, 'Siomay Pacul', 'Food Menu', 2500),
(32, 'Siomay Basah', 'Food Menu', 2500),
(33, 'Sosis Besar', 'Food Menu', 5000),
(34, 'Sosis Sedang', 'Food Menu', 3000),
(35, 'Sosis Kecil', 'Food Menu', 2500),
(36, 'Batagor Kecil', 'Food Menu', 2500),
(37, 'Batagor Besar', 'Food Menu', 2500),
(38, 'Otak - Otak', 'Food Menu', 2500),
(39, 'Kandel Kulit Bengeut', 'Food Menu', 2500),
(40, 'Jamur Salju', 'Food Menu', 3000),
(41, 'Tatura (Tahu Tulang Rangu Pedas)', 'Food Menu', 2500),
(42, 'Telor', 'Food Menu', 3000),
(43, 'Fosil', 'Food Menu', 5000),
(44, 'Ceker Orok', 'Food Menu', 5000),
(45, 'Sayur', 'Food Menu', 2000),
(46, 'Enoki', 'Food Menu', 3000),
(47, 'Kangkung', 'Food Menu', 2000),
(48, 'Kerang Ijo', 'Varian Seafood', 5000),
(49, 'Kerang Dara', 'Varian Seafood', 5000),
(50, 'Cumi', 'Varian Seafood', 7500),
(51, 'Udang', 'Varian Seafood', 7500),
(52, 'Dumpling Ayam', 'Varian Suki', 2500),
(53, 'Dumpling Keju', 'Varian Suki', 2500),
(54, 'Shrimp', 'Varian Suki', 2500),
(55, 'Twister', 'Varian Suki', 2500),
(56, 'Cihua', 'Varian Suki', 2500),
(57, 'Bumbu Spaghetti', 'Add On', 3000),
(58, 'Bumbu Asam Manis', 'Add On', 3000),
(59, 'Nasi', 'Other', 3000),
(60, 'Pilus', 'Other', 2000),
(61, 'Seblak Instan', 'Other', 17000),
(62, 'Karedok Basreng', 'Varian Karedok', 6000),
(63, 'Karedok Cireng Sweet', 'Varian Karedok', 6000),
(64, 'Karedok Cipuk', 'Varian Karedok', 6000),
(65, 'Karedok Cilok', 'Varian Karedok', 6000),
(66, 'Karedok Tahu Putih', 'Varian Karedok', 6000),
(67, 'Karedok Mix 2 Macam', 'Varian Karedok', 8000),
(68, 'Karedok Mix 3 Macam', 'Varian Karedok', 10000),
(69, 'Karedok Mix 4 Macam', 'Varian Karedok', 10000),
(70, 'Karedok Mix 5 Macam', 'Varian Karedok', 12000),
(71, 'Seblak Jadoel', 'Varian Karedok', 10000),
(72, 'Seblak Rafael', 'Varian Karedok', 10000),
(73, 'Karamel Basreng', 'Varian Karamel', 6000),
(74, 'Karamel Cireng Sweet', 'Varian Karamel', 6000),
(75, 'Karamel Cilok', 'Varian Karamel', 6000),
(76, 'Karamel Tahu Putih', 'Varian Karamel', 6000),
(77, 'Karamel Mix 2 Macam', 'Varian Karamel', 8000),
(78, 'Karamel Mix 3 Macam', 'Varian Karamel', 10000),
(79, 'Karamel Mix 4 Macam', 'Varian Karamel', 10000),
(80, 'Karamel Ceker', 'Varian Karamel', 10000),
(81, 'Karamel Tulang', 'Varian Karamel', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `nama_menu`, `jumlah`, `subtotal`) VALUES
(3, 'dinara', 'Kerupuk Tata', 1, 2500),
(4, 'dinara', 'Kerupuk The Jack', 1, 2500),
(5, 'dinara', 'Cilok Rainbow', 1, 2500),
(6, 'dinara', 'Sosis Kecil', 1, 2500),
(7, 'dinara', 'Enoki', 1, 3000),
(8, 'dinara', 'Kangkung', 1, 2000),
(9, 'dinara', 'Kerupuk Tata (Level 3 (Pedas))', 1, 2500),
(10, 'dinara', 'Kerupuk Mie (Level 3 (Pedas))', 1, 2500),
(11, 'dinara', 'Markonah Spiral (Level 3 (Pedas))', 1, 2500),
(12, 'dinara', 'Siomay Pacul (Level 3 (Pedas))', 1, 2500);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
