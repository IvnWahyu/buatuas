-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 13.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivedeals`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `formsewa`
--

CREATE TABLE `formsewa` (
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listmobil`
--

CREATE TABLE `listmobil` (
  `id` int(2) NOT NULL,
  `nama_mobil` varchar(20) NOT NULL,
  `merek_mobil` varchar(20) NOT NULL,
  `kapasitas_mobil` varchar(20) NOT NULL,
  `deskripsi_mobil` varchar(300) NOT NULL,
  `harga_mobil` decimal(10,3) DEFAULT NULL,
  `gbr_mobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `listmobil`
--

INSERT INTO `listmobil` (`id`, `nama_mobil`, `merek_mobil`, `kapasitas_mobil`, `deskripsi_mobil`, `harga_mobil`, `gbr_mobil`) VALUES
(2, 'Sienta', 'Toyota', '7', 'Sienta, kombinasi gaya dan fungsionalitas. MPV modern dengan desain elegan, fleksibilitas kursi yang unik, dan berbagai fitur keselamatan. Cocok untuk perjalanan keluarga yang nyaman dan praktis.', '340.000', 'sienta.jpg'),
(3, 'Xpander', 'Mitsubishi', '7', 'Xpander, kombinasi antara MPV yang elegan dan SUV yang tangguh. Desain dinamis, ruang kabin luas, dan performa bertenaga. Ideal untuk petualangan keluarga yang penuh gaya dan nyaman.\r\n\r\nSpesifikasi:', '360.000', 'xpander.jpg'),
(4, 'Ayla', 'Daihatsu', '5', 'Ayla, kompak dan efisien. Mobil hatchback dengan desain ringkas, cocok untuk perjalanan perkotaan. Hemat bahan bakar, mudah diparkir, dan dilengkapi dengan fitur modern untuk kenyamanan Anda.', '250.000', 'ayla.jpg'),
(5, 'Innova', 'Toyota', '7', 'Toyota Innova, kombinasi elegansi dan kenyamanan. MPV yang dirancang untuk perjalanan keluarga dan bisnis dengan desain modern dan ruang kabin luas. Dilengkapi dengan fitur-fitur keamanan terdepan, Innova menawarkan perpaduan sempurna antara gaya, fungsionalitas, dan performa yang handal.', '500.000', 'innova.jpg'),
(6, 'Fortuner', 'Toyota', '7', 'Toyota Fortuner, sebuah SUV yang memadukan keanggunan dan performa tangguh. Didesain untuk menaklukkan segala medan, Fortuner menawarkan kenyamanan premium dan ruang kabin yang luas. Dengan mesin bertenaga, sistem penggerak empat roda, dan fitur keselamatan canggih, Fortuner siap mengantarkan Anda d', '700.000', 'fortuner.jpg'),
(7, 'Xenia', 'Daihatsu', '7', 'Xenia, sebuah MPV yang dirancang untuk memberikan kenyamanan dan kepraktisan untuk perjalanan sehari-hari. Dengan desain yang elegan dan fungsional, Xenia menawarkan ruang kabin luas yang dapat menampung hingga 7 penumpang. Mesin yang efisien dan teknologi terkini membuatnya menjadi pilihan yang ide', '300.000', 'xenia.jpg'),
(8, 'Civic', 'Honda', '4', 'Honda Civic, simbol gaya dan performa. Desain aerodinamis yang memukau dan interior modern membuatnya menjadi pilihan yang tak tertandingi di kelasnya. Menghadirkan pengalaman berkendara yang sporty, Civic juga menawarkan efisiensi bahan bakar yang luar biasa, menjadikannya pilihan sempurna untuk me', '500.000', 'civic.jpg'),
(9, 'Rush', 'Toyota', '7', 'Rush, kombinasi antara SUV tangguh dan kenyamanan mobil keluarga. Dengan desain sporty dan lincah, Rush menyajikan pengalaman berkendara yang seru dan fleksibel. Ruang kabin yang lapang, fitur-fitur keselamatan terkini, dan performa handal membuatnya menjadi pilihan ideal untuk petualangan sehari-ha', '300.000', 'rush.jpg'),
(10, 'Terios', 'Daihatsu', '7', 'Terios, SUV tangguh untuk petualangan sehari-hari. Dengan desain yang dinamis, performa handal, dan kemampuan off-road yang mengesankan, Terios cocok untuk mereka yang mencari keseimbangan antara gaya hidup perkotaan dan eksplorasi alam.', '300.000', 'terios.jpg'),
(11, 'Vios', 'Toyota', '4', 'Toyota Vios, simbol keanggunan dan kinerja handal dalam paket yang kompak. Dengan desain aerodinamis yang modern dan interior yang elegan, Vios menawarkan pengalaman berkendara yang nyaman dan stylish. Mesin yang bertenaga, sistem keamanan canggih, dan efisiensi bahan bakar membuatnya menjadi piliha', '300.000', 'vios.jpg'),
(12, 'Sigra', 'Daihatsu', '4', 'Sigra, solusi praktis dan efisien untuk mobilitas sehari-hari. Sebagai mobil MPV ringkas, Sigra menawarkan kenyamanan maksimal dengan desain yang ringan dan bertenaga. Cocok untuk perjalanan keluarga dan aktivitas perkotaan.', '300.000', 'sigra.jpg'),
(13, 'Alphard', 'Toyota', '4', 'Toyota Alphard, perpaduan elegansi dan kenyamanan tingkat tinggi. MPV mewah yang dirancang untuk memberikan pengalaman perjalanan yang istimewa. Dengan desain luar yang mengesankan dan ruang kabin yang luas, Alphard memberikan tingkat kemewahan yang tak tertandingi. Interior yang dilengkapi dengan f', '900.000', 'alphard.jpg'),
(14, 'Brio', 'Honda', '4', 'Honda Brio, hatchback berkelas yang menawarkan kombinasi sempurna antara gaya dan kelincahan. Dengan desain yang kompak namun penuh gaya, Brio cocok untuk perjalanan perkotaan dan petualangan spontan. Interior modern dan fitur canggih menciptakan pengalaman berkendara yang menyenangkan dan nyaman.', '340.000', 'brio.jpg'),
(15, 'Ignis', 'Suzuki', '4', 'Ignis, perpaduan antara gaya yang penuh karakter dan kepraktisan yang unik. Hatchback kompak yang menarik perhatian dengan desain modern dan lincah. Didesain untuk menghadirkan pengalaman berkendara yang menyenangkan, dengan efisiensi bahan bakar tinggi dan keandalan Suzuki yang terkenal.', '340.000', 'ignis.jpg'),
(16, 'Confero', 'Wuling', '7', 'Confero, kombinasi antara keanggunan dan kenyamanan. MPV dari Wuling yang menawarkan desain stylish, ruang kabin yang luas, dan fitur-fitur modern. Didesain untuk memberikan pengalaman berkendara yang menyenangkan dan praktis bagi keluarga atau perjalanan grup.', '340.000', 'confero.jpg'),
(17, 'Yaris', 'Toyota', '4', 'simbol gaya dan dinamika. Mobil hatchback yang kompak dengan desain modern dan performa yang tangguh. Cocok untuk perjalanan perkotaan yang lincah dan hemat bahan bakar. Yaris menawarkan pengalaman berkendara yang menyenangkan dengan fitur-fitur yang canggih.', '500.000', 'yaris.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `kendaraan` varchar(30) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `lama_sewa` int(30) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `total_harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `nama_pemesan`, `email`, `nomor_telepon`, `kendaraan`, `harga`, `tanggal_pemesanan`, `lama_sewa`, `tanggal_pengembalian`, `total_harga`) VALUES
(13, 'Iwan Budi', 'budianto@gmail.com', '071268761276', 'Ayla', '250.000', '2023-11-30', 7, '2023-12-07', '1750'),
(15, 'yanto', 'yanto@gmail.com', '081267178267', 'Alphard', '900.000', '2023-12-11', 2, '2023-12-14', '1800');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(3, 'admin', '$2y$10$S3sUPY13pdwsK1jaZACzq.LSjvBJTVKsRaM79zWnG0V2escUBsT7.', 'admin'),
(4, 'ivan', '$2y$10$tQ1Up1s/15tHfKDL01Be2ucn.f0RDkuZhYV4Hebc4xlrSfcvDso8O', 'ivan'),
(5, 'ivan wahyu', '$2y$10$LQQ6a9SLX.MdlIIS/CufV.eiAABHKvuvVJDsiDdqxRaytkVXshhw.', 'ivan'),
(6, 'IvanWhy', '$2y$10$/F05sVAwbMqUYgTRtKMKneUbX2.RXrROfO0tFxlWFmBDWds4DWAU.', 'ivan'),
(7, '2021071022', '$2y$10$KbXe6E/pMWU3ZJQeTZ3s0O3g4Mxna5Y7uOpvPgfxHGsHhXQGhU//O', 'Ivan Wahyu'),
(8, 'yanto', '$2y$10$.HLcdSYj56TU68/lDdvdguvUhwwX90bCcAArisqdFzxscnk/nheiS', 'Yanto');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `formsewa`
--
ALTER TABLE `formsewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `listmobil`
--
ALTER TABLE `listmobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `formsewa`
--
ALTER TABLE `formsewa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `listmobil`
--
ALTER TABLE `listmobil`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
