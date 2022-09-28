-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 10:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `kode_mat` varchar(20) NOT NULL,
  `id_kat` int(5) NOT NULL,
  `nama_mat` varchar(500) NOT NULL,
  `desk_mat` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `foto_sampul` text DEFAULT NULL,
  `file_mat` text NOT NULL,
  `file_vid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `kode_mat`, `id_kat`, `nama_mat`, `desk_mat`, `created_date`, `is_active`, `status`, `foto_sampul`, `file_mat`, `file_vid`) VALUES
(8, 'MAT0001', 1, 'Fun Learning GA', 'Materi Pembelajaran - Fun Learning GA', '2022-05-27 19:59:04', 1, '1', NULL, 'MAT0001-FUN_LEARNING_GA1.pptx', ''),
(9, 'MAT0002', 1, 'Fun Learning Gudang Unit', 'Materi Pembelajaran - Fun Learning Gudang Unit', '2022-05-27 20:05:53', 1, '1', NULL, 'MAT0002-FUN_LEARNING_Gudang_Unit.pptx', ''),
(10, 'MAT0003', 1, 'Fun Learning Gudang Part', 'Materi Pembelajaran - Fun Learning Gudang Part', '2022-05-27 20:10:29', 1, '1', NULL, 'MAT0003-FUN_LEARNING_Gudang_Part.pptx', ''),
(11, 'MAT0004', 1, 'Fun Learning Klaim KPB', 'Materi Pembelajaran - Fun Learning Klaim KPB', '2022-05-27 20:11:18', 1, '1', NULL, 'MAT0004-FUN_LEARNING_KLAIM_KPB.pptx', '');

-- --------------------------------------------------------

--
-- Table structure for table `materi_kategori`
--

CREATE TABLE `materi_kategori` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_kat` varchar(500) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_kategori`
--

INSERT INTO `materi_kategori` (`id`, `created_date`, `nama_kat`, `is_active`) VALUES
(1, '2022-04-12 10:07:32', 'Fun Learning Astra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answer`
--

