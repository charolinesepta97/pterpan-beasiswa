/*
SQLyog Enterprise - MySQL GUI v6.07
Host - 5.6.17 : Database - db_peterpan
*********************************************************************
Server version : 5.6.17
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `db_peterpan`;

USE `db_peterpan`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `khs` */

DROP TABLE IF EXISTS `khs`;

CREATE TABLE `khs` (
  `idnumber` int(3) NOT NULL AUTO_INCREMENT,
  `nim` char(8) DEFAULT NULL,
  `kodemk` char(6) DEFAULT NULL,
  `nilai` char(2) DEFAULT NULL,
  PRIMARY KEY (`idnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `khs` */

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tmp_lahir` varchar(60) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` char(1) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`nim`,`nama`,`tmp_lahir`,`tgl_lahir`,`jkel`) values ('72150001','Gundala Putra Petir','Yogyakarta','1997-03-15','P'),('72150002','Batman Kasarung','Jakarta','1997-12-11','P');

/*Table structure for table `matakuliah` */

DROP TABLE IF EXISTS `matakuliah`;

CREATE TABLE `matakuliah` (
  `kodemk` char(6) NOT NULL,
  `namamk` varchar(30) NOT NULL,
  `sks` int(3) NOT NULL,
  PRIMARY KEY (`kodemk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matakuliah` */

insert  into `matakuliah`(`kodemk`,`namamk`,`sks`) values ('SE2413','SISTEM INFORMASI AKUNTANSI ',3),('SI1413','STATISTIKA',3),('SI1443','SISTEM BASIS DATA',3),('SI2413','REKAYASA PERANGKAT LUNAK',3),('SI2423','MANAJEMEN & TATA KELOLA TEKNOL',3);

/*Table structure for table `refkelamin` */

DROP TABLE IF EXISTS `refkelamin`;

CREATE TABLE `refkelamin` (
  `jkel` varchar(6) NOT NULL,
  PRIMARY KEY (`jkel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `refkelamin` */

insert  into `refkelamin`(`jkel`) values ('Pria'),('Wanita');

/*Table structure for table `refnilai` */

DROP TABLE IF EXISTS `refnilai`;

CREATE TABLE `refnilai` (
  `nilai` char(2) NOT NULL,
  `bobot` decimal(3,1) NOT NULL,
  PRIMARY KEY (`nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `refnilai` */

insert  into `refnilai`(`nilai`,`bobot`) values ('A','4.0'),('A-','3.7'),('B','3.0'),('B+','3.3'),('B-','2.7'),('C','2.0'),('C+','2.3'),('D','1.0'),('E','0.0');

/*Table structure for table `user_system` */

DROP TABLE IF EXISTS `user_system`;

CREATE TABLE `user_system` (
  `user_id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `akses` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `unit_base` varchar(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_system` */

insert  into `user_system`(`user_id`,`nama`,`password`,`akses`,`role`,`email`,`unit_base`) values ('124NE359','Andre','1',0,0,'andreassatyo@ukdw.ac.id','4480'),('994NE265','Bayu','1',0,0,'bayuaji@ukdw.ac.id','4480');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
