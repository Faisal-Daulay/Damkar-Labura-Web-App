-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 08:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_damkar_labura`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_lapor`
--

CREATE TABLE `approve_lapor` (
  `id_approve` int(4) NOT NULL,
  `id_lapor` int(4) NOT NULL,
  `status_approve` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approve_lapor`
--

INSERT INTO `approve_lapor` (`id_approve`, `id_lapor`, `status_approve`) VALUES
(1, 1, 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(4) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `url_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_lapor`
--

CREATE TABLE `daftar_lapor` (
  `id_lapor` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `jam_lapor` time NOT NULL,
  `alamat` text NOT NULL,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  `lokasi` text NOT NULL,
  `url_img` text NOT NULL,
  `status_lapor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_lapor`
--

INSERT INTO `daftar_lapor` (`id_lapor`, `id_pengguna`, `tgl_lapor`, `jam_lapor`, `alamat`, `x`, `y`, `lokasi`, `url_img`, `status_lapor`) VALUES
(1, 1, '2019-11-05', '10:03:04', 'Medan', '0.00000', '0.00000', 'Medan', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faqandabout`
--

CREATE TABLE `faqandabout` (
  `id_faq` int(4) NOT NULL,
  `faq` text NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqandabout`
--

INSERT INTO `faqandabout` (`id_faq`, `faq`, `tentang`) VALUES
(1, 'oke sekali', 'mantap sekali\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `alamat`, `no_hp`, `tgl_daftar`) VALUES
(1, 'Jhon Doeasdasdas', 'Medan Selayangdasdas', '0812********dasdas', '2019-11-02'),
(2, 'Sarah Guo', 'Medan, Setia BUdi', '0812 8726 3621', '2019-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pengguna`, `username`, `password`, `status_user`) VALUES
(1, 1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve_lapor`
--
ALTER TABLE `approve_lapor`
  ADD PRIMARY KEY (`id_approve`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `daftar_lapor`
--
ALTER TABLE `daftar_lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `faqandabout`
--
ALTER TABLE `faqandabout`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve_lapor`
--
ALTER TABLE `approve_lapor`
  MODIFY `id_approve` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftar_lapor`
--
ALTER TABLE `daftar_lapor`
  MODIFY `id_lapor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqandabout`
--
ALTER TABLE `faqandabout`
  MODIFY `id_faq` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
