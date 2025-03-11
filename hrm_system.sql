-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 08:39 AM
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
-- Database: `hrm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `NO` int(11) NOT NULL,
  `Program_Diklat_Sertifikasi` varchar(255) NOT NULL,
  `Sasaran_Tujuan_Diklat` varchar(255) NOT NULL,
  `Jenis` enum('Diklat','Sertifikasi') NOT NULL,
  `Waktu_Pelaksanaan` varchar(255) DEFAULT NULL,
  `Provider` varchar(255) NOT NULL,
  `Jumlah_Peserta` int(11) NOT NULL,
  `Harga_Satuan_Paket` decimal(15,2) NOT NULL,
  `Total` decimal(15,2) NOT NULL,
  `Status` enum('Terencana','Terealisasi','Terkontrak','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`NO`, `Program_Diklat_Sertifikasi`, `Sasaran_Tujuan_Diklat`, `Jenis`, `Waktu_Pelaksanaan`, `Provider`, `Jumlah_Peserta`, `Harga_Satuan_Paket`, `Total`, `Status`) VALUES
(2, 'Innovation mastery', 'Fokus pada Talent Development', 'Diklat', '2025-02-27', 'Nano center indonesia', 4, 5000000.00, 20000000.00, 'Terencana'),
(3, 'Power Failure Investigation SESI II', 'Fokus pada Talent Development', 'Diklat', '2025-02-27', 'Berdiklattraining', 4, 7000000.00, 28000000.00, 'Terencana'),
(4, 'Intelectual Properti Manajemen HAKI', 'Fokus pada Talent Development', 'Diklat', '2025-02-27', 'Nano center indonesia', 3, 5000000.00, 15000000.00, 'Terencana'),
(5, 'Certified Contract Management Specialist (CCMS)', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'Prasetya Mulya', 2, 10000000.00, 20000000.00, 'Terencana'),
(6, 'CRMP', 'Fokus pada Talent Development', 'Sertifikasi', '2025-02-27', 'RAP', 2, 10000000.00, 20000000.00, 'Terencana'),
(7, 'Business Development Planning', 'Fokus pada Talent Retention', 'Diklat', '2025-02-27', 'Prasetya Mulya', 4, 7600000.00, 30400000.00, 'Terencana'),
(8, 'Marketing Pricing Strategy', 'Fokus pada Talent Retention', 'Diklat', '2025-02-27', 'Prasetya Mulya', 2, 6000000.00, 12000000.00, 'Terencana'),
(9, 'Survey & GIS (Geographic Information System)', 'Fokus pada Talent Development', 'Diklat', '2025-02-27', 'PT. Engineering Services Indonesia', 4, 9000000.50, 36000002.00, 'Terencana'),
(10, 'Advanced Civil & Geotechnical Structure Analysis', 'Fokus pada Talent Development', 'Diklat', '2025-02-27', 'PT. Engineering Services Indonesia', 4, 9.50, 38.00, 'Terencana'),
(11, 'Pelatihan CRMO', 'Fokus pada Talent Retention', 'Diklat', '2025-02-27', 'RAP', 6, 6.50, 39.00, 'Terencana'),
(12, 'Big Data Analytic', 'Fokus pada Talent Retention', 'Diklat', '2025-02-27', 'TUV Rheinland/IT Telkom', 5, 6.00, 30.00, 'Terencana'),
(13, 'Advanced Digsilent with Python for EV penetration', 'Fokus pada Talent Development', 'Diklat', '2025-02-27', 'UGM', 5, 6.00, 30.00, 'Terencana'),
(14, 'Sertifikasi insinyur', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'UGM', 2, 15.00, 30.00, 'Terencana'),
(15, 'Auditor SMP', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'Eksternal', 1, 20.00, 20.00, 'Terencana'),
(16, 'Pelatihan dan Sertifikasi P3K', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'Fresh Consultant', 2, 8.50, 17.00, 'Terencana'),
(17, 'Pengendalian Pencemaran Air', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'Fresh Consultant', 1, 10.00, 10.00, 'Terencana'),
(18, 'Gada Utama', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'Fresh Consultant', 1, 20.00, 20.00, 'Terencana'),
(19, 'Perpanjangan Sertifikasi AK3U', 'Fokus pada Talent Retention', 'Sertifikasi', '2025-02-27', 'Fresh Consultant', 8, 2.00, 16.00, 'Terencana'),
(20, 'Program Budaya & Capacity Building Pegawai PLN Puslitbang Tahun 2025', 'Fokus pada Talent Retention', 'Diklat', '2025-02-27', 'Eksternal', 0, 190.00, 190.00, 'Terencana'),
(21, 'Workshop Safety for Management SMT 1', 'Fokus pada Talent Retention', 'Diklat', '28/02/2025', 'Fresh Consultant', 1, 25.00, 25.00, 'Terencana'),
(22, 'Workshop Safety for Management SMT 2', 'Fokus pada Talent Retention', 'Diklat', '28/02/2025', 'Fresh Consultant', 1, 25.00, 25.00, 'Terencana'),
(23, 'Pelatihan Komunikasi, Teknik Presentasi dan Penyusunan Presntasi', 'Fokus pada Talent Retention', 'Diklat', '28/02/2025', 'T&DON', 50, 1.00, 50.00, 'Terencana'),
(24, 'PELATIHAN DAN SERTIFIKASI AHLI K3 UMUM', 'Fokus pada Talent Retention', 'Sertifikasi', '28/02/2025', 'Fresh Consultant', 4, 8.50, 34.00, 'Terencana'),
(25, 'Program Diklat/Sertifikasi', 'Sasaran /Tujuan Diklat', '', 'Waktu Pelaksanaan', 'Provider', 0, 0.00, 0.00, ''),
(27, 'Power Failure Investigation SESI I', 'adaweadawwew', 'Sertifikasi', '2025-02-28', 'RAP', 6, 18000000.00, 108000000.00, 'Terencana');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `NIP` varchar(20) NOT NULL,
  `Nama_Pegawai` varchar(255) NOT NULL,
  `Nama_Panjang_Posisi` varchar(255) DEFAULT NULL,
  `Bidang` varchar(100) DEFAULT NULL,
  `Sub_bidang` varchar(100) DEFAULT NULL,
  `Bagian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`NIP`, `Nama_Pegawai`, `Nama_Panjang_Posisi`, `Bidang`, `Sub_bidang`, `Bagian`) VALUES
