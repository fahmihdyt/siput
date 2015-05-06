-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 07:52 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siput`
--
CREATE DATABASE IF NOT EXISTS `siput` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siput`;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `departemen` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `kode_publikasi` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `departemen`, `image`, `kode_publikasi`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'super', NULL, NULL),
(2, 'humas', '21232f297a57a5a743894a0e4a801fc3', 'humas', NULL, NULL),
(3, 'sospol', '21232f297a57a5a743894a0e4a801fc3', 'sospol', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `description` text,
  `creator` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama`, `description`, `creator`, `date`) VALUES
(4, 'Fuki Post', 'main main aja', 2, '2015-10-10'),
(5, 'Fuki Gathering', 'Acara kumpul-kumpul FUKI dan disini kita maen bersama!', 2, '2015-04-24'),
(7, 'Rekursif', 'Pertemuan antara anggota FUKI 2015 dan non-FUKI', 2, '2015-05-03'),
(8, 'Kajian Cerdas', 'Sebuah kajian yang akan menangkat tema bla bla bla...', 3, '2015-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_media`
--

CREATE TABLE IF NOT EXISTS `feedback_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `creator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_publikasi`
--

CREATE TABLE IF NOT EXISTS `feedback_publikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `creator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_humas`
--

CREATE TABLE IF NOT EXISTS `publikasi_humas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `tanggal_publikasi` date DEFAULT NULL,
  `konten` text,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `penanggung_jawab` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_media`
--

CREATE TABLE IF NOT EXISTS `publikasi_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `target_peserta` varchar(20) DEFAULT NULL,
  `media_publikasi` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `konten` text,
  `warna` varchar(255) DEFAULT NULL,
  `desain_kasar` text,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `penanggung_jawab` varchar(30) DEFAULT NULL,
  `plat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `publikasi_media`
--

INSERT INTO `publikasi_media` (`id`, `id_event`, `jenis`, `email`, `no_hp`, `target_peserta`, `media_publikasi`, `size`, `deadline`, `konten`, `warna`, `desain_kasar`, `attachment`, `status`, `penanggung_jawab`, `plat`, `tanggal`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00'),
(14, 5, 'xbanner', 'Fahmi.hidayat@gmail.com', '085775892689', 'internal', 'cetak', '20x30m', '2015-04-29', 'Jangan Jangan', 'Hayoloh!', 'nice info', NULL, 'done', 'Fahmi Hidayat', 'FUKI/15/04//34', '2015-04-30'),
(15, 4, 'poster', 'lahilote96@gmail.com', '085775892689', 'internal', 'cetak', '24x60', '2015-04-30', 'Belajar Bersama', 'apa aja dah', 'suka suka lo', NULL, 'done', 'Zahra', 'FUKI/15/04//35', '2015-04-30'),
(16, 8, 'spanduk', 'laaaa@gmail.com', '085775892689', 'internal', 'cetak', '2x3m', '2015-05-09', 'ada gambar nya', 'merah kuning hijau', 'di langit yang biru', NULL, 'approved', 'zahra', 'FUKI/15/05//36', '2015-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `result_media`
--

CREATE TABLE IF NOT EXISTS `result_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publikasi` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_publikasi` (`id_publikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `result_media`
--

INSERT INTO `result_media` (`id`, `id_publikasi`, `description`, `links`) VALUES
(1, NULL, 'ganteng!', 'COVER.jpg'),
(2, NULL, 'sorry boss! ya', 'COVER.jpg'),
(3, NULL, 'ini design 2', 'narupi_by_edumander-d51cwpa.png'),
(4, NULL, 'gan, ini desainnya.... semoga berkenan', 'narupi_by_edumander-d51cwpa.png'),
(5, 14, 'Nice Info Gan', 'COVER.jpg'),
(6, 15, 'ini gambarnya yaa, kalo ada revisi bilang aja', 'Untitled-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `value` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `value`) VALUES
(1, 'last_design', '36'),
(2, 'fuki', '15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `akun` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback_media`
--
ALTER TABLE `feedback_media`
  ADD CONSTRAINT `feedback_media_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `publikasi_media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_media_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback_publikasi`
--
ALTER TABLE `feedback_publikasi`
  ADD CONSTRAINT `feedback_publikasi_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_publikasi_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi_humas`
--
ALTER TABLE `publikasi_humas`
  ADD CONSTRAINT `publikasi_humas_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi_media`
--
ALTER TABLE `publikasi_media`
  ADD CONSTRAINT `publikasi_media_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `result_media`
--
ALTER TABLE `result_media`
  ADD CONSTRAINT `result_media_ibfk_1` FOREIGN KEY (`id_publikasi`) REFERENCES `publikasi_media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
