-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 12:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `RNO` decimal(10,0) NOT NULL,
  `RNAME` text NOT NULL,
  `RADDRESS` text NOT NULL,
  `RPINCODE` decimal(10,0) NOT NULL,
  `RCONTACT` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`RNO`, `RNAME`, `RADDRESS`, `RPINCODE`, `RCONTACT`) VALUES
('5', 'Navin', 'Pune', '543543', '43534534'),
('1', 'Bhavesh', 'Bhavnagar', '364002', '123456789'),
('23', 'Ajay', 'Rajkot', '123456', '9874561230'),
('20', 'Harsh', 'Delhi', '654123', '684616168'),
('21', 'Vansh', 'Rajasthan', '654123', '684616168'),
('22', 'Krisha', 'Chennai', '654123', '684616168'),
('30', 'Raman', 'Punjab', '16861', '161616618');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `Emp_ID` int(11) NOT NULL,
  `Emp_Photo` text NOT NULL,
  `Emp_Name` varchar(100) NOT NULL,
  `Emp_Gender` varchar(10) NOT NULL,
  `Emp_DOB` date NOT NULL,
  `Emp_Contact` decimal(10,0) NOT NULL,
  `Emp_Address` text NOT NULL,
  `Emp_Desig` varchar(20) NOT NULL,
  `Emp_Salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`Emp_ID`, `Emp_Photo`, `Emp_Name`, `Emp_Gender`, `Emp_DOB`, `Emp_Contact`, `Emp_Address`, `Emp_Desig`, `Emp_Salary`) VALUES
(2, 'Uploads/2.jpeg', 'Bhavesh', 'Male', '1989-12-28', '9429635488', '																Bhavnagar \r\n				 \r\n				 \r\n				 \r\n				', 'Team Leader', '25000'),
(3, 'Uploads/3.jpeg', 'Rajesh', 'Male', '2024-04-11', '9429635488', 'Rajkot', 'Programmer', '56000');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`USERNAME`, `PASSWORD`) VALUES
('Admin', '123'),
('Student', '456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