CREATE TABLE `quiz_answer` (
  `id` int(11) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `quiz_id` smallint(6) NOT NULL,
  `question_id` smallint(6) NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_correct` bit(1) NOT NULL COMMENT '1 = correct, 0 = incorrect',
  `entry_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_answer`
--

INSERT INTO `quiz_answer` (`id`, `user_id`, `quiz_id`, `question_id`, `answer`, `is_correct`, `entry_date`) VALUES
(66, 5, 4, 11, 'option_1', b'1', '2022-05-27 20:43:09'),
(65, 5, 4, 10, 'option_2', b'1', '2022-05-27 20:43:09'),
(64, 5, 4, 9, 'option_3', b'1', '2022-05-27 20:43:09'),
(63, 5, 4, 8, 'option_2', b'0', '2022-05-27 20:43:09'),
(62, 5, 4, 7, 'option_1', b'1', '2022-05-27 20:43:09'),
(61, 5, 3, 6, 'option_2', b'1', '2022-05-27 20:33:08'),
(60, 5, 3, 5, 'option_3', b'1', '2022-05-27 20:33:08'),
(59, 5, 3, 4, 'option_1', b'1', '2022-05-27 20:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_details`
--

CREATE TABLE `quiz_details` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quiz_duration` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `show_it` bit(1) NOT NULL,
  `counter` smallint(6) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_details`
--

INSERT INTO `quiz_details` (`quiz_id`, `quiz_name`, `quiz_duration`, `start_date`, `end_date`, `is_active`, `show_it`, `counter`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(3, 'Fun Quiz GA', '29 min', '2022-05-27', '2022-12-31', 1, b'1', 3, '2022-05-27 20:23:13', 1, '2022-05-27 20:27:47', 1),
(4, 'Fun Quiz Gudang SpartPart', '29 min', '2022-05-27', '2022-12-31', 1, b'1', 5, '2022-05-27 20:28:20', 1, '0000-00-00 00:00:00', 0),
(5, 'Fun Quiz Gudang Unit', '29 min', '2022-05-27', '2022-12-31', 1, b'1', 5, '2022-05-27 20:34:11', 1, '0000-00-00 00:00:00', 0),
(6, 'Fun Quiz Klaim KPB', '29 min', '2022-05-27', '2022-12-31', 1, b'1', 5, '2022-05-27 20:37:57', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_done`
--

CREATE TABLE `quiz_done` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `total_jawab` int(11) NOT NULL,
  `total_grade` double NOT NULL,
  `tgl_kerja` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_done`
--

INSERT INTO `quiz_done` (`id`, `id_user`, `id_quiz`, `total_jawab`, `total_grade`, `tgl_kerja`) VALUES
(4, 5, 3, 1, 100, '2022-05-27 20:33:08'),
(5, 5, 4, 1, 80, '2022-05-27 20:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option4` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `is_active`, `created_date`, `created_by`) VALUES
(4, 3, 'Berikut ini adalah alur maintenance asset yang benar adalah ?', 'Cek Kendala, Pengajuan biaya & SPK, Cek Budget, Pencairan Vendor, Mulai pekerjaan, Cek hasil kerja', 'Cek Kendala, Pengajuan biaya & SPK, Cek Budget, Mulai pekerjaan, Cek hasil kerja', 'Cek Kendala, Pengajuan biaya & SPK, Pencairan Vendor, Mulai pekerjaan, Cek hasil kerja', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:24:29', 1),
(5, 3, 'Apakah yang dimaksud dengan Aanwijing ?', 'Rapat dengan owner, konsultan dan para kontraktor untuk menentukan vendor yang lolos seleksi', 'Rapat penentuan vendor', 'Rapat perdana yang hadir yaitu owner, konsultan dan para kontraktor yang telah lolos seleksi untuk mengikuti tender', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:25:36', 1),
(6, 3, 'Sebutkan batas pengajuan pekerjaan yang dikelola oleh Region', '> 50 juta', '5 - 50 juta', '10 - 75 juta', 'Tidak Tahu', 'option_2', 1, '2022-05-27 20:26:22', 1),
(7, 4, 'Sebutkan flow proses penerimaan barang ?', 'Melakukan pengecekan surat jalan dan packing sheet, proses unloading, tanda tangan dan stempel surta jalan, hitung jumlah barang sesuai dengan dokumen', 'Melakukan pengecekan surat jalan dan packing sheet, proses unloading, hitung jumlah barang sesuai dengan dokumen', 'Melakukan pengecekan surat jalan dan packing sheet, hitung jumlah barang sesuai dengan dokumen', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:29:06', 1),
(8, 4, 'Yang dimaksud dengan istilah proses Receiving ?', 'Proses Pengambilan barang dari lokasi berdasarkan permintaan', 'Proses Pengepakan barang yang sudah  diambil dan sudah di ceck olek pengecekan', 'Proses Penerimaan Barang Masuk', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:29:54', 1),
(9, 4, 'Berikut adalah kriteria rank spare part yang benar, kecuali ?', 'SEMI FAST MOVING : 80% - 90?mand', 'SLOW MOVING : 90% - 95?mand', 'FAST MOVING : 1% - 50?mand', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:30:45', 1),
(10, 4, 'Yang dimaksud dengan FIX Order adalah ?', 'Fasilitas khusus  yang diberikan kepada jaringan AHASS dan HELP , apabila part yang dibutuhkan oleh konsumen tidak tersedia', 'Fasilitas order spare part ke AHM untuk pemenuhan supply 2 bulan ke depan yang berisi deman dari Ahass dan H3', 'Fasilitas order spare part ke AHM yang berisi data back order dari bulan sebelumnya', 'Tidak Tahu', 'option_2', 1, '2022-05-27 20:31:21', 1),
(11, 4, 'Yang dilakukan agar stock tidak selisih adalah dibawah ini, kecuali ?', 'Menyimpan barang standart dan berat di Pallet', 'Memastikan semua part sudah di GR', 'Melakukan sampling secara berkala', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:32:02', 1),
(12, 5, 'Apakah yang dimaksud dengan Goods Receiving (GR) Unit ?', 'Pengecekan jumlah unit yang diterima berdasarkan shipping list dari AHM sebelum dimasukkan kedalam stock', 'Loading unit dan accessories Unit digudang', 'Mengambil KSU dari truk ekspedisi dan dimasukkan kedalam stock KSU', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:34:57', 1),
(13, 5, 'Dibawah ini adalah fungsi Receiver digudang unit kecuali ?', 'Cek kondisi muatan sebelum unloading', 'Cek jumlah fisik unit = shipping list', 'Proses input sistem nopol truk & shipping list AHM', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:35:35', 1),
(14, 5, 'Apakah yang dimaksud dengan unit NFRS ?', 'Unit SMH yang siap untuk didistribusi', 'Unit SMH yang tidak siap untuk didistribusi', 'Unit SMH yang masih dalam proses intransit', 'Tidak Tahu', 'option_2', 1, '2022-05-27 20:36:24', 1),
(15, 5, 'Apakah yang dimaksud dengan Goods Issue (GI) Unit ?', 'Proses pengajuan dan permintaan unit ke AHM', 'Proses perjalan unit dari AHM menuju Main Dealer', 'Proses pengeluaran unit dari stock dan pengirimannya ke dealer', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:37:01', 1),
(16, 5, 'Jika ada unit defect yang diterima maka akan dicatat dalam form yang disebut?', 'LKUAT', 'NRFS', 'RFS', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:37:33', 1),
(17, 6, 'Apa kepanjangan dari KPB ?', 'Kupon Perawatan Berkala', 'Kartu Perawatan Berkala', 'Kententuan Perawatan Berkala', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:38:35', 1),
(18, 6, 'Sebutkan klaim KPB AHASS ke MD ?', 'KPB Di submit di PortalHSO user masing-masing SO, Surat Klaim di print dan di TTD AFSO, pastikan total klaim sama dengan total AR di SO', 'Fisik KPB di bungkus dengan rapi, Surat Klaim di print dan di TTD AFSO, pastikan total klaim sama dengan total AR di SO', 'KPB Di submit di PortalHSO user masing-masing SO, Fisik KPB di bungkus dengan rapi, Surat Klaim di print dan di TTD AFSO, pastikan total klaim sama dengan total AR di SO', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:40:09', 1),
(19, 6, 'Kententuan pengisian KPB di AHASS ?', 'Isi tgl service & Km sesuai ketentuan, Jika ada coretan , WAJIB bubuhkan cap koreksi Ahass, Cap & TTD ahass, TTD Konsumen', 'Isi tgl service & Km sesuai ketentuan, Jika ada coretan ,Penebalan, Penulisan selain tgl serv & km, WAJIB bubuhkan cap koreksi Ahass, Cap & TTD ahass, TTD Konsumen', 'Isi tgl service & Km sesuai ketentuan, Jika ada coretan ,Penebalan, Penulisan selain tgl serv & km, WAJIB bubuhkan cap koreksi Ahass, Cap & TTD ahass', 'Tidak Tahu', 'option_2', 1, '2022-05-27 20:40:46', 1),
(20, 6, 'Kapan tanggal klaim KPB AHASS to MD ?', 'Penerimaan KPB tanggal 01 - 15 diterima tanggal 25', 'Penerimaan KPB tanggal 01 - 15 diterima tanggal 20', 'Penerimaan KPB tanggal 01 - 15 diterima tanggal 18', 'Tidak Tahu', 'option_3', 1, '2022-05-27 20:41:25', 1),
(21, 6, 'Bagaimana cara klaim dispensasi KPB ?', 'KPB diinput ke Form manual dispensasi, Data di Form manual dispensasi diemail ke PIC KPB MD, Data di form manual di print sebagai lampiran klaim ke MD', 'KPB diinput ke Form manual dispensasi, Data di Form manual dispensasi diemail ke PIC KPB MD, Surat Klaim di print dan di TTD AFSO', 'KPB diinput ke Form manual dispensasi, pastikan total klaim sama dengan total AR di SO, Data di form manual di print sebagai lampiran klaim ke MD', 'Tidak Tahu', 'option_1', 1, '2022-05-27 20:42:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_role` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `first_name`, `last_name`, `gender`, `user_role`, `is_active`, `created_date`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '', '', '', 1, 1, '2018-09-25 17:31:00'),
(6, 'user1', '202cb962ac59075b964b07152d234b70', 'User 1', '', 'L', 0, 1, '2022-05-27 20:44:17'),
(7, 'user2', '202cb962ac59075b964b07152d234b70', 'User 2', '', 'P', 0, 1, '2022-05-27 20:44:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_kategori`
--
ALTER TABLE `materi_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_done`
--
ALTER TABLE `quiz_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `materi_kategori`
--
ALTER TABLE `materi_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `quiz_details`
--
ALTER TABLE `quiz_details`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_done`
--
ALTER TABLE `quiz_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
