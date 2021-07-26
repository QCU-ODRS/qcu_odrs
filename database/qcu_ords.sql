-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 05:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcu_ords`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(10) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `requirements` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `document_name`, `requirements`) VALUES
(13, 'Diploma', 'Year Graduated and complete address '),
(14, 'TOR (Under Graduate)', 'Last Academic Year Attended and complete address'),
(15, 'Grade Slip', 'Academic Year and Semester'),
(16, 'Other Certifications', 'Office requesting the document (e.g., DSWD, CHED)'),
(17, 'Authentication / Certified True Copy', 'Send a clear copy of the document and bring the Original Copy upon claiming'),
(18, 'TOR (Graduate)', 'Year Graduated and complete address ');

-- --------------------------------------------------------

--
-- Table structure for table `document_request`
--

CREATE TABLE `document_request` (
  `request_number` int(12) NOT NULL,
  `student_number` varchar(10) NOT NULL,
  `document_id` int(10) NOT NULL,
  `purpose` varchar(64) NOT NULL,
  `details` text DEFAULT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(20) NOT NULL,
  `remarks` longtext DEFAULT NULL,
  `upfile` varchar(2048) DEFAULT NULL,
  `upfile_name` varchar(128) DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `date_released` date DEFAULT NULL,
  `date_finished` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_request`
--

