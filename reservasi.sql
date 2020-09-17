-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2015 at 06:47 
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `rb_admin`
--

CREATE TABLE IF NOT EXISTS `rb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_admin`
--

INSERT INTO `rb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `rb_fasilitas`
--

CREATE TABLE IF NOT EXISTS `rb_fasilitas` (
  `kode_fasilitas` int(3) NOT NULL,
  `kode_kategori` int(5) NOT NULL,
  `nama_fasilitas` varchar(15) NOT NULL,
  `hrg_nonkemendikbud` int(11) NOT NULL,
  `hrg_kemendikbud` int(11) NOT NULL,
  `hrg_yayasansosial` int(11) NOT NULL,
  `jml_kmr` int(3) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  `namafoto` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_fasilitas`
--

INSERT INTO `rb_fasilitas` (`kode_fasilitas`, `kode_kategori`, `nama_fasilitas`, `hrg_nonkemendikbud`, `hrg_kemendikbud`, `hrg_yayasansosial`, `jml_kmr`, `kapasitas`, `namafoto`) VALUES
(1, 1, 'Garuda', 450000, 400000, 350000, 6, 6, '1.jpg'),
(2, 1, 'Rajawali', 350000, 300000, 250000, 6, 6, '2.jpg'),
(3, 1, 'Merak', 350000, 300000, 250000, 6, 6, '3.jpg'),
(4, 1, 'Cendrawasih', 350000, 300000, 250000, 6, 6, '1.jpg'),
(5, 1, 'Kasuari', 350000, 300000, 250000, 6, 8, '2.jpg'),
(6, 2, 'Mawar', 200000, 170000, 140000, 10, 40, '3.jpg'),
(7, 2, 'Kenanga', 200000, 170000, 140000, 8, 24, '1.jpg'),
(8, 2, 'Melati', 200000, 170000, 140000, 10, 40, '2.jpg'),
(9, 2, 'Sakura', 200000, 170000, 140000, 10, 40, '3.jpg'),
(10, 2, 'Cempaka', 200000, 170000, 140000, 10, 20, '1.jpg'),
(11, 2, 'Nusa Indah', 200000, 170000, 140000, 7, 14, '2.jpg'),
(12, 3, 'Aula', 4500000, 4000000, 3000000, 0, 500, '3.jpg'),
(13, 3, 'Kelas Besar', 350000, 300000, 250000, 0, 100, '1.jpg'),
(14, 3, 'Kelas Sedang', 300000, 250000, 200000, 0, 50, '2.jpg'),
(15, 3, 'Kelas Kecil', 200000, 150000, 150000, 0, 25, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rb_halaman`
--

CREATE TABLE IF NOT EXISTS `rb_halaman` (
  `kd_halaman` int(5) NOT NULL,
  `judul_halaman` varchar(255) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_halaman`
--

INSERT INTO `rb_halaman` (`kd_halaman`, `judul_halaman`, `isi_halaman`, `tanggal`) VALUES
(1, 'Halaman Info Pendaftarannnnnaaaa', 'Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. \r\n\r\nSuspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem.\r\n\r\nEtiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. \r\n\r\nSuspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem.\r\n\r\nEtiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. ', '2015-05-27 00:00:00'),
(2, 'Halaman Info Reservasiaaaa', 'Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. \r\n\r\nSuspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem.\r\n\r\nEtiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. \r\n\r\nSuspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem.\r\n\r\nEtiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. Suspendisse vitae libero in ante mattis condimentum nec a sem. Etiam placerat mi sit amet erat fringilla id lobortis lorem dapibus. \r\n', '2015-05-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rb_jenis_penerimaan`
--

CREATE TABLE IF NOT EXISTS `rb_jenis_penerimaan` (
  `kd_jenis_penerimaan` int(5) NOT NULL,
  `jenis_penerimaan` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_jenis_penerimaan`
--

INSERT INTO `rb_jenis_penerimaan` (`kd_jenis_penerimaan`, `jenis_penerimaan`) VALUES
(1, 'Non Kemdikbud'),
(2, 'Link Kemdikbud'),
(3, 'Yayasan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kategori`
--

CREATE TABLE IF NOT EXISTS `rb_kategori` (
  `kode_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kategori`
--

INSERT INTO `rb_kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Guesthouse'),
(2, 'Wisma'),
(3, 'Ruang');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kontak`
--

CREATE TABLE IF NOT EXISTS `rb_kontak` (
  `kd_kontak` int(5) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `alamat_email` varchar(150) NOT NULL,
  `isi_pesan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kontak`
--

INSERT INTO `rb_kontak` (`kd_kontak`, `nama_lengkap`, `alamat_email`, `isi_pesan`, `waktu`) VALUES
(1, 'Robby Prihandaya', 'robby.prihandaya@gmail.com', 'Halooo, Saya mau Pesan 1 Gedung, bagaimana caranya,..?', '2015-05-28 08:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `rb_makanan`
--

CREATE TABLE IF NOT EXISTS `rb_makanan` (
  `kode_makanan` int(3) NOT NULL,
  `kode_jenis_makanan` int(5) NOT NULL,
  `harga_makanan` int(11) NOT NULL,
  `menu_makanan` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_makanan`
--

INSERT INTO `rb_makanan` (`kode_makanan`, `kode_jenis_makanan`, `harga_makanan`, `menu_makanan`) VALUES
(1, 1, 15000, 'Nasi putih, ayam bumbu merah, sambal goreng tempe, serondeng kacang, ikan asin, sambal, kerupuk, buah'),
(2, 1, 15000, 'Nasi putih, ayam bistik, oseng tempe, mie goreng, sepat kering, sambal, kerupuk,buah, bubur ayam'),
(3, 1, 15000, 'Nasi putih, telur bahampap, tempe kering, tumis pare udang, sapat balado, sambal, kerupuk, buah, bubur ayam'),
(4, 1, 15000, 'Nasi putih, bandeng presto, dadar mayonies, bihun goreng, ikan asin, sambal,kerupuk, buah, bubur ayam'),
(5, 1, 15000, 'Nasi putih, sambal goreng hati, tumis pitaloka, ikam asam manis, sambal, kerupuk, buah, bubur ayam'),
(6, 1, 20000, 'Nasi putih, peda goreng, tahu bacem, sambal goreng, udang tumis pepaya muda, sambal, kerupuk, buah'),
(7, 1, 20000, 'Nasi putih, bandeng goreng, perkedel udang, oseng kulit cempedak, tumis tahu buncis, sambal, kerupuk,buah'),
(8, 1, 20000, 'Nasi putih, soto kediri, ayam, telor pindang, sambal, kerupuk, buah'),
(9, 1, 20000, 'Nasi putih, bistik ayam, mie goreng, oseng tempe, telur pindang, sambal, kerupuk, buah'),
(10, 1, 20000, 'Nasi putih, ayam bacem, udang sop manis, manis buah-terong pipit, sambal, kerupuk, buah'),
(11, 1, 25000, 'Nasi putih,  peda goreng, sayur bayam, balado teri, tempe bacem, sambal, kerupuk,buah'),
(12, 1, 25000, 'Nasi putih, nila goreng, sayur asam, perkedel udang, terong goreng, sambal, kerupuk, buah'),
(13, 1, 25000, 'Nasi putih, ayam goreng, sop ayam, perkedel kentang, babyfish goreng tepung, sambal, kerupuk, buah'),
(14, 1, 25000, 'Nasi putih, patin bakar, sayur keladi, tempe goreng, sambal, kerupuk, buah'),
(15, 1, 25000, 'Nasi putih, nila goreng, urp sayur, pakasam sapat, sambal, kerupuk, buah'),
(16, 1, 30000, 'Nasi putih, patin goreng, sayur asam jakarta, tempe bacem, sambal goreng hati, sambal, kerupuk, buah'),
(17, 1, 30000, 'Nasi putih, nila goreng, sayur bening, urap sayur, sambal goreng cingur, sambal. kerupuk, buah'),
(18, 1, 30000, 'Nasi putih, lele goreng, sayur tiwadak, babyfish goreng, sambal udang goreng, sambal, kerupuk, buah'),
(19, 1, 30000, 'Nasi putih, nila goreng, ampal jagung, sayur asam, telang asam manis, oseng tempe, kerupuk, sambal, buah'),
(20, 1, 15001, 'Nasiiiii putih, ayam bumbu merah, sambal goreng tempe, serondeng kacang, ikan asin, sambal, kerupuk, buah'),
(21, 2, 10000, 'Teh,kopi, ongol-ongol nanas, lemper'),
(22, 2, 5000, 'Air mineral, susmeker, gulung hijau'),
(23, 2, 5000, 'air mineral, lemper, onde-onde'),
(24, 2, 5000, 'air mineral, arem-arem, sus manis'),
(25, 2, 5000, 'air mineral, sosis solo, cantik manis'),
(26, 2, 5000, 'Air mineral, martabak, ongol-ongol nanas'),
(27, 2, 10000, 'Teh, kopi, getuk, arem-arem'),
(28, 2, 10000, 'Tek, kopi, roti pisang, kroket kentang'),
(29, 2, 10000, 'Teh, kopi, susmeker, risoles'),
(30, 2, 10000, 'Teh, kopi, roti, bubur kacang hijau');

-- --------------------------------------------------------

--
-- Table structure for table `rb_members`
--

CREATE TABLE IF NOT EXISTS `rb_members` (
  `id_members` int(5) NOT NULL,
  `kd_jenis_penerimaan` int(5) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat_email` varchar(150) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_members`
--

INSERT INTO `rb_members` (`id_members`, `kd_jenis_penerimaan`, `username`, `password`, `nama_lengkap`, `nama_instansi`, `no_telpon`, `alamat_email`, `alamat_lengkap`, `tanggal_daftar`) VALUES
(1, 2, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'Robby Prihandaya', 'Dinas Pendidikan Muaro Bungo', '081267771344', 'robby.prihandaya@gmail.com', 'Jln. Angkasa Puri, Perundam 4, Blok C No 2, Padang, Sumatra Barat', '2015-05-28 07:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `rb_slide`
--

CREATE TABLE IF NOT EXISTS `rb_slide` (
  `id_slide` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(150) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_slide`
--

INSERT INTO `rb_slide` (`id_slide`, `keterangan`, `foto`, `waktu`) VALUES
(1, 'Keterangan untuk Slide 1', '1.jpg', '2015-05-30 00:00:00'),
(2, 'Keterangan untuk Slide 2', '2.jpg', '2015-05-30 00:00:00'),
(3, 'Keterangan untuk Slide 3', '3.jpg', '2015-05-30 00:00:00'),
(4, 'Keterangan untuk Slide 4', '4.jpg', '2015-05-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rb_tambahan`
--

CREATE TABLE IF NOT EXISTS `rb_tambahan` (
  `kode_tambahan` int(3) NOT NULL,
  `nama_tambahan` varchar(15) NOT NULL,
  `jml_tambahan` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_tambahan`
--

INSERT INTO `rb_tambahan` (`kode_tambahan`, `nama_tambahan`, `jml_tambahan`) VALUES
(1, 'LCD', 6),
(2, 'Sound/Wireless', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rb_trx_makanan`
--

CREATE TABLE IF NOT EXISTS `rb_trx_makanan` (
  `kd_trx_makanan` int(5) NOT NULL,
  `kd_trx_reservasi` int(5) NOT NULL,
  `kode_makanan` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `ket` enum('Pagi','Siang','Malam') NOT NULL,
  `waktu_pesan` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_trx_makanan`
--

INSERT INTO `rb_trx_makanan` (`kd_trx_makanan`, `kd_trx_reservasi`, `kode_makanan`, `jumlah`, `ket`, `waktu_pesan`) VALUES
(1, 1, 1, 9, 'Pagi', '2015-05-28 00:00:00'),
(2, 1, 3, 12, 'Pagi', '2015-05-29 00:00:00'),
(8, 8, 10, 47, 'Pagi', '2015-06-17 06:33:19'),
(7, 1, 8, 30, 'Siang', '2015-06-17 04:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `rb_trx_reservasi`
--

CREATE TABLE IF NOT EXISTS `rb_trx_reservasi` (
  `kd_trx_reservasi` int(5) NOT NULL,
  `id_members` int(5) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `sampai_tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `waktu_pesan` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_trx_reservasi`
--

INSERT INTO `rb_trx_reservasi` (`kd_trx_reservasi`, `id_members`, `tanggal_pesan`, `sampai_tanggal`, `keterangan`, `waktu_pesan`) VALUES
(1, 1, '2015-06-15 00:00:00', '2015-06-17 00:00:00', 'Mohon Dibantu, Kita mau Melakukan Pemesanan,..', '2015-05-29 06:58:25'),
(8, 1, '2015-06-17 00:00:00', '2015-06-18 00:00:00', 'Mohon Dibantu, saya sagat butuh gedung ini,..', '2015-06-17 06:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `rb_trx_reservasi_detail`
--

CREATE TABLE IF NOT EXISTS `rb_trx_reservasi_detail` (
  `id` int(5) NOT NULL,
  `kd_trx_reservasi` int(5) NOT NULL,
  `kode_fasilitas` int(5) NOT NULL,
  `jml_orang` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_trx_reservasi_detail`
--

INSERT INTO `rb_trx_reservasi_detail` (`id`, `kd_trx_reservasi`, `kode_fasilitas`, `jml_orang`) VALUES
(1, 1, 1, 0),
(2, 1, 7, 0),
(10, 8, 12, 45),
(9, 8, 6, 87),
(8, 8, 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `rb_trx_tambahan`
--

CREATE TABLE IF NOT EXISTS `rb_trx_tambahan` (
  `kd_trx_tambahan` int(5) NOT NULL,
  `kd_trx_reservasi` int(5) NOT NULL,
  `kode_tambahan` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_trx_tambahan`
--

INSERT INTO `rb_trx_tambahan` (`kd_trx_tambahan`, `kd_trx_reservasi`, `kode_tambahan`, `jumlah`, `waktu`) VALUES
(1, 2, 2, 2, '2015-05-30 05:31:39'),
(2, 1, 2, 2, '2015-05-30 15:20:04'),
(3, 1, 1, 1, '2015-05-30 15:20:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rb_admin`
--
ALTER TABLE `rb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `rb_fasilitas`
--
ALTER TABLE `rb_fasilitas`
  ADD PRIMARY KEY (`kode_fasilitas`);

--
-- Indexes for table `rb_halaman`
--
ALTER TABLE `rb_halaman`
  ADD PRIMARY KEY (`kd_halaman`);

--
-- Indexes for table `rb_jenis_penerimaan`
--
ALTER TABLE `rb_jenis_penerimaan`
  ADD PRIMARY KEY (`kd_jenis_penerimaan`);

--
-- Indexes for table `rb_kategori`
--
ALTER TABLE `rb_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `rb_kontak`
--
ALTER TABLE `rb_kontak`
  ADD PRIMARY KEY (`kd_kontak`);

--
-- Indexes for table `rb_makanan`
--
ALTER TABLE `rb_makanan`
  ADD PRIMARY KEY (`kode_makanan`);

--
-- Indexes for table `rb_members`
--
ALTER TABLE `rb_members`
  ADD PRIMARY KEY (`id_members`);

--
-- Indexes for table `rb_slide`
--
ALTER TABLE `rb_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `rb_tambahan`
--
ALTER TABLE `rb_tambahan`
  ADD PRIMARY KEY (`kode_tambahan`);

--
-- Indexes for table `rb_trx_makanan`
--
ALTER TABLE `rb_trx_makanan`
  ADD PRIMARY KEY (`kd_trx_makanan`);

--
-- Indexes for table `rb_trx_reservasi`
--
ALTER TABLE `rb_trx_reservasi`
  ADD PRIMARY KEY (`kd_trx_reservasi`);

--
-- Indexes for table `rb_trx_reservasi_detail`
--
ALTER TABLE `rb_trx_reservasi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rb_trx_tambahan`
--
ALTER TABLE `rb_trx_tambahan`
  ADD PRIMARY KEY (`kd_trx_tambahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rb_admin`
--
ALTER TABLE `rb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rb_fasilitas`
--
ALTER TABLE `rb_fasilitas`
  MODIFY `kode_fasilitas` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rb_halaman`
--
ALTER TABLE `rb_halaman`
  MODIFY `kd_halaman` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rb_jenis_penerimaan`
--
ALTER TABLE `rb_jenis_penerimaan`
  MODIFY `kd_jenis_penerimaan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rb_kategori`
--
ALTER TABLE `rb_kategori`
  MODIFY `kode_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rb_kontak`
--
ALTER TABLE `rb_kontak`
  MODIFY `kd_kontak` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rb_makanan`
--
ALTER TABLE `rb_makanan`
  MODIFY `kode_makanan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `rb_members`
--
ALTER TABLE `rb_members`
  MODIFY `id_members` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rb_slide`
--
ALTER TABLE `rb_slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rb_tambahan`
--
ALTER TABLE `rb_tambahan`
  MODIFY `kode_tambahan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rb_trx_makanan`
--
ALTER TABLE `rb_trx_makanan`
  MODIFY `kd_trx_makanan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rb_trx_reservasi`
--
ALTER TABLE `rb_trx_reservasi`
  MODIFY `kd_trx_reservasi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rb_trx_reservasi_detail`
--
ALTER TABLE `rb_trx_reservasi_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rb_trx_tambahan`
--
ALTER TABLE `rb_trx_tambahan`
  MODIFY `kd_trx_tambahan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
