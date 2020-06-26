-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2020 at 01:45 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE IF NOT EXISTS `tb_masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('1205021122345565', 'Irfa Syafiq Azhar', 'Faa12', 'sgbteam@@##', '082321515712'),
('1920918471837181', 'Idham Khalid', 'idhaam1', '123', '081807955899');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE IF NOT EXISTS `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','Proses','Selesai') NOT NULL,
  PRIMARY KEY (`id_pengaduan`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2020-02-06', '1920918471837181', 'Sharing Gil''s Blog\r\n\r\n( SGB TEAM )', 'SGB.png', 'Proses'),
(2, '2020-02-08', '1205021122345565', 'Irfa Syafiq Azhar', 'faa1.jpg', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE IF NOT EXISTS `tb_petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'Irfa Syafiq Azhar', 'Faa12', 'sgbteam@@##', '082321515712', 'Admin'),
(11, 'Idhaam Khalid', 'dham1', 'dhamm123', '087770986767', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan`
--

CREATE TABLE IF NOT EXISTS `tb_tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  UNIQUE KEY `id_pengaduan` (`id_pengaduan`),
  UNIQUE KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_tanggapan`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `tb_pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_masyarakat` (`nik`);

--
-- Constraints for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD CONSTRAINT `tb_tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `tb_pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tb_tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);