('6985007LMK', 'SURYANI', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', '.');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `NO` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Bidang` varchar(100) NOT NULL,
  `Judul_Diklat_Sertifikasi` varchar(255) NOT NULL,
  `Provider` varchar(100) NOT NULL,
  `Tanggal_Pelaksanaan` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Nomor_Sertifikat` varchar(100) NOT NULL,
  `Tanggal_Sertifikat` date NOT NULL,
  `Tanggal_Expired` date NOT NULL,
  `Dokumen` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`NO`, `NIP`, `Nama`, `Bidang`, `Judul_Diklat_Sertifikasi`, `Provider`, `Tanggal_Pelaksanaan`, `Status`, `Nomor_Sertifikat`, `Tanggal_Sertifikat`, `Tanggal_Expired`, `Dokumen`) VALUES
(146, '7091002LMK', 'JULY ARIANY', 'Bidang Keuangan, Komunikasi dan Umum', 'Power Failure Investigation SESI II', 'Berdiklattraining', NULL, NULL, '', '2025-02-20', '2025-02-12', 'about.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `Nama_Pegawai` varchar(255) NOT NULL,
  `Nama_Panjang_Posisi` varchar(255) DEFAULT NULL,
  `Bidang` varchar(100) DEFAULT NULL,
  `Sub_bidang` varchar(100) DEFAULT NULL,
  `Bagian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `Nama_Pegawai`, `Nama_Panjang_Posisi`, `Bidang`, `Sub_bidang`, `Bagian`) VALUES
