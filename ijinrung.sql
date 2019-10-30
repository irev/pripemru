-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Okt 2019 pada 00.39
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijinrung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_permohonan`
--

CREATE TABLE `data_permohonan` (
  `id` int(11) NOT NULL,
  `RuangID` varchar(100) NOT NULL,
  `PerusID` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type` set('izin','informasi') NOT NULL,
  `c_date` datetime NOT NULL,
  `uDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `json_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_permohonan`
--

INSERT INTO `data_permohonan` (`id`, `RuangID`, `PerusID`, `status`, `type`, `c_date`, `uDate`, `json_status`) VALUES
(6, '5db713a8e08er', '1', 'Belum Lengkap', 'informasi', '2019-10-01 00:00:00', '2019-10-03 00:00:00', '{\'informasi_pemohon\':\'Foto Copy Identitas Pemohon\',\'informasi_datapreusahaan\':\'Data Perusahaan (untuk yang berbadan hukum)\'}'),
(8, '5db713a8e0846', '1', 'Lengkap', 'izin', '2019-10-01 00:00:00', '2019-10-31 04:26:43', '{\'izin_pemohon\':\'Foto Copy Identitas Pemohon\',\'izin_datapreusahaan\':\'Data Perusahaan (untuk yang berbadan hukum)\',\'izin_buktimilik\':\'Foto Copy bukti kepemilikan lahan\',\'izin_petalokasi\':\'Peta lokasi (dilengkapi dengan titik koordinat polygon dari BPN dan penanggung jawab koordinat adalah pemohon)\',\'izin_suratpersetujuan\':\'Surat Persetuuan dari Pemerintah terendah/surat persetuuan dari masyarakat setempat\',\'izin_kphp\':\'Surat keterangan bebas kawasan hutan, KPHP\'}'),
(9, '5db713a8e08er', 'PER5dba0bff414aa', 'Lengkap', 'informasi', '2019-10-08 00:13:16', '2019-10-31 06:00:39', '{\'informasi_pemohon\':\'Foto Copy Identitas Pemohon\',\'informasi_datapreusahaan\':\'Data Perusahaan (untuk yang berbadan hukum)\',\'informasi_buktimilik\':\'Foto Copy bukti kepemilikan lahan\',\'informasi_petalokasi\':\'Peta lokasi (dilengkapi dengan titik koordinat polygon dari BPN dan penanggung jawab koordinat adalah pemohon)\'}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_syarat`
--

CREATE TABLE `m_syarat` (
  `ids` int(11) NOT NULL,
  `urut` int(11) NOT NULL,
  `kodeizin` varchar(100) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_syarat`
--

INSERT INTO `m_syarat` (`ids`, `urut`, `kodeizin`, `nama`, `type`) VALUES
(1, 1, 'izin_pemohon', 'Foto Copy Identitas Pemohon', 'izin'),
(2, 2, 'izin_datapreusahaan', 'Data Perusahaan (untuk yang berbadan hukum)', 'izin'),
(3, 3, 'izin_buktimilik', 'Foto Copy bukti kepemilikan lahan', 'Izin'),
(4, 4, 'izin_petalokasi', 'Peta lokasi (dilengkapi dengan titik koordinat polygon dari BPN dan penanggung jawab koordinat adalah pemohon)', 'Izin'),
(5, 5, 'izin_suratpersetujuan', 'Surat Persetuuan dari Pemerintah terendah/surat persetuuan dari masyarakat setempat', 'Izin'),
(6, 6, 'izin_kphp', 'Surat keterangan bebas kawasan hutan, KPHP', 'Izin'),
(7, 1, 'informasi_pemohon', 'Foto Copy Identitas Pemohon', 'Informasi'),
(8, 2, 'informasi_datapreusahaan', 'Data Perusahaan (untuk yang berbadan hukum)', 'Informasi'),
(9, 3, 'informasi_buktimilik', 'Foto Copy bukti kepemilikan lahan', 'Informasi'),
(10, 4, 'informasi_petalokasi', 'Peta lokasi (dilengkapi dengan titik koordinat polygon dari BPN dan penanggung jawab koordinat adalah pemohon)', 'Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idPru` varchar(100) NOT NULL,
  `nmPeru` varchar(300) NOT NULL,
  `alamatPeru` varchar(300) NOT NULL,
  `npwpPeru` varchar(200) NOT NULL,
  `userid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`idPru`, `nmPeru`, `alamatPeru`, `npwpPeru`, `userid`) VALUES
('1', 'CV. TEST IZIN PERUSAHAAN', 'Jl. Cubadak Simpang Kalam', '012938-23-200-223', 'USR5db9e49baad29'),
('PER5dba0bff414aa', 'PT maju Terusss', 'jln. M Hatta', '9090909', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `idRuang` varchar(100) NOT NULL,
  `peruID` varchar(100) NOT NULL,
  `type` set('izin','informasi') NOT NULL,
  `luasLahan` int(11) NOT NULL,
  `statusPemilik` set('Milik Sendiri','Masyarakat','Sewa','Kontrak') NOT NULL,
  `nmPemilik` varchar(300) NOT NULL,
  `nmrSertifikat` varchar(500) NOT NULL,
  `atasNama` varchar(300) NOT NULL,
  `nagari` varchar(300) NOT NULL,
  `kecamatan` varchar(300) NOT NULL,
  `letakLahan` varchar(300) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `cDate` datetime NOT NULL,
  `uDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`idRuang`, `peruID`, `type`, `luasLahan`, `statusPemilik`, `nmPemilik`, `nmrSertifikat`, `atasNama`, `nagari`, `kecamatan`, `letakLahan`, `userid`, `cDate`, `uDate`) VALUES
