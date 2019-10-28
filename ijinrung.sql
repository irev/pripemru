-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Okt 2019 pada 00.17
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
  `PerusID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type` set('izin','informasi') NOT NULL,
  `json_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_permohonan`
--

INSERT INTO `data_permohonan` (`id`, `RuangID`, `PerusID`, `status`, `type`, `json_status`) VALUES
(6, '5db713a8e08er', 1, 'Belum Lengkap', 'informasi', '{\'informasi_pemohon\':\'Foto Copy Identitas Pemohon\',\'informasi_datapreusahaan\':\'Data Perusahaan (untuk yang berbadan hukum)\'}');

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
  `idPru` int(11) NOT NULL,
  `nmPeru` varchar(300) NOT NULL,
  `alamatPeru` varchar(300) NOT NULL,
  `npwpPeru` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`idPru`, `nmPeru`, `alamatPeru`, `npwpPeru`) VALUES
(1, 'CV. TEST IZIN PERUSAHAAN', 'Jl. Cubadak Simpang Kalam', '012938-23-200-223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `idRuang` varchar(100) NOT NULL,
  `peruID` int(11) NOT NULL,
  `type` set('izin','informasi') NOT NULL,
  `luasLahan` int(11) NOT NULL,
  `statusPemilik` set('Milik Sendiri','Masyarakat','Sewa','Kontrak') NOT NULL,
  `nmPemilik` varchar(300) NOT NULL,
  `nmrSertifikat` varchar(500) NOT NULL,
  `atasNama` varchar(300) NOT NULL,
  `nagari` varchar(300) NOT NULL,
  `kecamatan` varchar(300) NOT NULL,
  `letakLahan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`idRuang`, `peruID`, `type`, `luasLahan`, `statusPemilik`, `nmPemilik`, `nmrSertifikat`, `atasNama`, `nagari`, `kecamatan`, `letakLahan`) VALUES
('5db713a8e0846', 1, 'izin', 300, 'Milik Sendiri', 'Meedun', '123/Sertifikat/tanah/2019', 'Tn. Meedun', 'Kinali', 'Kec. Kinali', 'Jln. Kinali Samping singai'),
('5db713a8e08er', 1, 'informasi', 300, 'Milik Sendiri', 'Meedun', '123/Sertifikat/tanah/2019', 'Tn. Meedun', 'Kinali', 'Kec. Kinali', 'Jln. Kinali Samping singai');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_permohonan`
--
ALTER TABLE `data_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_syarat`
--
ALTER TABLE `m_syarat`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
