-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jun 2018 pada 02.48
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_porseni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `id_user`, `username`, `password`, `status`, `pt`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'master'),
(6, 2, 'IPB_01', '21232f297a57a5a743894a0e4a801fc3', 'institusi', 'IPB'),
(7, 0, 'ITB_01', '21232f297a57a5a743894a0e4a801fc3', 'institusi', 'Institut Teknologi Bandung'),
(9, 0, 're_01', 'fa2bd3306b93e30c96b21b4cc75fa4d7', 'institusi', 're'),
(21, 0, 'POLBAN_01', '6a0c9dcbffbbe7dfcabfa278ec33064d', 'institusi', 'Politeknik Bandung'),
(22, 0, 'polnes', 'c8f2b53efd6d10ca0892e104b684c1df', 'institusi', 'Politeknik Nusantara'),
(23, 0, 'polma', 'af619621d0f584d194722f14508c0677', 'institusi', 'Politeknik Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atlet`
--

CREATE TABLE `atlet` (
  `id_atlet` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pt` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ss` varchar(200) NOT NULL,
  `cabang` varchar(20) NOT NULL,
  `status` enum('approved','unapproved') NOT NULL DEFAULT 'unapproved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `atlet`
--

INSERT INTO `atlet` (`id_atlet`, `nama`, `npm`, `gender`, `tanggal_lahir`, `umur`, `no_hp`, `email`, `pt`, `foto`, `ss`, `cabang`, `status`) VALUES
(4, 'Yohanes A M', '4616010031', 'L', '1999-08-23', 0, '02100727', 'yohanes@gmail.com', 'PNJ', 'uti.png', 'pp.png', 'Tennis', 'approved'),
(5, 'yo', '4516010031', 'L', '1999-07-31', 0, '081xxxxxxxxx', 'y0@mail.com', 'PNJ', 'tot', 'tot', 'Basket', 'approved'),
(6, 'apa', '1234567890', 'P', '2018-04-26', 0, '0211992', 'apa@gmail.com', 'IPB', '176779-200.png', 'pp.png', 'Basket', 'approved'),
(7, 'u', '4616010030', 'P', '2018-04-26', 0, '0321321', 'u@mail.com', 'UNI', '176779-200.png', 'ads.pnj', 'Bulu tangkis', 'unapproved'),
(8, 'adsd', '3213213', 'P', '2018-03-27', 0, '3221312', 'dassa', 'OI', '366778-200.png', 'sdsa.kl', 'Takrau', 'unapproved'),
(10, 'dasd', '31321', 'P', '2018-04-23', 0, '13213123', 'dfsd@fdsa.dasd', 're', '176779-200.png', 'das.asd', 'Tennis', 'approved'),
(11, 'km', '2213', 'L', '2018-04-24', 0, '23213123', 'aad@dsd.das', 're', '366778-2001.png', 'das.asd', 'Basket', 'approved'),
(12, 'mmm', '5465454', 'L', '2018-05-21', 0, '02100727', 'aad@dsd.das', 're', '21.png', 'bhjb', 'Bulu tangkis', 'unapproved'),
(13, 'Mujahd', '7987987', 'L', '2018-05-28', 0, '02100727', 'aryo100@gmail.com', 're', '25.png', 'a', 'Bulu tangkis', 'unapproved'),
(14, 'Aryo', '02323123', 'L', '2000-09-28', 0, '02100727', 'aryo100@gmail.com', 're', '23.png', '339A2F4F00000578-0-image-a-7_14617979386461.jpg', 'Bulu tangkis', 'unapproved'),
(16, 'Yohanes Bet', '321321', 'P', '2018-05-01', 0, '02100727', 'aryo100@gmail.com', 're', '176779-20015.png', '339A2F4F00000578-0-image-a-7_146179793864610.jpg', 'Bulu tangkis', 'unapproved'),
(17, 'Ted', '4616010031', 'L', '1999-08-28', 0, '0211992', 'aad@dsd.das', 're', 'canva-kawaii-koala-animal-icon-MACTmnhQTYQ2.png', '2.png', 'Bulu tangkis', 'unapproved'),
(18, 'we', '2213', 'L', '2000-08-28', 0, '0211992', 'aad@dsd.das', 're', '', '339A2F4F00000578-0-image-a-7_146179793864612.jpg', 'Bulu tangkis', 'unapproved'),
(20, 'Aryo Mujahid', '321321323', 'L', '2000-09-28', 0, '02100727', 'aryo100@gmail.com', 're', '176779-20016.png', '339A2F4F00000578-0-image-a-7_146179793864614.jpg', 'Bulu tangkis', 'unapproved'),
(21, 'jhj', '45678', 'P', '1999-08-28', 0, '345678', 'ar@c', 'Institut Teknologi Bandung', '581.jpg', '339A2F4F00000578-0-image-a-7_146179793864615.jpg', 'Basket', 'unapproved'),
(22, 'PIP', '67890', 'L', '1999-09-30', 0, '02100727', 'aryo100@gmail.com', 're', '176779-20017.png', 'maxresdefault.jpg', 'Basket', 'unapproved'),
(23, 'Map', '34567890', 'L', '1999-08-04', 0, '0987654', 'aryo100@gmail.com', 'Institut Teknologi Bandung', '176779-20018.png', '339A2F4F00000578-0-image-a-7_146179793864616.jpg', 'Bulu tangkis', 'approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `content` varchar(1500) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `content`, `foto`, `status`) VALUES
(1, 'Start', '<p>apapadnsadsd sdosajdsadnsakdnsj</p>', '339A2F4F00000578-0-image-a-7_14617979386462.jpg', 'berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gambar` int(11) NOT NULL,
  `alamat_g` varchar(250) NOT NULL,
  `nama_g` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gambar`, `alamat_g`, `nama_g`) VALUES
(1, '../assets/upload/galeri', 'saturation.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `institusi`
--

CREATE TABLE `institusi` (
  `id_pt` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `alamat_pt` varchar(500) NOT NULL,
  `no_telp_pt` int(20) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `no_telp_pj` int(20) NOT NULL,
  `ss_bukti_pay` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `atlet`
--
ALTER TABLE `atlet`
  ADD PRIMARY KEY (`id_atlet`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`id_pt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `atlet`
--
ALTER TABLE `atlet`
  MODIFY `id_atlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institusi`
--
ALTER TABLE `institusi`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
