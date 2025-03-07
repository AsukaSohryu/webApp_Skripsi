-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2025 at 11:23 AM
-- Server version: 8.0.40-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shelteru_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_answers`
--

CREATE TABLE `adoption_answers` (
  `adoption_form_id` int UNSIGNED NOT NULL,
  `adoption_questions_id` int UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoption_answers`
--

INSERT INTO `adoption_answers` (`adoption_form_id`, `adoption_questions_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ya saya bersedia berkomitmen', NULL, NULL),
(1, 2, 'Ya, saat ini saya memlihara 1 ekor kucing', NULL, NULL),
(1, 3, 'Jenis apa saja saya tertarik', NULL, NULL),
(1, 4, 'Saya ingin menambah satu ekor kucing untuk teman kucing saya?', NULL, NULL),
(1, 5, 'Tidak saya tidak memiliki anak', NULL, NULL),
(1, 6, 'Ya seluruh penghuni rumah saya setuju', NULL, NULL),
(1, 7, 'Tidak ada yang alergi', NULL, NULL),
(1, 8, 'Tinggal bebas didalam rumah', NULL, NULL),
(1, 9, 'Tidak terlalu luas', NULL, NULL),
(1, 10, 'Ya memiliki pagar yang kuat', NULL, NULL),
(1, 11, 'Tidak, saya akan membiarkan satwa secara lepas di area rumah', NULL, NULL),
(1, 12, 'Didalam rumah', NULL, NULL),
(1, 13, 'Akan Tidur didalam ruangan yang saya sediakan', NULL, NULL),
(1, 14, 'Saya akan mencari solusi terbaik untuk menyembuhkan hewan peliharaan saya', NULL, NULL),
(1, 15, 'Membawa ke dokter hewan untuk mencari tahu penyebab', NULL, NULL),
(1, 16, 'Ya saya tahu dan saya bersedia untuk mengeluarkan biaya', NULL, NULL),
(1, 17, 'Saya akan menitipkan hewan peliharaan saya kepada kerabat, jika tidak ada yang bisa, saya akan mencari jasa penitipan hewan yang terjamin', NULL, NULL),
(2, 1, 'Ya saya bersedia berkomitmen', NULL, NULL),
(2, 2, 'Ya, saat ini saya memlihara 1 ekor kucing', NULL, NULL),
(2, 3, 'Jenis apa saja saya tertarik', NULL, NULL),
(2, 4, 'Saya ingin menambah satu ekor kucing untuk teman kucing saya?', NULL, NULL),
(2, 5, 'Tidak saya tidak memiliki anak', NULL, NULL),
(2, 6, 'Ya seluruh penghuni rumah saya setuju', NULL, NULL),
(2, 7, 'Tidak ada yang alergi', NULL, NULL),
(2, 8, 'Tinggal bebas didalam rumah', NULL, NULL),
(2, 9, 'Tidak terlalu luas', NULL, NULL),
(2, 10, 'Ya memiliki pagar yang kuat', NULL, NULL),
(2, 11, 'Tidak, saya akan membiarkan satwa secara lepas di area rumah', NULL, NULL),
(2, 12, 'Didalam rumah', NULL, NULL),
(2, 13, 'Akan Tidur didalam ruangan yang saya sediakan', NULL, NULL),
(2, 14, 'Saya akan mencari solusi terbaik untuk menyembuhkan hewan peliharaan saya', NULL, NULL),
(2, 15, 'Membawa ke dokter hewan untuk mencari tahu penyebab', NULL, NULL),
(2, 16, 'Ya saya tahu dan saya bersedia untuk mengeluarkan biaya', NULL, NULL),
(2, 17, 'Saya akan menitipkan hewan peliharaan saya kepada kerabat, jika tidak ada yang bisa, saya akan mencari jasa penitipan hewan yang terjamin', NULL, NULL),
(4, 1, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 2, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 3, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 4, 'asdasd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 5, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 6, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 7, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 8, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 9, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 10, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 11, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 12, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 13, 'sd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 14, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 15, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 16, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06'),
(4, 17, 'asd', '2025-01-09 22:41:06', '2025-01-09 22:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_form`
--

CREATE TABLE `adoption_form` (
  `adoption_form_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `animal_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `is_seen` tinyint NOT NULL,
  `admin_feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoption_form`
--

INSERT INTO `adoption_form` (`adoption_form_id`, `user_id`, `animal_id`, `status_id`, `is_seen`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 11, 0, '', '2025-01-09 22:01:51', '2025-01-09 22:01:51'),
(2, 4, 3, 12, 1, 'Pengajuan anda kami setujui, silakan cek whatsapp anda untuk melanjutkan percakapan dan proses berikutnya, terima kasih', '2025-01-09 22:01:51', '2025-01-09 22:01:51'),
(3, 4, 9, 14, 1, 'Pengajuan Pengadopsian Berhasil, Terima Kasih sudah mengadopsi jack dari kami, kami akan melakukan pengecekan rutin dalam beberapa bulan kedepan', '2025-01-09 22:01:51', '2025-01-09 22:01:51'),
(4, 1, 1, 11, 0, NULL, '2025-01-09 22:41:06', '2025-01-09 22:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_questions`
--

CREATE TABLE `adoption_questions` (
  `adoption_question_id` int UNSIGNED NOT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adoption_questions`
--

INSERT INTO `adoption_questions` (`adoption_question_id`, `questions`, `is_active`) VALUES
(1, 'Apakah anda bersedia membuat komitmen dengan satwa anda selama hidupnya (mungkin 10-20 tahun) dalam keadaan sehat maupun sakit?', 1),
(2, 'Apakah anda saat ini atau sebelumnya pernah memelihara satwa? Bila ya, berapa ekor anjing/kucing yang dimiliki sekarang?', 1),
(3, 'Anda tertarik untuk mengadopsi anjing/kucing jenis apa?', 1),
(4, 'Mengapa anda ingin memiliki hewan peliharaan?', 1),
(5, 'Apakah anda memiliki anak?', 1),
(6, 'Apakah seluruh penghuni rumah anda, setuju untuk mengadopsi dan memelihara anjing/kucing?', 1),
(7, 'Apakah ada penghuni rumah yang alergi terhadap satwa?', 1),
(8, 'Dimanakah tempat tinggal anda (di mana satwa yang akan diadopsi akan ditempatkan)?', 1),
(9, 'Apakah rumah anda memiliki halaman yang luas?', 1),
(10, 'Apakah rumah anda memiliki pagar yang kuat?', 1),
(11, 'Apakah anda berencana untuk mengikat atau memasukkan satwa dalam kandang?', 1),
(12, 'Pada malam hari, dimanakah satwa anda ditempatkan?', 1),
(13, 'Dimana satwa anda tidur?', 1),
(14, 'Apakah yang anda lakukan bila satwa anda sakit dan biaya pengobatan cukup tinggi?', 1),
(15, 'Apa yang akan anda lakukan bila tiba-tiba tingkah laku satwa anda berubah (murung, sakit, agresif)?', 1),
(16, 'Apakah anda tahu bahwa satwa anda akan memerlukan biaya ekstra, seperti untuk makanan hewan, vaksinasi tahunan, obat cacing, obat kutu dll.?', 1),
(17, 'Apakah yang anda lakukan terhadap satwa anda bila anda harus pindah keluar kota atau keluar negeri?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `detail_status` text COLLATE utf8mb4_unicode_ci,
  `animal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `vaccine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sterile` tinyint NOT NULL,
  `is_active` tinyint NOT NULL,
  `source` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `characteristics` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `status_id`, `detail_status`, `animal_name`, `animal_type`, `birth_date`, `sex`, `race`, `color`, `weight`, `vaccine`, `is_sterile`, `is_active`, `source`, `characteristics`, `description`, `medical_note`, `photo`, `created_at`, `updated_at`) VALUES
(1, 20, 'Dalam proses adopsi', 'Kocheng', 'Kucing', '2022-10-01', 'Betina', 'Kucing Kampung', 'Putih dengan corak coklat kehitaman', 2.00, 'FVRCP, rabies, dan FeLV', 1, 1, 'Ditemukan dalam box dekat shelter', 'Kocheng sangat manja dan suka dielus-elus', 'Kocheng merupakan kucing yang lucu dan sangat aktif untuk bermain.', 'Kucing ini tidak memiliki riwayat penyakit', 'Kocheng.jpg', '2025-01-09 22:01:51', '2025-01-10 18:42:33'),
(2, 18, 'Hewan Siap Di Adopsi', 'Blackie', 'Kucing', '2021-09-15', 'Betina', 'Kucing Kampung', 'Hitam', 3.00, 'FVRCP, rabies', 1, 1, 'Diserahkan Pemilik Lama', 'Blackie sangat ramah dan suka bermain dengan anak-anak', 'Blackie adalah kucing yang manja. Dia sangat cocok untuk keluarga yang suka bersantai dengan kucing.', 'Blackie tidak memiliki riwayat penyakit', 'Blackie.jpg', '2025-01-09 22:01:51', '2025-01-10 18:43:12'),
(3, 18, 'Hewan Siap Di Adopsi', 'Milky', 'Kucing', '2021-05-20', 'Jantan', 'Kucing Kampung', 'Putih dengan sedikit corak hitam', 4.50, 'FVRCP, rabies, dan FeLV', 1, 1, 'Diselamatkan disekitar shelter', 'Suka menjahili hewan lain, terkadang aktif, terkadang pendiam', 'Milky adalah kucing yang sangat penuh energi. Dia sangat cocok untuk keluarga yang aktif.', 'Milky dalam kondisi sehat dan telah menjalani pemeriksaan rutin', 'Milky.jpg', '2025-01-09 22:01:51', '2025-01-10 18:43:53'),
(4, 20, 'Hewan sedang dalam proses adopsi', 'MaoMao', 'Kucing', '2020-03-10', 'Betina', 'Kucing Kampung', 'Hitam kecoklatan dan putih', 4.00, 'FVRCP, rabies', 1, 1, 'Diserahkan pemilik yang lama', 'MaoMao sangat tenang dan suka berjemur di bawah sinar matahari', 'MaoMao adalah kucing yang anggun dan penuh kasih. Dia sangat cocok untuk pemilik yang mencari kucing yang santai.', 'MaoMao tidak memiliki riwayat penyakit dan telah divaksin lengkap', 'MaoMao.jpg', '2025-01-09 22:01:51', '2025-01-10 18:44:12'),
(5, 17, 'Hewan sedang dalam proses perawatan intensif akibat penyiraman air panas', 'Oyen', 'Kucing', '2025-01-10', 'Betina', 'Kucing Kampung', 'Hitam kecoklatan dan putih', 4.00, 'Belum di vaksin', 1, 1, 'Diserahkan pemilik yang lama', 'Belum memiliki informasi, sedang dalam perawatan intensif', 'Belum memiliki informasi, sedang dalam perawatan intensif', 'Belum memiliki informasi, sedang dalam perawatan intensif', 'Oyen.jpg', '2025-01-09 22:01:51', '2025-01-10 18:44:34'),
(6, 16, 'Hewan baru saja diselamatkan', 'Mocha', 'Anjing', '2025-01-10', 'Jantan', 'Belum ada data', 'Coklat', 5.00, 'Belum di vaksin', 1, 1, 'Ditemukan ditinggalkan dekat tempat sampah', 'Belum memiliki informasi', 'Belum memiliki informasi.', 'Belum memiliki informasi', 'Mocha.jpg', '2025-01-09 22:01:51', '2025-01-10 18:44:53'),
(7, 16, 'Hewan baru saja diselamatkan', 'Max', 'Anjing', '2025-01-10', 'Jantan', 'Belum ada data', 'Coklat', 12.00, 'Belum di vaksin', 1, 1, 'Diselamatkan dari daerah rumah pejagalan', 'Belum memiliki informasi', 'Belum memiliki informasi.', 'Belum memiliki informasi', 'Max.jpg', '2025-01-09 22:01:51', '2025-01-10 18:47:02'),
(8, 19, 'Sifat hewan masih tidak stabil karena diserahkan pemilik lama', 'Buddy', 'Anjing', '2025-01-10', 'Jantan', 'Belum ada data', 'Emas', 6.00, 'DHPP, Rabies, Bordetella', 1, 1, 'Ditemukan terlantar di jalan', 'Sangat ramah dan suka bermain', 'Buddy adalah anjing yang sangat ramah dan suka bermain.', 'Tidak ada riwayat penyakit', 'Buddy.jpg', '2025-01-09 22:01:51', '2025-01-10 18:47:16'),
(9, 21, 'Telah diadopsi', 'Jack', 'Anjing', '2025-01-10', 'Jantan', 'Belum ada data', 'Hitam', 8.00, 'DHPP, Rabies, Bordetella', 1, 1, 'Diserahkan oleh pemilik lama', 'Sangat ramah dan suka bermain', 'Jack adalah anjing yang suka sekali bermain lempar tangkap.', 'Memiliki riwayat penyakit patah tulang', 'Jack.jpg', '2025-01-09 22:01:51', '2025-01-10 18:47:32'),
(10, 23, 'Hewan Telah Meninggal', 'Foxie', 'Anjing', '2025-01-10', 'Jantan', 'Belum ada data', 'Hitam', 4.00, 'DHPP, Rabies, Bordetella', 1, 1, 'Diserahkan oleh pemilik lama', 'Sangat ramah namun pendiam', 'Foxie adalah anjing yang pendiam namun terkadang sedikit manja', 'Memiliki beberapa bekas luka sebelum ditemukan', 'Foxie.jpg', '2025-01-09 22:01:51', '2025-01-10 18:47:52'),
(11, 20, 'Dalam Proses Adopsi', 'Pete', 'Anjing', '2020-05-20', 'Jantan', 'Belum ada data', 'Hitam', 9.00, 'DHPP, Rabies, Bordetella', 1, 1, 'Diserahkan oleh pemilik lama', 'Sangat Aktif', 'Pete adalah anjing yang sangat aktif dan sangat manja', 'Pete Tidak Memiliki Riwayat Penyakit', 'Pete.jpg', '2025-01-09 22:01:51', '2025-01-10 18:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handover_answers`
--

CREATE TABLE `handover_answers` (
  `handover_form_id` int UNSIGNED NOT NULL,
  `handover_questions_id` int UNSIGNED NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handover_answers`
--

INSERT INTO `handover_answers` (`handover_form_id`, `handover_questions_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Minnie', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 2, 'Anjing', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 3, '2024-01-04', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 4, 'Betina', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 5, 'Chihuahua', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 6, 'Hitam dan Putih', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 7, '2', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 8, 'DHLPP, Rabies, Bordetella, Influenza Canine, Leptospirosis, Lyme Disease, dan Coronavirus Canine', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 9, '1', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 10, '2023-05-06', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 11, 'Umur saya sudah terlalu tua dan tidak dapat mengurus dengan baik', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 12, 'Makanan kaleng, Nasi, dan Daging', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 13, 'Iya hewan jinak dan ramah terhadap anak-anak', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 14, 'Tidak hewan tidak menggigit/galak', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 15, 'Iya hewan bisa bergaul dengan anjing atau kucing lain', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 16, 'Didalam rumah', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 17, 'Didalam rumah', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 18, 'Iya hewan terlatih', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(1, 19, 'Pemilih makanan, suka bertemu orang baru', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(2, 1, 'Keysha (Sha-Sha)', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 2, 'Anjing', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 3, '2011-01-04', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 4, 'Betina', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 5, 'Shitzu', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 6, 'Coklat dan Putih', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 7, '6', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 8, 'DHLPP, Rabies, Bordetella, Influenza Canine, Leptospirosis, Lyme Disease, dan Coronavirus Canine', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 9, '1', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 10, '2023-05-06', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 11, 'Umur saya sudah terlalu tua dan tidak dapat mengurus dengan baik', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 12, 'Makanan kaleng, Nasi, dan Daging', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 13, 'Iya hewan jinak dan ramah terhadap anak-anak', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 14, 'Hewan galak dengan anjing dan kucing lain', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 15, 'Tidak hewan tidak bisa bergaul dengan anjing/kucing lain', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 16, 'Didalam rumah', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 17, 'Didalam rumah', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 18, 'Iya hewan terlatih', '2025-01-10 21:10:39', '2025-01-10 21:10:39'),
(2, 19, 'Hewan memiliki sifat pemalas, penyendiri, dan rakus terhadap makanan', '2025-01-10 21:10:39', '2025-01-10 21:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `handover_form`
--

CREATE TABLE `handover_form` (
  `handover_form_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` tinyint NOT NULL,
  `admin_feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handover_form`
--

INSERT INTO `handover_form` (`handover_form_id`, `user_id`, `status_id`, `photo`, `is_seen`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 4, 6, 'Minnie_handover_id_1.jpg', 1, '', '2025-01-10 21:06:23', '2025-01-10 21:06:23'),
(2, 4, 8, 'ShaSha_handover_id_2.jpg', 0, NULL, 'Maaf kami harus menolak pengajuan penyerahan anda, hasil evaluasi formulir anda tidak sesuai dengan syarat kami, terima kasih.', '2025-01-10 21:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `handover_questions`
--

CREATE TABLE `handover_questions` (
  `handover_questions_id` int UNSIGNED NOT NULL,
  `questions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handover_questions`
--

INSERT INTO `handover_questions` (`handover_questions_id`, `questions`, `is_active`) VALUES
(1, 'Nama Hewan', 1),
(2, 'Jenis Hewan', 1),
(3, 'Tanggal Lahir Hewan', 1),
(4, 'Jenis Kelamin Hewan', 1),
(5, 'Ras Hewan', 1),
(6, 'Warna Hewan', 1),
(7, 'Berat Hewan', 1),
(8, 'Vaksin Hewan', 1),
(9, 'Apakah hewan sudah steril?', 1),
(10, 'Tanggal vaksinasi terakhir', 1),
(11, 'Alasan penyerahan hewan', 1),
(12, 'Makanan yang biasa diberikan? (Makanan Kaleng/Makanan Kering/Nasi + Daging/Lainnya)', 1),
(13, 'Apakah hewan jinak pada anak?', 1),
(14, 'Apakah hewan menggigit/galak?', 1),
(15, 'Apakah hewan bisa bergaul dengan anjing/kucing lain?', 1),
(16, 'Dimanakah hewan biasa tidur? (Didalam/Diluar rumah?)', 1),
(17, 'Apakah hewan biasa berada didalam rumah atau bebas berkeliaran?', 1),
(18, 'Apakah hewan terlatih untuk buang air di kotak pasir?', 1),
(19, 'Adakah sifat/hal lain yang perlu kami ketahui?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_10_08_000004_create_handover_questions_table', 1),
(5, '2024_10_08_000005_create_status_configuration_table', 1),
(6, '2024_10_08_000006_create_shelter-information_table', 1),
(7, '2024_10_08_000007_create_adoption_questions_table', 1),
(8, '2024_10_08_000008_create_user_table', 1),
(9, '2024_10_08_000009_create_animal_table', 1),
(10, '2024_10_08_000010_create_handover_form_table', 1),
(11, '2024_10_08_000011_create_report_form_table', 1),
(12, '2024_10_08_000012_create_adoption_form_table', 1),
(13, '2024_10_08_000013_create_handover_answers_table', 1),
(14, '2024_10_08_000014_create_adoption_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_form`
--

CREATE TABLE `report_form` (
  `report_form_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `animal_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` tinyint NOT NULL,
  `admin_feedback` text COLLATE utf8mb4_unicode_ci,
  `admin_feedback_photo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_form`
--

INSERT INTO `report_form` (`report_form_id`, `user_id`, `status_id`, `animal_type`, `location`, `location_map`, `animal_photo`, `location_photo`, `additional_photo`, `description`, `is_seen`, `admin_feedback`, `admin_feedback_photo`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Anjing', 'Jakarta Selatan dekat Mc Donald', 'https://www.google.com/maps/search/?api=1&query=-6.2500,106.845', '', '', '', 'Anjing ditemukan dekat tempat sampah Mc Donald', 1, NULL, NULL, '2024-11-30 17:00:00', '2025-01-09 22:54:31'),
(2, 1, 1, 'Kucing', 'map', 'map', '6780b118b44b8.jpeg', '6780b118b8c95.jpeg', '6780b118b8daf.jpeg', 'test', 1, NULL, NULL, '2025-01-09 22:33:12', '2025-01-09 23:04:31'),
(3, 1, 1, 'Kucing', 'asd', 'ads', '6780b54f1f809.jpeg', '6780b54f22459.jpeg', '6780b54f22576.jpeg', 'asd', 0, NULL, NULL, '2025-01-09 22:51:11', '2025-01-10 21:03:25'),
(4, 4, 1, 'Kucing', 'Jalan Keutamaan No 10', 'https://maps.app.goo.gl/xRNAjZouQJ3wD4an6', 'Kucing Report.jpg', 'Lokasi Report.jpg', 'Pendukung.jpg', 'Hewan terluka parah', 1, NULL, NULL, '2025-01-10 20:30:06', '2025-01-10 20:58:58'),
(5, 3, 1, 'Kucing', 'Jakarta Selatan dekat Mc Donald', 'https://www.google.com/maps/search/?api=1&query=-6.2500,106.845', 'Kucing Report.jpg', 'Lokasi Report.jpg', 'Oyen.jpg', 'Anjing ditemukan dekat tempat sampah Mc Donald', 1, NULL, NULL, '2025-01-10 20:44:31', '2025-01-10 20:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `shelter_information`
--

CREATE TABLE `shelter_information` (
  `shelter_id` int UNSIGNED NOT NULL,
  `shelter_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shelter_logo` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `operational_hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donation_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shelter_photo` text COLLATE utf8mb4_unicode_ci,
  `about_shelter` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `founder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founder_photo` text COLLATE utf8mb4_unicode_ci,
  `founder_description` text COLLATE utf8mb4_unicode_ci,
  `history` text COLLATE utf8mb4_unicode_ci,
  `additional_information` text COLLATE utf8mb4_unicode_ci,
  `is_accepting_report` tinyint DEFAULT NULL,
  `is_accepting_handover` tinyint DEFAULT NULL,
  `is_accepting_adoption` tinyint DEFAULT NULL,
  `report_information` longtext COLLATE utf8mb4_unicode_ci,
  `handover_information` longtext COLLATE utf8mb4_unicode_ci,
  `adoption_information` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelter_information`
--

INSERT INTO `shelter_information` (`shelter_id`, `shelter_name`, `shelter_logo`, `address`, `email`, `operational_hour`, `whatsapp_number`, `phone_number`, `instagram`, `facebook`, `twitter`, `youtube`, `donation_information`, `shelter_photo`, `about_shelter`, `vision`, `mission`, `founder_name`, `founder_photo`, `founder_description`, `history`, `additional_information`, `is_accepting_report`, `is_accepting_handover`, `is_accepting_adoption`, `report_information`, `handover_information`, `adoption_information`, `created_at`, `updated_at`) VALUES
(1, 'Shelter Us', '', 'Jl. Lorem Ipsum Blok A No 20, Jakarta, Jakarta Selatan', 'shelterus@gmail.com', ' <p>Senin 09.00 - 17.00<br>Selasa 09.00 - 17.00<br>Rabu 09.00 - 17.00<br>Kamis 09.00 - 17.00<br>Jumat 09.00 - 17.00<br></p>', '087889360769', '087889360769', 'www.instagram/ShelterUs.com', 'www.facebook/ShelterUs.com', 'www.twitter/ShelterUs.com', 'www.youtube/ShelterUs.com', 'Donasi dapat disalurkan kepada rekening 5271875046 A/N Shelter Us', '', 'Selamat datang di Shelter Us, tempat di mana setiap hewan berhak mendapatkan kesempatan kedua untuk hidup yang lebih baik. Kami adalah sebuah organisasi yang berdedikasi untuk menyelamatkan, merawat, dan menemukan rumah permanen bagi hewan peliharaan liar dan terlantar. Di Shelter Us, kami menerima laporan penyelamatan hewan yang membutuhkan bantuan, serta penyerahan hewan dari individu yang tidak dapat lagi merawat mereka. Kami percaya bahwa setiap hewan, tanpa memandang latar belakang atau kondisi, layak mendapatkan cinta dan perhatian. Selain itu, kami juga menyediakan program adopsi yang bertujuan untuk menghubungkan hewan-hewan kami dengan keluarga yang peduli dan siap memberikan kasih sayang. Dengan dukungan komunitas dan relawan, kami berkomitmen untuk meningkatkan kesejahteraan hewan dan menciptakan kesadaran tentang pentingnya perlindungan hewan. Bergabunglah dengan kami dalam misi ini dan bantu kami memberikan suara bagi mereka yang tidak dapat berbicara.', 'Menjadi tempat penampungan hewan terkemuka yang berkontribusi pada kesejahteraan hewan di komunitas, di mana setiap hewan terlantar dan liar mendapatkan kesempatan untuk hidup yang lebih baik dan menemukan rumah yang penuh kasih.', '\n                    <p>Misi Shelter Us:</p><ol><li>Penyelamatan dan Perawatan: Menyelamatkan hewan-hewan terlantar, terluka, atau terabaikan, serta memberikan perawatan medis dan tempat tinggal yang aman hingga mereka siap untuk diadopsi.</li><li>Program Adopsi: Menghubungkan hewan-hewan kami dengan keluarga yang peduli melalui program adopsi yang bertanggung jawab, memastikan bahwa setiap hewan menemukan rumah yang sesuai dengan kebutuhan mereka.</li><li>Edukasi dan Kesadaran: Meningkatkan kesadaran masyarakat tentang pentingnya perlindungan hewan, adopsi, dan tanggung jawab pemeliharaan hewan peliharaan melalui program edukasi dan kampanye.</li><li> Kolaborasi Komunitas: Bekerja sama dengan individu, organisasi, dan relawan untuk menciptakan jaringan dukungan yang kuat bagi kesejahteraan hewan dan mendorong partisipasi aktif dalam kegiatan perlindungan hewan.</li><li>Advokasi Kesejahteraan Hewan: Mendorong kebijakan dan praktik yang mendukung perlindungan dan kesejahteraan hewan di tingkat lokal dan nasional, serta berperan sebagai suara bagi hewan yang tidak memiliki suara.&nbsp;<br><br></li></ol>\n                ', 'Dr. Alexandra Lexiana', '', 'Dr. Alexandra Lexiana adalah seorang dokter hewan yang berdedikasi dan pendiri sebuah tempat penampungan hewan yang terkemuka. Dengan semangat untuk kesejahteraan hewan, ia telah mengabdikan karirnya untuk memberikan perawatan yang penuh kasih dan memperjuangkan kebutuhan hewan yang terlantar dan ditinggalkan. Di bawah kepemimpinannya, tempat penampungan ini telah menjadi tempat yang aman bagi banyak hewan peliharaan, memberikan mereka kesempatan kedua untuk hidup.', 'Shelter Us didirikan oleh Dr. Alexandra, seorang dokter hewan yang memiliki kecintaan mendalam terhadap hewan dan komitmen untuk meningkatkan kesejahteraan mereka. Dengan visi untuk memberikan perlindungan dan perawatan bagi hewan-hewan terlantar dan terabaikan, Dr. Alexandria memulai perjalanan ini dengan tekad yang kuat. Sejak dibuka, Shelter Us telah menjadi rumah bagi lebih dari 100 anjing dan 50 kucing, yang semuanya telah menerima perawatan medis dan kasih sayang yang mereka butuhkan. Melalui program adopsi yang bertanggung jawab dan inisiatif edukasi untuk masyarakat, Dr. Alexandria dan timnya berusaha untuk menciptakan lingkungan yang lebih baik bagi hewan-hewan ini, serta meningkatkan kesadaran akan pentingnya perlindungan hewan. Dengan dedikasi dan kerja keras, Shelter Us terus berupaya untuk memberikan harapan dan kesempatan baru bagi setiap hewan yang membutuhkan.', 'Shelter Saat ini memerlukan bantuan berupa makanan, air, dan uang untuk biaya pengobatan beberapa anjing yang terluka parah saat ditemukan, besar harapan kami agar ', 1, 1, 1, '\n                    <p>Panduan Melaporkan Penemuan Hewan Liar:</p>\n                    <ol>\n                        <li>Pastikan keadaan hewan yang ditemukan (Apakah dalam keadaan terluka dan memerlukan bantuan?).</li>\n                        <li>Jika hewan yang Anda temukan dalam kondisi sehat, tidak terluka maupun memerlukan bantuan, maka abaikan hewan tersebut, terutama kucing (Pada umumnya kucing jalanan yang berada dalam kondisi sehat menandakan bahwa ada yang merawat).</li>\n                        <li>Jika hewan yang Anda temukan dalam kondisi terluka/memerlukan bantuan, berikut hal yang harus Anda persiapkan sebelum membuat laporan:</li>\n                        <ol>\n                            <li>Ambil foto anjing/kucing liar yang Anda temukan.</li>\n                            <li>Buka Google Maps, klik lokasi di sekitar Anda menemukan yang dapat dijadikan patokan/acuan.</li>\n                            <li>Foto lokasi penemuan beserta anjing/kucing liar yang Anda temukan.</li>\n                            <li>Foto bebas yang memungkinkan menjadi bantuan dalam mencari hewan liar tersebut.</li>\n                        </ol>\n                    </ol>\n                    <p><strong>Pemilik akun bertanggung jawab atas laporan yang dibuat.</strong></p>\n                ', '\n                    <p>Ketentuan Menyerahkan Hewan:</p>\n                    <ol>\n                        <li>Sebelum menyerahkan hewan milik pribadi, pertimbangkan juga alternatif lain sebelum menyerahkan hewan ke shelter, seperti mencari pemilik baru yang dapat merawat hewan tersebut.</li>\n                        <li>Sebelum menyerahkan hewan peliharaan liar (anjing/kucing) yang ditemukan di jalan:</li>\n                        <ol>\n                            <li>Bawa hewan ke dokter hewan untuk pemeriksaan kesehatan menyeluruh.</li>\n                            <li>Pastikan hewan tersebut sudah mendapatkan vaksinasi yang diperlukan.</li>\n                            <li>Berikan pengobatan terhadap parasit seperti cacing, kutu, dan tungau.</li>\n                        </ol>\n                    </ol>\n\n                    <p>Ketentuan Menyerahkan Hewan Milik Pribadi:</p>\n                    <ol>\n                        <li>Sediakan informasi rinci mengenai hewan tersebut, seperti usia, jenis kelamin, perilaku, kebiasaan makan, dan sejarah kesehatan.</li>\n                        <li>Jika hewan tersebut memiliki riwayat medis atau obat-obatan yang perlu diberikan, informasikan secara jelas kepada shelter.</li>\n                    </ol>\n\n                    <p>Perlengkapan Hewan:</p>\n                    <ol>\n                        <li>Bawa barang-barang pribadi hewan seperti tempat tidur, mainan, atau makanan favoritnya. Ini akan membantu hewan merasa lebih nyaman di lingkungan baru.</li>\n                    </ol>\n\n                    <p><strong>Harap mengontak Admin via WhatsApp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir.</strong></p>\n                ', '\n                    <p>Sebelum mengadopsi hewan dari shelter, ada beberapa hal penting yang perlu diperhatikan:</p>\n                    <ol>\n                        <li>Pastikan Anda siap untuk komitmen jangka panjang dalam merawat hewan peliharaan, yang bisa berlangsung bertahun-tahun.</li>\n                        <li>Evaluasi gaya hidup Anda, termasuk rutinitas harian dan situasi tempat tinggal, untuk memastikan bahwa Anda dapat memberikan waktu dan lingkungan yang diperlukan untuk hewan peliharaan.</li>\n                        <li>Tentukan jenis hewan yang paling sesuai dengan gaya hidup Anda, seperti anjing atau kucing, serta pertimbangkan kebutuhan spesifik dari spesies atau ras tersebut.</li>\n                        <li>Jika Anda sudah memiliki hewan peliharaan lain, pikirkan tentang bagaimana hewan baru akan beradaptasi dengan dinamika keluarga yang ada. Lakukan pengenalan dengan cara yang terkendali.</li>\n                        <li>Tanyakan tentang riwayat perilaku hewan tersebut dan masalah yang mungkin ada, karena pemahaman tentang temperamen mereka akan membantu Anda dalam pelatihan dan integrasi.</li>\n                        <li>Periksa catatan kesehatan hewan, termasuk vaksinasi, status sterilisasi, dan masalah kesehatan yang diketahui, untuk mengantisipasi biaya veteriner di masa depan.</li>\n                        <li>Siapkan rumah Anda dengan menghilangkan bahaya dan menyediakan perlengkapan yang diperlukan, seperti makanan, mangkuk air, tempat tidur, dan mainan.</li>\n                        <li>Pertimbangkan tanggung jawab finansial, termasuk biaya makanan, perawatan veteriner, grooming, dan perlengkapan.</li>\n                        <li>Kenali sumber daya lokal, seperti pelatih, dokter hewan, dan kelompok dukungan hewan peliharaan, untuk membantu Anda menjalani kepemilikan hewan peliharaan dengan sukses.</li>\n                    </ol>\n                    <p><strong>Harap mengontak Admin via WhatsApp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir.</strong></p>\n                ', NULL, NULL),
(2, 'Shelter Us', '', 'Jl. Lorem Ipsum Blok A No 20, Jakarta, Jakarta Selatan', 'shelterus@gmail.com', ' <p>Senin 09.00 - 17.00<br>Selasa 09.00 - 17.00<br>Rabu 09.00 - 17.00<br>Kamis 09.00 - 17.00<br>Jumat 09.00 - 17.00<br></p>', '087889360769', '087889360769', 'www.instagram/ShelterUs.com', 'www.facebook/ShelterUs.com', 'www.twitter/ShelterUs.com', 'www.youtube/ShelterUs.com', 'Donasi dapat disalurkan kepada rekening 5271875046 A/N Shelter Us', '', 'Selamat datang di Shelter Us, tempat di mana setiap hewan berhak mendapatkan kesempatan kedua untuk hidup yang lebih baik. Kami adalah sebuah organisasi yang berdedikasi untuk menyelamatkan, merawat, dan menemukan rumah permanen bagi hewan peliharaan liar dan terlantar. Di Shelter Us, kami menerima laporan penyelamatan hewan yang membutuhkan bantuan, serta penyerahan hewan dari individu yang tidak dapat lagi merawat mereka. Kami percaya bahwa setiap hewan, tanpa memandang latar belakang atau kondisi, layak mendapatkan cinta dan perhatian. Selain itu, kami juga menyediakan program adopsi yang bertujuan untuk menghubungkan hewan-hewan kami dengan keluarga yang peduli dan siap memberikan kasih sayang. Dengan dukungan komunitas dan relawan, kami berkomitmen untuk meningkatkan kesejahteraan hewan dan menciptakan kesadaran tentang pentingnya perlindungan hewan. Bergabunglah dengan kami dalam misi ini dan bantu kami memberikan suara bagi mereka yang tidak dapat berbicara.', 'Menjadi tempat penampungan hewan terkemuka yang berkontribusi pada kesejahteraan hewan di komunitas, di mana setiap hewan terlantar dan liar mendapatkan kesempatan untuk hidup yang lebih baik dan menemukan rumah yang penuh kasih.', '\n                    <p>Misi Shelter Us:</p><ol><li>Penyelamatan dan Perawatan: Menyelamatkan hewan-hewan terlantar, terluka, atau terabaikan, serta memberikan perawatan medis dan tempat tinggal yang aman hingga mereka siap untuk diadopsi.</li><li>Program Adopsi: Menghubungkan hewan-hewan kami dengan keluarga yang peduli melalui program adopsi yang bertanggung jawab, memastikan bahwa setiap hewan menemukan rumah yang sesuai dengan kebutuhan mereka.</li><li>Edukasi dan Kesadaran: Meningkatkan kesadaran masyarakat tentang pentingnya perlindungan hewan, adopsi, dan tanggung jawab pemeliharaan hewan peliharaan melalui program edukasi dan kampanye.</li><li> Kolaborasi Komunitas: Bekerja sama dengan individu, organisasi, dan relawan untuk menciptakan jaringan dukungan yang kuat bagi kesejahteraan hewan dan mendorong partisipasi aktif dalam kegiatan perlindungan hewan.</li><li>Advokasi Kesejahteraan Hewan: Mendorong kebijakan dan praktik yang mendukung perlindungan dan kesejahteraan hewan di tingkat lokal dan nasional, serta berperan sebagai suara bagi hewan yang tidak memiliki suara.&nbsp;<br><br></li></ol>\n                ', 'Dr. Alexandra Lexiana', '', 'Dr. Alexandra Lexiana adalah seorang dokter hewan yang berdedikasi dan pendiri sebuah tempat penampungan hewan yang terkemuka. Dengan semangat untuk kesejahteraan hewan, ia telah mengabdikan karirnya untuk memberikan perawatan yang penuh kasih dan memperjuangkan kebutuhan hewan yang terlantar dan ditinggalkan. Di bawah kepemimpinannya, tempat penampungan ini telah menjadi tempat yang aman bagi banyak hewan peliharaan, memberikan mereka kesempatan kedua untuk hidup.', 'Shelter Us didirikan oleh Dr. Alexandra, seorang dokter hewan yang memiliki kecintaan mendalam terhadap hewan dan komitmen untuk meningkatkan kesejahteraan mereka. Dengan visi untuk memberikan perlindungan dan perawatan bagi hewan-hewan terlantar dan terabaikan, Dr. Alexandria memulai perjalanan ini dengan tekad yang kuat. Sejak dibuka, Shelter Us telah menjadi rumah bagi lebih dari 100 anjing dan 50 kucing, yang semuanya telah menerima perawatan medis dan kasih sayang yang mereka butuhkan. Melalui program adopsi yang bertanggung jawab dan inisiatif edukasi untuk masyarakat, Dr. Alexandria dan timnya berusaha untuk menciptakan lingkungan yang lebih baik bagi hewan-hewan ini, serta meningkatkan kesadaran akan pentingnya perlindungan hewan. Dengan dedikasi dan kerja keras, Shelter Us terus berupaya untuk memberikan harapan dan kesempatan baru bagi setiap hewan yang membutuhkan.', 'Shelter Saat ini memerlukan bantuan berupa makanan, air, dan uang untuk biaya pengobatan beberapa anjing yang terluka parah saat ditemukan, besar harapan kami agar ', 1, 1, 1, '\n                    <p>Panduan Melaporkan Penemuan Hewan Liar:</p>\n                    <ol>\n                        <li>Pastikan keadaan hewan yang ditemukan (Apakah dalam keadaan terluka dan memerlukan bantuan?).</li>\n                        <li>Jika hewan yang Anda temukan dalam kondisi sehat, tidak terluka maupun memerlukan bantuan, maka abaikan hewan tersebut, terutama kucing (Pada umumnya kucing jalanan yang berada dalam kondisi sehat menandakan bahwa ada yang merawat).</li>\n                        <li>Jika hewan yang Anda temukan dalam kondisi terluka/memerlukan bantuan, berikut hal yang harus Anda persiapkan sebelum membuat laporan:</li>\n                        <ol>\n                            <li>Ambil foto anjing/kucing liar yang Anda temukan.</li>\n                            <li>Buka Google Maps, klik lokasi di sekitar Anda menemukan yang dapat dijadikan patokan/acuan.</li>\n                            <li>Foto lokasi penemuan beserta anjing/kucing liar yang Anda temukan.</li>\n                            <li>Foto bebas yang memungkinkan menjadi bantuan dalam mencari hewan liar tersebut.</li>\n                        </ol>\n                    </ol>\n                    <p><strong>Pemilik akun bertanggung jawab atas laporan yang dibuat.</strong></p>\n                ', '\n                    <p>Ketentuan Menyerahkan Hewan:</p>\n                    <ol>\n                        <li>Sebelum menyerahkan hewan milik pribadi, pertimbangkan juga alternatif lain sebelum menyerahkan hewan ke shelter, seperti mencari pemilik baru yang dapat merawat hewan tersebut.</li>\n                        <li>Sebelum menyerahkan hewan peliharaan liar (anjing/kucing) yang ditemukan di jalan:</li>\n                        <ol>\n                            <li>Bawa hewan ke dokter hewan untuk pemeriksaan kesehatan menyeluruh.</li>\n                            <li>Pastikan hewan tersebut sudah mendapatkan vaksinasi yang diperlukan.</li>\n                            <li>Berikan pengobatan terhadap parasit seperti cacing, kutu, dan tungau.</li>\n                        </ol>\n                    </ol>\n\n                    <p>Ketentuan Menyerahkan Hewan Milik Pribadi:</p>\n                    <ol>\n                        <li>Sediakan informasi rinci mengenai hewan tersebut, seperti usia, jenis kelamin, perilaku, kebiasaan makan, dan sejarah kesehatan.</li>\n                        <li>Jika hewan tersebut memiliki riwayat medis atau obat-obatan yang perlu diberikan, informasikan secara jelas kepada shelter.</li>\n                    </ol>\n\n                    <p>Perlengkapan Hewan:</p>\n                    <ol>\n                        <li>Bawa barang-barang pribadi hewan seperti tempat tidur, mainan, atau makanan favoritnya. Ini akan membantu hewan merasa lebih nyaman di lingkungan baru.</li>\n                    </ol>\n\n                    <p><strong>Harap mengontak Admin via WhatsApp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir.</strong></p>\n                ', '\n                    <p>Sebelum mengadopsi hewan dari shelter, ada beberapa hal penting yang perlu diperhatikan:</p>\n                    <ol>\n                        <li>Pastikan Anda siap untuk komitmen jangka panjang dalam merawat hewan peliharaan, yang bisa berlangsung bertahun-tahun.</li>\n                        <li>Evaluasi gaya hidup Anda, termasuk rutinitas harian dan situasi tempat tinggal, untuk memastikan bahwa Anda dapat memberikan waktu dan lingkungan yang diperlukan untuk hewan peliharaan.</li>\n                        <li>Tentukan jenis hewan yang paling sesuai dengan gaya hidup Anda, seperti anjing atau kucing, serta pertimbangkan kebutuhan spesifik dari spesies atau ras tersebut.</li>\n                        <li>Jika Anda sudah memiliki hewan peliharaan lain, pikirkan tentang bagaimana hewan baru akan beradaptasi dengan dinamika keluarga yang ada. Lakukan pengenalan dengan cara yang terkendali.</li>\n                        <li>Tanyakan tentang riwayat perilaku hewan tersebut dan masalah yang mungkin ada, karena pemahaman tentang temperamen mereka akan membantu Anda dalam pelatihan dan integrasi.</li>\n                        <li>Periksa catatan kesehatan hewan, termasuk vaksinasi, status sterilisasi, dan masalah kesehatan yang diketahui, untuk mengantisipasi biaya veteriner di masa depan.</li>\n                        <li>Siapkan rumah Anda dengan menghilangkan bahaya dan menyediakan perlengkapan yang diperlukan, seperti makanan, mangkuk air, tempat tidur, dan mainan.</li>\n                        <li>Pertimbangkan tanggung jawab finansial, termasuk biaya makanan, perawatan veteriner, grooming, dan perlengkapan.</li>\n                        <li>Kenali sumber daya lokal, seperti pelatih, dokter hewan, dan kelompok dukungan hewan peliharaan, untuk membantu Anda menjalani kepemilikan hewan peliharaan dengan sukses.</li>\n                    </ol>\n                    <p><strong>Harap mengontak Admin via WhatsApp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir.</strong></p>\n                ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_configuration`
--

CREATE TABLE `status_configuration` (
  `status_id` int UNSIGNED NOT NULL,
  `config` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_configuration`
--

INSERT INTO `status_configuration` (`status_id`, `config`, `key`, `status`) VALUES
(1, 'Form_Report_Status', 'REQ', 'Penyelematkan Diajukan'),
(2, 'Form_Report_Status', 'ONP', 'Dalam Proses Penyelematan'),
(3, 'Form_Report_Status', 'RSC', 'Hewan Sukses Diselamatkan'),
(4, 'Form_Report_Status', 'NFD', 'Hewan Tidak Ditemukan'),
(5, 'Form_Report_Status', 'OTH', 'Lainnya'),
(6, 'Form_Handover_Status', 'REQ', 'Penyerahan Diajukan'),
(7, 'Form_Handover_Status', 'APP', 'Pengajuan Penyerahan Disetujui'),
(8, 'Form_Handover_Status', 'RJT', 'Pengajuan Penyerahan Ditolak'),
(9, 'Form_Handover_Status', 'SUC', 'Penyerahan Berhasil'),
(10, 'Form_Handover_Status', 'CAN', 'Penyerahan Dibatalkan'),
(11, 'Form_Adoption_Status', 'REQ', 'Adopsi Diajukan'),
(12, 'Form_Adoption_Status', 'APP', 'Pengajuan Adopsi Disetujui'),
(13, 'Form_Adoption_Status', 'RJT', 'Pengajuan Adopsi Ditolak'),
(14, 'Form_Adoption_Status', 'SUC', 'Adopsi Berhasil'),
(15, 'Form_Adoption_Status', 'CAN', 'Adopsi Dibatalkan'),
(16, 'Animal_Status', 'RES', 'Baru Diselamatkan'),
(17, 'Animal_Status', 'ONC', 'Dalam Proses Perawatan'),
(18, 'Animal_Status', 'AVL', 'Tersedia Untuk Adopsi'),
(19, 'Animal_Status', 'NAL', 'Tidak Tersedia Untuk Adopsi'),
(20, 'Animal_Status', 'RSV', 'Dalam Proses Adopsi'),
(21, 'Animal_Status', 'ADP', 'Telah Diadopsi'),
(22, 'Animal_Status', 'RTO', 'Dikembalikan Pada Pemilik'),
(23, 'Animal_Status', 'DAS', 'Hewan Meninggal'),
(24, 'Animal_Status', 'OTH', 'Lainnya'),
(25, 'Form_Report_Status', 'REQ', 'Penyelematkan Diajukan'),
(26, 'Form_Report_Status', 'ONP', 'Dalam Proses Penyelematan'),
(27, 'Form_Report_Status', 'RSC', 'Hewan Sukses Diselamatkan'),
(28, 'Form_Report_Status', 'NFD', 'Hewan Tidak Ditemukan'),
(29, 'Form_Report_Status', 'OTH', 'Lainnya'),
(30, 'Form_Handover_Status', 'REQ', 'Penyerahan Diajukan'),
(31, 'Form_Handover_Status', 'APP', 'Pengajuan Penyerahan Disetujui'),
(32, 'Form_Handover_Status', 'RJT', 'Pengajuan Penyerahan Ditolak'),
(33, 'Form_Handover_Status', 'SUC', 'Penyerahan Berhasil'),
(34, 'Form_Handover_Status', 'CAN', 'Penyerahan Dibatalkan'),
(35, 'Form_Adoption_Status', 'REQ', 'Adopsi Diajukan'),
(36, 'Form_Adoption_Status', 'APP', 'Pengajuan Adopsi Disetujui'),
(37, 'Form_Adoption_Status', 'RJT', 'Pengajuan Adopsi Ditolak'),
(38, 'Form_Adoption_Status', 'SUC', 'Adopsi Berhasil'),
(39, 'Form_Adoption_Status', 'CAN', 'Adopsi Dibatalkan'),
(40, 'Animal_Status', 'RES', 'Baru Diselamatkan'),
(41, 'Animal_Status', 'ONC', 'Dalam Proses Perawatan'),
(42, 'Animal_Status', 'AVL', 'Tersedia Untuk Adopsi'),
(43, 'Animal_Status', 'NAL', 'Tidak Tersedia Untuk Adopsi'),
(44, 'Animal_Status', 'RSV', 'Dalam Proses Adopsi'),
(45, 'Animal_Status', 'ADP', 'Telah Diadopsi'),
(46, 'Animal_Status', 'RTO', 'Dikembalikan Pada Pemilik'),
(47, 'Animal_Status', 'DAS', 'Hewan Meninggal'),
(48, 'Animal_Status', 'OTH', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int UNSIGNED NOT NULL,
  `shelter_id` int UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `otp` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `shelter_id`, `name`, `email`, `password`, `address`, `job`, `birth_date`, `whatsapp_number`, `phone_number`, `photo`, `role`, `otp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Steven Cokro', 'stevencokro32@gmail.com', '$2y$10$T33y8fKjazoV4XXj4KpGre5PKYeHPdAuM/Pp15D3M/05VMGmkrvIS', 'Jl Kemakmuran Blok A Nomor 15', 'Mahasiswa', '2002-01-20', '087889360769', '087889360769', '', 'Admin', NULL, NULL, NULL),
(2, 1, 'Alexander Subroto', 'alexander.sub168@gmail.com', '$2y$10$cdNO.EODIZzYihJATCC9SOjHD74hv49SVpDdgmdol.xhZ/HRIsXbe', 'Jl Keutamaan No 32 Krukut, Jakarta Barat, Kecamatan Tamansari.', 'Wirausahawan', '1995-03-01', '085718883668', '085718883668', '', 'Admin', NULL, NULL, NULL),
(3, 1, 'Samuel Michael', 'sam.michael26@gmail.com', '$2y$10$chD9HlUZUtmmQlcv99a36.cK8XU18lishJTeEJtyCqkGqNUTkJgi2', 'Jl Ganda Citra Putra Blok C Nomor 3A', 'Karyawan Swasta', '1994-01-20', '081384079334', '081384079334', '', 'Admin', NULL, NULL, NULL),
(4, 1, 'Diana Putri', 'diana.putri@gmail.com', '$2y$10$n4DhoMqh4ElPgxnOT76kSeEHLjwVINjlGpDArE3K3fHc2qgcUV4O2', 'Jl. Melati No. 10, Jakarta', 'Guru', '1988-05-15', '082112345678', '082112345678', 'proifl karina.jpeg', 'User', NULL, NULL, '2025-01-10 20:19:14'),
(5, 1, 'Budi Santoso', 'budi.santoso@gmail.com', '$2y$10$8eAkxjQwwDLQbJIFNoLZ0O0ohUvW9yVWwxoz0pnBJ1gDSsLRPr/O.', 'Jl. Raya No. 45, Bandung', 'Pengusaha', '1992-09-30', '081234567890', '081234567890', '', 'User', NULL, NULL, NULL),
(6, 1, 'Siti Rahmawati', 'siti.rahmawati@gmail.com', '$2y$10$SIt046i1DBdtjLLFOGwXjeb8.sHDu9HpGoLi8xvnWiuocHWEF3dIa', 'Jl. Anggrek No. 25, Yogyakarta', 'Mahasiswa', '2000-12-05', '085678912345', '085678912345', '', 'User', NULL, NULL, NULL),
(7, 1, 'Steven Cokro', 'stevencokro32@gmail.com', '$2y$10$lYZ1uxPkn0s9zkomcKOHbeAaB8JCAq5sI4b9B9jXRc0iU8ohWis5W', 'Jl Kemakmuran Blok A Nomor 15', 'Mahasiswa', '2002-01-20', '087889360769', '087889360769', '', 'Admin', NULL, NULL, NULL),
(8, 1, 'Alexander Subroto', 'alexander.sub168@gmail.com', '$2y$10$LOM5NllEGS0sC29YCwHnMeTD1LQd5Gwn6UUgwyt9B8QX7utUDW8m6', 'Jl Keutamaan No 32 Krukut, Jakarta Barat, Kecamatan Tamansari.', 'Wirausahawan', '1995-03-01', '085718883668', '085718883668', '', 'Admin', NULL, NULL, NULL),
(9, 1, 'Samuel Michael', 'sam.michael26@gmail.com', '$2y$10$gF4meJt7cq.qpuiE4Kine.q1XgtkpVMjyIkawM0IRwkvi43QU9/aO', 'Jl Ganda Citra Putra Blok C Nomor 3A', 'Karyawan Swasta', '1994-01-20', '081384079334', '081384079334', '', 'Admin', NULL, NULL, NULL),
(10, 1, 'Diana Putri', 'diana.putri@gmail.com', '$2y$10$RYqFEuE0.n/WyNrORx9eBOKXWiJ.ETRVbsrOHeMc2a3bGAasvgv9q', 'Jl. Melati No. 10, Jakarta', 'Guru', '1988-05-15', '082112345678', '082112345678', '', 'User', NULL, NULL, NULL),
(11, 1, 'Budi Santoso', 'budi.santoso@gmail.com', '$2y$10$gm9r58PJcrHavXyZJ4CR5OF6jEXnhanJrgzFYMx6ywDYxGDnxIp7q', 'Jl. Raya No. 45, Bandung', 'Pengusaha', '1992-09-30', '081234567890', '081234567890', '', 'User', NULL, NULL, NULL),
(12, 1, 'Siti Rahmawati', 'siti.rahmawati@gmail.com', '$2y$10$Cf1n9tvzyTMzIYFsceiSzOqomGsyJWrjUPzF2VnrVVH6DoDX55aCe', 'Jl. Anggrek No. 25, Yogyakarta', 'Mahasiswa', '2000-12-05', '085678912345', '085678912345', '', 'User', NULL, NULL, NULL),
(13, 1, 'steven', 'xixixi@gmail.com', '$2y$10$FvV9j3R7wfh1XKHdHUFSTuq042Nr9AaB5qGVyjdFueV6L3239BHvu', 'asd', 'asda', '2025-01-02', '111111111', '1111111111', 'association.png', 'User', NULL, '2025-01-10 19:52:14', '2025-01-10 19:52:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_answers`
--
ALTER TABLE `adoption_answers`
  ADD KEY `fk_adoption_form_has_adoption_questions_adoption_questions1_idx` (`adoption_questions_id`),
  ADD KEY `fk_adoption_form_has_adoption_questions_adoption_form1_idx` (`adoption_form_id`);

--
-- Indexes for table `adoption_form`
--
ALTER TABLE `adoption_form`
  ADD PRIMARY KEY (`adoption_form_id`),
  ADD KEY `fk_adoption_form_user1_idx` (`user_id`),
  ADD KEY `fk_adoption_form_animal1_idx` (`animal_id`),
  ADD KEY `fk_adoption_form_status_configuration1_idx` (`status_id`);

--
-- Indexes for table `adoption_questions`
--
ALTER TABLE `adoption_questions`
  ADD PRIMARY KEY (`adoption_question_id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_animal_status_configuration1_idx` (`status_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `handover_answers`
--
ALTER TABLE `handover_answers`
  ADD KEY `fk_handover_questions_has_handover_form_handover_form1_idx` (`handover_form_id`),
  ADD KEY `fk_handover_questions_has_handover_form_handover_questions1_idx` (`handover_questions_id`);

--
-- Indexes for table `handover_form`
--
ALTER TABLE `handover_form`
  ADD PRIMARY KEY (`handover_form_id`),
  ADD KEY `fk_handover_form_user_idx` (`user_id`),
  ADD KEY `fk_handover_form_status_configuration1_idx` (`status_id`);

--
-- Indexes for table `handover_questions`
--
ALTER TABLE `handover_questions`
  ADD PRIMARY KEY (`handover_questions_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `report_form`
--
ALTER TABLE `report_form`
  ADD PRIMARY KEY (`report_form_id`),
  ADD KEY `fk_report_form_status_configuration1_idx` (`status_id`),
  ADD KEY `fk_report_form_user1_idx` (`user_id`);

--
-- Indexes for table `shelter_information`
--
ALTER TABLE `shelter_information`
  ADD PRIMARY KEY (`shelter_id`);

--
-- Indexes for table `status_configuration`
--
ALTER TABLE `status_configuration`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_shelter_information1_idx` (`shelter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_form`
--
ALTER TABLE `adoption_form`
  MODIFY `adoption_form_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adoption_questions`
--
ALTER TABLE `adoption_questions`
  MODIFY `adoption_question_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handover_form`
--
ALTER TABLE `handover_form`
  MODIFY `handover_form_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `handover_questions`
--
ALTER TABLE `handover_questions`
  MODIFY `handover_questions_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_form`
--
ALTER TABLE `report_form`
  MODIFY `report_form_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shelter_information`
--
ALTER TABLE `shelter_information`
  MODIFY `shelter_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_configuration`
--
ALTER TABLE `status_configuration`
  MODIFY `status_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_answers`
--
ALTER TABLE `adoption_answers`
  ADD CONSTRAINT `adoption_answers_adoption_form_id_foreign` FOREIGN KEY (`adoption_form_id`) REFERENCES `adoption_form` (`adoption_form_id`),
  ADD CONSTRAINT `adoption_answers_adoption_questions_id_foreign` FOREIGN KEY (`adoption_questions_id`) REFERENCES `adoption_questions` (`adoption_question_id`);

--
-- Constraints for table `adoption_form`
--
ALTER TABLE `adoption_form`
  ADD CONSTRAINT `adoption_form_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`),
  ADD CONSTRAINT `adoption_form_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_configuration` (`status_id`),
  ADD CONSTRAINT `adoption_form_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_configuration` (`status_id`);

--
-- Constraints for table `handover_answers`
--
ALTER TABLE `handover_answers`
  ADD CONSTRAINT `handover_answers_handover_form_id_foreign` FOREIGN KEY (`handover_form_id`) REFERENCES `handover_form` (`handover_form_id`),
  ADD CONSTRAINT `handover_answers_handover_questions_id_foreign` FOREIGN KEY (`handover_questions_id`) REFERENCES `handover_questions` (`handover_questions_id`);

--
-- Constraints for table `handover_form`
--
ALTER TABLE `handover_form`
  ADD CONSTRAINT `handover_form_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_configuration` (`status_id`),
  ADD CONSTRAINT `handover_form_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `report_form`
--
ALTER TABLE `report_form`
  ADD CONSTRAINT `report_form_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status_configuration` (`status_id`),
  ADD CONSTRAINT `report_form_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_shelter_id_foreign` FOREIGN KEY (`shelter_id`) REFERENCES `shelter_information` (`shelter_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
