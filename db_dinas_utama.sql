-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2026 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dinas_utama`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache_cadil_sppd`
--

CREATE TABLE `cache_cadil_sppd` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tempat_tujuan` text DEFAULT NULL,
  `tgl_brkt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cache_cadil_sppd`
--

INSERT INTO `cache_cadil_sppd` (`id`, `nama`, `jabatan`, `tempat_tujuan`, `tgl_brkt`) VALUES
(1, 'GADIS SEPHI FEBRIANA', 'Ketua Dekranasda Kota Tegal', 'Makassar', '2026-07-09'),
(2, 'TUTTY MUSLIMAH RUSLI', 'IKM', 'Makassar', '2026-07-08'),
(3, 'AHMAD MUSLIH', 'Penjaga Stand Pameran', 'Makassar', '2026-07-08'),
(4, 'ALLAM MANGKURAGA', 'Driver', 'Semarang', '2026-07-08'),
(5, 'TIFANNY EKA PRIDAYANTI, S.T.', 'Penyuluh Perindustrian dan Perdagangan Ahli Pertama ', 'Makassar', '2026-07-08'),
(6, 'TRIWAHYU SAIFIATI, SE', 'Kepala Bidang Perindustrian', 'Makassar', '2026-07-08'),
(7, 'ALLAM MANGKURAGA', 'Non ASN (Driver)', 'Semarang', '2026-07-05'),
(8, 'ILHAM PRASETYO, S.Sos., M.Si.', 'Kepala Dinas Tenaga Kerja dan Perindustrian Kota Tegal', 'Semarang', '2026-07-05'),
(9, 'LUTHFI ADI SETIAWAN, S.E.', 'Pengantar Kerja', 'Semarang', '2026-07-05'),
(10, 'ALLAM MANGKURAGA', 'Non ASN (Driver)', 'Jakarta', '2026-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `cache_laporan_industri`
--

CREATE TABLE `cache_laporan_industri` (
  `id` int(11) NOT NULL,
  `nama_industri` varchar(255) DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cache_laporan_industri`
--