INSERT INTO `document_request` (`request_number`, `student_number`, `document_id`, `purpose`, `details`, `request_date`, `request_status`, `remarks`, `upfile`, `upfile_name`, `date_approved`, `date_released`, `date_finished`) VALUES
(43, '18-0855', 15, 'Personal Copy', '2020-2021 1st sem', '2021-07-23', 'FINISHED', NULL, '../../resource/files/Jy9VDTrv', NULL, '2021-07-23', '2021-07-24', '2021-07-24'),
(44, '18-0855', 18, 'Scholarship', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/wHxsfrZ2', NULL, NULL, NULL, NULL),
(45, '18-0855', 17, 'Scholarship', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/TaLdYmcy', NULL, NULL, NULL, NULL),
(46, '18-0855', 17, 'asas', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/KDWsgIMz', NULL, NULL, NULL, NULL),
(47, '18-0855', 17, 'sdxcv', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/FjQmjp8X', NULL, NULL, NULL, NULL),
(48, '18-0855', 17, 'adsfgbn', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/M4BxNajg', NULL, NULL, NULL, NULL),
(49, '18-0855', 17, 'SADFG', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/uXouAt0c', NULL, NULL, NULL, NULL),
(50, '18-0855', 17, 'DFGHJKL', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/uPAkStK0', NULL, NULL, NULL, NULL),
(51, '18-0855', 17, 'SADFGHJM', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/WLdJqn7Q', NULL, NULL, NULL, NULL),
(52, '18-0855', 17, 'SADF', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/icMiE1oI', NULL, NULL, NULL, NULL),
(53, '18-0855', 16, 'sdfghj', '', '2021-07-24', 'PENDING', NULL, '../../resource/files/GSJjhJhR', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_number` varchar(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `course` varchar(128) NOT NULL,
  `year_of_enrollment` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_number`, `last_name`, `first_name`, `middle_name`, `full_name`, `course`, `year_of_enrollment`, `email`) VALUES
('16-0021', 'Cafe', 'Rhodney', 'Alipio', 'Cafe, Rhodney Alipio', 'BSIT', '2016', 'rhodney.alipio.cafe@gmail.com'),
('16-0243', 'Bacabis', 'Mark Melvin', 'Estrera', 'Bacabis, Mark Melvin', 'BSIT', '2016', 'mark.melvin.bacabis@gmail.com'),
('17-1288', 'Cabarles', 'Kenbryan', 'Agabin', 'Cabarles, Kenbryan Agabin', 'BSIT', '2017', 'Kenbryan.agabin.cabarles@gmail.com'),
('17-1446', 'Flagne', 'Katrina', 'Buenconsejo', 'Flagne, Katrina Buenconsejo', 'BSIT', '2017', 'katrina.buenconsejo.flagne@gmail.com'),
('18-0592', 'Abadiano', 'Jerome', 'Delos Reyes', 'Abadiano, Jerome Delos Reyes', 'BSIT', '2018', 'jerome.delos.reyes.abadiano@gmail.com'),
('18-0771', 'Elizalde', 'Alexis', 'Apilan', 'Elizalde, Alexis Apilan', 'BSIT', '2018', 'alexis.elizalde05222000@gmail.com'),
('18-0855', 'Elen', 'Jelmar', 'Alarcon', 'Elen, Jelmar Alarcon', 'BSIT', '2018', 'jelmar.elen12181999@gmail.com'),
('18-1460', 'Gagatiga', 'Francis', 'Gorrion', 'Gagatiga, Francis Gorrion', 'BSIT', '2018', 'francis.gorrion.gagatiga@gmail.com'),
('18-1532', 'Gabunada', 'Lara Alyzza', 'Porras', 'Gabunada, Lara Alyzza Porras', 'BSIT', '2018', 'lara.alyzza.porras.gabunada@gmail.com'),
('18-1591', 'Abanes', 'John Harold', 'Mendoza', 'Abanes, John Harold Mendoza', 'BSIT', '2019', 'john.harold.abanes@gmail.com'),
('18-1824', 'Tolones', 'Sergej Jr.', 'Ranjo', 'Tolones, Sergej Jr. Ranjo', 'BSIT', '2018', 'sergej.jr.tolones@gmail.com'),
('18-4661', 'Dandoy', 'Rusty', 'Labrador', 'Dandoy, Rusty  Labrador', 'BSIT', '2018', 'rusty.dandoy@gmail.com'),
('19-0609', 'Badiola', 'Genyddie', 'Anciano', 'Bandiola, Genyddie Anciano', 'BSIT', '2019', 'genyddie.a.badiola@gmail.com'),
('19-0812', 'Figueroa', 'John Lery', 'Abrencillo', 'Figuegora, John Lery Abrencillo', 'BSIT', '2019', 'johnlery.figueroa@gmail.com'),
('19-0850', 'Cabansag', 'Erwin Angelo', 'Diego', 'Cabansag, Erwin Angelo Diego', 'BSIT', '2019', 'erwin.angelo.cabansag@gmail.com'),
('19-1264', 'Eballes', 'Marlon', 'Union', 'Eballes, Marlon Union', 'BSIT', '2019', 'marlon.union.eballes@gmail.com'),
('19-1286', 'Fesariton', 'John Kennet', 'Capablanca', 'Fesariton, John Kenneth Capablanca', 'BSIT', '2019', 'john.kenneth.fesariton@gmail.com'),
('19-1383', 'David', 'John Arnold', 'Capulo', 'David, John Arnold Capulo', 'BSIT', '2019', 'john.arnold.david110900@gmail.com'),
('20-1248', 'Ababa', 'John Paul', 'Casano', 'Ababa, John Paul Casano', 'BSIT', '2020', 'johnpaulababa0925@gmail.com'),
('20-1270', 'Bacalso', 'Wayne Kenneth', '', 'Bacalso, Wayne Kenneth', 'BSIT', '2016', 'waynekenneth.bacalso03@gmail.com'),
('20-1303', 'Cabarrubias', 'Jonathan', 'Alegado', 'Cabarrubias, Jonathan Alegado', 'BSIT', '2020', 'cabarrubiasjonathan25@gmail.com'),
('20-1350', 'De Guzman', 'Bernard Roderick', 'Sadicon', 'De Guzman, Bernard Roderick Sadicon', 'BSIT', '2019', 'bernard.roderick.deguzman23@gmail.com'),
('20-1363', 'Encarnacion', 'Sean Kenneth', 'Pontejos', 'Encarnation, Sean Kenneth Pontejos', 'BSIT', '2020', 'seankenneth.encarnacion17@gmail.com'),
('20-1387', 'Fillarca', 'Junfrance', 'Talapian', 'Fillarca, Junfrance Talapian', 'BSIT', '2020', 'junfrance.fillarca014@gmail.com'),
('20-1750', 'Babina', 'Jazmine', 'Obra', 'Babina, Jazmine Obra', 'BSIT', '2020', 'Jazmine.babina06@gmail.com'),
('20-1766', 'Ferrer', 'Joshua', 'Gobis', 'Ferrer, Joshua Gobis', 'BSIT', '2020', 'joshua.ferrer0331@gmail.com'),
('20-1959', 'Abais', 'Ej', 'Ladera', 'Abais, Ej Ladera', 'BSIT', '2020', 'ej.abais023@gmail.com'),
('20-1970', 'Babasa', 'Romeo', 'Mesina', 'Babasa, Romeo Mesina', 'BSIT', '2020', 'romeo.babasa1729@gmail.com'),
('20-2041', 'Caculitan', 'Angel Chris Elizabeth', 'Garcia', 'Caculitan, Angel Chris Elizabeth Garcia', 'BSIT', '2020', 'angel.caculitan02@gmail.com'),
('20-2119', 'Empiales', 'Gemson', 'Alfonso', 'Empiales, Gemson Alfonso', 'BSIT', '2020', 'gemson.empiales17@gmail.com'),
('20-2194', 'Darlucio', 'John Carlien Trix', 'Herrera', 'Darlucio, John Carlien Trix Herrera', 'BSIT', '2020', 'john.darlucio022@gmail.com'),
('admin', 'a', 'a', 'a', 'ADMIN', 'a', '2021', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_request`
--
ALTER TABLE `document_request`
  ADD PRIMARY KEY (`request_number`,`student_number`,`document_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `document_request`
--
ALTER TABLE `document_request`
  MODIFY `request_number` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
