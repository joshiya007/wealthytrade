
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2018 at 06:29 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u551841039_segab`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `emailid` varchar(255) NOT NULL DEFAULT '',
  `appname` varchar(255) NOT NULL DEFAULT '',
  `slaveurl` varchar(255) DEFAULT NULL,
  `appurl` varchar(255) DEFAULT NULL,
  `variant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emailid`,`appname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`emailid`, `appname`, `slaveurl`, `appurl`, `variant`) VALUES
('yajoshi4@gmail.com', 'AeroGear', 'http://127.0.0.1', 'http://facebook.com', 'web'),
('shirish.testarchitect@gmail.com', 'Capital One', 'https://127.0.0.0:4444', 'https://www.capitalone.com', 'web'),
('niki379@gmail.com', 'sstid', 'http://localhost:1337', 'http://localhost:1337', 'web'),
('jatin4u007@gmail.com', 'F', 'http://gta.com', 'http://gta2.com', 'web'),
('terry@creategravity.com', 'test', 'http://test:4444', 'http://test:8080', 'web'),
('niveasharma@hotmail.com', 'dcf', 'https://omeu.egonzehnder.com/dcf_poc', 'https://omeu.egonzehnder.com/dcf_poc', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE IF NOT EXISTS `testcase` (
  `emailid` varchar(255) NOT NULL DEFAULT '',
  `appname` varchar(255) NOT NULL DEFAULT '',
  `ts_id` varchar(255) NOT NULL DEFAULT '',
  `ts_name` varchar(556) DEFAULT NULL,
  `ts_obj` mediumtext,
  `ts_precondition` varchar(255) DEFAULT NULL,
  `ts_suite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ts_id`,`emailid`,`appname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testresource`
--

CREATE TABLE IF NOT EXISTS `testresource` (
  `emailid` varchar(255) NOT NULL DEFAULT '',
  `appname` varchar(255) NOT NULL DEFAULT '',
  `testresource` varchar(255) NOT NULL DEFAULT '',
  `identifier` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `pagename` varchar(255) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`emailid`,`appname`,`testresource`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teststep`
--

CREATE TABLE IF NOT EXISTS `teststep` (
  `ts_id` varchar(255) DEFAULT NULL,
  `ts_steps` varchar(255) DEFAULT NULL,
  `ts_step_desc` longtext,
  `ts_action` varchar(255) DEFAULT NULL,
  `ts_assert_resource_name` varchar(255) DEFAULT NULL,
  `ts_exp_value` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testsuite`
--

CREATE TABLE IF NOT EXISTS `testsuite` (
  `emailid` varchar(255) NOT NULL DEFAULT '',
  `appname` varchar(255) NOT NULL DEFAULT '',
  `testsuitename` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`emailid`,`appname`,`testsuitename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testsuite`
--

INSERT INTO `testsuite` (`emailid`, `appname`, `testsuitename`, `description`) VALUES
('yajoshi4@gmail.com', 'AeroGear', 'Functional Suite', 'desc'),
('yajoshi4@gmail.com', 'AeroGear', 'Regression', ''),
('yajoshi4@gmail.com', 'AeroGear', 'Inter-System Test Suite', ''),
('terry@creategravity.com', 'test', 'test', 'test'),
('yajoshi4@gmail.com', 'AeroGear', 'nnn', '');

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE IF NOT EXISTS `trial` (
  `userid` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trial`
--

INSERT INTO `trial` (`userid`) VALUES
('Test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `emailid`, `password`) VALUES
('Yogesh Joshi', 'yajoshi4@gmail.com', 'asdf'),
('Ranjan Gupta', '89511ranjan@gmail.com', 'Sidhiridhi7'),
('Shirish', 'shirish.testarchitect@gmail.com', 'test123#'),
('Aravind Subbarao', 'arajasu@gmail.com', 'psychology11'),
('Gagan', 'gagan622@gmail.com', 'Test123456'),
('Patricio', 'patricio.montecinos@gmail.com', 'rohirrim'),
('Ashwani Kumar', 'ashwani.kumar@mavenwave.com', 'keane1234'),
('Rajesh', 'rajgopal.rajesh@gmail.com', 'mamatha624'),
('mahesh', 'maheshmt2007@gmail.com', '123456789'),
('Amit', 'amitkagra@gmail.com', 'pass1234'),
('Kalyan', 'kalyankandukuri@gmail.com', 'saibaba80'),
('Ronald van der Louw', 'ronald@testoo.nl', 'kouwerstraat19'),
('Vinay', 'vgarge@gmail.com', 'Aircel@100'),
('swetha', 'swetha.ravali@gmail.com', 'R@v@li'),
('Karunakar Adepu', 'karunakar.adepu76@gmail.com', 'Welcome18'),
('Fabio Tester', 'fabio.gouveia@payu.com.br', '123456'),
('Ronak Prajapati', 'ronak3121@gmail.com', 'ronak2628'),
('tony', 'antoni.georgijev@gmail.com', 'ATGnis74'),
('JoeKate', 'joe.kate42@gmail.com', 'paswd'),
('NPQA', 'niki379@gmail.com', '7952niki'),
('Sukhvinder', 'sukhvinder.hanspal@gmail.com', 'coolio88'),
('Jatin', 'jatin4u007@gmail.com', 'letstestit'),
('Ashok kumar M V', 'ashokkumar.mv84@gmail.com', 'Testing2014'),
('terry kernan', 'terry@creategravity.com', 'testaid'),
('Nivea', 'niveasharm@hotmail.com', 'Nivs@1234'),
('Nivea', 'niveasharma@hotmail.com', 'Nivs@1234'),
('Anil ', 'anilborsecse@gmail.com', 'Hello@123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
