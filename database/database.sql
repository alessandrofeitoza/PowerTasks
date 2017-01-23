-- phpMyAdmin SQL Dump
-- version 4.5.0-rc1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 01:45 PM
-- Server version: 5.5.53-0+deb8u1
-- PHP Version: 7.0.14-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_powertasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_in` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `id_task` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_in` varchar(30) DEFAULT NULL,
  `completed_in` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_team`
--

CREATE TABLE `tb_team` (
  `id_team` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_in` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_teammember`
--

CREATE TABLE `tb_teammember` (
  `id_team_members` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_in` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_teamtag`
--

CREATE TABLE `tb_teamtag` (
  `id_teamtag` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_in` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_teamtask`
--

CREATE TABLE `tb_teamtask` (
  `id_teamtask` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `teamtag_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_in` varchar(30) DEFAULT NULL,
  `completed_in` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `recovery` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `first_access` varchar(30) NOT NULL,
  `last_access` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `tb_teammember`
--
ALTER TABLE `tb_teammember`
  ADD PRIMARY KEY (`id_team_members`);

--
-- Indexes for table `tb_teamtag`
--
ALTER TABLE `tb_teamtag`
  ADD PRIMARY KEY (`id_teamtag`);

--
-- Indexes for table `tb_teamtask`
--
ALTER TABLE `tb_teamtask`
  ADD PRIMARY KEY (`id_teamtask`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tb_teammember`
--
ALTER TABLE `tb_teammember`
  MODIFY `id_team_members` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tb_teamtag`
--
ALTER TABLE `tb_teamtag`
  MODIFY `id_teamtag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tb_teamtask`
--
ALTER TABLE `tb_teamtask`
  MODIFY `id_teamtask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
