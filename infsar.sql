-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: info_pasar1
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'rian@telkom.co.id','rian','7c4a8d09ca3762af61e59520943dc26494f8941b','Badriansyah'),(2,'rajih@telkom.co.id','rajih','7c4a8d09ca3762af61e59520943dc26494f8941b','Rajih'),(3,'adit@telkom.co.id','adit','7c4a8d09ca3762af61e59520943dc26494f8941b','Aditya Asmara');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dataKomoditas`
--

DROP TABLE IF EXISTS `tb_dataKomoditas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dataKomoditas` (
  `id_Komoditas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_Komoditas` varchar(100) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_Komoditas`),
  KEY `FK_dataKomunitas_0` (`id_admin`),
  CONSTRAINT `FK_dataKomunitas_0` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dataKomoditas`
--

LOCK TABLES `tb_dataKomoditas` WRITE;
/*!40000 ALTER TABLE `tb_dataKomoditas` DISABLE KEYS */;
INSERT INTO `tb_dataKomoditas` VALUES (1,'Cabe Merah',2),(2,'Sayur Bayam',1),(3,'Garam Halus',1),(5,'Kacang Panjang',1),(6,'Bawang Putih',1),(7,'Gula Pasir',1),(8,'Bawang Merah',1);
/*!40000 ALTER TABLE `tb_dataKomoditas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dataPasar`
--

DROP TABLE IF EXISTS `tb_dataPasar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dataPasar` (
  `id_pasar` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  PRIMARY KEY (`id_pasar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dataPasar`
--

LOCK TABLES `tb_dataPasar` WRITE;
/*!40000 ALTER TABLE `tb_dataPasar` DISABLE KEYS */;
INSERT INTO `tb_dataPasar` VALUES (1,1,'Pasar Kilo',31,91),(2,2,'Pasar Kemangi',11,46),(3,1,'Pasar Kuja',19,62);
/*!40000 ALTER TABLE `tb_dataPasar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_historyInfoPasar`
--

DROP TABLE IF EXISTS `tb_historyInfoPasar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_historyInfoPasar` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_Komoditas` int(11) DEFAULT NULL,
  `harga_max` int(11) DEFAULT NULL,
  `pasar1` int(11) DEFAULT NULL,
  `harga_min` int(11) DEFAULT NULL,
  `pasar2` int(11) DEFAULT NULL,
  `harga_avg` double DEFAULT NULL,
  `last_harga` int(11) DEFAULT NULL,
  `pasar3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_history`),
  KEY `id_komunitas` (`id_Komoditas`),
  KEY `pasar1` (`pasar1`),
  KEY `pasar2` (`pasar2`),
  KEY `pasar3` (`pasar3`),
  CONSTRAINT `tb_historyInfoPasar_ibfk_1` FOREIGN KEY (`id_Komoditas`) REFERENCES `tb_dataKomoditas` (`id_Komoditas`),
  CONSTRAINT `tb_historyInfoPasar_ibfk_2` FOREIGN KEY (`pasar1`) REFERENCES `tb_dataPasar` (`id_pasar`),
  CONSTRAINT `tb_historyInfoPasar_ibfk_3` FOREIGN KEY (`pasar2`) REFERENCES `tb_dataPasar` (`id_pasar`),
  CONSTRAINT `tb_historyInfoPasar_ibfk_4` FOREIGN KEY (`pasar3`) REFERENCES `tb_dataPasar` (`id_pasar`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_historyInfoPasar`
--

LOCK TABLES `tb_historyInfoPasar` WRITE;
/*!40000 ALTER TABLE `tb_historyInfoPasar` DISABLE KEYS */;
INSERT INTO `tb_historyInfoPasar` VALUES (1,'2015-06-07',6,7600,3,400,2,4000,6500,1),(77,'2015-06-08',1,5000,NULL,5000,NULL,5000,5000,NULL),(78,'2015-06-08',2,0,NULL,0,NULL,0,0,NULL),(79,'2015-06-08',3,0,NULL,0,NULL,0,0,NULL),(80,'2015-06-08',5,0,NULL,0,NULL,0,0,NULL),(81,'2015-06-08',6,0,NULL,0,NULL,0,0,NULL),(82,'2015-06-08',7,0,NULL,0,NULL,0,0,NULL),(83,'2015-06-08',8,0,NULL,0,NULL,0,0,NULL),(84,'2015-06-08',1,5000,NULL,5000,NULL,5000,5000,NULL),(85,'2015-06-08',2,0,NULL,0,NULL,0,0,NULL),(86,'2015-06-08',3,0,NULL,0,NULL,0,0,NULL),(87,'2015-06-08',5,0,NULL,0,NULL,0,0,NULL),(88,'2015-06-08',6,0,NULL,0,NULL,0,0,NULL),(89,'2015-06-08',7,0,NULL,0,NULL,0,0,NULL),(90,'2015-06-08',8,0,NULL,0,NULL,0,0,NULL),(91,'2015-06-09',1,0,NULL,0,NULL,0,0,NULL),(92,'2015-06-09',2,0,NULL,0,NULL,0,0,NULL),(93,'2015-06-09',3,0,NULL,0,NULL,0,0,NULL),(94,'2015-06-09',5,3500,NULL,3500,NULL,3500,3500,NULL),(95,'2015-06-09',6,0,NULL,0,NULL,0,0,NULL),(96,'2015-06-09',7,5000,NULL,3500,NULL,4250,3500,NULL),(97,'2015-06-09',8,0,NULL,0,NULL,0,0,NULL),(98,'2015-06-10',1,0,NULL,0,NULL,0,0,NULL),(99,'2015-06-10',2,0,NULL,0,NULL,0,0,NULL),(100,'2015-06-10',3,0,NULL,0,NULL,0,0,NULL),(101,'2015-06-10',5,0,NULL,0,NULL,0,0,NULL),(102,'2015-06-10',6,0,NULL,0,NULL,0,0,NULL),(103,'2015-06-10',7,0,NULL,0,NULL,0,0,NULL),(104,'2015-06-10',8,0,NULL,0,NULL,0,0,NULL),(105,'2015-06-11',1,2500,NULL,2500,NULL,2500,2500,NULL),(106,'2015-06-11',2,9500,NULL,9500,NULL,9500,9500,NULL),(107,'2015-06-11',3,500,NULL,500,NULL,500,500,NULL),(108,'2015-06-11',5,7500,NULL,7500,NULL,7500,7500,NULL),(109,'2015-06-11',6,4500,NULL,3500,NULL,4000,4500,NULL),(110,'2015-06-11',7,5500,NULL,5500,NULL,5500,5500,NULL),(111,'2015-06-11',8,2500,NULL,1500,NULL,2000,1500,NULL);
/*!40000 ALTER TABLE `tb_historyInfoPasar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_infoPasar`
--

DROP TABLE IF EXISTS `tb_infoPasar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_infoPasar` (
  `id_infoPasar` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasar` int(11) NOT NULL,
  `id_Komoditas` int(11) NOT NULL,
  `harga_Komoditas` int(11) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lng` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_infoPasar`),
  KEY `FK_infoPasar_0` (`id_pasar`),
  KEY `FK_infoPasar_1` (`id_Komoditas`),
  CONSTRAINT `FK_infoPasar_0` FOREIGN KEY (`id_pasar`) REFERENCES `tb_dataPasar` (`id_pasar`),
  CONSTRAINT `FK_infoPasar_1` FOREIGN KEY (`id_Komoditas`) REFERENCES `tb_dataKomoditas` (`id_Komoditas`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_infoPasar`
--

LOCK TABLES `tb_infoPasar` WRITE;
/*!40000 ALTER TABLE `tb_infoPasar` DISABLE KEYS */;
INSERT INTO `tb_infoPasar` VALUES (1,1,1,2500,'2015-05-03 08:59:23',NULL,NULL),(2,1,1,2600,'2015-05-03 09:10:10',NULL,NULL),(3,1,3,1000,'2015-06-07 10:10:57',NULL,NULL),(4,2,1,3000,'2015-05-03 10:13:10',NULL,NULL),(5,2,2,2000,'2015-06-01 21:16:17',NULL,NULL),(6,1,2,3100,'2015-06-01 06:07:08',NULL,NULL),(7,2,3,1550,'2015-05-03 12:16:17',NULL,NULL),(8,3,2,5000,'2015-06-07 15:00:00','342.432','531.95321'),(9,2,1,5000,'2015-06-07 16:05:00','342.432','531.95321'),(10,3,7,5000,'2015-06-09 11:01:00','342.943','-43.093'),(11,2,7,3500,'2015-06-09 11:01:53','542.932','-43.193'),(12,2,5,3500,'2015-06-09 11:06:04','942.932','-43.193'),(13,2,5,7500,'2015-06-11 15:18:40','281.03','-98.0977'),(14,2,1,2500,'2015-06-11 15:18:57','281.03','-98.0977'),(15,2,8,2500,'2015-06-11 15:19:05','281.03','-98.0977'),(16,3,8,1500,'2015-06-11 15:19:15','281.03','-98.0977'),(17,3,2,9500,'2015-06-11 15:19:30','281.03','-98.0977'),(18,1,6,3500,'2015-06-11 15:19:45','281.03','-98.0977'),(19,1,6,4500,'2015-06-11 15:19:52','281.03','-98.0977'),(20,1,7,5500,'2015-06-11 15:20:08','281.03','-98.0977'),(21,1,3,500,'2015-06-11 15:20:17','281.03','-98.0977');
/*!40000 ALTER TABLE `tb_infoPasar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ketRefresh`
--

DROP TABLE IF EXISTS `tb_ketRefresh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ketRefresh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `refresh` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ketRefresh`
--

LOCK TABLES `tb_ketRefresh` WRITE;
/*!40000 ALTER TABLE `tb_ketRefresh` DISABLE KEYS */;
INSERT INTO `tb_ketRefresh` VALUES (1,'2015-06-08','Belum'),(2,'2015-06-09','Sudah'),(3,'2015-06-10','Sudah'),(4,'2015-06-11','Sudah');
/*!40000 ALTER TABLE `tb_ketRefresh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kota`
--

DROP TABLE IF EXISTS `tb_kota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_prov` int(11) NOT NULL,
  `nama` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kota`
--

LOCK TABLES `tb_kota` WRITE;
/*!40000 ALTER TABLE `tb_kota` DISABLE KEYS */;
INSERT INTO `tb_kota` VALUES (1,1,'Banda Aceh'),(2,1,'Langsa'),(3,1,'Lhokseumawe'),(4,1,'Meulaboh'),(5,1,'Sabang'),(6,1,'Subulussalam'),(7,2,'Denpasar'),(8,3,'Pakalpinang'),(9,4,'Cilegon'),(10,4,'Serang'),(11,4,'Tangeran Selatan'),(12,4,'Tangerang'),(13,5,'Bengkulu'),(14,6,'Gorontalo'),(15,7,'Kota Administrasi Jakarta Barat'),(16,7,'Jakarta Pusat'),(17,7,'Jakarta Selatan'),(18,7,'Jakarta Timur'),(19,7,'Jakarta Utara'),(20,8,'Sungai Penuh'),(21,8,'Jambi'),(22,9,'Bandung'),(23,9,'Bekasi'),(24,9,'Bogor'),(25,9,'Cimahi'),(26,9,'Cirebon'),(27,9,'Depok'),(28,9,'Sukabumi'),(29,9,'Tasikmalaya'),(30,9,'Banjar'),(31,10,'Magelang'),(32,10,'Pekalongan'),(33,10,'Purwokerto'),(34,10,'Salatiga'),(35,10,'Semarang'),(36,10,'Surakarta'),(37,10,'Tegal'),(38,11,'Batu'),(39,11,'Blitar'),(40,11,'Kediri'),(41,11,'Madiun'),(42,11,'Malang'),(43,11,'Mojokerto'),(44,11,'Pasuruan'),(45,11,'Probolinggo'),(46,11,'Surabaya'),(47,12,'Pontianak'),(48,12,'Singkawang'),(49,13,'Banjarbaru'),(50,13,'Banjarmasin'),(51,14,'Palangkara'),(52,15,'Balikpapan'),(53,15,'Bontang'),(54,15,'Samarinda'),(55,16,'Tarakan'),(56,17,'Batam'),(57,17,'Tanjungpinang'),(58,18,'Bandar Lampung'),(59,18,'Kotabumi'),(60,18,'Liwa'),(61,18,'Metro'),(62,19,'Ternate'),(63,19,'Tidore Kepulauan'),(64,20,'Ambon'),(65,20,'Tual'),(66,21,'Bima'),(67,21,'Mataram'),(68,22,'Kupang'),(69,23,'Sorong'),(70,24,'Jayapura'),(71,25,'Dumai'),(72,25,'Pekanbaru'),(73,26,'Makassar'),(74,26,'Palopo'),(75,26,'Parepare'),(76,27,'Palu'),(77,28,'Bau-Bau'),(78,28,'Kendari'),(79,29,'Bitung'),(80,29,'Kotamobagu'),(81,29,'Manado'),(82,29,'Tomohon'),(83,30,'Bukittinggi'),(84,30,'Padang'),(85,30,'Padangpanjang'),(86,30,'Pariaman'),(87,30,'Payakumbuh'),(88,30,'Sawahlunto'),(89,30,'Solok'),(90,31,'LubukLinggau'),(91,31,'Pagaralam'),(92,31,'Palembang'),(93,31,'Prabumulih'),(94,32,'Binjai'),(95,32,'Medan'),(96,32,'Padang Sidempuan'),(97,32,'Pematangsiantar'),(98,32,'Sibolga'),(99,32,'Tanjungbalai'),(100,32,'Tebingtinggi'),(101,33,'Yogyakarta');
/*!40000 ALTER TABLE `tb_kota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_provinsi`
--

DROP TABLE IF EXISTS `tb_provinsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_provinsi`
--

LOCK TABLES `tb_provinsi` WRITE;
/*!40000 ALTER TABLE `tb_provinsi` DISABLE KEYS */;
INSERT INTO `tb_provinsi` VALUES (1,'Aceh'),(2,'Bali'),(3,'Bangka Belitung'),(4,'Banten'),(5,'Bengkulu'),(6,'Gorontalo'),(7,'Jakarta'),(8,'Jambi'),(9,'Jawa Barat'),(10,'Jawa Tengah'),(11,'Jawa Timur'),(12,'Kalimantan Barat'),(13,'Kalimantan Selatan'),(14,'Kalimantan Tengah'),(15,'Kalimantan Timur'),(16,'Kalimantan Utara'),(17,'Kepulauan Riau'),(18,'Lampung'),(19,'Maluku Utara'),(20,'Maluku'),(21,'Nusa Tenggara Barat'),(22,'Nusa Tenggara Timur'),(23,'Papua Barat'),(24,'Papua'),(25,'Riau'),(26,'Sulawesi Selatan'),(27,'Sulawesi Tengah'),(28,'Sulawesi Tenggara'),(29,'Sulawesi Utara'),(30,'Sumatera Barat'),(31,'Sumatera Selatan'),(32,'Sumatera Utara'),(33,'Yogyakarta');
/*!40000 ALTER TABLE `tb_provinsi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-12 14:21:39
