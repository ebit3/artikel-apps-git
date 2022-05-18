-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 06:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_article`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `tgl_release` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `kategori`, `judul`, `isi`, `publisher`, `tgl_release`, `gambar`, `status`) VALUES
(43, 'Pendidikan', 'BEASISWA UPN', '<p>Ada seorang anak bernama Fitri, dia merupakan murid kelas 6 SD yang sangat pintar dan baik hati. Di sekolah sangat banyak teman yang menyukainya karena sikapnya tersebut. Tidak jarang, semua ingin berteman dengan Fitri. Ada lagi anak perempuan bernama I', 'Handoko barino', '2022-05-16', '6281def4b7c4e.jpg', 'pending'),
(44, 'Horor', 'PPATK: Total Laporan Transaksi Investasi Bodong Capai Rp 35 Triliiun', '<p>Ada seorang anak bernama Fitri, dia merupakan murid kelas 6 SD yang sangat pintar dan baik hati. Di sekolah sangat banyak teman yang menyukainya karena sikapnya tersebut. Tidak jarang, semua ingin berteman dengan Fitri. Ada lagi anak perempuan bernama I', 'Handoko barino', '2022-05-16', '6281df6aca689.jpg', 'pending'),
(45, 'Horor', 'PPATK: Total Laporan Transaksi Investasi Bodong Capai Rp 35 Triliiun', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820b58824fb.jpg', 'pending'),
(46, 'Horor', 'BEASISWA UPN', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820b650856b.jpg', 'pending'),
(47, 'Teknologi', 'Why Chosee Lorem', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820b72c119d.jpg', 'pending'),
(48, 'Pendidikan', 'BEASISWA UPN', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820b7dcda4d.jpg', 'pending'),
(49, 'Teknologi', 'Contoh Paragraf Narasi', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820b905e514.jpg', 'pending'),
(50, 'Teknologi', 'BEASISWA UPN', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820b9da1e32.jpg', 'pending'),
(51, 'Horor', 'PPATK: Total Laporan Transaksi Investasi Bodong Capai Rp 35 Triliiun', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820bac62a30.jpg', 'pending'),
(52, 'Teknologi', 'PPATK: Total Laporan Transaksi Investasi Bodong Capai Rp 35 Triliiun', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila mas', 'Handoko barino', '2022-05-16', '62820bbc72b85.jpg', 'pending'),
(53, 'Alam', 'contoh', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila masuk ke sana. Mobil-mobil dari yang paling jelek hingga yang paling bagus ada di sini, yang sedari tadi menjalar sangat panjang di jalanan dan hanya bergerak beberapa meter lalu berhenti lagi.</p>', 'Handoko barino', '2022-05-18', '62820d070f4c1.jpg', 'pending'),
(54, 'Horor', 'Why Chosee Lorem', '<p>Kami menyusuri jalanan Jakarta. Bundaran di depan Hotel Indonesia terlalu megah untuk kami yang baru pertama kali datang ke ibu kota Indonesia ini. Gedung-gedung tinggi, pusat perbelanjaan yang sangat besar dan mewah. Tidak akan cukup uang kami bila masuk ke sana. Mobil-mobil dari yang paling jelek hingga yang paling bagus ada di sini, yang sedari tadi menjalar sangat panjang di jalanan dan hanya bergerak beberapa meter lalu berhenti lagi.</p>', 'Handoko barino', '2022-05-16', '62820d1888e3c.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(32) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(22, 'Pendidikan'),
(23, 'Horor'),
(25, 'Teknologi'),
(26, 'Sosial'),
(27, 'Alam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `kelas`, `jurusan`, `role`) VALUES
(14, 'Handoko barino', 'admin', '$2y$10$W9HdsMJaeiiGxBLM8KKEM.33J5yt88/E0l5WQUzQJRKEs8iRPXmXK', 'XI', 'Rekayasa Perangkat Lunak(RPL)', 'admin'),
(15, 'ebit gunawan ', 'admin2', '$2y$10$RkEA.5rrh.ovjBtVCocFf.Py4qJlMBvk4H2PpBPcC3A1VW8kIyoC2', 'XII', 'Rekayasa Perangkat Lunak(RPL)', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
