-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 2 月 12 日 01:23
-- サーバのバージョン： 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `demo_cms`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `cms_table`
--

CREATE TABLE `cms_table` (
  `id` int(12) NOT NULL,
  `news_title` varchar(64) NOT NULL,
  `news_detail` varchar(255) NOT NULL,
  `view_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `cms_table`
--

INSERT INTO `cms_table` (`id`, `news_title`, `news_detail`, `view_flg`, `indate`) VALUES
(1, 'test', 'testtest', 1, '2016-02-11 23:29:37'),
(2, 'test2', 'hello,world.hello,world2.', 1, '2016-02-11 23:29:42'),
(4, 'test3', 'During the week from tomorrow, it will be summer vacation.', 1, '2016-02-11 23:34:02'),
(5, 'test4', 'Graduation ceremony there soon', 1, '2016-02-11 23:36:38'),
(6, 'test5', 'When the economy is good if the job hunting is the best.', 1, '2016-02-11 23:37:42'),
(7, 'test6', 'First three months work will feels hard.', 1, '2016-02-11 23:38:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_table`
--
ALTER TABLE `cms_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_table`
--
ALTER TABLE `cms_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;