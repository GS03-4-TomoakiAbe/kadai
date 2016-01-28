-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 1 月 28 日 23:41
-- サーバのバージョン： 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(1, 'YAMAZAKI', 'yamazaki@test.test', '内容1', '2016-01-09 15:58:43'),
(2, '岸', 'kishi@test.test', '内容2', '2016-01-22 00:04:52'),
(3, 'こすけ', 'kosuke@test.test', '内容3', '2016-01-09 16:01:07'),
(4, 'test', 'test@yahoo.test', 'aaaaa', '2016-01-09 16:31:40'),
(5, 'test2', 'test2@gmail.com', 'これはテストです。tre', '2016-01-23 14:24:41'),
(6, 'test3', 'test3@gmail.com', 'これはテストです。', '2016-01-14 21:27:01'),
(7, 'test4', 'test4@gmail.com', 'これはテストです。', '2016-01-14 22:29:43'),
(8, 'test5', 'test5@gmail.com', 'テストです。', '2016-01-22 00:05:23'),
(12, 'test6', 'test6@gmail.com', 'testtesttest', '2016-01-22 00:09:38'),
(13, 'test7', 'test7@gmail.com', 'testtesttest', '2016-01-22 00:09:55'),
(14, 'test9', 'test9@gmail.com', 'hello', '2016-01-22 00:05:06'),
(15, 'test8', 'test8@gmail.com', 'samplesample', '2016-01-22 00:04:49'),
(16, 'test10', 'test10@gmail.com', 'samplesample', '2016-01-24 16:03:25'),
(17, 'test11', 'test11@gmail.com', 'test', '2016-01-28 22:38:28'),
(21, 'test12', 'test12@gmail.com', 'sample', '2016-01-28 23:13:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;