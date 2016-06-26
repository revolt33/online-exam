-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2015 at 12:43 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--
CREATE DATABASE `exam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `exam`;

-- --------------------------------------------------------

--
-- Table structure for table `com012`
--

CREATE TABLE `com012` (
  `serial` int(1) default NULL,
  `ques` varchar(200) default NULL,
  `a` varchar(20) default NULL,
  `b` varchar(20) default NULL,
  `c` varchar(20) default NULL,
  `d` varchar(20) default NULL,
  `e` varchar(20) default NULL,
  `correct` char(1) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com012`
--

INSERT INTO `com012` (`serial`, `ques`, `a`, `b`, `c`, `d`, `e`, `correct`) VALUES
(1, 'What is the correct Syntax to put a comment?', '<!->', '/**/', '@comment', '/com-', 'No Input', 'b'),
(2, 'What does following statement do: i++?', 'increment by 2', 'increment by 0.5', 'increment by 1', 'decrement by 1', 'No Input', 'c'),
(3, 'Which of the following is incorrect for loop?', 'for(i=0;;i++){ }', 'for(;i<5;){ }', 'for(i=6;i>3;i--){ }', 'for(i=3:i<9:i++){ }', 'No Input', 'd'),
(4, 'The if else ladder can have:', 'one else', 'at least 3 else', '0 if and 1 else', 'only else if', 'No Input', 'a'),
(5, 'What is the range of an unsigned int?', '-2^16 to 2^16-1', '0 to 2^16', '0 to 2^32 - 1', '0 to 2^32', 'No Input', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `e101`
--

CREATE TABLE `e101` (
  `id` varchar(6) NOT NULL,
  `name` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e101`
--

INSERT INTO `e101` (`id`, `name`) VALUES
('com012', 'Programming In C');

-- --------------------------------------------------------

--
-- Table structure for table `eng100`
--

CREATE TABLE `eng100` (
  `id` varchar(6) NOT NULL,
  `name` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eng100`
--

INSERT INTO `eng100` (`id`, `name`) VALUES
('eng113', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `eng113`
--

CREATE TABLE `eng113` (
  `serial` int(1) default NULL,
  `ques` varchar(200) default NULL,
  `a` varchar(20) default NULL,
  `b` varchar(20) default NULL,
  `c` varchar(20) default NULL,
  `d` varchar(20) default NULL,
  `e` varchar(20) default NULL,
  `correct` char(1) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eng113`
--

INSERT INTO `eng113` (`serial`, `ques`, `a`, `b`, `c`, `d`, `e`, `correct`) VALUES
(1, 'What is the capital of India?', 'New York', 'Kolkata', 'New Delhi', 'Agra', 'No Input', 'c'),
(2, 'When did India got Independent?', '26th January', '1st April', '15th August', '16th February', 'No Input', 'c'),
(3, 'How many bytes are there in 1 KB?', '1024', '512', '365', '108', 'No Input', 'a'),
(4, 'What is the source of energy of sun?', 'Photosynthesis', 'Nuclear Fussion', 'Nuclear Fission', 'Coal', 'No Input', 'b'),
(5, 'How many days are there in a leap year?', '7', '365', '108', '366', 'No Input', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `phy000`
--

CREATE TABLE `phy000` (
  `serial` int(1) default NULL,
  `ques` varchar(200) default NULL,
  `a` varchar(20) default NULL,
  `b` varchar(20) default NULL,
  `c` varchar(20) default NULL,
  `d` varchar(20) default NULL,
  `e` varchar(8) NOT NULL default 'No Input',
  `correct` char(1) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phy000`
--

INSERT INTO `phy000` (`serial`, `ques`, `a`, `b`, `c`, `d`, `e`, `correct`) VALUES
(1, 'What is the speed of light?', '300000 km/h', '200000 km/h', '15000km/h', '300000 km/s', 'No Input', 'd'),
(2, 'What is SI the unit of distance?', 'cm', 'km', 'm', 'mm', 'No Input', 'c'),
(3, 'What is the Content of sun?', 'C, H', 'O, N', 'P, N', 'He', 'No Input', 'a'),
(4, 'What is the charge of an electron?', '1 ev', '2 ev', '1 volt', '10 kilovolt', 'No Input', 'a'),
(5, 'Neutron has charge=?', '15 volt', '0 volt', '0 coulomb', '5 coulomb', 'No Input', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `phy001`
--

CREATE TABLE `phy001` (
  `id` varchar(6) NOT NULL,
  `name` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phy001`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(15) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `status` char(1) NOT NULL default 'u',
  `otps` char(1) NOT NULL default 'u',
  `email` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `otp`, `status`, `otps`, `email`) VALUES
('tricky', '0', 'u', 'n', 'tr@tc.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` varchar(6) NOT NULL,
  `sub` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub`) VALUES
('e101', 'computer'),
('eng100', 'English'),
('phy001', 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `priv` char(1) NOT NULL default 's',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pwd`, `name`, `priv`) VALUES
('admin', '220757', 'Ayush Jaiswal', 'a'),
('tricky', 'pass', 'Ayush', 's');