('7091002LMK', 'JULY ARIANY', 'SENIOR OFFICER ASET PROPERTI, KOMUNIKASI, DAN UMUM', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Aset Properti, Komunikasi, dan Umum', ''),
('7095050T', 'RR LAKSMI UTAMI BUDIRINI', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('7193004LMK', 'SISWANTO', 'SENIOR OFFICER ANGGARAN, KEUANGAN, DAN AKUNTANSI', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Keuangan, Anggaran dan Akuntansi', ''),
('7295088R', 'ADE HENDRI ALFINO', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('7393014LMK', 'JOKO INDARTO', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('7393017LMK', 'JENI JULIMAR', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('7396033R', 'FITRA MELFA', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('7493020LMK', 'KISWATI', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('7493022LMK', 'WAHYUTI YULI SUKATMI', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('7507306Z', 'DESY SULISTIYOWATI HIDAYAT', 'SPECIALIST RISET SISTEM PEMBANGKITAN', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', '', ''),
('7593018LMK', 'LINA KURNIATI', 'ASSISTANT MANAGER AKUNTANSI', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Keuangan, Anggaran dan Akuntansi', 'Bagian Akuntansi'),
('7602010B2', 'IKE FARINA KEMALAWATI', 'SPECIALIST PERFORMANCE ASSISTANT TO GENERAL MANAGER', '', '', ''),
('7604003R', 'BUYUNG SOFIARTO MUNIR', 'SENIOR MANAGER RISET DAN TEKNOLOGI SISTEM TRANSMISI DAN DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', '', ''),
('7607307Z', 'HARRY INDRAWAN', 'MANAGER INOVASI DAN PENGEMBANGAN PRODUK', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('7702005F', 'AGUSSALIM SYAMSUDDIN', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('7703006D', 'ANDREW CAHYO ADHI', 'SPECIALIST RISET SISTEM PEMBANGKITAN', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', '', ''),
('780321185I', 'MOCHAMAD SOLEH', 'GENERAL MANAGER', '', '', ''),
('7806069Z', 'KATHARINA TRIRATNA PARAMITA', 'SPECIALIST PERFORMANCE ASSISTANT TO GENERAL MANAGER', '', '', ''),
('7904003D', 'GUNTUR SUPRIYADI', 'MANAGER KAJIAN DAN INVESTIGASI TEKNIK DAN TEKNOLOGI SISTEM TRANSMISI DAN DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('7905011D', 'VALENSI ERZA', 'SPECIALIST RISET ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', '', ''),
('7906109Z', 'BENNY SUSANTO', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('7908002Z', 'HARIANTO', 'ASSISTANT MANAGER STANDARDISASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Standardisasi'),
('8005013B2', 'MIMIN MILASARI', 'SENIOR MANAGER KEUANGAN, KOMUNIKASI, DAN UMUM', 'Bidang Keuangan, Komunikasi dan Umum', '', ''),
('8006251Z', 'NATALINA', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8006534Z', 'KENSIANESI', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM TRANSMISI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('8007046Z', 'MAULID HERYANTO', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('8007082Z', 'INDRI HARYANI', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8106276Z', 'NILA OCTAVIANA', 'SPECIALIST KEUANGAN, KOMUNIKASI, DAN UMUM', 'Bidang Keuangan, Komunikasi dan Umum', '', ''),
('8106337Z', 'TAUFIQ FAHRUDIN', 'SENIOR MANAGER PERENCANAAN DAN PENGEMBANGAN PRODUK', 'Bidang Perencanaan dan Pengembangan Produk', '', ''),
('8106574Z', 'SRIYONO', 'MANAGER RISET DAN ASESMEN TEKNOLOGI SISTEM TRANSMISI DAN DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', ''),
('8107108Z', 'HENDRI BHIROWO DWI HANANTO', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8206631Z', 'AGUS SETIAWAN', 'MANAGER KAJIAN DAN INVESTIGASI TEKNIK TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8207178Z', 'MEIRI TRIANI', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8208088Z', 'FERNANDEZ JOSEPH NAINGGOLAN', 'MANAGER KEUANGAN, ANGGARAN, DAN AKUNTANSI', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Keuangan, Anggaran dan Akuntansi', ''),
('8208455Z', 'MANONTONG SONDANG SIANIPAR', 'SPECIALIST RISET SISTEM PEMBANGKITAN', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', '', ''),
('8210011Z', 'VIVI FITRIANI', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8306040M', 'JOKO PRAMONO', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', ''),
('8307003P3B', 'FEFRIA TANBAR', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8308161Z', 'DADAN ABDAN SAKUR', 'MANAGER ASET PROPERTI, KOMUNIKASI, DAN UMUM', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Aset Properti, Komunikasi, dan Umum', ''),
('8310013Z', 'ALMAS APRILANA', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8310069Z', 'ARDIYANA KUSUMA NUGRAHA', 'ASSISTANT MANAGER PERENCANA PENGADAAN', '', '', 'Bagian Perencana Pengadaan'),
('8409096Z', 'ARIYANA DWIPUTRA NUGRAHA', 'MANAGER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8409098Z', 'RULY', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('84111860Z', 'RASGIANTI', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8508001LMK', 'EKO AULI YANUAR', 'OFFICER ASET PROPERTI', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Aset Properti, Komunikasi, dan Umum', ''),
('8508004LMK', 'BENNARON SULANCANA', 'OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8509313Z', 'TIVA WINAHYU DWI HAPSARI', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8509616Z', 'EKO HARIYOSTANTO', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8510031Z', 'MARISA NUGRAHANI HARGITA', 'ASSISTANT MANAGER PERENCANAAN, EVALUASI, DAN KINERJA', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Perencanaan, Evaluasi, dan Kinerja'),
('8510844Z', 'EKO SUPRIYANTO', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('8511007Z', 'JOKO HARTONO', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM TRANSMISI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('8512005ZY', 'PRASETYO ADI WIBOWO', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8609001LMK', 'CARTIM', 'OFFICER MUTU DAN MANAJEMEN ASET LABORATORIUM RISET TRANSMISI DAN DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('8609026M', 'HENDRO', 'OFFICER ASET PROPERTI', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Aset Properti, Komunikasi, dan Umum', ''),
('8610044Z', 'NURUL FAUZIAH', 'ASSISTANT MANAGER MANAJEMEN RISIKO, KEPATUHAN, DAN SISTEM MANAJEMEN TERINTEGRASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Manajemen Risiko, Kepatuhan, dan Sistem Manajemen Terintegrasi'),
('8610992Z', 'DRYASMARA KUSUMASTUTY', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('8610998Z', 'NUR CAHYO', 'ASSISTANT MANAGER RISET SISTEM PEMBANGKITAN', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', 'Bagian Sistem Pembangkitan'),
('86112177Z', 'MUHAMAD IQBAL FELANI', 'SENIOR MANAGER RISET DAN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', '', ''),
('8612590ZY', 'DANAN PANGGIH TUHUJATI', 'SENIOR OFFICER ASET PROPERTI, KOMUNIKASI, DAN UMUM', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Aset Properti, Komunikasi, dan Umum', ''),
('8612593ZY', 'WIRATNO BAGUS SURYONO', 'ASSISTANT MANAGER KEUANGAN DAN ANGGARAN', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Keuangan, Anggaran dan Akuntansi', 'Bagian Keuangan dan Anggaran'),
('8710460Z', 'APRILIA SARASWATI', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('8710936Z', 'INDRA ARDHANAYUDHA ADITYA', 'ASSISTANT MANAGER RISET NON LISTRIK', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', 'Bagian Riset Non Listrik'),
('87111342Z', 'NURUL FIRDA YULIANI', 'ASSISTANT MANAGER KESELAMATAN, KESEHATAN KERJA, LINGKUNGAN, DAN KEAMANAN', '', '', 'Bagian Keselamatan, Kesehatan Kerja, Lingkungan dan Keamanan'),
('8712320ZY', 'FARIS ADITAMA', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('8714788ZY', 'OKSA PRASETYAWAN W', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('88111110Z', 'KEMAS M. TOFANI HS', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('88112237Z', 'MUJAMMIL ASDHIYOGA RAHMANTA', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', ''),
('88112331Z', 'LIDIA KARISMA', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('88112348Z', 'HANSEN MANUTURI SIANIPAR', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM TRANSMISI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('8813064ZY', 'NANDA KURNIA AKBAR', 'OFFICER PERENCANA PENGADAAN', '', '', 'Bagian Perencana Pengadaan'),
('8815655ZY', 'BRIAN BRAMANTYO SATRIAJI DWI ADIPUTRO HA', 'MANAGER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('8912722ZY', 'FICKY FIRMAN AJI', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('8914825ZY', 'AJI SURYO ALAM', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM TRANSMISI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('89161065ZY', 'NUR WIDI PRIAMBODO', 'SENIOR OFFICER PENGELOLAAN ESG DAN SAFEGUARD', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('89161081ZY', 'HANDREA BERNANDO TAMBUNAN', 'ASSISTANT MANAGER RISET ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', 'Bagian Riset Energi'),
('9015100ZY', 'AKHBAR CANDRA MULYANA', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', ''),
('9015760ZY', 'PUTU AGUS ADITYA PRAMANA', 'ASSISTANT MANAGER RISET TEKNOLOGI DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', 'Bagian Riset Teknologi Distribusi'),
('90161131ZY', 'FARID SUHARNO PUTRA', 'OFFICER STANDARDISASI SISTEM TRANSMISI DAN DISTRIBUSI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Standardisasi'),
('9114946ZY', 'MUHAMMAD RIDWAN', 'SENIOR OFFICER RISET DAN ASESMEN TEKNOLOGI SISTEM DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', ''),
('9115483ZY', 'BUDI KUNCORO', 'OFFICER KESELAMATAN, KESEHATAN KERJA, LINGKUNGAN, DAN KEAMANAN', '', '', 'Bagian Keselamatan, Kesehatan Kerja, Lingkungan dan Keamanan'),
('9115808ZY', 'ANSIE DWINA YOULENSHA', 'SENIOR OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('9115837ZY', 'I.K. AGLA FIDRAN', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('91161216ZY', 'KEVIN GAUSULTAN HADITH MANGUNKUSUMO', 'ASSISTANT MANAGER RISET TEKNOLOGI TRANSMISI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', 'Bagian Riset Teknologi Transmisi'),
('9117779ZY', 'ACH. NURFANANI', 'OFFICER RISET ENERGI PRIMER', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', 'Bagian Riset Energi'),
('9213001LMY', 'MIFTANIYAH FAJRI HASANAH', 'OFFICER KEUANGAN', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Keuangan, Anggaran dan Akuntansi', 'Bagian Keuangan dan Anggaran'),
('9213133ZY', 'MUKH. FARIS ZAINUR ROSYIDIN', 'ASSISTANT MANAGER PENGEMBANGAN PRODUK', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', 'Bagian Pengembangan Produk'),
('9215588ZY', 'ANGGA KUSUMADINATA', 'SENIOR OFFICER PERENCANAAN', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', ''),
('92161290ZY', 'SITI AISYAH', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', ''),
('9216609ZY', 'DIMAS PRABOWO WICAKSONO', 'ASSISTANT MANAGER PELAKSANA PENGADAAN', '', '', 'Bagian Pelaksana Pengadaan'),
('9219038ZY', 'TEGAR KHARISMA PUTRA', 'OFFICER INVESTIGASI TEKNIK SISTEM PEMBANGKITAN DAN ENERGI', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Kajian dan Investigasi Teknik Teknologi Sistem Pembangkitan dan Energi', ''),
('93141120ZY', 'JIHAN FADHILAH', 'OFFICER ADMINISTRASI DAN UMUM', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Aset Properti, Komunikasi, dan Umum', ''),
('93163399ZY', 'DEVY KURNIAWATI PUTRI', 'OFFICER AKUNTANSI', 'Bidang Keuangan, Komunikasi dan Umum', 'Sub Bidang Keuangan, Anggaran dan Akuntansi', 'Bagian Akuntansi'),
('9316995ZY', 'OVIANTI SITOMPUL', 'OFFICER PERENCANAAN, PENGENDALIAN, DAN EVALUASI KINERJA', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Perencanaan, Evaluasi, dan Kinerja'),
('93191502ZY', 'MUHAMMAD HAEKAL', 'OFFICER MANAJEMEN RISIKO, KEPATUHAN, DAN SISTEM MANAJEMEN TERINTEGRASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Manajemen Risiko, Kepatuhan, dan Sistem Manajemen Terintegrasi'),
('94162126ZY', 'WIGAS DIGWIJAYA', 'OFFICER RISET ENERGI PRIMER', 'Bidang Riset dan Teknologi Sistem Pembangkitan dan Energi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Pembangkitan dan Energi', 'Bagian Riset Energi'),
('94171596ZY', 'POPPY ACMAR SUMBYARTI', 'OFFICER PERENCANAAN, PENGENDALIAN, DAN EVALUASI KINERJA', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Perencanaan', 'Bagian Perencanaan, Evaluasi, dan Kinerja'),
('9418411ZY', 'ISTIQOMAH', 'OFFICER ANALISA SISTEM TENAGA LISTRIK', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Riset dan Asesmen Teknologi Sistem Transmisi dan Distribusi', 'Bagian Riset Teknologi Transmisi'),
('9619728ZY', 'HAKIM HABIBI HIDAYATULLAH USMAN', 'OFFICER MUTU DAN MANAJEMEN ASET LABORATORIUM RISET TRANSMISI DAN DISTRIBUSI', 'Bidang Riset dan Teknologi Sistem Transmisi dan Distribusi', 'Sub Bidang Kajian dan Investigasi Teknik dan Teknologi Sistem Transmisi dan Distribusi', ''),
('﻿6985007LMK', 'SURYANI', 'SENIOR OFFICER PENGELOLAAN DAN PENGEMBANGAN INOVASI', 'Bidang Perencanaan dan Pengembangan Produk', 'Sub Bidang Inovasi dan Pengembangan Produk', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'rezaaa', 'rezahaykal40@gmail.com', '$2y$10$S1wnIGsD5pSl/L8QWADSrejHk6bDeBkpXtyPQTJoyyo5hJGJBpCse'),
(2, 'admin', 'admin@gmail.com', '$2y$10$Z7qR.qqbaz5xiks7.qKkuuZcIlTcYSXg7Qe/0C5POEpN8oWeo/Lgy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
