/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.0.27-community-nt-log : Database - db_penjualan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_penjualan` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_penjualan`;

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `Kode_Barang` char(10) NOT NULL,
  `Nama_Barang` varchar(25) NOT NULL,
  `Satuan` varchar(15) NOT NULL default '',
  `harga` decimal(11,0) NOT NULL,
  `Stock` int(11) NOT NULL,
  PRIMARY KEY  (`Kode_Barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`Kode_Barang`,`Nama_Barang`,`Satuan`,`harga`,`Stock`) values ('1','1','motor','10000000',2),('2','2','mobil','50000000',1),('3','3','laptop','4000000',5),('4','4','pc','2500000',4),('5','5','keyboard','100000',10);

/*Table structure for table `tbl_transaksi` */

DROP TABLE IF EXISTS `tbl_transaksi`;

CREATE TABLE `tbl_transaksi` (
  `No_Faktur` char(15) NOT NULL,
  `Tgl_Faktur` date NOT NULL,
  `Kode_Barang` char(10) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total_Harga` decimal(10,0) NOT NULL,
  PRIMARY KEY  (`No_Faktur`,`Kode_Barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tbl_transaksi` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama`,`alamat`,`telp`,`password`) values (1,'yusuf','lampung','08','123'),(2,'salil','lampung','09','123'),(3,'ketut','bandung','10','123'),(4,'bagus','bali','11','123'),(5,'irfan','palembang','12','123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