INSERT INTO `cache_laporan_industri` (`id`, `nama_industri`, `jenis_usaha`, `alamat`, `status`, `created_at`) VALUES
(1, 'Bangun Jaya', 'Properti', 'jl semeru', 'Aktif', '2026-06-27 00:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_cache`
--

CREATE TABLE `dashboard_cache` (
  `cache_key` varchar(255) NOT NULL,
  `cache_value` text DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboard_cache`
--

INSERT INTO `dashboard_cache` (`cache_key`, `cache_value`, `last_updated`) VALUES
('cadil_data', '{\"total_sppd\":\"77\",\"grafik_sppd\":[7,21,4,11,20,5,9,0,0,0,0,0]}', '2026-07-16 08:12:36'),
('cakar_data', '{\"total_pengajuan\":\"1373\",\"menunggu\":\"98\",\"selesai\":\"1259\",\"terkonfirmasi\":\"1\",\"ditolak\":\"15\"}', '2026-07-18 23:11:49'),
('elenopeda_data', '{\"total_npd\":\"205\",\"npd_verifikasi\":\"204\",\"npd_belum\":\"1\",\"jml_program\":\"8\",\"jml_kegiatan\":\"56\",\"jml_sub_kegiatan\":\"133\",\"total_dana\":\"7959983184\"}', '2026-07-16 08:08:54'),
('laporan_industri_data', '{\"total_ikm\":\"1430\",\"ikm_kecil\":\"1359\",\"ikm_menengah\":\"53\",\"ikm_besar\":\"17\",\"kbli\":[{\"id_kbli\":\"1\",\"nama_kbli\":\"Industri Makanan\",\"jml\":\"675\"},{\"id_kbli\":\"2\",\"nama_kbli\":\"Industri Minuman\",\"jml\":\"67\"},{\"id_kbli\":\"3\",\"nama_kbli\":\"Industri Pengolahan Tembakau\",\"jml\":\"1\"},{\"id_kbli\":\"4\",\"nama_kbli\":\"Industri Tekstil\",\"jml\":\"63\"},{\"id_kbli\":\"5\",\"nama_kbli\":\"Industri Pakaian jadi\",\"jml\":\"82\"},{\"id_kbli\":\"6\",\"nama_kbli\":\"Industri Kulit, Barang dari Kulit dan Alas Kaki\",\"jml\":\"6\"},{\"id_kbli\":\"7\",\"nama_kbli\":\"Industri Kayu, Barang dari Kayu dan Gabus (Tidak Termasuk Furnitur) dan Barang Anyaman dari Bambu, Rotan dan Sejenisnya\",\"jml\":\"29\"},{\"id_kbli\":\"8\",\"nama_kbli\":\"Industri Kertas dan Barang dari Kertas\",\"jml\":\"7\"},{\"id_kbli\":\"9\",\"nama_kbli\":\"Industri Percetakan dan Reproduksi Media Rekaman\",\"jml\":\"32\"},{\"id_kbli\":\"11\",\"nama_kbli\":\"Industri Bahan Kimia dan Barang dari Bahan Kimia\",\"jml\":\"12\"},{\"id_kbli\":\"12\",\"nama_kbli\":\"Industri Farmasi, Produk Obat Kimia dan Obat Tradisional\",\"jml\":\"12\"},{\"id_kbli\":\"13\",\"nama_kbli\":\"Industri Karet, Barang dari Karet dan Plastik\",\"jml\":\"4\"},{\"id_kbli\":\"14\",\"nama_kbli\":\"Industri Barang Galian bukan Logam\",\"jml\":\"11\"},{\"id_kbli\":\"15\",\"nama_kbli\":\"Industri Logam Dasar\",\"jml\":\"20\"},{\"id_kbli\":\"16\",\"nama_kbli\":\"Industri Barang Logam, bukan Mesin dan Peralatannya\",\"jml\":\"167\"},{\"id_kbli\":\"17\",\"nama_kbli\":\"Industri Komputer, Barang Eletronik dan Optik\",\"jml\":\"6\"},{\"id_kbli\":\"18\",\"nama_kbli\":\"Industri Peralatan Listrik\",\"jml\":\"1\"},{\"id_kbli\":\"19\",\"nama_kbli\":\"Industri Mesin dan Perlengkapan ytdl\",\"jml\":\"3\"},{\"id_kbli\":\"21\",\"nama_kbli\":\"Industri Alat Angkutan Lainnya\",\"jml\":\"11\"},{\"id_kbli\":\"22\",\"nama_kbli\":\"Industri Furnitur\",\"jml\":\"57\"},{\"id_kbli\":\"23\",\"nama_kbli\":\"Industri Pengolahan lainnya\",\"jml\":\"86\"},{\"id_kbli\":\"24\",\"nama_kbli\":\"Reperasi dan Pemasangan Mesin dan Peralatan\",\"jml\":\"4\"},{\"id_kbli\":\"25\",\"nama_kbli\":\"Aktivitas Jasa Informasi\",\"jml\":\"5\"},{\"id_kbli\":\"26\",\"nama_kbli\":\"Reparasi Mobil\",\"jml\":\"12\"},{\"id_kbli\":\"27\",\"nama_kbli\":\"Reparasi dan Perawatan Sepeda Motor\",\"jml\":\"48\"},{\"id_kbli\":\"28\",\"nama_kbli\":\"Reparasi Komputer dan Barang Keperluan Pribadi dan Perlengkapan Rumah Tangga\",\"jml\":\"9\"}]}', '2026-07-07 10:21:35'),
('sesuk_data', '{\"jml_surat_masuk\":\"835\",\"jml_surat_keluar\":\"157\",\"jml_disposisi\":\"709\"}', '2026-07-16 08:19:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache_cadil_sppd`
--
ALTER TABLE `cache_cadil_sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache_laporan_industri`
--
ALTER TABLE `cache_laporan_industri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_cache`
--
ALTER TABLE `dashboard_cache`
  ADD PRIMARY KEY (`cache_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cache_cadil_sppd`
--
ALTER TABLE `cache_cadil_sppd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cache_laporan_industri`
--
ALTER TABLE `cache_laporan_industri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
