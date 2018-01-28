-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 12:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zakaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `frizer`
--

CREATE TABLE IF NOT EXISTS `frizer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `frizer`
--

INSERT INTO `frizer` (`ID`, `ime`, `prezime`, `status`) VALUES
(1, 'Tajana', 'Milicic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE IF NOT EXISTS `klijent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(200) DEFAULT NULL,
  `datumRodj` varchar(200) DEFAULT NULL,
  `tel` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`ID`, `ime`, `prezime`, `datumRodj`, `tel`) VALUES
(24, 'Maja', 'Dumitraskovic', '572914800', '063 8030863'),
(27, 'Milica', 'Bokonjic', '578440800', '92929292'),
(33, 'Jovana', 'Veskovic', '591231600', '0632832392'),
(34, 'Vladimir', 'Dimitrijevic', '588981600', '062 2229392'),
(35, 'Sofija', 'Curcic', '593996400', '064 8392090');

-- --------------------------------------------------------

--
-- Table structure for table `prodaja`
--

CREATE TABLE IF NOT EXISTS `prodaja` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(300) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `kolicina` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `prodaja`
--

INSERT INTO `prodaja` (`ID`, `naziv`, `cena`, `kolicina`) VALUES
(6, 'Artikal 1', '1200.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE IF NOT EXISTS `rezervacija` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `datum` varchar(200) NOT NULL,
  `vreme` varchar(200) NOT NULL,
  `frizerID` int(11) NOT NULL,
  `klijentID` int(11) NOT NULL,
  `iznos` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `frizerID` (`frizerID`),
  KEY `klijentID` (`klijentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`ID`, `datum`, `vreme`, `frizerID`, `klijentID`, `iznos`) VALUES
(87, '1456009200', '1456060500', 1, 24, '1000.00'),
(89, '1456009200', '1456049700', 1, 27, '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `rezusluga`
--

CREATE TABLE IF NOT EXISTS `rezusluga` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rezID` int(11) NOT NULL,
  `uslugaID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `rezID` (`rezID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `rezusluga`
--

INSERT INTO `rezusluga` (`ID`, `rezID`, `uslugaID`) VALUES
(126, 87, 23),
(128, 89, 25);

-- --------------------------------------------------------

--
-- Table structure for table `statistika`
--

CREATE TABLE IF NOT EXISTS `statistika` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `opis` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `datumOd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datumDo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ukupno` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `statistikafrizer`
--

CREATE TABLE IF NOT EXISTS `statistikafrizer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `statistikaID` int(11) NOT NULL,
  `frizerID` int(11) NOT NULL,
  `iznos` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `statistikaID` (`statistikaID`),
  KEY `frizerID` (`frizerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `frizerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`),
  KEY `frizerID` (`frizerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `frizerID`) VALUES
(1, 'admin', 'admin', NULL),
(2, 'tajci', 'boba', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usluga`
--

CREATE TABLE IF NOT EXISTS `usluga` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(500) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `usluga`
--

INSERT INTO `usluga` (`ID`, `naziv`, `cena`) VALUES
(23, 'Sisanje', '1000.00'),
(24, 'Feniranje', '500.00'),
(25, 'Farbanje', '2000.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rez_frizer` FOREIGN KEY (`frizerID`) REFERENCES `frizer` (`ID`),
  ADD CONSTRAINT `rez_klijent` FOREIGN KEY (`klijentID`) REFERENCES `klijent` (`ID`);

--
-- Constraints for table `rezusluga`
--
ALTER TABLE `rezusluga`
  ADD CONSTRAINT `rezusluga_rez` FOREIGN KEY (`rezID`) REFERENCES `rezervacija` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistikafrizer`
--
ALTER TABLE `statistikafrizer`
  ADD CONSTRAINT `statistikafrizer_ibfk_1` FOREIGN KEY (`statistikaID`) REFERENCES `statistika` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statistikafrizer_ibfk_2` FOREIGN KEY (`frizerID`) REFERENCES `frizer` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_frizer` FOREIGN KEY (`frizerID`) REFERENCES `frizer` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
