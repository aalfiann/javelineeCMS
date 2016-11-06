-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 06:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `javelinee`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE IF NOT EXISTS `advertise` (
`id_ads` int(11) NOT NULL,
  `name_ads` varchar(255) NOT NULL,
  `type_ads` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `harga_ads` double DEFAULT NULL,
  `status_ads` varchar(255) NOT NULL,
  `view_ads` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `code_ads` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id_ads`, `name_ads`, `type_ads`, `name`, `email`, `phone`, `website`, `harga_ads`, `status_ads`, `view_ads`, `username`, `code_ads`, `created_at`, `expired_at`, `updated_at`) VALUES
(1, 'Place Ads 728x90 Grey', 1, 'Owner', '', NULL, NULL, 0, 'disabled', 0, '', '<a href="/" rel="nofollow" target="_blank">\r\n<img src="/upload/pic/ad728x90.png" class="img-responsive" title="Javelinee" alt="Banner"></a>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-07-11 04:38:10'),
(2, 'Place Ads 728x90 Red', 2, 'Owner', '', NULL, NULL, 0, 'disabled', 0, '', '<a href="/" rel="nofollow" target="_blank">\r\n<img src="/upload/pic/ad728x90r.png" class="img-responsive" title="Javelinee" alt="Banner"></a>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-07-11 04:38:15'),
(3, 'Place Ads 728x90 Blue', 2, 'Owner', '', NULL, NULL, 0, 'disabled', 0, '', '<a href="/" rel="nofollow" target="_blank">\r\n<img src="/upload/pic/ad728x90b.png" class="img-responsive" title="Javelinee" alt="Banner"></a>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-07-11 04:38:19'),
(4, 'Place Ads 300x300 Grey', 4, 'Owner', '', NULL, NULL, 0, 'disabled', 0, '', '<a href="/" rel="nofollow" target="_blank">\r\n<img src="/upload/pic/ad300x300.png" class="img-responsive" title="Javelinee" alt="Banner"></a>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-07-11 04:38:23'),
(5, 'Place Ads 300x300 Red', 4, 'Owner', '', NULL, NULL, 0, 'disabled', 0, '', '<a href="/" rel="nofollow" target="_blank">\r\n<img src="/upload/pic/ad300x300r.png" class="img-responsive" title="Javelinee" alt="Banner"></a>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-07-11 04:38:26'),
(6, 'Place Ads 300x300 Blue', 4, 'Owner', '', NULL, NULL, 0, 'disabled', 0, '', '<a href="/" rel="nofollow" target="_blank">\r\n<img src="/upload/pic/ad300x300b.png" class="img-responsive" title="Javelinee" alt="Banner"></a>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-07-11 04:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `advertise_type`
--

CREATE TABLE IF NOT EXISTS `advertise_type` (
`type_ads` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise_type`
--

INSERT INTO `advertise_type` (`type_ads`, `detail`) VALUES
(1, '468x60'),
(2, '728x90'),
(3, '300x250'),
(4, '300x300'),
(5, 'Custom');

-- --------------------------------------------------------

--
-- Table structure for table `cat_file`
--

CREATE TABLE IF NOT EXISTS `cat_file` (
`id_cat` int(255) NOT NULL,
  `name_file` varchar(1000) NOT NULL,
  `view` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_file`
--

INSERT INTO `cat_file` (`id_cat`, `name_file`, `view`) VALUES
(1, 'Document', 'private');

-- --------------------------------------------------------

--
-- Table structure for table `cat_img`
--

CREATE TABLE IF NOT EXISTS `cat_img` (
`id_cat_img` int(255) NOT NULL,
  `name_img` varchar(1000) NOT NULL,
  `thumbnail_img` text,
  `view` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_img`
--

INSERT INTO `cat_img` (`id_cat_img`, `name_img`, `thumbnail_img`, `view`) VALUES
(1, 'Portfolio', '', 'public'),
(2, 'Banner', '', 'private');

-- --------------------------------------------------------

--
-- Table structure for table `cat_post`
--

CREATE TABLE IF NOT EXISTS `cat_post` (
`id_cat_post` int(255) NOT NULL,
  `name_cat_post` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_post`
--

INSERT INTO `cat_post` (`id_cat_post`, `name_cat_post`) VALUES
(1, 'Uncategorized');

-- --------------------------------------------------------

--
-- Table structure for table `media_file`
--

CREATE TABLE IF NOT EXISTS `media_file` (
`id_file` int(255) NOT NULL,
  `t_file` varchar(1000) NOT NULL,
  `url_file` text NOT NULL,
  `cat_file` int(255) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `size` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_img`
--

CREATE TABLE IF NOT EXISTS `media_img` (
`id_img` int(5) NOT NULL,
  `t_img` varchar(100) NOT NULL,
  `alt_img` varchar(100) DEFAULT NULL,
  `url_img` text NOT NULL,
  `cat_img` int(255) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ex_link` text,
  `date_modify` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_img`
--

INSERT INTO `media_img` (`id_img`, `t_img`, `alt_img`, `url_img`, `cat_img`, `file`, `size`, `type`, `date_upload`, `ex_link`, `date_modify`, `username`, `updated_by`) VALUES
(1, 'Dashboard', 'Dashboard', '/upload/pic/folio01.jpg', 1, 'folio01.jpg', '68981', 'image/jpeg', '2014-09-13 17:00:00', '', '2016-07-02 15:47:42', '', NULL),
(2, 'UI Design', 'UI Design', '/upload/pic/folio02.jpg', 1, 'folio02.jpg', '58455', 'image/jpeg', '2014-09-13 17:00:00', '', '2016-07-02 15:47:47', '', NULL),
(3, 'Android Page', 'Android Page', '/upload/pic/folio03.jpg', 1, 'folio03.jpg', '66043', 'image/jpeg', '2014-09-13 17:00:00', '', '2016-07-02 15:47:51', '', NULL),
(4, 'Profile', 'Profile', '/upload/pic/folio04.jpg', 1, 'folio04.jpg', '100674', 'image/jpeg', '2014-09-13 17:00:00', '', '2016-07-02 15:47:55', '', NULL),
(5, 'Twitter Status', 'Twitter Status', '/upload/pic/folio05.jpg', 1, 'folio05.jpg', '94409', 'image/jpeg', '2014-09-13 17:00:00', '', '2016-07-02 15:47:59', '', NULL),
(6, 'Phone Mockup', 'folio06.jpg', '/upload/pic/folio06.jpg', 1, 'folio06.jpg', '30554', 'image/jpeg', '2014-09-13 17:00:00', '', '2016-07-02 15:48:27', '', NULL),
(7, 'ad300x250', 'ad300x250', '/upload/pic/ad300x250.png', 2, 'ad300x250.png', '19151', 'image/png', '2016-07-11 04:34:31', '', '2016-07-11 04:37:13', '', NULL),
(8, 'ad300x300', 'ad300x300', '/upload/pic/ad300x300.png', 2, 'ad300x300.png', '20521', 'image/png', '2016-07-11 04:34:48', '', '2016-07-11 04:37:20', '', NULL),
(9, 'ad300x300b', 'ad300x300b', '/upload/pic/ad300x300b.png', 2, 'ad300x300b.png', '21665', 'image/png', '2016-07-11 04:35:04', '', '2016-07-11 04:37:23', '', NULL),
(10, 'ad300x300r', 'ad300x300r', '/upload/pic/ad300x300r.png', 2, 'ad300x300r.png', '21626', 'image/png', '2016-07-11 04:35:18', '', '2016-07-11 04:37:25', '', NULL),
(11, 'ad468x60', 'ad468x60', '/upload/pic/ad468x60.png', 2, 'ad468x60.png', '19181', 'image/png', '2016-07-11 04:35:40', '', '2016-07-11 04:37:26', '', NULL),
(12, 'ad728x90', 'ad728x90', '/upload/pic/ad728x90.png', 2, 'ad728x90.png', '19723', 'image/png', '2016-07-11 04:36:09', '', '2016-07-11 04:37:27', '', NULL),
(13, 'ad728x90b', 'ad728x90b', '/upload/pic/ad728x90b.png', 2, 'ad728x90b.png', '22044', 'image/png', '2016-07-11 04:36:28', '', '2016-07-11 04:37:27', '', NULL),
(14, 'ad728x90r', 'ad728x90r', '/upload/pic/ad728x90r.png', 2, 'ad728x90r.png', '21928', 'image/png', '2016-07-11 04:36:41', '', '2016-07-11 04:37:28', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id_page` int(255) NOT NULL,
  `t_page` varchar(1000) DEFAULT NULL,
  `c_page` text,
  `img_page` text,
  `slug` varchar(1000) NOT NULL,
  `mt_page` varchar(1000) DEFAULT NULL,
  `mk_page` text,
  `md_page` text,
  `status_page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(255) NOT NULL,
  `t_post` varchar(1000) DEFAULT NULL,
  `c_post` text,
  `img_post` text,
  `cat_post` int(255) NOT NULL,
  `hash_post` varchar(1000) DEFAULT NULL,
  `slug` varchar(1000) NOT NULL,
  `mt_post` varchar(1000) DEFAULT NULL,
  `mk_post` text,
  `md_post` text,
  `username` varchar(20) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_post` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status_post` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `update_view` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` text,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `username` varchar(20) NOT NULL,
  `role` text NOT NULL,
  `aboutme` text NOT NULL,
  `email` text NOT NULL,
  `facebook` text NOT NULL,
  `google` text NOT NULL,
  `twitter` text NOT NULL,
  `showme` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
`id_widget` int(255) NOT NULL,
  `name_widget` varchar(1000) NOT NULL,
  `code_widget` text,
  `status_widget` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`id_widget`, `name_widget`, `code_widget`, `status_widget`, `position`) VALUES
(1, 'Yahoo Messenger', '<div class="well">\r\n<div align="right"><a target="_blank" href="http://ymgen.com/chat.php?idne=aziest_emotion"><img border="0" src="http://opi.yahoo.com/online?u=aziest_emotion&m=g&t=10"></a></div></div>', 'disabled', 2),
(2, '', ' <!-- Side Widget Well -->\r\n                <div class="well">\r\n                    <p class="text-center">powered by <a href="http://javelinee.com" target="_blank">Javelinee CMS</a>.</p>\r\n                </div>', 'enabled', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
 ADD PRIMARY KEY (`id_ads`), ADD KEY `contact` (`name_ads`,`name`,`email`) USING BTREE, ADD KEY `status` (`status_ads`,`view_ads`) USING BTREE, ADD KEY `range` (`created_at`,`expired_at`) USING BTREE, ADD KEY `ads` (`id_ads`,`username`,`type_ads`) USING BTREE, ADD KEY `advertise_ibfk_1` (`type_ads`);

--
-- Indexes for table `advertise_type`
--
ALTER TABLE `advertise_type`
 ADD PRIMARY KEY (`type_ads`), ADD KEY `type_ads` (`type_ads`);

--
-- Indexes for table `cat_file`
--
ALTER TABLE `cat_file`
 ADD PRIMARY KEY (`id_cat`), ADD KEY `id_cat` (`id_cat`), ADD KEY `view` (`view`);

--
-- Indexes for table `cat_img`
--
ALTER TABLE `cat_img`
 ADD PRIMARY KEY (`id_cat_img`), ADD KEY `id_cat_img` (`id_cat_img`), ADD KEY `view` (`view`);

--
-- Indexes for table `cat_post`
--
ALTER TABLE `cat_post`
 ADD PRIMARY KEY (`id_cat_post`), ADD KEY `id_cat_post` (`id_cat_post`);

--
-- Indexes for table `media_file`
--
ALTER TABLE `media_file`
 ADD PRIMARY KEY (`id_file`), ADD KEY `id_file` (`id_file`), ADD KEY `cat_file` (`cat_file`), ADD KEY `date` (`date_upload`,`date_modify`), ADD KEY `username` (`username`);

--
-- Indexes for table `media_img`
--
ALTER TABLE `media_img`
 ADD PRIMARY KEY (`id_img`), ADD KEY `id_img` (`id_img`), ADD KEY `cat_img` (`cat_img`), ADD KEY `date` (`date_upload`,`date_modify`), ADD KEY `username` (`username`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id_page`), ADD KEY `id_page` (`id_page`), ADD KEY `status_page` (`status_page`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`), ADD KEY `id_post` (`id_post`), ADD KEY `cat_post` (`cat_post`), ADD KEY `username` (`username`), ADD KEY `date` (`date_post`,`modify_post`,`update_view`) USING BTREE, ADD KEY `status_post` (`status_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`), ADD KEY `username` (`username`), ADD KEY `password` (`password`), ADD KEY `status` (`status`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`username`), ADD KEY `username` (`username`);

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
 ADD PRIMARY KEY (`id_widget`), ADD KEY `id_widget` (`id_widget`), ADD KEY `status_widget` (`status_widget`), ADD KEY `position` (`position`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
MODIFY `id_ads` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `advertise_type`
--
ALTER TABLE `advertise_type`
MODIFY `type_ads` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cat_file`
--
ALTER TABLE `cat_file`
MODIFY `id_cat` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cat_img`
--
ALTER TABLE `cat_img`
MODIFY `id_cat_img` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cat_post`
--
ALTER TABLE `cat_post`
MODIFY `id_cat_post` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `media_file`
--
ALTER TABLE `media_file`
MODIFY `id_file` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_img`
--
ALTER TABLE `media_img`
MODIFY `id_img` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id_page` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `widget`
--
ALTER TABLE `widget`
MODIFY `id_widget` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertise`
--
ALTER TABLE `advertise`
ADD CONSTRAINT `advertise_ibfk_1` FOREIGN KEY (`type_ads`) REFERENCES `advertise_type` (`type_ads`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
