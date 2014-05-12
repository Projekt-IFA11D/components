-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 10.0.1.11
-- Generation Time: May 12, 2014 at 09:47 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itv_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `komponenten`
--

CREATE TABLE IF NOT EXISTS `komponenten` (
  `k_id` int(11) NOT NULL,
  `lieferant_l_id` int(11) NOT NULL,
  `lieferant_r_id` int(11) NOT NULL,
  `k_einkaufsdatum` date DEFAULT NULL,
  `k_gewaehrleistungsdauer` int(11) DEFAULT NULL,
  `k_notiz` varchar(1024) DEFAULT NULL,
  `k_hersteller` varchar(45) DEFAULT NULL,
  `komponentenarten_ka_id` int(11) NOT NULL,
  PRIMARY KEY (`k_id`),
  KEY `fk_komponenten_haendler` (`lieferant_l_id`),
  KEY `fk_komponenten_raeume1` (`lieferant_r_id`),
  KEY `fk_komponenten_komponentenarten1` (`komponentenarten_ka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponentenarten`
--

CREATE TABLE IF NOT EXISTS `komponentenarten` (
  `ka_id` int(11) NOT NULL,
  `ka_komponentenart` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `komponentenattribute` (
  `kat_id` int(11) NOT NULL,
  `kat_beschreibung` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponentenattribut_hat_zulaessige_werte`
--

CREATE TABLE IF NOT EXISTS `komponentenattribut_hat_zulaessige_werte` (
  `komponentenattribute_kat_id` int(11) NOT NULL,
  `zulaessige_werte_zw_id` int(11) NOT NULL,
  PRIMARY KEY (`komponentenattribute_kat_id`,`zulaessige_werte_zw_id`),
  KEY `fk_komponentenattribute_has_zulaessige_werte_zulaessige_werte1` (`zulaessige_werte_zw_id`),
  KEY `fk_komponentenattribute_has_zulaessige_werte_komponentenattri1` (`komponentenattribute_kat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponente_hat_attribute`
--

CREATE TABLE IF NOT EXISTS `komponente_hat_attribute` (
  `komponenten_k_id` int(11) NOT NULL,
  `komponentenattribute_kat_id` int(11) NOT NULL,
  `khkat_wert` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`komponenten_k_id`,`komponentenattribute_kat_id`),
  KEY `fk_komponenten_has_komponentenattribute_komponentenattribute1` (`komponentenattribute_kat_id`),
  KEY `fk_komponenten_has_komponentenattribute_komponenten1` (`komponenten_k_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponente_hat_komponente`
--

CREATE TABLE IF NOT EXISTS `komponente_hat_komponente` (
  `komponenten_k_id_aggregat` int(11) NOT NULL,
  `komponenten_k_id_teil` int(11) NOT NULL,
  `khk_id` int(11) NOT NULL AUTO_INCREMENT,
  `vorgangsarten_v_id` int(11) NOT NULL,
  `khk_datum` date DEFAULT NULL,
  PRIMARY KEY (`khk_id`),
  KEY `fk_komponenten_has_komponenten_komponenten2` (`komponenten_k_id_teil`),
  KEY `fk_komponenten_has_komponenten_komponenten1` (`komponenten_k_id_aggregat`),
  KEY `fk_komponente_hat_komponente_vorgangsarten1` (`vorgangsarten_v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lieferant`
--

CREATE TABLE IF NOT EXISTS `lieferant` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_firmenname` varchar(45) DEFAULT NULL,
  `l_strasse` varchar(45) DEFAULT NULL,
  `l_tel` varchar(20) DEFAULT NULL,
  `l_mobil` varchar(20) DEFAULT NULL,
  `l_fax` varchar(20) DEFAULT NULL,
  `l_email` varchar(45) DEFAULT NULL,
  `l_plz_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  KEY `l_plz_id_FK` (`l_plz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plz_zuordnung`
--

CREATE TABLE IF NOT EXISTS `plz_zuordnung` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLZ` int(5) DEFAULT NULL,
  `Ort` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raeume`
--

CREATE TABLE IF NOT EXISTS `raeume` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_nr` varchar(20) DEFAULT NULL COMMENT 'z.B. r014, W304, etc.',
  `r_bezeichnung` varchar(45) DEFAULT NULL COMMENT 'z.B. Werkstatt, Lager,...',
  `r_notiz` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vorgangsarten`
--

CREATE TABLE IF NOT EXISTS `vorgangsarten` (
  `v_id` int(11) NOT NULL,
  `v_bezeichnung` varchar(45) DEFAULT NULL COMMENT 'Einbau / Ausbau',
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wird_beschrieben_durch`
--

CREATE TABLE IF NOT EXISTS `wird_beschrieben_durch` (
  `komponentenarten_ka_id` int(11) NOT NULL,
  `komponentenattribute_kat_id` int(11) NOT NULL,
  PRIMARY KEY (`komponentenarten_ka_id`,`komponentenattribute_kat_id`),
  KEY `fk_komponentenarten_has_komponentenattribute_komponentenattri1` (`komponentenattribute_kat_id`),
  KEY `fk_komponentenarten_has_komponentenattribute_komponentenarten1` (`komponentenarten_ka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zulaessige_werte`
--

CREATE TABLE IF NOT EXISTS `zulaessige_werte` (
  `zw_id` int(11) NOT NULL,
  `zw_wert` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`zw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komponenten`
--
ALTER TABLE `komponenten`
  ADD CONSTRAINT `fk_komponenten_haendler` FOREIGN KEY (`lieferant_l_id`) REFERENCES `lieferant` (`l_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_komponentenarten1` FOREIGN KEY (`komponentenarten_ka_id`) REFERENCES `komponentenarten` (`ka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_raeume1` FOREIGN KEY (`lieferant_r_id`) REFERENCES `raeume` (`r_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komponentenattribut_hat_zulaessige_werte`
--
ALTER TABLE `komponentenattribut_hat_zulaessige_werte`
  ADD CONSTRAINT `fk_komponentenattribute_has_zulaessige_werte_komponentenattri1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponentenattribute_has_zulaessige_werte_zulaessige_werte1` FOREIGN KEY (`zulaessige_werte_zw_id`) REFERENCES `zulaessige_werte` (`zw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komponente_hat_attribute`
--
ALTER TABLE `komponente_hat_attribute`
  ADD CONSTRAINT `fk_komponenten_has_komponentenattribute_komponenten1` FOREIGN KEY (`komponenten_k_id`) REFERENCES `komponenten` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_has_komponentenattribute_komponentenattribute1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komponente_hat_komponente`
--
ALTER TABLE `komponente_hat_komponente`
  ADD CONSTRAINT `fk_komponenten_has_komponenten_komponenten1` FOREIGN KEY (`komponenten_k_id_aggregat`) REFERENCES `komponenten` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_has_komponenten_komponenten2` FOREIGN KEY (`komponenten_k_id_teil`) REFERENCES `komponenten` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponente_hat_komponente_vorgangsarten1` FOREIGN KEY (`vorgangsarten_v_id`) REFERENCES `vorgangsarten` (`v_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lieferant`
--
ALTER TABLE `lieferant`
  ADD CONSTRAINT `l_plz_id_FK` FOREIGN KEY (`l_plz_id`) REFERENCES `plz_zuordnung` (`ID`);

--
-- Constraints for table `wird_beschrieben_durch`
--
ALTER TABLE `wird_beschrieben_durch`
  ADD CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenarten1` FOREIGN KEY (`komponentenarten_ka_id`) REFERENCES `komponentenarten` (`ka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenattri1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
