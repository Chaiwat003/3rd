-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2024 at 06:37 AM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac_ac`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(35, 2, 1, 'อะไรนะ', '2024-10-02 16:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `lam_admin`
--

CREATE TABLE `lam_admin` (
  `id` int(10) NOT NULL,
  `name` varchar(254) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` tinytext NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lam_admin`
--

INSERT INTO `lam_admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Sunset', 'admin', '1b71b6225a51c04a157ed84bf9ca34a7', 'pongpan.norasan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lam_setting`
--

CREATE TABLE `lam_setting` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `logo` text NOT NULL,
  `details` text NOT NULL,
  `favicon` text NOT NULL,
  `urlconfig` text NOT NULL,
  `image_bg` text NOT NULL,
  `cache` enum('0','1') NOT NULL DEFAULT '1',
  `cache_value` varchar(11) NOT NULL,
  `head_code` text NOT NULL,
  `foot_code` text NOT NULL,
  `online` enum('0','1') NOT NULL,
  `msgoffline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lam_setting`
--

INSERT INTO `lam_setting` (`id`, `name`, `logo`, `details`, `favicon`, `urlconfig`, `image_bg`, `cache`, `cache_value`, `head_code`, `foot_code`, `online`, `msgoffline`) VALUES
(1, 'BuzzNest', 'logo.png', 'ยินดีต้อนรับสู่ Sunset เว็บบอร์ดที่รวบรวมผู้คนที่มีความสนใจในหลากหลายหัวข้อ ตั้งแต่เทคโนโลยี การเขียนโปรแกรม ไลฟ์สไตล์ ศิลปะ ไปจนถึงการพัฒนาตนเอง ไม่ว่าคุณจะเป็นมือใหม่ที่กำลังเริ่มต้นหรือผู้เชี่ยวชาญที่ต้องการแบ่งปันประสบการณ์ Sunset เป็นพื้นที่ที่เปิดกว้างสำหรับทุกคน', 'logo.png', 'https://ac.2dkung.xyz/', 'hd-6.2218.jpg', '1', '?v=128', '', '', '1', 'อยู่ระหว่างปรับปรุงเว็บไชต์ ขออภัยในความไม่สะดวก !!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'ยินดีต้อนรับ', 'ยินดีต้อนรับสู่ Sunset เว็บบอร์ดที่รวบรวมผู้คนที่มีความสนใจในหลากหลายหัวข้อ ตั้งแต่เทคโนโลยี การเขียนโปรแกรม ไลฟ์สไตล์ ศิลปะ ไปจนถึงการพัฒนาตนเอง ไม่ว่าคุณจะเป็นมือใหม่ที่กำลังเริ่มต้นหรือผู้เชี่ยวชาญที่ต้องการแบ่งปันประสบการณ์ Sunset เป็นพื้นที่ที่เปิดกว้างสำหรับทุกคน', '2024-10-01 14:23:58', '2024-10-01 20:28:30'),
(2, 1, 'หยังวะ', 'อะไรก็ได้', '2024-10-01 14:38:20', '2024-10-01 21:13:39'),
(3, 1, 'test3', 'การเทส3 !', '2024-10-01 15:14:03', '2024-10-01 21:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_seen` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `last_seen`, `name`) VALUES
(1, 'admin', '1b71b6225a51c04a157ed84bf9ca34a7', 'admin@2dkung.xyz', 'admin', '2024-09-28 20:13:15', '2024-09-28 20:13:15', 'Sunset'),
(2, 'pongpan', '1b71b6225a51c04a157ed84bf9ca34a7', 'pongpan.norasan@gmail.com', 'user', '2024-09-28 21:22:48', '2024-09-28 21:22:48', 'Pongpan Norasan'),
(3, 'sunset', '1b71b6225a51c04a157ed84bf9ca34a7', 'pongpan.no@rmuti.ac.th', 'user', '2024-10-02 10:30:19', '2024-10-02 10:30:19', 'Sunset Foryou'),
(4, '3rd', 'b7b655045b89200c7a4dedb1303ca2f1', 'aaaaa@gmail.com', 'admin', '2024-10-02 10:41:52', '2024-10-02 10:41:52', 'WEIntnzxnk'),
(23, '17', '70efdf2ec9b086079795c442636b55fb', '17@gmail.com', 'user', '2024-10-02 23:10:59', '2024-10-02 23:10:59', '17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts.id` (`post_id`),
  ADD KEY `users.id` (`user_id`);

--
-- Indexes for table `lam_admin`
--
ALTER TABLE `lam_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users.id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `lam_admin`
--
ALTER TABLE `lam_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
