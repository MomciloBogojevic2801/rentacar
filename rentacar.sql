/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.8-MariaDB : Database - rentacar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rentacar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `rentacar`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`username`,`password`,`email`) values 
(1,'test','$1$zlnYwMy4$XJXe7it14YoWwr0lrK3M4.','test@test.com');

/*Table structure for table `iznajmljivanje` */

DROP TABLE IF EXISTS `iznajmljivanje`;

CREATE TABLE `iznajmljivanje` (
  `iznajmljivanjeID` int(11) NOT NULL AUTO_INCREMENT,
  `vozilo` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `datumOd` varchar(50) DEFAULT NULL,
  `datumDo` varchar(50) DEFAULT NULL,
  `cenaPoDanu` float NOT NULL,
  PRIMARY KEY (`iznajmljivanjeID`),
  KEY `vozilo_fk` (`vozilo`),
  KEY `korisnik_fk` (`korisnik`),
  CONSTRAINT `korisnik_fk` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`korisnikID`),
  CONSTRAINT `vozilo_fk` FOREIGN KEY (`vozilo`) REFERENCES `vozilo` (`voziloID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `iznajmljivanje` */

insert  into `iznajmljivanje`(`iznajmljivanjeID`,`vozilo`,`korisnik`,`datumOd`,`datumDo`,`cenaPoDanu`) values 
(1,1,1,'2019-01-09','2020-02-18',123),
(2,1,1,'2020-02-06','2020-02-21',32),
(3,4,4,'2019-11-13','2020-02-20',40),
(4,5,3,'2019-11-19','2020-02-15',34);

/*Table structure for table `korisnik` */

DROP TABLE IF EXISTS `korisnik`;

CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  PRIMARY KEY (`korisnikID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `korisnik` */

insert  into `korisnik`(`korisnikID`,`ime`,`prezime`) values 
(1,'Pera','Peric'),
(2,'Mika','Mikic'),
(3,'Zika','Zikic'),
(4,'Joca','Jocic');

/*Table structure for table `tipvozila` */

DROP TABLE IF EXISTS `tipvozila`;

CREATE TABLE `tipvozila` (
  `tipID` int(11) NOT NULL AUTO_INCREMENT,
  `nazivTipa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tipID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipvozila` */

insert  into `tipvozila`(`tipID`,`nazivTipa`) values 
(1,'Limuzina'),
(2,'Kupe'),
(3,'Kabriolet'),
(4,'Karavan'),
(5,'SUV');

/*Table structure for table `vozilo` */

DROP TABLE IF EXISTS `vozilo`;

CREATE TABLE `vozilo` (
  `voziloID` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) DEFAULT NULL,
  `marka` varchar(50) DEFAULT NULL,
  `regBr` varchar(50) DEFAULT NULL,
  `tipVozila` int(11) DEFAULT NULL,
  PRIMARY KEY (`voziloID`),
  KEY `tipVozila_fk` (`tipVozila`),
  CONSTRAINT `tipVozila_fk` FOREIGN KEY (`tipVozila`) REFERENCES `tipvozila` (`tipID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `vozilo` */

insert  into `vozilo`(`voziloID`,`model`,`marka`,`regBr`,`tipVozila`) values 
(1,'Astra G','Opel','PA-062-IL',1),
(2,'E Class','Mercedes','BG-323-RK',1),
(3,'Q7','Audi','BG-312-FK',5),
(4,'TT','Audi','PA-123-BG',2),
(5,'TT Cabrio','Audi','BG-111-AA',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
