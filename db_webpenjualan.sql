-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2015 pada 13.28
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webpenjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE IF NOT EXISTS `tb_kegiatan` (
  `tanggal` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `kode_user` int(8) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `detail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`tanggal`, `jam`, `kode_user`, `nama_kegiatan`, `detail`) VALUES
('2015/09/14', '06:25:10.935089', 18523465, 'Mengirim SMS', 'qqeqeq'),
('2015/09/14', '06:25:13.972196', 18523465, 'Mengirim SMS', 'qqqq'),
('2015/09/14', '06:29:30.047961', 18523465, 'Mengirim SMS', 'efef'),
('2015/09/14', '06:30:19.373321', 18523465, 'Mengirim SMS', 'ssss'),
('2015/09/14', '06:31:05.013924', 18523465, 'Mengirim SMS', 'ww'),
('2015/09/14', '06:31:06.724201', 18523465, 'Mengirim SMS', 'ww'),
('2015/09/14', '06:35:24.451584', 18523465, 'Mengirim SMS', 'aaaaa'),
('2015/09/14', '06:44:27.470596', 18523465, 'Mengirim SMS', 'aaaa'),
('2015/09/14', '06:47:58.700569', 17676287, 'Mengirim SMS', 'sss'),
('2015/09/14', '17:48:53.321440', 18523465, 'Memesan Ponsel', '<h1>Merk = nokia Tipe = Eaq Kategori = android harga = 570000</h1>'),
('2015/09/14', '18:25:27.535121', 18523465, 'Memesan Ponsel', '<h1>Merk = Samsung Tipe = Galaxy S6 Edge Kategori = android harga = 2000000</h1>'),
('2015/09/13', '19:56:43.432964', 18523465, 'Mengirim SMS', 'jkgajgsasas\n'),
('2015/09/13', '19:56:48.864900', 18523465, 'Mengirim SMS', 'gagdjagdadad'),
('2015/09/13', '19:56:58.184900', 18523465, 'Mengirim SMS', 'adadad'),
('2015/09/13', '19:57:02.511225', 18523465, 'Mengirim SMS', 'sADdA'),
('2015/09/13', '20:00:27.042025', 18523465, 'Mengirim SMS', 'SDADADA'),
('2015/09/13', '20:09:29.594441', 17676287, 'Mengirim SMS', 'ABBDuu'),
('2015/09/13', '20:09:33.751689', 17676287, 'Mengirim SMS', 'adadas'),
('2015/09/13', '20:09:38.527076', 17676287, 'Mengirim SMS', 'adadadada'),
('2015/09/13', '20:09:45.262144', 17676287, 'Mengirim SMS', 'asaskjajkskjajs'),
('2015/09/13', '20:09:48.687241', 17676287, 'Mengirim SMS', 'msms'),
('2015/09/13', '20:10:34.129600', 17676287, 'Mengirim SMS', 'gyugguguguyu'),
('2015/09/13', '20:10:44.240100', 17676287, 'Mengirim SMS', ' ,,,                                                                                                                          '),
('2015/09/13', '20:11:04.390625', 17676287, 'Mengirim SMS', 'adada'),
('2015/09/13', '20:11:12.938961', 17676287, 'Mengirim SMS', 'aadadad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masuk`
--

CREATE TABLE IF NOT EXISTS `tb_masuk` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gender` enum('laki','perempuan') NOT NULL,
  `level` enum('admin','operator','user') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18523467 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masuk`
--

INSERT INTO `tb_masuk` (`kode_user`, `username`, `password`, `nama_lengkap`, `alamat`, `gender`, `level`) VALUES
(17676287, 'Novia', 'NoviabPjZupPSmvubriT8+Zm+m9NsDaMtZyQRGTC8tb7Mg2s=', 'Novia Erviana', 'other', 'perempuan', 'admin'),
(18523464, 'operator', 'operatorFiyJi+f0toayyMeJH6SwkSIkXkwOAsIAkAJ/lJvED2E=', 'operator', 'kosong', 'perempuan', 'operator'),
(18523465, 'user', 'userzMspVMCfpQI4DlOX5AbESF/7MK77rpoupJesTihHjyE=', 'user', 'unknown', 'laki', 'user'),
(18523466, 'ani', 'aniXNFE1T6XpjJ8BIx5aMU3yz6pLeg28KKF48E+ZCDO0iI=', 'ana', 'mojokerto', 'perempuan', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pesanan` (
  `username` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `kode_ponsel` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`username`, `jam`, `tanggal`, `kode_ponsel`) VALUES
('user', '04:44:07', '2015/09/6', ''),
('user', '04:46:00', '2015/09/6', ''),
('user', '04:46:36', '2015/09/6', ''),
('user', '04:46:50', '2015/09/6', ''),
('user', '04:46:59', '2015/09/6', ''),
('user', '04:47:27', '2015/09/6', ''),
('user', '04:47:37', '2015/09/6', ''),
('user', '05:02:40', '2015/09/7', ''),
('user', '05:02:52', '2015/09/7', ''),
('user', '05:02:54', '2015/09/7', ''),
('user', '05:02:56', '2015/09/7', ''),
('user', '05:03:17', '2015/09/7', ''),
('user', '05:04:53', '2015/09/7', ''),
('user', '05:05:31', '2015/09/7', ''),
('user', '05:06:30', '2015/09/7', ''),
('user', '05:09:01', '2015/09/7', ''),
('user', '05:11:30', '2015/09/7', ''),
('user', '05:11:35', '2015/09/7', ''),
('user', '05:11:37', '2015/09/7', ''),
('user', '05:11:47', '2015/09/7', ''),
('user', '05:11:53', '2015/09/7', ''),
('user', '05:14:00', '2015/09/7', ''),
('user', '05:15:49', '2015/09/7', ''),
('user', '05:15:59', '2015/09/7', ''),
('user', '05:16:09', '2015/09/7', ''),
('user', '05:18:20', '2015/09/7', ''),
('user', '05:19:07', '2015/09/7', 'P0011'),
('user', '05:19:17', '2015/09/7', 'P0011'),
('user', '05:19:35', '2015/09/7', 'P0011'),
('user', '05:19:38', '2015/09/7', 'P0011'),
('user', '05:54:44', '2015/09/7', ''),
('user', '06:03:08', '2015/09/7', ''),
('user', '06:03:12', '2015/09/7', 'P0010'),
('user', '06:03:16', '2015/09/7', 'P0011'),
('user', '06:03:19', '2015/09/7', 'P0012'),
('user', '06:10:02', '2015/09/7', ''),
('user', '06:10:05', '2015/09/7', 'P0001'),
('user', '06:12:06', '2015/09/7', 'P0001'),
('user', '06:13:20', '2015/09/7', ''),
('user', '06:13:27', '2015/09/7', 'P0001'),
('user', '06:16:23', '2015/09/7', 'P0001'),
('user', '06:17:08', '2015/09/7', 'P0001'),
('user', '06:17:14', '2015/09/7', 'P0010'),
('user', '06:17:18', '2015/09/7', 'P0011'),
('user', '06:18:29', '2015/09/7', 'P0026'),
('user', '06:18:35', '2015/09/7', 'P0013'),
('user', '06:18:50', '2015/09/7', 'P0016'),
('user', '06:19:01', '2015/09/7', 'P0013'),
('user', '06:19:20', '2015/09/7', 'P0013'),
('user', '06:19:25', '2015/09/7', 'P0001'),
('user', '06:19:45', '2015/09/7', 'P0001'),
('user', '06:19:59', '2015/09/7', 'P0010'),
('user', '06:20:07', '2015/09/7', 'P0012'),
('user', '06:26:28', '2015/09/7', 'P0012'),
('user', '06:26:38', '2015/09/7', 'P0011'),
('user', '06:26:42', '2015/09/7', 'P0012'),
('user', '06:28:59', '2015/09/7', 'P0012'),
('user', '06:29:15', '2015/09/7', ''),
('user', '06:29:24', '2015/09/7', 'P0012'),
('user', '06:30:00', '2015/09/7', ''),
('user', '06:30:07', '2015/09/8', ''),
('user', '06:30:11', '2015/09/7', ''),
('user', '06:30:12', '2015/09/8', 'P0001'),
('user', '06:30:30', '2015/09/8', 'P0010'),
('user', '06:30:44', '2015/09/8', 'P0011'),
('user', '06:30:50', '2015/09/8', 'P0012'),
('user', '06:30:55', '2015/09/8', 'P0013'),
('user', '06:31:00', '2015/09/8', 'P0011'),
('user', '06:31:13', '2015/09/8', 'P0010'),
('user', '06:31:19', '2015/09/8', 'P0001'),
('user', '06:31:58', '2015/09/7', ''),
('user', '06:32:33', '2015/09/8', 'P0015'),
('user', '06:32:41', '2015/09/7', ''),
('user', '06:32:44', '2015/09/7', ''),
('user', '06:32:48', '2015/09/7', 'P0033'),
('user', '06:32:53', '2015/09/7', 'P0032'),
('user', '06:33:08', '2015/09/7', 'P0032'),
('user', '06:33:12', '2015/09/7', 'P0013'),
('user', '06:33:23', '2015/09/8', 'P0016'),
('user', '06:33:38', '2015/09/8', 'P0001'),
('user', '06:35:18', '2015/09/8', 'P0012'),
('user', '06:35:41', '2015/09/8', 'P0012'),
('user', '06:35:51', '2015/09/8', 'P0012'),
('user', '06:42:26', '2015/09/8', 'P0012'),
('user', '06:45:55', '2015/09/7', ''),
('user', '06:46:01', '2015/09/7', 'P0011'),
('user', '06:46:55', '2015/09/7', 'P0011'),
('user', '06:50:23', '2015/09/7', 'P0011'),
('user', '06:50:30', '2015/09/7', ''),
('user', '07:16:40', '2015/09/6', 'P0031'),
('user', '07:16:46', '2015/09/6', 'P0031'),
('user', '07:16:49', '2015/09/6', 'P0032'),
('user', '07:20:15', '2015/09/6', ''),
('user', '07:20:25', '2015/09/6', ''),
('user', '07:27:05', '2015/09/7', ''),
('user', '07:27:31', '2015/09/7', ''),
('user', '07:27:37', '2015/09/7', ''),
('user', '07:27:45', '2015/09/7', 'P0013'),
('user', '07:28:35', '2015/09/7', 'P0013'),
('user', '07:28:41', '2015/09/7', 'P0012'),
('user', '07:28:58', '2015/09/7', 'P0012'),
('user', '07:30:13', '2015/09/7', 'P0012'),
('user', '07:35:26', '2015/09/7', 'P0012'),
('user', '07:35:36', '2015/09/7', 'P0012'),
('user', '07:37:03', '2015/09/7', 'P0012'),
('user', '07:37:15', '2015/09/7', 'P0012'),
('user', '07:38:00', '2015/09/7', 'P0010'),
('user', '07:40:02', '2015/09/7', 'P0010'),
('user', '07:40:06', '2015/09/7', 'P0001'),
('user', '07:40:21', '2015/09/7', 'P0010'),
('user', '07:40:45', '2015/09/7', 'cbbc'),
('user', '07:41:09', '2015/09/7', ''),
('user', '07:42:13', '2015/09/7', 'cbbc'),
('user', '07:44:22', '2015/09/7', 'P0013'),
('user', '07:46:41', '2015/09/7', 'P0013'),
('user', '07:46:51', '2015/09/7', 'P0010'),
('user', '07:46:58', '2015/09/7', 'P0012'),
('user', '07:49:54', '2015/09/7', ''),
('user', '07:49:58', '2015/09/7', 'P0001'),
('user', '08:27:52', '2015/09/6', ''),
('user', '08:30:39', '2015/09/6', ''),
('user', '08:49:59', '2015/09/7', 'P0001'),
('user', '08:50:43', '2015/09/7', 'P0010'),
('user', '08:50:56', '2015/09/7', ''),
('user', '09:04:50', '2015/09/7', ''),
('user', '09:05:01', '2015/09/7', 'P0011'),
('user', '09:05:15', '2015/09/7', 'P0010'),
('user', '09:05:28', '2015/09/7', 'P0001'),
('ani', '13:42:47', '2015/09/6', ''),
('ani', '13:44:41', '2015/09/6', ''),
('ani', '13:47:55', '2015/09/6', ''),
('ani', '13:48:58', '2015/09/6', ''),
('ani', '13:49:03', '2015/09/6', 'P0001'),
('user', '18:53:36', '2015/09/8', ''),
('user', '18:53:41', '2015/09/8', 'P0001'),
('user', '18:53:46', '2015/09/8', 'P0010'),
('user', '18:53:52', '2015/09/8', 'P0012'),
('user', '18:54:07', '2015/09/8', 'P0012'),
('user', '18:54:13', '2015/09/8', 'P0010'),
('user', '18:54:19', '2015/09/8', 'P0001'),
('user', '18:54:24', '2015/09/8', 'P0013'),
('user', '18:55:56', '2015/09/8', ''),
('user', '18:56:03', '2015/09/8', 'P0028'),
('user', '18:58:27', '2015/09/8', 'P0028'),
('user', '18:58:36', '2015/09/8', 'P0023'),
('user', '20:39:39', '2015/09/6', ''),
('user', '20:40:23', '2015/09/6', 'P0010'),
('user', '20:59:12', '2015/09/6', ''),
('user', '21:00:16', '2015/09/6', ''),
('user', '21:00:27', '2015/09/6', ''),
('user', '21:00:42', '2015/09/6', ''),
('user', '21:01:02', '2015/09/6', ''),
('user', '22:28:37.0', '2015/09/08', ''),
('user', '22:28:43.8', '2015/09/08', 'P0001'),
('user', '22:29:45', '2015/09/6', ''),
('user', '22:30:24', '2015/09/6', ''),
('user', '22:30:31', '2015/09/6', ''),
('user', '22:34:45', '2015/09/6', ''),
('user', '22:34:52', '2015/09/6', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ponsel`
--

CREATE TABLE IF NOT EXISTS `tb_ponsel` (
  `kode_ponsel` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `kategori` enum('android','blackberry','mobile') NOT NULL,
  `harga` int(20) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `kondisi` enum('baru','second') NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ponsel`
--

INSERT INTO `tb_ponsel` (`kode_ponsel`, `gambar`, `merk`, `tipe`, `kategori`, `harga`, `detail`, `kondisi`, `stok`) VALUES
('P0001', 'P0001.gif', 'Samsung', 'Galaxy S6 Edge', 'android', 2000000, 'P0001.html', 'baru', 29),
('P0010', 'P0010.gif', 'Samsung', 'Galaxy S6', 'android', 1500000, 'P0010.html', 'baru', 1),
('P0011', 'P0011.gif', 'Samsung', 'Galaxy S5 ', 'android', 2000000, 'P0011.html', 'second', 15),
('P0012', 'P0012.gif', 'Samsung', 'Galaxy S5 Mini', 'android', 1000000, 'Kosong.html', 'baru', 1),
('P0013', 'P0013.gif', 'Samsung', 'Galaxy S4', 'android', 1200000, 'Kosong.html', 'baru', 1),
('P0014', 'P0014.gif', 'Samsung', 'Galaxy S3 Neo', 'android', 2000000, 'Kosong.html', 'baru', 1),
('P0015', 'P0015.gif', 'Samsung', 'Galaxy Tab A 9.7', 'android', 5000000, 'Kosong.html', 'baru', 1),
('P0016', 'P0034.gif', 'Samsung', 'Galaxy J1', 'android', 2000000, 'Kosong.html', 'baru', 1),
('P0017', 'P0017.gif', 'oppo', 'Acv', 'android', 500000, 'Kosong.html', 'baru', 15),
('P0018', 'P0018.gif', 'nokia', 'Bdr', 'android', 700000, 'Kosong.html', 'second', 19),
('P0019', 'P0019.gif', 'nokia', 'Caq2', 'mobile', 560000, 'Kosong.html', 'second', 12),
('P0020', 'P0020.gif', 'nokia', 'D123', 'mobile', 570000, 'Kosong.html', 'baru', 14),
('P0021', 'P0021.gif', 'nokia', 'Eaq', 'android', 570000, 'Kosong.html', 'baru', 16),
('P0022', 'P0022.gif', 'oppo', 'F22', 'android', 230000, 'Kosong.html', 'baru', 1),
('P0023', 'P0023.gif', 'blacberry', 'gemini', 'blackberry', 530000, 'Kosong.html', 'baru', 12),
('P0024', 'Kosong.gif', 'Samsung', 'H', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0025', 'Kosong.gif', 'Samsung', 'I', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0026', 'Kosong.gif', 'Samsung', 'J', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0027', 'P0027.gif', 'Samsung', 'K', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0028', 'P0028.gif', 'Samsung', 'L', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0029', 'Kosong.gif', 'Samsung', 'M', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0030', 'Kosong.gif', 'Samsung', 'N', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0031', 'Kosong.gif', 'Samsung', 'O', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0032', 'Kosong.gif', 'Samsung', 'P', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0033', 'Kosong.gif', 'Samsung', 'Q', 'blackberry', 50000, 'Kosong.html', 'baru', 1),
('P0034', 'Kosong.gif', 'Samsung', 'Z', 'android', 50000, 'Kosong.html', 'baru', 1),
('P0035', 'Kosong.gif', 'ASUS', 'ZENFONE', 'android', 1500000, 'Kosong.html', 'baru', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`jam`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`jam`);

--
-- Indexes for table `tb_ponsel`
--
ALTER TABLE `tb_ponsel`
  ADD PRIMARY KEY (`kode_ponsel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18523467;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
