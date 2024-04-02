-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 03:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat_guru` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `email`, `nama_guru`, `alamat_guru`, `no_hp`, `jenis_kelamin`, `tanggal_lahir`, `id_user`, `status`) VALUES
(1, 'carliwiranata12@gmail.com', 'Carli Wiranata', 'Dusun 4 karang anyar', '083800778657', 'Laki-laki', '2004-08-15', 122, 'Aktif'),
(2, 'carliwiranata92@gmail.com', 'Wiranata', 'Dusun 4', '083800778657', 'Laki-laki', '2023-11-08', 123, 'Aktif'),
(3, 'babangtio12@gmail.com', 'Tio Anggara', 'Pantai Labu', '081234567890', 'Laki-laki', '2004-02-15', 124, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'PPLG'),
(2, 'TJKT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `id_jurusan`) VALUES
(14, 'XII PPLG 1', 1),
(15, 'XII TJKT 2', 2),
(16, 'XII TJKT 1', 2),
(18, 'XII PPLG 2', 1),
(20, 'XI PPGL 1', 1),
(21, 'XI PPGL 2', 1),
(22, 'XI PPGL 3', 1),
(23, 'XII PPGL', 1),
(24, 'XI TJKT', 2),
(25, 'XI TJKT 1', 2),
(26, 'XI TJKT 2', 2),
(27, 'XI TJKT 3', 2),
(28, 'XII TJKT', 2),
(29, 'XII TJKT 3', 2),
(30, 'XII PPGL 3', 1),
(33, 'XI PPGL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kkm` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `kkm`, `id_jurusan`) VALUES
(59, 'Dasar Dasar HTML', 70, 1),
(60, 'Dasar Dasar CSS', 70, 1),
(61, 'Layouting Pada HTML Dan CSS', 70, 1),
(62, 'Dasar Dasar PHP', 70, 1),
(64, 'TKJ', 70, 2),
(65, 'TKJ 2', 70, 2),
(66, 'TKJ 3', 70, 2),
(67, 'TKJ 4', 70, 2),
(68, 'TKJ 5', 70, 2),
(69, 'Database MySQL', 70, 1),
(70, 'CRUD PHP MYSQL', 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `predikat_nilai` varchar(1) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_mapel`, `nisn`, `id_guru`, `nilai`, `predikat_nilai`, `id_kelas`, `id_sekolah`) VALUES
(1, 70, '0045768988', 3, 90, 'A', 20, 1),
(2, 60, '0045768988', 3, 89, 'B', 20, 1),
(3, 59, '0045768988', 3, 87, 'B', 20, 1),
(4, 62, '0045768988', 3, 90, 'A', 20, 1),
(5, 69, '0045768988', 3, 89, 'B', 20, 1),
(6, 61, '0045768988', 3, 89, 'B', 20, 1),
(7, 70, '0867546743', 3, 99, 'A', 20, 1),
(8, 60, '0867546743', 3, 99, 'A', 20, 1),
(9, 59, '0867546743', 3, 98, 'A', 20, 1),
(10, 62, '0867546743', 3, 98, 'A', 20, 1),
(11, 69, '0867546743', 3, 99, 'A', 20, 1),
(12, 61, '0867546743', 3, 99, 'A', 20, 1),
(13, 70, '0042717103', 1, 90, 'A', 33, 1),
(14, 60, '0042717103', 1, 90, 'A', 33, 1),
(15, 59, '0042717103', 1, 98, 'A', 33, 1),
(16, 62, '0042717103', 1, 97, 'A', 33, 1),
(17, 69, '0042717103', 1, 89, 'B', 33, 1),
(18, 61, '0042717103', 1, 88, 'B', 33, 1),
(19, 70, '0042717109', 1, 80, 'B', 33, 1),
(20, 60, '0042717109', 1, 98, 'A', 33, 1),
(21, 59, '0042717109', 1, 98, 'A', 33, 1),
(22, 62, '0042717109', 1, 89, 'B', 33, 1),
(23, 69, '0042717109', 1, 98, 'A', 33, 1),
(24, 61, '0042717109', 1, 98, 'A', 33, 1),
(25, 70, '0067836783', 1, 90, 'A', 33, 1),
(26, 60, '0067836783', 1, 87, 'B', 33, 1),
(27, 59, '0067836783', 1, 78, 'C', 33, 1),
(28, 62, '0067836783', 1, 89, 'B', 33, 1),
(29, 69, '0067836783', 1, 98, 'A', 33, 1),
(30, 61, '0067836783', 1, 88, 'B', 33, 1),
(31, 70, '1234512345', 1, 90, 'A', 21, 1),
(32, 60, '1234512345', 1, 99, 'A', 21, 1),
(33, 59, '1234512345', 1, 87, 'B', 21, 1),
(34, 62, '1234512345', 1, 98, 'A', 21, 1),
(35, 69, '1234512345', 1, 89, 'B', 21, 1),
(36, 61, '1234512345', 1, 98, 'A', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prakrin`
--

CREATE TABLE `tb_prakrin` (
  `id_prakrin` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nisn` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_prakrin`
--

INSERT INTO `tb_prakrin` (`id_prakrin`, `id_kelas`, `id_sekolah`, `id_guru`, `tgl_masuk`, `tgl_keluar`, `nisn`) VALUES
(7, 33, 1, 1, '2023-11-25', '2024-01-25', '0042717109'),
(8, 33, 1, 1, '2023-11-25', '2024-01-25', '0042717103'),
(9, 33, 1, 1, '2023-11-25', '2024-01-25', '0067836783'),
(12, 24, 2, 2, '2023-11-25', '2024-02-25', '0042717104'),
(13, 24, 1, 2, '2023-11-25', '2024-02-25', '0042717105'),
(14, 24, 1, 2, '2023-11-25', '2024-02-25', '2121212121'),
(15, 20, 1, 3, '2023-11-01', '2024-01-30', '0045768988'),
(16, 20, 1, 3, '2023-11-01', '2024-01-30', '0867546743'),
(17, 21, 1, 1, '2023-12-02', '2024-02-02', '1234512345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_predikat`
--

CREATE TABLE `tb_predikat` (
  `id_predikat` int(11) NOT NULL,
  `nilai1` int(11) NOT NULL,
  `nilai2` int(11) NOT NULL,
  `predikat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_predikat`
--

INSERT INTO `tb_predikat` (`id_predikat`, `nilai1`, `nilai2`, `predikat`) VALUES
(1, 90, 100, 'A'),
(2, 80, 89, 'B'),
(3, 70, 79, 'C'),
(4, 69, 0, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `sekolah`) VALUES
(1, 'SMKN 1 BERINGIN'),
(2, 'SMKN 1 PANTAI LABU'),
(3, 'SMKN 1 LUBUK PAKAM'),
(7, 'SMK AKP GALANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` char(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `penilaian` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_prakrin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nama_siswa`, `jenis_kelamin`, `alamat_siswa`, `tanggal_lahir`, `no_hp`, `penilaian`, `status`, `id_user`, `status_prakrin`) VALUES
('0042717103', 'Carli Wiranata', 'Laki-laki', 'Dusun 4 Karang Anyar', '2004-08-15', '083800778657', 1, 'Aktif', 115, 1),
('0042717104', 'Tio Anggara', 'Laki-laki', 'Pantai Labu', '2004-11-10', '083232323232', 0, 'Aktif', 114, 1),
('0042717105', 'Anggara', 'Perempuan', 'Pantai Labu', '2023-11-08', '083800778657', 0, 'Aktif', 121, 1),
('0042717109', 'Carli', 'Laki-laki', 'Dusun 4 karang anyar', '2004-08-15', '083800778657', 1, 'Aktif', 118, 1),
('0045768988', 'Dea Afriza', 'Laki-laki', 'Bandung', '1999-08-19', '083800884532', 1, 'Aktif', 129, 1),
('0067836783', 'Joko', 'Laki-laki', 'Lubuk Pakam', '2004-08-12', '082800778657', 1, 'Aktif', 127, 1),
('0867546743', 'Sandhika Galih', 'Laki-laki', 'Jakarta Utara', '1998-09-15', '085678654569', 1, 'Aktif', 130, 1),
('1234512345', 'Sandhika Galih', 'Laki-laki', 'Jakarta', '1999-02-12', '082675789818', 1, 'Tidak Aktif', 131, 1),
('2121212121', 'Joko Wira', 'Laki-laki', 'Tanjung Morawa', '2007-09-12', '082323213321', 0, 'Aktif', 128, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$Ty6MiGe0CJUe9uyk4MPi6.ljd/FjhCDS/hoRbZ4iVE7TMyRmITtVe', 'admin'),
(114, '0042717104', '$2y$10$GJ9wMv.ebG6HGipTDPdzieM8kBam8kki0bZQOjCCXwzC733nKZ/He', 'siswa'),
(115, '0042717103', '$2y$10$Jm08DTamwILzOO8tLG7UH.vhS6paVwBKLgGO1dKuoIXzeGfgDFucG', 'siswa'),
(118, '0042717109', '$2y$10$udRyZ/pwIvoXuHEkjZ2j6eUj3Kl2tgL9XzhzsMTW2BuboAdIJ2JwW', 'siswa'),
(121, '0042717105', '$2y$10$77d0OF2psGB4RkSYKomdDujvh84jdPNLbEI5ZBq6xrArl6zg9Aulq', 'siswa'),
(122, 'carliwiranata12@gmail.com', '$2y$10$MV1lE2l3C.rd.WbuSxTni.uSdOOhknYgzohR0wcid.gJwNTNScKpG', 'guru'),
(123, 'carliwiranata92@gmail.com', '$2y$10$HLSn1WJp1pflJt4zN/BiTOrMHK7NOnl0QrapIswe6rafwpAXhlZ76', 'guru'),
(124, 'babangtio12@gmail.com', '$2y$10$YJEPL.6C15sMta3UX6ZBNeL6pRmIWxek4olWFmLt7q7fANgyK28OW', 'guru'),
(127, '0067836783', '$2y$10$rgnwboTRcfX2hLr5NvjgEO2frPy4yWwlLUyXAUtBBXm.dH2ytNeai', 'siswa'),
(128, '2121212121', '$2y$10$GtQlw.S2zuR.HuvcVr1NqeHXMB82ARV/byLP1P40IUhs7x/46zM0q', 'siswa'),
(129, '0045768988', '$2y$10$./V/6qZV/.KJpq0SOHwa8OYc2Q1My/3UKtHMrFrHnu2XUdDvzHFhW', 'siswa'),
(130, '0867546743', '$2y$10$RNu9NFnzw8P.PvXGMW298eTqp4whJMuDmD9Nzk.jxa1QG.HYu4.ue', 'siswa'),
(131, '1234512345', '$2y$10$auXyKiJk4SBlvjU5Q0PVK.x1BEYWwgS.tEkckNsXrdBnuyMqxc7eW', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_prakrin`
--
ALTER TABLE `tb_prakrin`
  ADD PRIMARY KEY (`id_prakrin`);

--
-- Indexes for table `tb_predikat`
--
ALTER TABLE `tb_predikat`
  ADD PRIMARY KEY (`id_predikat`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_prakrin`
--
ALTER TABLE `tb_prakrin`
  MODIFY `id_prakrin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_predikat`
--
ALTER TABLE `tb_predikat`
  MODIFY `id_predikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