('5db713a8e0846', '1', 'izin', 300, 'Milik Sendiri', 'Meedun', '123/Sertifikat/tanah/2019', 'Tn. Meedun', 'Kinali', 'Kec. Kinali', 'Jln. Kinali Samping singai', 'USR5db9e49baad29 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5db713a8e08er', '1', 'informasi', 300, 'Milik Sendiri', 'Meedun', '222/Sertifikat/tanah/2019', 'Tn. Meedun', 'Kinali', 'Kec. Kinali', 'Jln. Kinali Samping singai', 'USR5db9e49baad29 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5db713a8ess', 'PER5dba0bff414aa', 'informasi', 300, 'Milik Sendiri', 'Meedun', '123/Sertifikat/tanah/2019', 'Tn. Meedun', 'Kinali', 'Kec. Kinali', 'Jln. Kinali Samping singai', '0000', '0000-00-00 00:00:00', '2019-10-31 06:06:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `level` set('user','operator','admin','') NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` text NOT NULL,
  `token_expire` date NOT NULL,
  `register` tinyint(1) NOT NULL,
  `cDate` datetime NOT NULL,
  `uDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `lastlog` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `email`, `token`, `token_expire`, `register`, `cDate`, `uDate`, `lastlog`) VALUES
('USR5db9758b7635d', 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator', 'tataruang.puprpasbar@gmail.com', 'Tok_5db99322b98a5', '2019-10-31', 0, '0000-00-00 00:00:00', '2019-10-31 04:21:14', '2019-10-30 10:21:00'),
('USR5db992b6ef29a', 'admin', 'a3f94fd3f2bc4a2fbcac62ae49073972', 'admin', 'refyandra@gmail.com', 'Tok_5db992b6ef4bf', '2019-10-31', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-10-30 20:49:02'),
('USR5db9e49baad29', 'userbiasa', '5ce18dd788da69615cf285d404daa225', 'user', 'userbiasa@gmail.com', 'Tok_5db9e49bb47b0', '2019-10-31', 0, '0000-00-00 00:00:00', '2019-10-31 02:29:56', '2019-10-30 08:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_permohonan`
--
ALTER TABLE `data_permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RuangID` (`RuangID`),
  ADD KEY `PerusID` (`PerusID`);

--
-- Indexes for table `m_syarat`
--
ALTER TABLE `m_syarat`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idPru`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`idRuang`),
  ADD KEY `peruID` (`peruID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_permohonan`
--
ALTER TABLE `data_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_syarat`
--
ALTER TABLE `m_syarat`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
