-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 10:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidhsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(20) NOT NULL,
  `aUsername` varchar(255) NOT NULL,
  `aPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `aUsername`, `aPassword`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_register`
--

CREATE TABLE `doctor_register` (
  `ID` int(20) NOT NULL,
  `dFull_name` varchar(255) NOT NULL,
  `dBirthday` date NOT NULL,
  `dSpecialization` varchar(255) NOT NULL,
  `dSchedule` varchar(255) NOT NULL,
  `dAddress` varchar(255) NOT NULL,
  `dContact_no` varchar(200) NOT NULL,
  `dEmail_Add` varchar(255) NOT NULL,
  `dUsername` varchar(255) NOT NULL,
  `dPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_register`
--

INSERT INTO `doctor_register` (`ID`, `dFull_name`, `dBirthday`, `dSpecialization`, `dSchedule`, `dAddress`, `dContact_no`, `dEmail_Add`, `dUsername`, `dPassword`) VALUES
(1, 'Daisylee Dimas', '1999-10-23', 'Allergist / Immunologist', '6:00 am - 2:00 pm / Monday, Wednesday\r\n2:00 pm - 10:00 pm / Friday', 'Chico St., Violeta Village, Sta.Cruz, Guiguinto, Bulacan', '09364061427', 'Daisylee@gmail.com', 'daisylee123', 'sampledoctor'),
(2, 'Mary Grace Dimacali', '1999-10-16', 'Hematologist', '2:00 pm - 10:00 pm / Tuesday, Thursday, Friday', '930 Purok 4, Tabe, Guiguinto, Bulacan', '09353031678', 'Grace.dimacali.7@gmail.com', 'GraceDimacali', 'dimacali789'),
(3, 'Ricca Manlangit', '1985-09-03', 'Cardiologist', '2:00 pm - 10:00 pm / Saturday, Sunday\r\n6:00 am - 2:00 pm / Monday', '970 Punong Gubat, Bulacan', '09564827367', 'riccabeh@gmail.com', 'riCcAhBeH', 'riccacute'),
(4, 'Kimmy Reyes', '1982-01-01', 'Pulmonologist', '6:00 am - 2:00 pm / Tuesday, Thursday\r\n2:00 pm - 10:00 pm / Saturday', '43 Nasaniban, Sto.Cristo, Manila', '09648362891', 'kimmy@yahoo.com', 'Kimmy', '123'),
(5, 'Ana Marie Querol', '1984-03-01', 'Infectious Disease Specialist', '2:00 pm - 10:00 pm / Sunday\r\n10:00 pm - 6:00am / Tuesday', '678 Tuktukan, Guiguinto, Bulacan', '09674836282', 'anamarie@gmail.com', 'doc.ana', '456123');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_register`
--

CREATE TABLE `nurse_register` (
  `ID` int(11) NOT NULL,
  `nFull_name` varchar(255) NOT NULL,
  `nBirthday` date NOT NULL,
  `nSchedule` varchar(255) NOT NULL,
  `nAddress` varchar(255) NOT NULL,
  `nContact_no` varchar(200) NOT NULL,
  `nEmail_Add` varchar(255) NOT NULL,
  `nUsername` varchar(255) NOT NULL,
  `nPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse_register`
--

INSERT INTO `nurse_register` (`ID`, `nFull_name`, `nBirthday`, `nSchedule`, `nAddress`, `nContact_no`, `nEmail_Add`, `nUsername`, `nPassword`) VALUES
(1, 'Jaymee De Vegas', '1984-08-10', '6:00 am - 2:00 pm / Monday, Friday\r\n2:00 pm - 10:00 pm / Wednesday\r\n', '374 Purok 2, Sampung Palay, Quezon City', '09150976481', 'JaymeeDV@gmail.com', 'Jaymee#10', 'samplenurse'),
(2, 'Alexandro Mendoza', '1979-12-01', '2:00 pm - 10:00 pm / Tuesday, Friday\r\n10:00 pm - 6:00 am / Thursday', '10 Marikit Village, Makati City', '09467643691', 'NurseAlex@yahoo.com', 'NurseAlex', 'alexmouhh#123'),
(3, 'Samantha Reyes', '1988-05-27', '2:00 pm - 10:00 pm /  Sunday\r\n6:00 am - 2:00 pm / Tuesday, Thursday', 'Santol St., Violeta Village, Guiguinto, Bulacan', '09654789561', 'susan@yahoo.com', 'Susan789', '789'),
(4, 'Shane Ashley Lacbay', '1992-08-19', '6:00 am - 2:00 pm / Tuesday\r\n2:00 pm - 10:00pm / Thursday, Saturday', '258 Pinalad, Sta.Cruz, Manila', '09356476624', 'ShaneAshley@gmail.com', 'Shane', '321'),
(5, 'Pablo Agustin', '1989-03-15', '10:00 pm - 6:00 am / Sunday, Tuesday, Thursday', '76 July st., Sinangag, Binagoongan, Bulacan', '09277456790', 'Pablo15@yahoo.com', 'PabloAgustin', 'pogiako');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medhis`
--

CREATE TABLE `patient_medhis` (
  `diagnosisID` int(20) NOT NULL,
  `NurseID` int(20) NOT NULL,
  `Nurse_name` varchar(255) NOT NULL,
  `ID` int(20) NOT NULL,
  `pVisit_date` datetime NOT NULL,
  `pFull_name` varchar(255) NOT NULL,
  `pAge` varchar(20) NOT NULL,
  `pWeight` varchar(20) NOT NULL,
  `pHeight` varchar(20) NOT NULL,
  `pBlood_pressure` varchar(20) NOT NULL,
  `pBlood_sugar` varchar(20) NOT NULL,
  `pBody_temperature` varchar(20) NOT NULL,
  `pSymptoms` text NOT NULL,
  `pDate_admitted` datetime NOT NULL,
  `pRoom_no` varchar(50) NOT NULL,
  `pDate_discharged` datetime NOT NULL,
  `pTravel_history` varchar(255) NOT NULL,
  `pModified_classification` varchar(255) NOT NULL,
  `pDate_confirmed` datetime NOT NULL,
  `pTest_results` varchar(200) NOT NULL,
  `pCondition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_medhis`
--

INSERT INTO `patient_medhis` (`diagnosisID`, `NurseID`, `Nurse_name`, `ID`, `pVisit_date`, `pFull_name`, `pAge`, `pWeight`, `pHeight`, `pBlood_pressure`, `pBlood_sugar`, `pBody_temperature`, `pSymptoms`, `pDate_admitted`, `pRoom_no`, `pDate_discharged`, `pTravel_history`, `pModified_classification`, `pDate_confirmed`, `pTest_results`, `pCondition`) VALUES
(1, 1, 'Jaymee De Vegas', 1, '2020-07-29 15:00:00', 'Barry Cartery', '50', '55 kg', '5`5 ft', '100   /   90', '100', '37   deg', 'Chest tightness, shortness of breath, coughing', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'None', 'SUSPECT', '2020-08-04 18:00:00', 'NEGATIVE', 'ASTHMA'),
(2, 2, 'Alexandro Mendoza', 2, '2020-07-17 14:30:00', 'Candace Jackson', '45', '47   kg', '5   ft', ' 90  /   75', '90', '35   deg', 'Headache, pale skin, cold hands, extreme fatigue', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', ''),
(3, 3, 'Samantha Reyes', 3, '2020-07-25 09:25:00', 'Robert Evins', '42', ' 50  kg', '5`4   ft', '135   /   90', '112', '34   deg', 'Rapid heartbeat, sudden chest pain, fainting', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', ''),
(4, 4, 'Shane Ashley Lacbay', 4, '2020-08-06 10:23:00', 'Ronaldo Mitchell', '33', '60   kg', '5`6   ft', '120   /   80', '120', '42   deg', 'Fever, Headache, Coughing, Shortness of breath, fatigue', '2020-08-06 12:00:00', 'Quarantine room no.1', '2020-08-20 10:00:00', 'Quezon City', 'CONFIRMED', '2020-08-10 06:30:00', 'POSITIVE', 'Mild case'),
(5, 5, 'Pablo Agustin', 5, '2020-07-04 16:00:00', 'Deborah Estrella', '70', '49   kg', '4`9   ft', '100   /   80', '95', '43   deg', 'Fever, Headache, dry cough, sore throat', '2020-07-04 16:10:00', 'Quarantine room no.2', '2020-07-20 15:00:00', 'Wuhan, China', 'CONFIRMED', '2020-07-10 16:00:00', 'POSITIVE', 'SEVERE CASE, Intubated'),
(6, 4, 'Shane Ashley Lacbay', 6, '2020-07-19 09:30:00', 'Elvira Pacheco', '38', '52   kg', '5`3   ft', '120   /   80', '100', '35   deg', 'Itchy throat, sneezing, runny nose', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', ''),
(7, 2, 'Alexandro Mendoza', 7, '2020-07-17 15:30:00', 'Betty Garibay', '20', '45   kg', '4`8   ft', '90   /  80 ', '85', '35   deg', 'Excessive bleeding, blood in urine or stool, nosebleed', '2020-07-17 16:00:00', '202', '2020-07-29 07:00:00', '', '', '0000-00-00 00:00:00', '', ''),
(8, 1, 'Jaymee De Vegas', 8, '2020-08-03 11:00:00', 'Andrei Philis', '45', '56   kg', '5`5   ft', '120   /  20 ', '100', '34   deg', 'Pain in the other area of the upper body including the left shoulder and back,\r\nSweating,\r\ndizziness\r\n\r\n\r\n\r\n', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_register`
--

CREATE TABLE `patient_register` (
  `ID` int(20) NOT NULL,
  `pFull_name` varchar(255) NOT NULL,
  `pBirthday` date NOT NULL,
  `pAge` varchar(20) NOT NULL,
  `pSex` varchar(255) NOT NULL,
  `pAddress` varchar(255) NOT NULL,
  `pContact_no` varchar(200) NOT NULL,
  `pEmail_add` varchar(255) NOT NULL,
  `pUsername` varchar(255) NOT NULL,
  `pPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_register`
--

INSERT INTO `patient_register` (`ID`, `pFull_name`, `pBirthday`, `pAge`, `pSex`, `pAddress`, `pContact_no`, `pEmail_add`, `pUsername`, `pPassword`) VALUES
(1, 'Barry Cartery', '1970-10-08', '50', 'Male', 'Cruz, Guiguinto, Bulacan', '09784569871', 'barry@yahoo.com', 'BarryCartery08', 'samplepatient'),
(2, 'Candace Jackson', '1947-11-21', '45', 'Female', 'Matungao, Bulakan, Bulacan', '09784561236', 'cj@yahoo.com', 'Candace123', 'candacecute'),
(3, 'Robert Evins', '1977-08-06', '42', 'Male', 'Sto.Cristo, Panginay, Balagtas', '09784561254', 'evins@yahoo.com', 'RobertPogi', '753951'),
(4, 'Ronaldo Mitchell', '1987-10-21', '33', 'Male', 'Baliuag, Bulacan', '09895641236', 'ronaldo@gmail.com', 'mitchelll', 'mitch456'),
(5, 'Deborah Estrella', '1949-07-25', '70', 'Female', 'Marilao, Bulacan', '09561239874', '', 'deborah07', '789632'),
(6, 'Elvira Pacheco', '1982-01-30', '38', 'Female', 'Purok 6, Cutcut, Guiguinto, Bulacan', '09124567892', 'pacheco30@yahoo.com', 'elvirapacheco', 'chico123'),
(7, 'Betty Garaibay', '2000-06-27', '19', 'Female', 'San Jose del Monte, Bulacan', '09124563987', 'Betty@yahoo.com', 'bGaribay', 'garibay123'),
(8, 'Andrei Philis', '1975-03-17', '49', 'Male', 'San Rafael, Bulacan', '09754563217', '', 'adra123', '753159');

-- --------------------------------------------------------

--
-- Table structure for table `recep_register`
--

CREATE TABLE `recep_register` (
  `ID` int(20) NOT NULL,
  `rFull_name` varchar(255) NOT NULL,
  `rBirthday` varchar(255) NOT NULL,
  `rSchedule` text NOT NULL,
  `rAddress` varchar(255) NOT NULL,
  `rContact_no` varchar(200) NOT NULL,
  `rEmail_Add` varchar(255) NOT NULL,
  `rUsername` varchar(255) NOT NULL,
  `rPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recep_register`
--

INSERT INTO `recep_register` (`ID`, `rFull_name`, `rBirthday`, `rSchedule`, `rAddress`, `rContact_no`, `rEmail_Add`, `rUsername`, `rPassword`) VALUES
(1, 'Mateo San Diego', '1988-09-11', '6:00 am - 12:00 pm / Monday, Wednesday, Friday\r\n', '648 Purok 3, Sampaloc, Manila', '09637298499', 'Sandiego@yahoo.com', 'MateoSD', 'matty456'),
(2, 'Yumie San Francisco', '1978-11-13', '12:00 pm - 6:00 pm / Tuesday, Thursday, Saturday, Sunday\r\n', '789 Sakitan, Kamuning City', '0978456235', 'yumisan@gmai.com', 'yumisan', '789456');

-- --------------------------------------------------------

--
-- Table structure for table `wb_register`
--

CREATE TABLE `wb_register` (
  `ID` int(20) NOT NULL,
  `wFull_name` varchar(255) NOT NULL,
  `wBirthday` date NOT NULL,
  `wSchedule` text NOT NULL,
  `wAddress` varchar(255) NOT NULL,
  `wContact_no` varchar(255) NOT NULL,
  `wEmail_Add` varchar(255) NOT NULL,
  `wUsername` varchar(255) NOT NULL,
  `wPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wb_register`
--

INSERT INTO `wb_register` (`ID`, `wFull_name`, `wBirthday`, `wSchedule`, `wAddress`, `wContact_no`, `wEmail_Add`, `wUsername`, `wPassword`) VALUES
(1, 'Samantha Loraine Santos', '1978-06-19', '6:00 am - 2:00 pm / Monday, Tuesday\r\n2:00 pm - 10:00 pm / Wednesday', '645 San Cristobal City', '09737272837', 'SamanthaLoraine@gmail.com', 'Sammy', 'samplewb'),
(2, 'Jefferson Ipa', '1980-02-15', '10:00 pm- 6:00am / Wednesday, Thursday, Friday\r\n', '480 Purok 1 Katapang, San Jose, Bocaue', '0973282974', 'jeff15ipa@gmail.com', 'jeff15ipa', '456789'),
(3, 'Emily Calipre', '1982-09-19', '2:00 pm - 10:00 pm / Monday, Tuesday\r\n6:00 am - 2:00 pm / Wednesday', '213 Sinumpong, Bocaue, Bulacan', '09637372837', 'EmilyCalipre@yahoo.com', 'caliprecutie', '123789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor_register`
--
ALTER TABLE `doctor_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nurse_register`
--
ALTER TABLE `nurse_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient_medhis`
--
ALTER TABLE `patient_medhis`
  ADD PRIMARY KEY (`diagnosisID`);

--
-- Indexes for table `patient_register`
--
ALTER TABLE `patient_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `recep_register`
--
ALTER TABLE `recep_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wb_register`
--
ALTER TABLE `wb_register`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nurse_register`
--
ALTER TABLE `nurse_register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_medhis`
--
ALTER TABLE `patient_medhis`
  MODIFY `diagnosisID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_register`
--
ALTER TABLE `patient_register`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recep_register`
--
ALTER TABLE `recep_register`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wb_register`
--
ALTER TABLE `wb_register`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
