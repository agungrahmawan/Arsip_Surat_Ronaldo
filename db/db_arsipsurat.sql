-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 04:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsipsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` int(11) NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `tujuan`, `isi_disposisi`, `sifat`, `catatan`, `id_suratmasuk`) VALUES
(1, 'SEKERTARIS', 'Menerima', 1, '', 17),
(3, 'Mana Saya Tahu', 'Menolak', 2, 'Ente gak good looking, saya tolak', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_instansi` int(11) NOT NULL,
  `institusi` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kepala` varchar(250) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepala`, `nip`, `email`, `notelp`, `logo`) VALUES
(1, 'Pemerintah Kabupaten Kudus', 'Dinas Pertanian dan pangan', 'Pemerintahan', 'Jl. Mejobo No.32, Area Sawah, Mlati Lor, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59319', 'CATUR SULISTYANTO.S.Sos,MM', '-', 'dinaspertanian@kuduskab.go.id', '(0291) 431024', 'lambang.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `kode_klasifikasi` varchar(20) NOT NULL,
  `judul_klasifikasi` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id_klasifikasi`, `kode_klasifikasi`, `judul_klasifikasi`, `keterangan`) VALUES
(1, '000', 'UMUM', ''),
(2, '200', 'POLITIK', ''),
(3, '300', 'PEMERINTAHAN', ''),
(5, '500', 'PEREKONOMIAN', ''),
(6, '600', 'PEKERJAAN UMUM DAN KETENAGAKERJAAN', ''),
(7, '700', 'PENGAWASAN', ''),
(8, '800', 'KEPEGAWAIAN', ''),
(9, '900', 'KEUANGAN', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sifat`
--

CREATE TABLE `tb_sifat` (
  `id_sifat` int(11) NOT NULL,
  `sifat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sifat`
--

INSERT INTO `tb_sifat` (`id_sifat`, `sifat`) VALUES
(1, 'Rahasia'),
(2, 'Penting'),
(3, 'Segera'),
(4, 'Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `no_suratkeluar` varchar(50) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `tujuan_surat` varchar(250) NOT NULL,
  `klasifikasi` int(11) NOT NULL,
  `isi_surat` varchar(250) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `file_suratkeluar` varchar(250) NOT NULL,
  `ket_suratkeluar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suratkeluar`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `no_suratmasuk` varchar(50) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `klasifikasi` int(11) NOT NULL,
  `isi_surat` varchar(250) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file_suratmasuk` varchar(250) NOT NULL,
  `ket_suratmasuk` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suratmasuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin'),
(2, 'farez', 'farez', 'farezsyx', 'User'),
(3, 'disposisi', 'disposisi', 'disposisi', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_suratmasuk` (`id_suratmasuk`),
  ADD KEY `sifat` (`sifat`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `tb_sifat`
--
ALTER TABLE `tb_sifat`
  ADD PRIMARY KEY (`id_sifat`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD KEY `klasifikasi` (`klasifikasi`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD KEY `klasifikasi` (`klasifikasi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_sifat`
--
ALTER TABLE `tb_sifat`
  MODIFY `id_sifat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD CONSTRAINT `tb_disposisi_ibfk_1` FOREIGN KEY (`id_suratmasuk`) REFERENCES `tb_suratmasuk` (`id_suratmasuk`),
  ADD CONSTRAINT `tb_disposisi_ibfk_2` FOREIGN KEY (`sifat`) REFERENCES `tb_sifat` (`id_sifat`);

--
-- Constraints for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD CONSTRAINT `tb_suratkeluar_ibfk_1` FOREIGN KEY (`klasifikasi`) REFERENCES `tb_klasifikasi` (`id_klasifikasi`);

--
-- Constraints for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD CONSTRAINT `tb_suratmasuk_ibfk_1` FOREIGN KEY (`klasifikasi`) REFERENCES `tb_klasifikasi` (`id_klasifikasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
