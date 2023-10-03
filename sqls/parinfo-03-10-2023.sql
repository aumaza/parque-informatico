-- MariaDB dump 10.19  Distrib 10.5.22-MariaDB, for Linux (x86_64)
--
-- Host: slackzone.ddns.net    Database: parinfo
-- ------------------------------------------------------
-- Server version	10.5.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pi_equipamiento`
--

DROP TABLE IF EXISTS `pi_equipamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_equipamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(100) NOT NULL,
  `patrimonio` varchar(200) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `gateaway` varchar(30) DEFAULT NULL,
  `submask` varchar(30) DEFAULT NULL,
  `dns` varchar(100) NOT NULL,
  `nro_oficina` varchar(10) NOT NULL,
  `login_usuario` varchar(50) NOT NULL,
  `sistema_operativo` varchar(100) NOT NULL,
  `periscopio` varchar(50) NOT NULL,
  `puesto_ubicacion` varchar(50) NOT NULL,
  `mac_address` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_equipamiento`
--

LOCK TABLES `pi_equipamiento` WRITE;
/*!40000 ALTER TABLE `pi_equipamiento` DISABLE KEYS */;
INSERT INTO `pi_equipamiento` VALUES (1,'Alejandro Ronald Krebs','3570265229','10.9.9.193','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','akrebs_mecon','MS Windows 7','N/D','1','N/D'),(2,'Carlos Traverso','3570227731','10.9.15.208','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','ctrave_mecon','MS Windows 7','N/D','2','N/D'),(3,'Alejandra Marcelli','3570227734','10.9.16.10','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','amarce_mecon','MS Windows 7','N/D','3','N/D'),(4,'Agustina De Stefano','3570265224','10.9.32.51','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','N/D','MS Windows 7','N/D','4','N/D'),(5,'Jimena Martinez Mirau','3570244283','10.9.15.206','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','jimmar_mecon','MS Windows 7','N/D','5','N/D'),(6,'Andrea Czorniak','3570243959','10.9.15.253','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','anczor_mecon','MS Windows 7','N/D','6','N/D'),(7,'Maria de los AngelesCuquejo','3570209484','10.9.128.1','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','mcuque_mecon','MS Windows 7','N/D','7','N/D'),(8,'Oscar Masello','3570265228','10.9.128.13','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','romasello_mecon','MS Windows 7','N/D','9','N/D'),(9,'Gustavo Flores','3570265233','10.12.8.211','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','gflore_mecon','MS Windows 7 32-Bits','N/D','10','N/D'),(10,'Marina Pelloni','3570243958','10.9.12.174','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','mpello_mecon','MS Windows 7 32-Bits','N/D','11','N/D'),(11,'Jorge Caruso','3570265221','10.9.15.254','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','jcarus_mecon','MS Windows 7','N/D','1','N/D'),(12,'Patricia Gomez','3570265223','10.9.9.15','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','pgomez_mecon','MS Windows 7','N/D','2','N/D'),(13,'Sonia Boiarov','3570265215','10.9.2.170','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','sboiarov_mecon','GNU/Linux Mint 19','N/D','4','N/D'),(14,'Gabriela Keinenburg','3570243952','N/D','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','gkeinen_meon','MS Windows 7','N/D','5','N/D'),(15,'Maximo Camogli','3570243969','10.9.16.7','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','mcamog_mecon','MS Windows 7','N/D','6','N/D'),(16,'Alejandro Glavic','3570265231','10.12.8.121','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','aglavi_mecon','GNU/Linux Debian 12','N/D','8','N/D'),(17,'Pablo Almeida','3570265217','10.9.9.150','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','palmei_mecon','MS Windows 7','N/D','9','N/D'),(18,'Jorge Boccanera','3570243970','10.9.16.45','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','jbocca_mecon','MS Windows 7','N/D','10','N/D'),(19,'Augusto Sebastian Maza','3570265227','10.9.9.102','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','aumaza_mecon','GNU/Linux Debian 11','N/D','12','N/D'),(20,'Ezequiel Greco','3570227720','10.12.8.39','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','egreco_mecon','MS Windows 7','N/D','13','N/D'),(21,'Paula Varela','3570227737','10.0.0.0','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','pavarel_mecon','GNU/Linux Mint 19','N/D','14','N/D'),(22,'Sofia Pussetto','N/D','10.0.0.1','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','spusse_mecon','MS Windows 7','N/D','15','N/D'),(23,'Maria de la Paz Cerutti','N/D','10.0.0.2','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','310','mdlpaz_mecon','MS Windows 7','N/D','7','N/D'),(24,'Impresora Lexmark MX611','N/D','10.8.10.0','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','N/D','GNU/Linux Debian 10','N/D','N/D','N/D'),(25,'Servidor Linux Canioncito','N/D','10.9.32.150','10.9.0.2','255.225.255.0','10.11.0.166 / 10.11.0.167','311','N/D','Slackware Linux 14.2','N/D','N/D','N/D');
/*!40000 ALTER TABLE `pi_equipamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi_sistemas_operativos`
--

DROP TABLE IF EXISTS `pi_sistemas_operativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_sistemas_operativos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_sistemas_operativos`
--

LOCK TABLES `pi_sistemas_operativos` WRITE;
/*!40000 ALTER TABLE `pi_sistemas_operativos` DISABLE KEYS */;
INSERT INTO `pi_sistemas_operativos` VALUES (1,'Mac OS Tiger'),(2,'Mac OS Panther'),(3,'Mac OS X'),(4,'MS Windows 95'),(5,'MS Windows 98'),(6,'MS Windows ME'),(7,'MS Windows XP'),(8,'MS Windows Vista'),(9,'MS Windows 7'),(10,'MS Windows 8'),(11,'MS Windows 10'),(12,'MS Windows 11'),(13,'GNU/Linux Debian 10'),(14,'GNU/Linux Debian 11'),(15,'GNU/Linux Debian 12'),(16,'GNU/Linux Mint 18'),(17,'GNU/Linux Mint 19'),(18,'GNU/Linux Mint 20'),(19,'GNU/Linux Mint 21'),(20,'Slackware Linux 14.2'),(21,'Slackware Linux 15'),(22,'N/D'),(23,'MS Windows 7 32-Bits'),(24,'MS Windows 8 32-Bits'),(25,'MS Windows 10 32-Bits'),(26,'MS Windows 11 32-Bits'),(27,'GNU/Linux Fedora 32');
/*!40000 ALTER TABLE `pi_sistemas_operativos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi_soporte`
--

DROP TABLE IF EXISTS `pi_soporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `usuario_responsable` varchar(100) NOT NULL,
  `nro_soporte` int(11) NOT NULL,
  `fecha_soporte` date NOT NULL,
  `usuario_informatica` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_soporte`
--

LOCK TABLES `pi_soporte` WRITE;
/*!40000 ALTER TABLE `pi_soporte` DISABLE KEYS */;
INSERT INTO `pi_soporte` VALUES (5,4,'Administrador',1584856,'2023-09-22','DamiÃ¡n Rodriguez','Se solicita reconexion a la red de la pc del usuario Agustina De Stefano'),(6,4,'Administrador',1584856,'2023-09-25','Carolina Rios','Se realiza parte a soporte de redes. AtenciÃ³n Juan');
/*!40000 ALTER TABLE `pi_soporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi_usuarios`
--

DROP TABLE IF EXISTS `pi_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(74) NOT NULL,
  `email` varchar(100) NOT NULL,
  `functions` set('Sys Admin','Usuario') NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `role` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_usuarios`
--

LOCK TABLES `pi_usuarios` WRITE;
/*!40000 ALTER TABLE `pi_usuarios` DISABLE KEYS */;
INSERT INTO `pi_usuarios` VALUES (1,'Administrador','root@mecon.gov.ar','$2y$10$bxJp/ndZE63NUDXeKq8E0O9wTA82NnSWNLBPVGLYaRyD3t2FnRV7O','root@mecon.gov.ar','Sys Admin','../core/avatars/meeting-chair.png',1),(2,'Augusto Maza','aumaza@mecon.gov.ar','$2y$10$Bhd95zAFPU3LPWIGASMa.OhijrPgEavHmeB.YjwHPTW2D6bZeHux6','aumaza@mecon.gov.ar','Usuario','../core/avatars/meeting-organizer.png',1);
/*!40000 ALTER TABLE `pi_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-03 11:50:03
