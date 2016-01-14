-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 1 月 14 日 22:54
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(1, '山崎', 'yamazaki@test.test', '内容1', '2016-01-09 15:58:43'),
(2, '岸', 'kishi@test.test', '内容2', '2016-01-09 16:00:38'),
(3, 'こすけ', 'kosuke@test.test', '内容3', '2016-01-09 16:01:07'),
(4, 'test', 'test@yahoo.test', 'aaaaa', '2016-01-09 16:31:40'),
(5, 'test2', 'test2@gmail.com', 'これはテストです。', '2016-01-14 20:54:43'),
(6, 'test3', 'test3@gmail.com', 'これはテストです。', '2016-01-14 21:27:01'),
(7, 'test4', 'test4@gmail.com', 'これはテストです。', '2016-01-14 22:29:43');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;