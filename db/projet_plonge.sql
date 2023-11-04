-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2023 at 05:46 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_plonge`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_user`
--

CREATE TABLE `application_user` (
  `Id_Application_User` int(11) NOT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `User_Password` varchar(50) DEFAULT NULL,
  `Theme` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dive`
--

CREATE TABLE `dive` (
  `Id_Dive` int(11) NOT NULL,
  `Begin_Time` time NOT NULL,
  `Begin_Date` date NOT NULL,
  `End_Date` date DEFAULT NULL,
  `End_Time` time DEFAULT NULL,
  `Comment` varchar(50) DEFAULT NULL,
  `Surface_Security` varchar(50) DEFAULT NULL,
  `Dive_Price` decimal(15,2) DEFAULT NULL,
  `Instructor_Price` decimal(15,2) DEFAULT NULL,
  `Max_Ppo2` decimal(4,2) DEFAULT NULL,
  `Diver_Id_Diver` int(11) DEFAULT NULL,
  `Planned_Dive_Id_Planned_Dive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diver`
--

CREATE TABLE `diver` (
  `Id_Diver` int(11) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Diver_Qualification` varchar(50) DEFAULT NULL,
  `Instructor_Qualification` varchar(50) DEFAULT NULL,
  `Nox_Level` char(2) DEFAULT NULL,
  `Additional_Qualifications` varchar(50) DEFAULT NULL,
  `License_Number` varchar(20) DEFAULT NULL,
  `License_Expiration_Date` date DEFAULT NULL,
  `Medical_Certificate_Expiration_Date` date DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(10) NOT NULL,
  `confirmkey` varchar(255) DEFAULT NULL,
  `confirmer_email` int(1) NOT NULL,
  `certifie` int(1) NOT NULL,
  `chemin_license` varchar(255) NOT NULL,
  `chemin_certificat_medical` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diver`
--

INSERT INTO `diver` (`Id_Diver`, `Lastname`, `Firstname`, `Diver_Qualification`, `Instructor_Qualification`, `Nox_Level`, `Additional_Qualifications`, `License_Number`, `License_Expiration_Date`, `Medical_Certificate_Expiration_Date`, `Birthdate`, `email`, `password`, `privilege`, `confirmkey`, `confirmer_email`, `certifie`, `chemin_license`, `chemin_certificat_medical`) VALUES
(48, 'admin', 'admin', 'N3', 'E3', '15', NULL, '1885121', '2023-07-09', '2023-07-09', '2023-07-07', 'admin@user.fr', '$2y$10$eL/ZWdySQFgp1SyU4Rq3X.Jj6DNbytj9cq5zSlK0oxnG3hOI6Box.', 'admin', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/admin(1)/lisence.pdf', 'C:/MAMP/htdocs/tests/uploads/verif/admin(1)/certificat.png'),
(50, 'Puget', 'Alexis ', 'N5', 'E3', '0', NULL, 'A-03-1017043', '2023-10-28', '2023-09-10', '2003-11-28', 'puguet@user.fr', '$2y$10$sEmvZ4jUIwV2hYHfKMDmOuexWx2BjDaCWoCIIUplzy7uBcCAbWB36', 'E3', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Puget/lisence.jpeg', 'C:/MAMP/htdocs/tests/uploads/verif/Puget/certificat.jpg'),
(51, 'Scaphandrier', 'Antoine', 'N2', 'E0', '0', NULL, 'A-03-1017058', '2023-07-02', '2023-07-09', '2002-07-28', 'scaphandrier@user.fr', '$2y$10$1Mwc6gAs8PfdAwkRSiezHujh8FhnKS0EOsYszOzFu6N49DmlKxIL.', 'N2', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Scaphandrier/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Scaphandrier/certificat.jpg'),
(52, 'Sous-Marin', 'Mathilde', 'N4', 'E1', '0', NULL, 'A-03-1017039', '2023-07-02', '2023-07-09', '1998-11-28', 'sm@user.fr', '$2y$10$hbbgq73J3TBLPHEdnZD/ju9p9ICdFwMz4Sz6mOCPi20eI5oH.USF.', 'N4', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Sous-Marin/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Sous-Marin/certificat.jpg'),
(53, 'Palme', 'Leo', 'N3', 'E1', '0', NULL, 'A-03-1017088', '2023-07-30', '2023-07-09', '2001-07-28', 'palme@user.fr', '$2y$10$5VGAMzKNPBYBfXZNfOEU2evLaK3U4Cl9DNWARt0SO/QStXaCUs/6K', 'E1', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Palme/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Palme/certificat.jpg'),
(54, 'Curro', 'Marie', 'N5', 'E3', '0', NULL, 'A-03-1017090', '2023-07-02', '2023-07-09', '2002-10-16', 'curro@user.fr', '$2y$10$.BidstqKuFExduIOuil2q.64V7QSfRjKdfYX/oJG9UCZFrYvuFDDe', 'E3', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Curro/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Curro/certificat.jpg'),
(55, 'Cousteau', 'Jacques-Yves', 'N5', 'E3', '0', NULL, 'A-03-1017000', '2023-07-09', '2023-07-09', '1997-06-25', 'cousteau@user.fr', '$2y$10$3/foREuGj.Amjx92du1dJOXN2A6sX9EMvZjo3r.NBHxyzW01YbIFq', 'E3', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Cousteau/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Cousteau/certificat.jpg'),
(57, 'Lamqari', 'Aymane', 'N4', 'E3', '0', NULL, 'A-03-1017059', '2023-07-09', '2023-07-09', '2005-11-29', 'aymane@user.fr', '$2y$10$S954SPaeOaaT/mGFYoab6epn8yrmAsEXNzLZnZ0FhJGK13WsGaNBq', 'E3', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Lamqari/lisence.jpeg', 'C:/MAMP/htdocs/tests/uploads/verif/Lamqari/certificat.jpg'),
(58, 'Bodart', 'Hélène', 'N1', 'E0', '0', NULL, 'A-03-1017001', '2023-07-09', '2023-07-09', '1972-09-05', 'hbodart@wanadoo.fr', '$2y$10$LaVWRdeFUX22VXi1Q7TjFun75AwwN2JVHkNM/lr5jy9Ynca4r3/Eq', 'N1', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Bodart/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Bodart/certificat.jpg'),
(59, 'Dehandschoewercker', 'Jeanne', 'N3', 'E2', '0', NULL, 'A-03-1017060', '2023-08-06', '2023-08-06', '2000-12-31', 'jeannedeh@hotmail.fr', '$2y$10$l5WFaZEu.XdDz/vEShfHfe0Ja2n/XlojErI6gMco993ALcYISFXhW', 'E2', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Dehandschoewercker/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Dehandschoewercker/certificat.jpg'),
(60, 'test', 'test', 'N1', 'E0', '0', NULL, 'A-03-1017050', '2023-07-30', '2023-07-30', '2006-06-10', 'test@test.fr', '$2y$10$pT2ENSLZN/9spVNG5dY9y.ONA4lu3I.i7fjxctZBEGN0XMc3ISIQS', 'N1', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/test/lisence.jpeg', 'C:/MAMP/htdocs/tests/uploads/verif/test/certificat.jpeg'),
(62, 'Thuram', 'Marcus', 'N5', 'E3', '0', NULL, 'A-03-1017063', '2023-09-10', '2023-09-10', '1956-12-31', 'marcusthuram@user.fr', '$2y$10$uhbiv56IPWuhQb5RWbNJmen6ugiyWk5DO4OFwN6KSANl2GqKFPfmW', 'E3', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Thuram/lisence.jpg', 'C:/MAMP/htdocs/tests/uploads/verif/Thuram/certificat.jpg'),
(63, 'Xiaomeng', 'ffff', 'N1', 'E0', '5', NULL, 'A-03-1017068', '2023-10-01', '2023-10-08', '2003-04-03', 'ion@gmail.com', '$2y$10$dVPyvbuCeQYWhk76wS6P3.x8sxNWm4HZIJuPmrI4nFC9ljMZ682Bi', 'N1', NULL, 0, 1, 'C:/MAMP/htdocs/tests/uploads/verif/Xiaomeng/lisence.pdf', 'C:/MAMP/htdocs/tests/uploads/verif/Xiaomeng/certificat.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dive_registration`
--

CREATE TABLE `dive_registration` (
  `Diver_Id_Diver` int(11) NOT NULL,
  `Planned_Dive_Id_Planned_Dive` int(11) NOT NULL,
  `Diver_Role` varchar(50) DEFAULT NULL,
  `Resgistration_Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Personal_Comment` varchar(50) DEFAULT NULL,
  `Car_Pooling_Seat_Offered` smallint(6) DEFAULT NULL,
  `Car_Pooling_Seat_Request` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dive_site`
--

CREATE TABLE `dive_site` (
  `Id_Dive_Site` int(11) NOT NULL,
  `Site_Name` varchar(50) NOT NULL,
  `Gps_Latitude` decimal(11,8) DEFAULT NULL,
  `Gps_Longitude` decimal(11,8) DEFAULT NULL,
  `Track_Type` varchar(50) DEFAULT NULL,
  `Track_Number` varchar(50) DEFAULT NULL,
  `Track_Name` varchar(50) DEFAULT NULL,
  `Zip_Code` varchar(50) DEFAULT NULL,
  `City_Name` varchar(50) DEFAULT NULL,
  `Country_Name` varchar(50) NOT NULL,
  `Additional_Address` varchar(50) DEFAULT NULL,
  `Tel_Number` varchar(50) DEFAULT NULL,
  `Information_URL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dive_team`
--

CREATE TABLE `dive_team` (
  `Id_Dive_Team` int(11) NOT NULL,
  `Max_Depth` int(11) DEFAULT NULL,
  `Max_Duration` int(11) DEFAULT NULL,
  `Actual_Depth` decimal(5,2) DEFAULT NULL,
  `Actual_Duration` varchar(50) DEFAULT NULL,
  `Dive_Type` varchar(50) DEFAULT NULL,
  `Sequence_number` smallint(6) DEFAULT NULL,
  `Start_Time` time DEFAULT NULL,
  `Stop_Time` varchar(50) DEFAULT NULL,
  `Comment` varchar(50) DEFAULT NULL,
  `Diver_Id_Diver` int(11) DEFAULT NULL,
  `Planned_Dive_Id_Planned_Dive` int(11) DEFAULT NULL,
  `Max_Nb_Divers` int(10) DEFAULT NULL,
  `Nb_actuel_divers` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dive_team`
--

INSERT INTO `dive_team` (`Id_Dive_Team`, `Max_Depth`, `Max_Duration`, `Actual_Depth`, `Actual_Duration`, `Dive_Type`, `Sequence_number`, `Start_Time`, `Stop_Time`, `Comment`, `Diver_Id_Diver`, `Planned_Dive_Id_Planned_Dive`, `Max_Nb_Divers`, `Nb_actuel_divers`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, NULL, '11:08:00', NULL, NULL, 55, 5, 5, 3),
(7, NULL, NULL, NULL, NULL, NULL, NULL, '13:22:00', NULL, NULL, 48, 7, 5, 4),
(8, NULL, NULL, NULL, NULL, NULL, NULL, '02:23:00', NULL, NULL, 48, 8, 3, 3),
(9, NULL, NULL, NULL, NULL, NULL, NULL, '13:21:00', NULL, NULL, 57, 9, 5, 1),
(10, NULL, NULL, NULL, NULL, NULL, NULL, '20:40:00', NULL, NULL, 55, 10, 4, 1),
(11, NULL, NULL, NULL, NULL, NULL, NULL, '13:51:00', NULL, NULL, 48, 11, 4, 2),
(12, NULL, NULL, NULL, NULL, NULL, NULL, '02:00:00', NULL, NULL, 62, 12, 5, 2),
(13, NULL, NULL, NULL, NULL, NULL, NULL, '02:00:00', NULL, NULL, 48, 13, 2, 2),
(14, NULL, NULL, NULL, NULL, NULL, NULL, '01:51:00', NULL, NULL, 48, 14, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dive_team_composition`
--

CREATE TABLE `dive_team_composition` (
  `Id_Dive_Team_Composition` int(11) NOT NULL,
  `Dive_Type` varchar(50) NOT NULL,
  `Diver_Age` smallint(6) NOT NULL,
  `Dive_Guide_Qualification` varchar(50) DEFAULT NULL,
  `Max_Diver` varchar(50) NOT NULL,
  `Additional_Diver` smallint(6) DEFAULT NULL,
  `planned_dive_Id_planned_dive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dive_team_member`
--

CREATE TABLE `dive_team_member` (
  `Diver_Id_Diver` int(11) NOT NULL,
  `Dive_team_Id_Dive_Team` int(11) NOT NULL,
  `Temporary_Diver_Qualification` varchar(50) DEFAULT NULL,
  `Current_Diver_Qualification` varchar(50) DEFAULT NULL,
  `Diver_Role` varchar(50) DEFAULT NULL,
  `Current_Instructorr_Qualification` varchar(50) DEFAULT NULL,
  `Nox_Percentage` int(75) DEFAULT NULL,
  `Comment` varchar(50) DEFAULT NULL,
  `Paid_Amount` smallint(6) DEFAULT NULL,
  `Number_Diver_Team` int(11) DEFAULT NULL,
  `Id_Dive_Team_Member` int(11) NOT NULL,
  `tech_explo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dive_team_member`
--

INSERT INTO `dive_team_member` (`Diver_Id_Diver`, `Dive_team_Id_Dive_Team`, `Temporary_Diver_Qualification`, `Current_Diver_Qualification`, `Diver_Role`, `Current_Instructorr_Qualification`, `Nox_Percentage`, `Comment`, `Paid_Amount`, `Number_Diver_Team`, `Id_Dive_Team_Member`, `tech_explo`) VALUES
(55, 5, NULL, NULL, 'GP', NULL, 15, NULL, NULL, 1, 8, 'Nitrox'),
(51, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 16, NULL),
(48, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 17, NULL),
(48, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18, NULL),
(50, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 19, NULL),
(57, 9, NULL, NULL, 'GP', NULL, 10, NULL, NULL, 1, 21, 'Nitrox'),
(58, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 22, NULL),
(55, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 23, NULL),
(55, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 24, NULL),
(59, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 25, NULL),
(48, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 26, NULL),
(60, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 27, NULL),
(62, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 28, NULL),
(48, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 29, NULL),
(48, 13, NULL, NULL, 'master xiao', NULL, 1, NULL, NULL, 1, 30, NULL),
(63, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 31, NULL),
(48, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 32, NULL),
(52, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_plan`
--

CREATE TABLE `emergency_plan` (
  `Id_Emergency_Plan` int(11) NOT NULL,
  `SOS_Tel_Number` varchar(50) DEFAULT NULL,
  `Emergency_Plan` varchar(50) NOT NULL,
  `Post_Accident_Procedure` varchar(50) DEFAULT NULL,
  `Version` varchar(50) DEFAULT NULL,
  `Dive_Site_Id_Dive_Site` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `max_depth_for_qualification`
--

CREATE TABLE `max_depth_for_qualification` (
  `Id_Max_Depth_for_Qualification` int(11) NOT NULL,
  `Diver_Qualification` char(50) NOT NULL,
  `Diver_Age` smallint(6) DEFAULT NULL,
  `Guided_Diver_Depth` smallint(6) DEFAULT NULL,
  `Autonomous_Diver_Depth` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `planned_dive`
--

CREATE TABLE `planned_dive` (
  `Id_Planned_Dive` int(11) NOT NULL,
  `Planned_Date` date NOT NULL,
  `Planned_Time` time NOT NULL,
  `Comments` varchar(50) DEFAULT NULL,
  `Special_Needs` varchar(50) DEFAULT NULL,
  `Status` char(5) DEFAULT NULL,
  `Comment` varchar(50) DEFAULT NULL,
  `Diver_Dive_Price` smallint(6) DEFAULT NULL,
  `Instructor_Dive_Price` smallint(6) DEFAULT NULL,
  `Diver_Price` decimal(15,2) DEFAULT NULL,
  `Instructor_Price` decimal(15,2) DEFAULT NULL,
  `Diver_Id_Diver` int(11) DEFAULT NULL,
  `Id_Diver_Creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planned_dive`
--

INSERT INTO `planned_dive` (`Id_Planned_Dive`, `Planned_Date`, `Planned_Time`, `Comments`, `Special_Needs`, `Status`, `Comment`, `Diver_Dive_Price`, `Instructor_Dive_Price`, `Diver_Price`, `Instructor_Price`, `Diver_Id_Diver`, `Id_Diver_Creator`) VALUES
(5, '2023-06-30', '11:08:00', 'plongée compet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 55),
(7, '2023-07-09', '13:22:00', 'admin plongée', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 48),
(8, '2023-07-01', '02:23:00', 'final', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 48),
(9, '2023-07-01', '13:21:00', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, 57),
(10, '2023-07-01', '20:40:00', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 55),
(11, '2023-07-30', '13:51:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 48),
(12, '2023-08-16', '02:00:00', 'tutulutu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 62, 62),
(13, '2023-09-21', '02:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 48),
(14, '2023-10-26', '01:51:00', 'zaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 48);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_user`
--
ALTER TABLE `application_user`
  ADD PRIMARY KEY (`Id_Application_User`);

--
-- Indexes for table `dive`
--
ALTER TABLE `dive`
  ADD PRIMARY KEY (`Id_Dive`),
  ADD KEY `FK_Dive_Diver` (`Diver_Id_Diver`),
  ADD KEY `FK_Dive_Planned_Dive` (`Planned_Dive_Id_Planned_Dive`);

--
-- Indexes for table `diver`
--
ALTER TABLE `diver`
  ADD PRIMARY KEY (`Id_Diver`);

--
-- Indexes for table `dive_registration`
--
ALTER TABLE `dive_registration`
  ADD PRIMARY KEY (`Diver_Id_Diver`),
  ADD KEY `FK_Dive_Registration_Planned_Dive` (`Planned_Dive_Id_Planned_Dive`);

--
-- Indexes for table `dive_site`
--
ALTER TABLE `dive_site`
  ADD PRIMARY KEY (`Id_Dive_Site`);

--
-- Indexes for table `dive_team`
--
ALTER TABLE `dive_team`
  ADD PRIMARY KEY (`Id_Dive_Team`),
  ADD KEY `FK_Dive_team_Dive` (`Planned_Dive_Id_Planned_Dive`),
  ADD KEY `FK_Dive_team_Diver` (`Diver_Id_Diver`);

--
-- Indexes for table `dive_team_composition`
--
ALTER TABLE `dive_team_composition`
  ADD PRIMARY KEY (`Id_Dive_Team_Composition`),
  ADD KEY `FK_dive_team_composition_planned_dive` (`planned_dive_Id_planned_dive`);

--
-- Indexes for table `dive_team_member`
--
ALTER TABLE `dive_team_member`
  ADD PRIMARY KEY (`Id_Dive_Team_Member`),
  ADD KEY `FK_Dive_Team_Member_Dive_team` (`Dive_team_Id_Dive_Team`),
  ADD KEY `FK_Dive_Team_Member_Diver` (`Diver_Id_Diver`);

--
-- Indexes for table `emergency_plan`
--
ALTER TABLE `emergency_plan`
  ADD PRIMARY KEY (`Id_Emergency_Plan`),
  ADD KEY `FK_Emergency_Plan_Dive_Site` (`Dive_Site_Id_Dive_Site`);

--
-- Indexes for table `max_depth_for_qualification`
--
ALTER TABLE `max_depth_for_qualification`
  ADD PRIMARY KEY (`Id_Max_Depth_for_Qualification`);

--
-- Indexes for table `planned_dive`
--
ALTER TABLE `planned_dive`
  ADD PRIMARY KEY (`Id_Planned_Dive`),
  ADD KEY `FK_Planned_Dive_Dive_Site` (`Diver_Id_Diver`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_user`
--
ALTER TABLE `application_user`
  MODIFY `Id_Application_User` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dive`
--
ALTER TABLE `dive`
  MODIFY `Id_Dive` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diver`
--
ALTER TABLE `diver`
  MODIFY `Id_Diver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `dive_site`
--
ALTER TABLE `dive_site`
  MODIFY `Id_Dive_Site` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dive_team`
--
ALTER TABLE `dive_team`
  MODIFY `Id_Dive_Team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dive_team_composition`
--
ALTER TABLE `dive_team_composition`
  MODIFY `Id_Dive_Team_Composition` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dive_team_member`
--
ALTER TABLE `dive_team_member`
  MODIFY `Id_Dive_Team_Member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `emergency_plan`
--
ALTER TABLE `emergency_plan`
  MODIFY `Id_Emergency_Plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `max_depth_for_qualification`
--
ALTER TABLE `max_depth_for_qualification`
  MODIFY `Id_Max_Depth_for_Qualification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planned_dive`
--
ALTER TABLE `planned_dive`
  MODIFY `Id_Planned_Dive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dive`
--
ALTER TABLE `dive`
  ADD CONSTRAINT `FK_Dive_Diver` FOREIGN KEY (`Diver_Id_Diver`) REFERENCES `diver` (`Id_Diver`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Dive_Planned_Dive` FOREIGN KEY (`Planned_Dive_Id_Planned_Dive`) REFERENCES `planned_dive` (`Id_Planned_Dive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dive_registration`
--
ALTER TABLE `dive_registration`
  ADD CONSTRAINT `FK_Dive_Registration_Diver` FOREIGN KEY (`Diver_Id_Diver`) REFERENCES `diver` (`Id_Diver`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Dive_Registration_Planned_Dive` FOREIGN KEY (`Planned_Dive_Id_Planned_Dive`) REFERENCES `planned_dive` (`Id_Planned_Dive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dive_team`
--
ALTER TABLE `dive_team`
  ADD CONSTRAINT `FK_Dive_team_Dive` FOREIGN KEY (`Planned_Dive_Id_Planned_Dive`) REFERENCES `planned_dive` (`Id_Planned_Dive`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Dive_team_Diver` FOREIGN KEY (`Diver_Id_Diver`) REFERENCES `diver` (`Id_Diver`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dive_team_composition`
--
ALTER TABLE `dive_team_composition`
  ADD CONSTRAINT `FK_dive_team_composition_planned_dive` FOREIGN KEY (`planned_dive_Id_planned_dive`) REFERENCES `planned_dive` (`Id_Planned_Dive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dive_team_member`
--
ALTER TABLE `dive_team_member`
  ADD CONSTRAINT `FK_Dive_Team_Member_Dive_Teamr` FOREIGN KEY (`Dive_team_Id_Dive_Team`) REFERENCES `dive_team` (`Id_Dive_Team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Dive_Team_Member_Diver` FOREIGN KEY (`Diver_Id_Diver`) REFERENCES `diver` (`Id_Diver`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_plan`
--
ALTER TABLE `emergency_plan`
  ADD CONSTRAINT `FK_Emergency_Plan_Dive_Site` FOREIGN KEY (`Dive_Site_Id_Dive_Site`) REFERENCES `dive_site` (`Id_Dive_Site`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `planned_dive`
--
ALTER TABLE `planned_dive`
  ADD CONSTRAINT `FK_Planned_Dive_Diver` FOREIGN KEY (`Diver_Id_Diver`) REFERENCES `diver` (`Id_Diver`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
