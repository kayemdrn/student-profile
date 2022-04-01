-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 03:38 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `region_id`) VALUES
(1, 'Lamitan City', 1),
(2, 'Marawi City', 1),
(3, 'Baguio City', 2),
(4, 'Tabuk City', 2),
(5, 'Caloocan City', 3),
(6, 'Las Piñas City', 3),
(7, 'Makati City', 3),
(8, 'Malabon City', 3),
(9, 'Mandaluyong City', 3),
(10, 'Manila City', 3),
(11, 'Marikina City', 3),
(12, 'Muntinlupa City', 3),
(13, 'Navotas City', 3),
(14, 'Parañaque City', 3),
(15, 'Pasay City', 3),
(16, 'Pasig City', 3),
(17, 'Quezon City', 3),
(18, 'San Juan City', 3),
(19, 'Taguig City', 3),
(20, 'Valenzuela City', 3),
(21, 'Batac City', 4),
(22, 'Laoag City', 4),
(23, 'Candon City', 4),
(24, 'Vigan City', 4),
(25, 'San Fernando City', 4),
(26, 'Alaminos City', 4),
(27, 'Dagupan City', 4),
(28, 'San Carlos City', 4),
(29, 'Urdaneta City', 4),
(30, 'Tuguegarao City', 5),
(31, 'Cauayan City', 5),
(32, 'Ilagan City', 5),
(33, 'Santiago City', 5),
(34, 'Balanga City', 6),
(35, 'Malolos City', 6),
(36, 'Meycauayan City', 6),
(37, 'San Jose del Monte City', 6),
(38, 'Cabanatuan City', 6),
(39, 'Gapan City', 6),
(40, 'Muñoz City', 6),
(41, 'Palayan City', 6),
(42, 'Angeles City', 6),
(43, 'Mabalacat City', 6),
(44, 'San Fernando City', 6),
(45, 'Tarlac City', 6),
(46, 'Olongapo City', 6),
(47, 'San Jose City', 6),
(48, 'Batangas City', 7),
(49, 'Lipa City', 7),
(50, 'Tanauan City', 7),
(51, 'Bacoor City', 7),
(52, 'Cavite City', 7),
(53, 'Dasmariñas City', 7),
(54, 'Imus City', 7),
(55, 'Tagaytay City', 7),
(56, 'Trece Martires City', 7),
(57, 'Biñan City', 7),
(58, 'Cabuyao City', 7),
(59, 'San Pablo City', 7),
(60, 'Santa Rosa City', 7),
(61, 'Lucena City', 7),
(62, 'Tayabas City', 7),
(63, 'Antipolo City', 7),
(64, 'Calamba City', 7),
(65, 'Calapan City', 8),
(66, 'Puerto Princesa City', 8),
(67, 'Legazpi City', 9),
(68, 'Ligao City', 9),
(69, 'Tabaco City', 9),
(70, 'Iriga City', 9),
(71, 'Naga City', 9),
(72, 'Masbate City', 9),
(73, 'Sorsogon City', 9),
(74, 'Roxas City', 10),
(75, 'Iloilo City', 10),
(76, 'Passi City', 10),
(77, 'Bacolod City', 10),
(78, 'Bago City', 10),
(79, 'Cadiz City', 10),
(80, 'Escalante City', 10),
(81, 'Himamaylan City', 10),
(82, 'Kabankalan City', 10),
(83, 'La Carlota City', 10),
(84, 'Sagay City', 10),
(85, 'San Carlos City', 10),
(86, 'Silay City', 10),
(87, 'Sipalay City', 10),
(88, 'Talisay City', 10),
(89, 'Victorias City', 10),
(90, 'Tagbilaran City', 11),
(91, 'Bogo City', 11),
(92, 'Carcar City', 11),
(93, 'Cebu City', 11),
(94, 'Danao City', 11),
(95, 'Lapu-Lapu City', 11),
(96, 'Mandaue City', 11),
(97, 'Naga City', 11),
(98, 'Talisay City', 11),
(99, 'Bais City', 11),
(100, 'Bayawan City', 11),
(101, 'Canlaon City', 11),
(102, 'Dumaguete City', 11),
(103, 'Guihulngan City', 11),
(104, 'Tanjay City', 11),
(105, 'Toledo City', 11),
(106, 'Borongan City', 12),
(107, 'Baybay City', 12),
(108, 'Ormoc City', 12),
(109, 'Tacloban City', 12),
(110, 'Calbayog City', 12),
(111, 'Catbalogan City', 12),
(112, 'Maasin City', 12),
(113, 'Isabela City', 13),
(114, 'Dapitan City', 13),
(115, 'Dipolog City', 13),
(116, 'Pagadian City', 13),
(117, 'Zamboanga City', 13),
(118, 'Malaybalay City', 14),
(119, 'Valencia City', 14),
(120, 'Iligan City', 14),
(121, 'Oroquieta City', 14),
(122, 'Ozamiz City', 14),
(123, 'Tangub City', 14),
(124, 'Cagayan de Oro City', 14),
(125, 'El Salvador City', 14),
(126, 'Gingoog City', 14),
(127, 'Panabo City', 15),
(128, 'Samal City', 15),
(129, 'Tagum City', 15),
(130, 'Davao City', 15),
(131, 'Digos City', 15),
(132, 'Mati City', 15),
(133, 'Kidapawan City', 16),
(134, 'Cotabato City', 16),
(135, 'General Santos City', 16),
(136, 'Koronadal City', 16),
(137, 'Tacurong City', 16),
(138, 'Butuan City', 17),
(139, 'Cabadbaran City', 17),
(140, 'Bayugan City', 17),
(141, 'Surigao City', 17),
(142, 'Bislig City', 17),
(143, 'Tandag City', 17);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(1, 'ARMM (Autonomous Region in Muslim Mindanao)'),
(2, 'CAR (Cordillera Administrative Region)'),
(3, 'NCR (National Capital Region)'),
(4, 'Region I (Ilocos Region)'),
(5, 'Region II (Cagayan Valley)'),
(6, 'Region III (Central Luzon)'),
(7, 'Region IV-A (CALABARZON)'),
(8, 'Region IV-B (MIMAROPA)'),
(9, 'Region V (Bicol Region)'),
(10, 'Region VI (Western Visayas)'),
(11, 'Region VII (Central Visayas)'),
(12, 'Region VIII (Eastern Visayas)'),
(13, 'Region IX (Zamboanga Peninsula)'),
(14, 'Region X (Northern Mindanao)'),
(15, 'Region XI (Davao Region)'),
(16, 'Region XII (SOCCSKSARGEN)'),
(17, 'Region XIII (Caraga Region)');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `address_1`, `address_2`, `region_id`, `city_id`) VALUES
(1, 'Pauline', 'Constantino', 'Zaragoza', '1999-10-10', '1 Street', '', 3, 7),
(3, 'Mark', 'Flores', 'Dela Cruz', '1997-05-30', '2 Street', 'University Dorm', 14, 125),
(4, 'Alex', 'Roque', 'Uy', '2002-10-25', '3 Street', '', 6, 45),
(5, 'Gabriel', 'Ilagan', 'Tuazon', '2003-08-03', '4 Street', '', 17, 141),
(7, 'De', 'Jun', 'Xiao', '1999-05-08', '5 Street', '', 3, 15),
(8, 'Kun', '', 'Qian', '1996-01-01', '6 Street', '', 3, 10),
(9, 'Si', 'Cheng', 'Dong', '1997-10-28', '7 Street', '', 7, 54),
(10, 'Aeri', '', 'Uchinaga', '2000-10-30', '8 Street', '', 2, 3),
(11, 'Chenle', '', 'Zhong', '2001-11-22', '9 Street', '', 6, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_region_id` (`region_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_student_region_id` (`region_id`),
  ADD KEY `fk_student_city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`),
  ADD CONSTRAINT `fk_student_region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
