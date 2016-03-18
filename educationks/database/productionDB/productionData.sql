-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: autopub_prod
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `advertising`
--

DROP TABLE IF EXISTS `advertising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertising` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `order` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `ads_content` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertising`
--

LOCK TABLES `advertising` WRITE;
/*!40000 ALTER TABLE `advertising` DISABLE KEYS */;
INSERT INTO `advertising` VALUES (1,'ADS 1','2015-12-31 05:40:05',0,1,'<div id=\"ad\">\r\n    <div class=\"smartad_header\" id=\"smad_parent2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\"\r\n         style=\r\n         \"border: none; padding: 0px; margin: 0px; clear: both; position: relative; height: 200px; width: auto; text-align: center; min-width: 1000px; z-index: 5000;\">\r\n        <div id=\"smad_outer_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" style=\r\n             \"position: absolute; display: block; visibility: visible; z-index: 5000; left: 50%; margin-left: -500px; top: 0px; width: 1000px; height: 200px; overflow: hidden;\">\r\n            <div id=\"cb_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" onmouseout=\r\n                 \"javascript:smartad_set_attribute(\'2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\', \'switching\', true);\"\r\n                 onmouseover=\r\n                 \"javascript:smartad_set_attribute(\'2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\', \'switching\', false);\"\r\n                 style=\r\n                 \"height: 21px; width: 21px; z-index: 10000; position: absolute; cursor: pointer; display: block; top: 0px; right: 0px; visibility: visible;\">\r\n                <img id=\"cb_inner_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" onclick=\r\n                     \"javascript:smartad_close( & quot; 2231cbac - 0db7 - 482f - 9862 - 7339f4ba057ea4f11a7e - 5bc9 - 41fa - 8d96 - ddc2fb8a9861 & quot; );\"\r\n                     src=\"http://static.bepolite.eu/files/close-gray.png\" style=\r\n                     \"border: none; width: 100%; height: 100%; z-index: 999999; display: block; position: relative;\">\r\n            </div>\r\n\r\n\r\n            <div id=\"smad_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" style=\r\n                 \"width: 1000px; height: 200px; position: relative; top: 0px;\">\r\n                <iframe frameborder=\"0\" height=\"100%\" id=\r\n                        \"adFrame2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" marginheight=\"0\"\r\n                        marginwidth=\"0\" name=\"adFrame2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\"\r\n                        scrolling=\"no\" src=\r\n                        \"//static.bepolite.eu/banners/4567d125-a325-4ae9-980e-fd59617c2aa4/index.html?banner_id=2231cbac0db7482f98627339f4ba057ea4f11a7e5bc941fa8d96ddc2fb8a9861&click_url=http%3A%2F%2Fserving.bepolite.eu%2Fevent%3Fkey%3DFYFWuDany3hwv6rfuoAYF3UCxdtOgd6BqdzvjEMozjV4kCGZ4-LS_eXL9wQ4dQJ9YHbIeLaqPzaXgLON-pkr4fck3f9NVwWAarg1V_1FnEYaNXXLNDrLDskw5bo6Xk6XNerWaFJBxOHF80MLreabQY3hwFDFEtRfZQ9xFhWEE937ZQODPXD-DDNEiFFI27mquuE-fYOoOEu5vptoK4sVDL_5TZeTu2kuOoTGiO__1Gm_cH8q-baKEEND8KSCsor_n0hq-maDCC-g5FOsGfF30-XkiClAAAbsscsavBVsfIXa5hY8OvOxWaQQS9P0iYfnngZXtFEp1ljuqs475VAp1Q%26&dynamic_url=http%3A%2F%2Fserving.bepolite.eu%2Fevent%3Fkey%3DFYFWuDany3hwv6rfuoAYF3UCxdtOgd6BqdzvjEMozjV4kCGZ4-LS_eXL9wQ4dQJ9YHbIeLaqPzaXgLON-pkr4fck3f9NVwWAarg1V_1FnEYaNXXLNDrLDskw5bo6Xk6XNerWaFJBxOHF80MLreabQY3hwFDFEtRfZQ9xFhWEE937ZQODPXD-DDNEiFFI27mquuE-fYOoOEu5vptoK4sVDL_5TZeTu2kuOoTGiO__1Gm_cH8q-baKEEND8KSCsor_n0hq-maDCC-g5FOsGfF30-XkiClAAAbsscsavBVsfIXa5hY8OvOxWaQQS9P0iYfnngZXtFEp1ljuqs475VAp1Q%26clink%3D\"\r\n                        style=\"height: 200px; width: 1000px;\" width=\"100%\"></iframe>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>',NULL,'2015-12-16 09:38:35','2015-12-16 10:35:16'),(2,'ADS 2','2016-12-01 05:40:05',0,1,'<script src=\"./index_files/ca-pub-2205536736208325.js\"></script><script src=\"./index_files/display.php\" type=\"text/javascript\">\r\n    </script><!-- WARNING : SWF FILES THAT ARE ACCESSED BY URL WILL BE DELETED, SWF FILES ABUSING SYSTEM RESOURCES WILL BE DELETED -->\r\n    <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0\" width=\"160\" height=\"600\">\r\n        <param name=\"movie\" value=\"http://h2.flashvortex.com/files/23/2_1448302664_8829_693_0_160_600_10_2_23.swf\">\r\n        <param name=\"quality\" value=\"best\">\r\n        <param name=\"menu\" value=\"true\">\r\n        <param name=\"allowScriptAccess\" value=\"always\">\r\n        <embed src=\"http://h2.flashvortex.com/files/23/2_1448302664_8829_693_0_160_600_10_2_23.swf\" quality=\"best\" menu=\"true\" width=\"160\" height=\"600\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" allowscriptaccess=\"always\">\r\n    </object>',NULL,'2015-12-16 09:38:35','2015-12-16 09:59:04'),(3,'ADS 3','2016-12-01 05:40:05',0,1,'<a href=\"http://www.gunrox.com/\"> <img src=\"http://www.gunrox.com/img/banners/300x250-1.jpg\" width=\"300\" height=\"250\" border=\"0\"></a>',NULL,'2015-12-16 09:38:35','2015-12-16 09:38:35'),(4,'ADS 4','2016-12-01 05:40:05',0,0,'<a href=\"http://www.gunrox.com/\"> <img src=\"http://www.gunrox.com/img/banners/300x250-1.jpg\" width=\"300\" height=\"250\" border=\"0\"></a>',NULL,'2015-12-16 09:38:35','2015-12-16 09:44:56'),(5,'ADS 5','2015-12-16 15:40:05',0,1,'<a href=\"http://www.gunrox.com/\"> <img src=\"http://www.gunrox.com/img/banners/300x250-1.jpg\" width=\"300\" height=\"250\" border=\"0\"></a>',NULL,'2015-12-16 09:38:35','2015-12-16 10:12:55'),(6,'ADS 6','2016-12-01 05:40:05',0,1,'<a href=\"http://www.gunrox.com/\"> <img src=\"http://www.gunrox.com/img/banners/300x250-1.jpg\" width=\"300\" height=\"250\" border=\"0\"></a>',NULL,'2015-12-16 09:38:35','2015-12-16 10:35:37');
/*!40000 ALTER TABLE `advertising` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents_log`
--

DROP TABLE IF EXISTS `agents_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `browser_version` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents_log`
--

LOCK TABLES `agents_log` WRITE;
/*!40000 ALTER TABLE `agents_log` DISABLE KEYS */;
INSERT INTO `agents_log` VALUES (1,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:15','2015-12-16 08:54:15'),(2,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:22','2015-12-16 08:54:22'),(3,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(4,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(5,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:30','2015-12-16 08:54:30'),(6,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:31','2015-12-16 08:54:31'),(7,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:35','2015-12-16 08:54:35'),(8,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:56','2015-12-16 08:54:56'),(9,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:54:57','2015-12-16 08:54:57'),(10,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(11,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(12,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:57:19','2015-12-16 08:57:19'),(13,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:57:20','2015-12-16 08:57:20'),(14,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:57:42','2015-12-16 08:57:42'),(15,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:57:43','2015-12-16 08:57:43'),(16,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(17,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(18,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:58:48','2015-12-16 08:58:48'),(19,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:58:49','2015-12-16 08:58:49'),(20,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:59:14','2015-12-16 08:59:14'),(21,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 08:59:22','2015-12-16 08:59:22'),(22,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:01:09','2015-12-16 09:01:09'),(23,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:01:10','2015-12-16 09:01:10'),(24,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:01:13','2015-12-16 09:01:13'),(25,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:09:30','2015-12-16 09:09:30'),(26,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:09:55','2015-12-16 09:09:55'),(27,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:09:56','2015-12-16 09:09:56'),(28,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:10:00','2015-12-16 09:10:00'),(29,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:10:01','2015-12-16 09:10:01'),(30,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:10:10','2015-12-16 09:10:10'),(31,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:10:11','2015-12-16 09:10:11'),(32,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:10:53','2015-12-16 09:10:53'),(33,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:00','2015-12-16 09:11:00'),(34,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:01','2015-12-16 09:11:01'),(35,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:02','2015-12-16 09:11:02'),(36,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:36','2015-12-16 09:11:36'),(37,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:37','2015-12-16 09:11:37'),(38,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:39','2015-12-16 09:11:39'),(39,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(40,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(41,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:50','2015-12-16 09:11:50'),(42,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:11:55','2015-12-16 09:11:55'),(43,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:01','2015-12-16 09:12:01'),(44,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:29','2015-12-16 09:12:29'),(45,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:31','2015-12-16 09:12:31'),(46,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:36','2015-12-16 09:12:36'),(47,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:40','2015-12-16 09:12:40'),(48,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:41','2015-12-16 09:12:41'),(49,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:12:42','2015-12-16 09:12:42'),(50,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:07','2015-12-16 09:13:07'),(51,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:08','2015-12-16 09:13:08'),(52,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(53,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:10','2015-12-16 09:13:10'),(54,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:11','2015-12-16 09:13:11'),(55,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:12','2015-12-16 09:13:12'),(56,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:21','2015-12-16 09:13:21'),(57,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:23','2015-12-16 09:13:23'),(58,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:28','2015-12-16 09:13:28'),(59,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:31','2015-12-16 09:13:31'),(60,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:13:32','2015-12-16 09:13:32'),(61,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:14:44','2015-12-16 09:14:44'),(62,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(63,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(64,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(65,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(66,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:14:47','2015-12-16 09:14:47'),(67,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:03','2015-12-16 09:15:03'),(68,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:08','2015-12-16 09:15:08'),(69,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:09','2015-12-16 09:15:09'),(70,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:10','2015-12-16 09:15:10'),(71,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:50','2015-12-16 09:15:50'),(72,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(73,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(74,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:15:52','2015-12-16 09:15:52'),(75,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:06','2015-12-16 09:16:06'),(76,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:07','2015-12-16 09:16:07'),(77,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:21','2015-12-16 09:16:21'),(78,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:26','2015-12-16 09:16:26'),(79,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:28','2015-12-16 09:16:28'),(80,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:32','2015-12-16 09:16:32'),(81,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:38','2015-12-16 09:16:38'),(82,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:40','2015-12-16 09:16:40'),(83,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:16:42','2015-12-16 09:16:42'),(84,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:17:10','2015-12-16 09:17:10'),(85,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:17:11','2015-12-16 09:17:11'),(86,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:17:12','2015-12-16 09:17:12'),(87,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:17:13','2015-12-16 09:17:13'),(88,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:17:14','2015-12-16 09:17:14'),(89,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36','Chrome','47.0.2526.80',NULL,'2015-12-16 09:17:15','2015-12-16 09:17:15');
/*!40000 ALTER TABLE `agents_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachment`
--

LOCK TABLES `attachment` WRITE;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
INSERT INTO `attachment` VALUES (1,'autopub/img/','16_12_2015__QZrGFx00-Mercedes-Benz-Vehicles-C-Class-C-63-Coupe-AMG-1180x559.jpg',128685,'image/jpeg',NULL,'2015-12-16 09:01:02','2015-12-16 09:01:02'),(2,'autopub/img/','16_12_2015__5ZLVx9Autobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:09:54','2015-12-16 09:09:54'),(3,'autopub/img/','16_12_2015__96V0ocAutobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:10:09','2015-12-16 09:10:09'),(4,'autopub/img/','16_12_2015__1v7ppQAutobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:11:15','2015-12-16 09:11:15'),(5,'autopub/img/','16_12_2015__Bx8un9Autobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:11:22','2015-12-16 09:11:22'),(6,'autopub/img/','16_12_2015__5ISJ9Q00-Mercedes-Benz-Vehicles-C-Class-C-63-Coupe-AMG-1180x559.jpg',128685,'image/jpeg',NULL,'2015-12-16 09:11:32','2015-12-16 09:11:32'),(7,'autopub/img/','16_12_2015__vKeuDtAutobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:12:58','2015-12-16 09:12:58'),(8,'autopub/img/','16_12_2015__Ylat0mAutobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:13:01','2015-12-16 09:13:01'),(9,'autopub/img/','16_12_2015__BO2vzP00-Mercedes-Benz-Vehicles-C-Class-C-63-Coupe-AMG-1180x559.jpg',128685,'image/jpeg',NULL,'2015-12-16 09:13:05','2015-12-16 09:13:05'),(10,'autopub/img/','16_12_2015__KWuC8AAutobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:14:01','2015-12-16 09:14:01'),(11,'autopub/img/','16_12_2015__J01HGI714345.jpg',70803,'image/jpeg',NULL,'2015-12-16 09:14:06','2015-12-16 09:14:06'),(12,'autopub/img/','16_12_2015__y5qBzX460370.jpg',838703,'image/jpeg',NULL,'2015-12-16 09:14:10','2015-12-16 09:14:10'),(13,'autopub/img/','16_12_2015__4iWyhtAutobiography_10_v1.jpg',276628,'image/jpeg',NULL,'2015-12-16 09:15:32','2015-12-16 09:15:32'),(14,'autopub/img/','16_12_2015__rCVNie00-Mercedes-Benz-Vehicles-C-Class-C-63-Coupe-AMG-1180x559.jpg',128685,'image/jpeg',NULL,'2015-12-16 09:15:41','2015-12-16 09:15:41'),(15,'autopub/img/','16_12_2015__DMSwSg2015-BMW-M3-sedan1-626x383.jpg',93243,'image/jpeg',NULL,'2015-12-16 09:15:45','2015-12-16 09:15:45'),(16,'autopub/img/','16_12_2015__Bf2Jat2015-BMW-M3-sedan1-626x383.jpg',93243,'image/jpeg',NULL,'2015-12-16 09:16:56','2015-12-16 09:16:56'),(17,'autopub/img/','16_12_2015__3Geeql714345.jpg',70803,'image/jpeg',NULL,'2015-12-16 09:17:02','2015-12-16 09:17:02'),(18,'autopub/img/','16_12_2015__R8aDRU00-Mercedes-Benz-Vehicles-C-Class-C-63-Coupe-AMG-1180x559.jpg',128685,'image/jpeg',NULL,'2015-12-16 09:17:06','2015-12-16 09:17:06');
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ee` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_lv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_lt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_ee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_lv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feature_image` int(10) unsigned NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_lv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `feature_image` (`feature_image`),
  KEY `sub_category` (`sub_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'','Section 1','','','','Section 1 description',' ','','','',0,'section-1','','','','',0,0,NULL,'2015-12-16 08:54:57','2015-12-16 08:54:57'),(2,'','Motorsports','','','','Motorsports description','  ','','','',0,'motor-sports','','','','',0,0,NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(3,'','Kurioosumid and accidents','','','','Kurioosumid and accidents description','   ','','','',0,'kurioosumid-and-accidents','','','','',0,0,NULL,'2015-12-16 08:57:19','2015-12-16 08:57:19'),(4,'','Daily News','','','','Daily News description','    ','','','',0,'news','','','','',0,0,NULL,'2015-12-16 08:57:42','2015-12-16 08:57:42'),(5,'','Try Races','','','','Try Races description','     ','','','',0,'try-races','','','','',0,0,NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(6,'','Newspaper','','','','Newspaper description','      ','','','',0,'newspaper','','','','',0,0,NULL,'2015-12-16 08:58:49','2015-12-16 08:58:49');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_stats`
--

DROP TABLE IF EXISTS `category_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ee` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_lv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_lt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_ee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_lv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feature_image` int(10) unsigned NOT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_lv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `feature_image` (`feature_image`),
  KEY `sub_category` (`sub_category`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_stats`
--

LOCK TABLES `category_stats` WRITE;
/*!40000 ALTER TABLE `category_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices_log`
--

DROP TABLE IF EXISTS `devices_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kind` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `platform_os` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_mobile` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices_log`
--

LOCK TABLES `devices_log` WRITE;
/*!40000 ALTER TABLE `devices_log` DISABLE KEYS */;
INSERT INTO `devices_log` VALUES (1,'','Windows',0,NULL,'2015-12-16 08:54:15','2015-12-16 08:54:15'),(2,'','Windows',0,NULL,'2015-12-16 08:54:22','2015-12-16 08:54:22'),(3,'','Windows',0,NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(4,'','Windows',0,NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(5,'','Windows',0,NULL,'2015-12-16 08:54:30','2015-12-16 08:54:30'),(6,'','Windows',0,NULL,'2015-12-16 08:54:30','2015-12-16 08:54:30'),(7,'','Windows',0,NULL,'2015-12-16 08:54:35','2015-12-16 08:54:35'),(8,'','Windows',0,NULL,'2015-12-16 08:54:56','2015-12-16 08:54:56'),(9,'','Windows',0,NULL,'2015-12-16 08:54:57','2015-12-16 08:54:57'),(10,'','Windows',0,NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(11,'','Windows',0,NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(12,'','Windows',0,NULL,'2015-12-16 08:57:19','2015-12-16 08:57:19'),(13,'','Windows',0,NULL,'2015-12-16 08:57:20','2015-12-16 08:57:20'),(14,'','Windows',0,NULL,'2015-12-16 08:57:42','2015-12-16 08:57:42'),(15,'','Windows',0,NULL,'2015-12-16 08:57:43','2015-12-16 08:57:43'),(16,'','Windows',0,NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(17,'','Windows',0,NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(18,'','Windows',0,NULL,'2015-12-16 08:58:48','2015-12-16 08:58:48'),(19,'','Windows',0,NULL,'2015-12-16 08:58:49','2015-12-16 08:58:49'),(20,'','Windows',0,NULL,'2015-12-16 08:59:14','2015-12-16 08:59:14'),(21,'','Windows',0,NULL,'2015-12-16 08:59:22','2015-12-16 08:59:22'),(22,'','Windows',0,NULL,'2015-12-16 09:01:09','2015-12-16 09:01:09'),(23,'','Windows',0,NULL,'2015-12-16 09:01:10','2015-12-16 09:01:10'),(24,'','Windows',0,NULL,'2015-12-16 09:01:13','2015-12-16 09:01:13'),(25,'','Windows',0,NULL,'2015-12-16 09:09:30','2015-12-16 09:09:30'),(26,'','Windows',0,NULL,'2015-12-16 09:09:55','2015-12-16 09:09:55'),(27,'','Windows',0,NULL,'2015-12-16 09:09:56','2015-12-16 09:09:56'),(28,'','Windows',0,NULL,'2015-12-16 09:09:59','2015-12-16 09:09:59'),(29,'','Windows',0,NULL,'2015-12-16 09:10:01','2015-12-16 09:10:01'),(30,'','Windows',0,NULL,'2015-12-16 09:10:10','2015-12-16 09:10:10'),(31,'','Windows',0,NULL,'2015-12-16 09:10:11','2015-12-16 09:10:11'),(32,'','Windows',0,NULL,'2015-12-16 09:10:53','2015-12-16 09:10:53'),(33,'','Windows',0,NULL,'2015-12-16 09:11:00','2015-12-16 09:11:00'),(34,'','Windows',0,NULL,'2015-12-16 09:11:01','2015-12-16 09:11:01'),(35,'','Windows',0,NULL,'2015-12-16 09:11:02','2015-12-16 09:11:02'),(36,'','Windows',0,NULL,'2015-12-16 09:11:36','2015-12-16 09:11:36'),(37,'','Windows',0,NULL,'2015-12-16 09:11:37','2015-12-16 09:11:37'),(38,'','Windows',0,NULL,'2015-12-16 09:11:39','2015-12-16 09:11:39'),(39,'','Windows',0,NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(40,'','Windows',0,NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(41,'','Windows',0,NULL,'2015-12-16 09:11:50','2015-12-16 09:11:50'),(42,'','Windows',0,NULL,'2015-12-16 09:11:54','2015-12-16 09:11:54'),(43,'','Windows',0,NULL,'2015-12-16 09:12:01','2015-12-16 09:12:01'),(44,'','Windows',0,NULL,'2015-12-16 09:12:29','2015-12-16 09:12:29'),(45,'','Windows',0,NULL,'2015-12-16 09:12:31','2015-12-16 09:12:31'),(46,'','Windows',0,NULL,'2015-12-16 09:12:36','2015-12-16 09:12:36'),(47,'','Windows',0,NULL,'2015-12-16 09:12:40','2015-12-16 09:12:40'),(48,'','Windows',0,NULL,'2015-12-16 09:12:41','2015-12-16 09:12:41'),(49,'','Windows',0,NULL,'2015-12-16 09:12:42','2015-12-16 09:12:42'),(50,'','Windows',0,NULL,'2015-12-16 09:13:07','2015-12-16 09:13:07'),(51,'','Windows',0,NULL,'2015-12-16 09:13:08','2015-12-16 09:13:08'),(52,'','Windows',0,NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(53,'','Windows',0,NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(54,'','Windows',0,NULL,'2015-12-16 09:13:11','2015-12-16 09:13:11'),(55,'','Windows',0,NULL,'2015-12-16 09:13:12','2015-12-16 09:13:12'),(56,'','Windows',0,NULL,'2015-12-16 09:13:21','2015-12-16 09:13:21'),(57,'','Windows',0,NULL,'2015-12-16 09:13:23','2015-12-16 09:13:23'),(58,'','Windows',0,NULL,'2015-12-16 09:13:28','2015-12-16 09:13:28'),(59,'','Windows',0,NULL,'2015-12-16 09:13:31','2015-12-16 09:13:31'),(60,'','Windows',0,NULL,'2015-12-16 09:13:32','2015-12-16 09:13:32'),(61,'','Windows',0,NULL,'2015-12-16 09:14:44','2015-12-16 09:14:44'),(62,'','Windows',0,NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(63,'','Windows',0,NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(64,'','Windows',0,NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(65,'','Windows',0,NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(66,'','Windows',0,NULL,'2015-12-16 09:14:47','2015-12-16 09:14:47'),(67,'','Windows',0,NULL,'2015-12-16 09:15:03','2015-12-16 09:15:03'),(68,'','Windows',0,NULL,'2015-12-16 09:15:08','2015-12-16 09:15:08'),(69,'','Windows',0,NULL,'2015-12-16 09:15:09','2015-12-16 09:15:09'),(70,'','Windows',0,NULL,'2015-12-16 09:15:10','2015-12-16 09:15:10'),(71,'','Windows',0,NULL,'2015-12-16 09:15:50','2015-12-16 09:15:50'),(72,'','Windows',0,NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(73,'','Windows',0,NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(74,'','Windows',0,NULL,'2015-12-16 09:15:52','2015-12-16 09:15:52'),(75,'','Windows',0,NULL,'2015-12-16 09:16:06','2015-12-16 09:16:06'),(76,'','Windows',0,NULL,'2015-12-16 09:16:07','2015-12-16 09:16:07'),(77,'','Windows',0,NULL,'2015-12-16 09:16:21','2015-12-16 09:16:21'),(78,'','Windows',0,NULL,'2015-12-16 09:16:26','2015-12-16 09:16:26'),(79,'','Windows',0,NULL,'2015-12-16 09:16:28','2015-12-16 09:16:28'),(80,'','Windows',0,NULL,'2015-12-16 09:16:32','2015-12-16 09:16:32'),(81,'','Windows',0,NULL,'2015-12-16 09:16:37','2015-12-16 09:16:37'),(82,'','Windows',0,NULL,'2015-12-16 09:16:40','2015-12-16 09:16:40'),(83,'','Windows',0,NULL,'2015-12-16 09:16:41','2015-12-16 09:16:41'),(84,'','Windows',0,NULL,'2015-12-16 09:17:10','2015-12-16 09:17:10'),(85,'','Windows',0,NULL,'2015-12-16 09:17:11','2015-12-16 09:17:11'),(86,'','Windows',0,NULL,'2015-12-16 09:17:12','2015-12-16 09:17:12'),(87,'','Windows',0,NULL,'2015-12-16 09:17:13','2015-12-16 09:17:13'),(88,'','Windows',0,NULL,'2015-12-16 09:17:14','2015-12-16 09:17:14'),(89,'','Windows',0,NULL,'2015-12-16 09:17:15','2015-12-16 09:17:15');
/*!40000 ALTER TABLE `devices_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ee` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_lv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_lt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `attribute` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_12_14_113823_structure',1),('2015_12_14_122637_logSys',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `footer` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `social_facebook` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `social_twitter` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `social_youtube` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `social_facebook_image` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `social_twitter_image` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `social_youtube_image` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'Autopub','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','autopub@dev.com','autopub.dev','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','','','','','','','autopub/img/16_12_2015__BFW1pYautopublogo.png',NULL,'2015-12-16 08:48:54','2015-12-16 09:22:12');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_ee` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `title_lv` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `title_lt` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `description_ee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_lv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feature_image` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `post_category_id_foreign` (`category_id`),
  CONSTRAINT `post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',1,1,1,NULL,'2015-12-16 09:01:09','2015-12-16 09:01:09'),(2,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',2,1,1,NULL,'2015-12-16 09:09:55','2015-12-16 09:09:55'),(3,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',3,1,1,NULL,'2015-12-16 09:10:10','2015-12-16 09:10:10'),(4,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',4,2,1,NULL,'2015-12-16 09:11:37','2015-12-16 09:11:37'),(5,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',5,2,1,NULL,'2015-12-16 09:11:39','2015-12-16 09:11:39'),(6,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',6,2,1,NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(7,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',7,3,1,NULL,'2015-12-16 09:13:08','2015-12-16 09:13:08'),(8,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',8,3,1,NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(9,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',9,3,1,NULL,'2015-12-16 09:13:12','2015-12-16 09:13:12'),(10,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',10,4,1,NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(11,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',11,4,1,NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(12,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',12,4,1,NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(13,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',13,5,1,NULL,'2015-12-16 09:15:50','2015-12-16 09:15:50'),(14,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',14,5,1,NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(15,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',15,5,1,NULL,'2015-12-16 09:16:06','2015-12-16 09:16:06'),(16,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',18,6,1,NULL,'2015-12-16 09:17:10','2015-12-16 09:17:10'),(17,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',17,6,1,NULL,'2015-12-16 09:17:12','2015-12-16 09:17:12'),(18,'','Title','','','','','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ','','','',16,6,1,NULL,'2015-12-16 09:17:14','2015-12-16 09:17:14');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_image`
--

DROP TABLE IF EXISTS `post_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `image_attachment` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `post_image_post_id_foreign` (`post_id`),
  CONSTRAINT `post_image_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_image`
--

LOCK TABLES `post_image` WRITE;
/*!40000 ALTER TABLE `post_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `route_log`
--

DROP TABLE IF EXISTS `route_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `route_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `input_data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `route_log`
--

LOCK TABLES `route_log` WRITE;
/*!40000 ALTER TABLE `route_log` DISABLE KEYS */;
INSERT INTO `route_log` VALUES (1,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 08:54:15','2015-12-16 08:54:15'),(2,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 08:54:22','2015-12-16 08:54:22'),(3,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"\",\"description_ee\":\"\",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\"}',NULL,'2015-12-16 08:54:25','2015-12-16 08:54:25'),(4,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(5,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"fasdf\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p>asdfasdf<\\/p>\",\"description_ee\":\"\",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\"}',NULL,'2015-12-16 08:54:30','2015-12-16 08:54:30'),(6,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 08:54:30','2015-12-16 08:54:30'),(7,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:54:35','2015-12-16 08:54:35'),(8,'','admin/category/create','App\\Http\\Controllers\\AdminPanel\\CategoryController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"name_en\":\"Section 1\",\"name_ee\":\"\",\"name_lv\":\"\",\"name_lt\":\"\",\"name_ru\":\"\",\"description_en\":\"Section 1 description\",\"description_ee\":\" \",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\",\"slug_',NULL,'2015-12-16 08:54:56','2015-12-16 08:54:56'),(9,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:54:57','2015-12-16 08:54:57'),(10,'','admin/category/create','App\\Http\\Controllers\\AdminPanel\\CategoryController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"name_en\":\"Motorsports\",\"name_ee\":\"\",\"name_lv\":\"\",\"name_lt\":\"\",\"name_ru\":\"\",\"description_en\":\"Motorsports description\",\"description_ee\":\"  \",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\",\"',NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(11,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(12,'','admin/category/create','App\\Http\\Controllers\\AdminPanel\\CategoryController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"name_en\":\"Kurioosumid and accidents\",\"name_ee\":\"\",\"name_lv\":\"\",\"name_lt\":\"\",\"name_ru\":\"\",\"description_en\":\"Kurioosumid and accidents description\",\"description_ee\":\"   \",\"description_lv\":\"\",\"description',NULL,'2015-12-16 08:57:19','2015-12-16 08:57:19'),(13,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:57:20','2015-12-16 08:57:20'),(14,'','admin/category/create','App\\Http\\Controllers\\AdminPanel\\CategoryController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"name_en\":\"Daily News\",\"name_ee\":\"\",\"name_lv\":\"\",\"name_lt\":\"\",\"name_ru\":\"\",\"description_en\":\"Daily News description\",\"description_ee\":\"    \",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\",\"',NULL,'2015-12-16 08:57:42','2015-12-16 08:57:42'),(15,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:57:43','2015-12-16 08:57:43'),(16,'','admin/category/create','App\\Http\\Controllers\\AdminPanel\\CategoryController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"name_en\":\"Try Races\",\"name_ee\":\"\",\"name_lv\":\"\",\"name_lt\":\"\",\"name_ru\":\"\",\"description_en\":\"Try Races description\",\"description_ee\":\"     \",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\",\"s',NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(17,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(18,'','admin/category/create','App\\Http\\Controllers\\AdminPanel\\CategoryController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"name_en\":\"Newspaper\",\"name_ee\":\"\",\"name_lv\":\"\",\"name_lt\":\"\",\"name_ru\":\"\",\"description_en\":\"Newspaper description\",\"description_ee\":\"      \",\"description_lv\":\"\",\"description_lt\":\"\",\"description_ru\":\"\",\"',NULL,'2015-12-16 08:58:48','2015-12-16 08:58:48'),(19,'','admin/category','App\\Http\\Controllers\\AdminPanel\\CategoryController@getIndex','[]',NULL,'2015-12-16 08:58:49','2015-12-16 08:58:49'),(20,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 08:59:14','2015-12-16 08:59:14'),(21,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 08:59:22','2015-12-16 08:59:22'),(22,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:01:09','2015-12-16 09:01:09'),(23,'','admin/posts/edit/1','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:01:09','2015-12-16 09:01:09'),(24,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:01:13','2015-12-16 09:01:13'),(25,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:09:30','2015-12-16 09:09:30'),(26,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:09:55','2015-12-16 09:09:55'),(27,'','admin/posts/edit/2','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:09:56','2015-12-16 09:09:56'),(28,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:09:59','2015-12-16 09:09:59'),(29,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:10:01','2015-12-16 09:10:01'),(30,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:10:10','2015-12-16 09:10:10'),(31,'','admin/posts/edit/3','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:10:11','2015-12-16 09:10:11'),(32,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:10:53','2015-12-16 09:10:53'),(33,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:11:00','2015-12-16 09:11:00'),(34,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:11:01','2015-12-16 09:11:01'),(35,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:11:02','2015-12-16 09:11:02'),(36,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:11:36','2015-12-16 09:11:36'),(37,'','admin/posts/edit/4','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:11:37','2015-12-16 09:11:37'),(38,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:11:39','2015-12-16 09:11:39'),(39,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(40,'','admin/posts/edit/5','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(41,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:11:50','2015-12-16 09:11:50'),(42,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:11:54','2015-12-16 09:11:54'),(43,'','admin/posts/edit/6','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:12:01','2015-12-16 09:12:01'),(44,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:12:29','2015-12-16 09:12:29'),(45,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:12:31','2015-12-16 09:12:31'),(46,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:12:36','2015-12-16 09:12:36'),(47,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:12:40','2015-12-16 09:12:40'),(48,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:12:41','2015-12-16 09:12:41'),(49,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:12:42','2015-12-16 09:12:42'),(50,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:13:07','2015-12-16 09:13:07'),(51,'','admin/posts/edit/7','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:13:08','2015-12-16 09:13:08'),(52,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(53,'','admin/posts/edit/8','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(54,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:13:11','2015-12-16 09:13:11'),(55,'','admin/posts/edit/9','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:13:12','2015-12-16 09:13:12'),(56,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:13:20','2015-12-16 09:13:20'),(57,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:13:22','2015-12-16 09:13:22'),(58,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:13:28','2015-12-16 09:13:28'),(59,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:13:31','2015-12-16 09:13:31'),(60,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:13:32','2015-12-16 09:13:32'),(61,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:14:44','2015-12-16 09:14:44'),(62,'','admin/posts/edit/10','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(63,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(64,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(65,'','admin/posts/edit/11','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(66,'','admin/posts/edit/12','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:14:47','2015-12-16 09:14:47'),(67,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:15:03','2015-12-16 09:15:03'),(68,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:15:08','2015-12-16 09:15:08'),(69,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:15:09','2015-12-16 09:15:09'),(70,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:15:10','2015-12-16 09:15:10'),(71,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:15:50','2015-12-16 09:15:50'),(72,'','admin/posts/edit/13','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(73,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(74,'','admin/posts/edit/14','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:15:52','2015-12-16 09:15:52'),(75,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"zJdNVOzq6jhk7yJQ7e1NQxULFd3K1zdyYP0YDypR\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:16:06','2015-12-16 09:16:06'),(76,'','admin/posts/edit/15','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:16:07','2015-12-16 09:16:07'),(77,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:16:21','2015-12-16 09:16:21'),(78,'','admin','App\\Http\\Controllers\\AdminPanel\\DashboardController@getIndex','[]',NULL,'2015-12-16 09:16:25','2015-12-16 09:16:25'),(79,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:16:28','2015-12-16 09:16:28'),(80,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:16:31','2015-12-16 09:16:31'),(81,'','admin/posts','App\\Http\\Controllers\\AdminPanel\\PostsController@getIndex','[]',NULL,'2015-12-16 09:16:37','2015-12-16 09:16:37'),(82,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:16:40','2015-12-16 09:16:40'),(83,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@getCreate','[]',NULL,'2015-12-16 09:16:41','2015-12-16 09:16:41'),(84,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"nhZr6ZyvTGyFP0wynp1ViLnBY9G8Ckqy7IXNO98d\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:17:10','2015-12-16 09:17:10'),(85,'','admin/posts/edit/16','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:17:11','2015-12-16 09:17:11'),(86,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"nhZr6ZyvTGyFP0wynp1ViLnBY9G8Ckqy7IXNO98d\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:17:12','2015-12-16 09:17:12'),(87,'','admin/posts/edit/17','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:17:12','2015-12-16 09:17:12'),(88,'','admin/posts/create','App\\Http\\Controllers\\AdminPanel\\PostsController@postCreate','{\"_token\":\"nhZr6ZyvTGyFP0wynp1ViLnBY9G8Ckqy7IXNO98d\",\"title_en\":\"Title\",\"title_ee\":\"\",\"title_lv\":\"\",\"title_lt\":\"\",\"title_ru\":\"\",\"description_en\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ip',NULL,'2015-12-16 09:17:14','2015-12-16 09:17:14'),(89,'','admin/posts/edit/18','App\\Http\\Controllers\\AdminPanel\\PostsController@getEdit','[]',NULL,'2015-12-16 09:17:14','2015-12-16 09:17:14');
/*!40000 ALTER TABLE `route_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sql_log`
--

DROP TABLE IF EXISTS `sql_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sql_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sql_log`
--

LOCK TABLES `sql_log` WRITE;
/*!40000 ALTER TABLE `sql_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `sql_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `device_id` int(10) unsigned NOT NULL,
  `client_ip` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_robot` tinyint(4) NOT NULL,
  `route_id` int(10) unsigned NOT NULL,
  `sql_query_id` int(10) unsigned NOT NULL,
  `error_type` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `device_id` (`device_id`),
  KEY `route_id` (`route_id`),
  KEY `sql_query_id` (`sql_query_id`),
  CONSTRAINT `user_log_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices_log` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_log_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `route_log` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_log`
--

LOCK TABLES `user_log` WRITE;
/*!40000 ALTER TABLE `user_log` DISABLE KEYS */;
INSERT INTO `user_log` VALUES (1,'',1,1,'::1',0,1,0,0,NULL,'2015-12-16 08:54:15','2015-12-16 08:54:15'),(2,'',1,1,'::1',0,2,0,0,NULL,'2015-12-16 08:54:22','2015-12-16 08:54:22'),(3,'',1,1,'::1',0,3,0,0,NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(4,'',1,1,'::1',0,4,0,0,NULL,'2015-12-16 08:54:26','2015-12-16 08:54:26'),(5,'',1,1,'::1',0,5,0,0,NULL,'2015-12-16 08:54:30','2015-12-16 08:54:30'),(6,'',1,1,'::1',0,6,0,0,NULL,'2015-12-16 08:54:31','2015-12-16 08:54:31'),(7,'',1,1,'::1',0,7,0,0,NULL,'2015-12-16 08:54:35','2015-12-16 08:54:35'),(8,'',1,1,'::1',0,8,0,0,NULL,'2015-12-16 08:54:57','2015-12-16 08:54:57'),(9,'',1,1,'::1',0,9,0,0,NULL,'2015-12-16 08:54:57','2015-12-16 08:54:57'),(10,'',1,1,'::1',0,10,0,0,NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(11,'',1,1,'::1',0,11,0,0,NULL,'2015-12-16 08:56:04','2015-12-16 08:56:04'),(12,'',1,1,'::1',0,12,0,0,NULL,'2015-12-16 08:57:19','2015-12-16 08:57:19'),(13,'',1,1,'::1',0,13,0,0,NULL,'2015-12-16 08:57:20','2015-12-16 08:57:20'),(14,'',1,1,'::1',0,14,0,0,NULL,'2015-12-16 08:57:42','2015-12-16 08:57:42'),(15,'',1,1,'::1',0,15,0,0,NULL,'2015-12-16 08:57:43','2015-12-16 08:57:43'),(16,'',1,1,'::1',0,16,0,0,NULL,'2015-12-16 08:58:19','2015-12-16 08:58:19'),(17,'',1,1,'::1',0,17,0,0,NULL,'2015-12-16 08:58:20','2015-12-16 08:58:20'),(18,'',1,1,'::1',0,18,0,0,NULL,'2015-12-16 08:58:49','2015-12-16 08:58:49'),(19,'',1,1,'::1',0,19,0,0,NULL,'2015-12-16 08:58:49','2015-12-16 08:58:49'),(20,'',1,1,'::1',0,20,0,0,NULL,'2015-12-16 08:59:14','2015-12-16 08:59:14'),(21,'',1,1,'::1',0,21,0,0,NULL,'2015-12-16 08:59:22','2015-12-16 08:59:22'),(22,'',1,1,'::1',0,22,0,0,NULL,'2015-12-16 09:01:09','2015-12-16 09:01:09'),(23,'',1,1,'::1',0,23,0,0,NULL,'2015-12-16 09:01:10','2015-12-16 09:01:10'),(24,'',1,1,'::1',0,24,0,0,NULL,'2015-12-16 09:01:13','2015-12-16 09:01:13'),(25,'',1,1,'::1',0,25,0,0,NULL,'2015-12-16 09:09:30','2015-12-16 09:09:30'),(26,'',1,1,'::1',0,26,0,0,NULL,'2015-12-16 09:09:55','2015-12-16 09:09:55'),(27,'',1,1,'::1',0,27,0,0,NULL,'2015-12-16 09:09:56','2015-12-16 09:09:56'),(28,'',1,1,'::1',0,28,0,0,NULL,'2015-12-16 09:10:00','2015-12-16 09:10:00'),(29,'',1,1,'::1',0,29,0,0,NULL,'2015-12-16 09:10:01','2015-12-16 09:10:01'),(30,'',1,1,'::1',0,30,0,0,NULL,'2015-12-16 09:10:10','2015-12-16 09:10:10'),(31,'',1,1,'::1',0,31,0,0,NULL,'2015-12-16 09:10:11','2015-12-16 09:10:11'),(32,'',1,1,'::1',0,32,0,0,NULL,'2015-12-16 09:10:53','2015-12-16 09:10:53'),(33,'',1,1,'::1',0,33,0,0,NULL,'2015-12-16 09:11:00','2015-12-16 09:11:00'),(34,'',1,1,'::1',0,34,0,0,NULL,'2015-12-16 09:11:01','2015-12-16 09:11:01'),(35,'',1,1,'::1',0,35,0,0,NULL,'2015-12-16 09:11:02','2015-12-16 09:11:02'),(36,'',1,1,'::1',0,36,0,0,NULL,'2015-12-16 09:11:37','2015-12-16 09:11:37'),(37,'',1,1,'::1',0,37,0,0,NULL,'2015-12-16 09:11:37','2015-12-16 09:11:37'),(38,'',1,1,'::1',0,38,0,0,NULL,'2015-12-16 09:11:39','2015-12-16 09:11:39'),(39,'',1,1,'::1',0,39,0,0,NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(40,'',1,1,'::1',0,40,0,0,NULL,'2015-12-16 09:11:41','2015-12-16 09:11:41'),(41,'',1,1,'::1',0,41,0,0,NULL,'2015-12-16 09:11:50','2015-12-16 09:11:50'),(42,'',1,1,'::1',0,42,0,0,NULL,'2015-12-16 09:11:55','2015-12-16 09:11:55'),(43,'',1,1,'::1',0,43,0,0,NULL,'2015-12-16 09:12:01','2015-12-16 09:12:01'),(44,'',1,1,'::1',0,44,0,0,NULL,'2015-12-16 09:12:29','2015-12-16 09:12:29'),(45,'',1,1,'::1',0,45,0,0,NULL,'2015-12-16 09:12:32','2015-12-16 09:12:32'),(46,'',1,1,'::1',0,46,0,0,NULL,'2015-12-16 09:12:36','2015-12-16 09:12:36'),(47,'',1,1,'::1',0,47,0,0,NULL,'2015-12-16 09:12:40','2015-12-16 09:12:40'),(48,'',1,1,'::1',0,48,0,0,NULL,'2015-12-16 09:12:41','2015-12-16 09:12:41'),(49,'',1,1,'::1',0,49,0,0,NULL,'2015-12-16 09:12:42','2015-12-16 09:12:42'),(50,'',1,1,'::1',0,50,0,0,NULL,'2015-12-16 09:13:08','2015-12-16 09:13:08'),(51,'',1,1,'::1',0,51,0,0,NULL,'2015-12-16 09:13:08','2015-12-16 09:13:08'),(52,'',1,1,'::1',0,52,0,0,NULL,'2015-12-16 09:13:09','2015-12-16 09:13:09'),(53,'',1,1,'::1',0,53,0,0,NULL,'2015-12-16 09:13:10','2015-12-16 09:13:10'),(54,'',1,1,'::1',0,54,0,0,NULL,'2015-12-16 09:13:11','2015-12-16 09:13:11'),(55,'',1,1,'::1',0,55,0,0,NULL,'2015-12-16 09:13:12','2015-12-16 09:13:12'),(56,'',1,1,'::1',0,56,0,0,NULL,'2015-12-16 09:13:21','2015-12-16 09:13:21'),(57,'',1,1,'::1',0,57,0,0,NULL,'2015-12-16 09:13:23','2015-12-16 09:13:23'),(58,'',1,1,'::1',0,58,0,0,NULL,'2015-12-16 09:13:28','2015-12-16 09:13:28'),(59,'',1,1,'::1',0,59,0,0,NULL,'2015-12-16 09:13:31','2015-12-16 09:13:31'),(60,'',1,1,'::1',0,60,0,0,NULL,'2015-12-16 09:13:32','2015-12-16 09:13:32'),(61,'',1,1,'::1',0,61,0,0,NULL,'2015-12-16 09:14:44','2015-12-16 09:14:44'),(62,'',1,1,'::1',0,62,0,0,NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(63,'',1,1,'::1',0,63,0,0,NULL,'2015-12-16 09:14:45','2015-12-16 09:14:45'),(64,'',1,1,'::1',0,64,0,0,NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(65,'',1,1,'::1',0,65,0,0,NULL,'2015-12-16 09:14:46','2015-12-16 09:14:46'),(66,'',1,1,'::1',0,66,0,0,NULL,'2015-12-16 09:14:47','2015-12-16 09:14:47'),(67,'',1,1,'::1',0,67,0,0,NULL,'2015-12-16 09:15:04','2015-12-16 09:15:04'),(68,'',1,1,'::1',0,68,0,0,NULL,'2015-12-16 09:15:08','2015-12-16 09:15:08'),(69,'',1,1,'::1',0,69,0,0,NULL,'2015-12-16 09:15:09','2015-12-16 09:15:09'),(70,'',1,1,'::1',0,70,0,0,NULL,'2015-12-16 09:15:10','2015-12-16 09:15:10'),(71,'',1,1,'::1',0,71,0,0,NULL,'2015-12-16 09:15:50','2015-12-16 09:15:50'),(72,'',1,1,'::1',0,72,0,0,NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(73,'',1,1,'::1',0,73,0,0,NULL,'2015-12-16 09:15:51','2015-12-16 09:15:51'),(74,'',1,1,'::1',0,74,0,0,NULL,'2015-12-16 09:15:52','2015-12-16 09:15:52'),(75,'',1,1,'::1',0,75,0,0,NULL,'2015-12-16 09:16:06','2015-12-16 09:16:06'),(76,'',1,1,'::1',0,76,0,0,NULL,'2015-12-16 09:16:07','2015-12-16 09:16:07'),(77,'',1,1,'::1',0,78,0,1,NULL,'2015-12-16 09:16:26','2015-12-16 09:16:26'),(78,'',1,1,'::1',0,79,0,0,NULL,'2015-12-16 09:16:28','2015-12-16 09:16:28'),(79,'',1,1,'::1',0,80,0,0,NULL,'2015-12-16 09:16:32','2015-12-16 09:16:32'),(80,'',1,1,'::1',0,81,0,0,NULL,'2015-12-16 09:16:38','2015-12-16 09:16:38'),(81,'',1,1,'::1',0,82,0,0,NULL,'2015-12-16 09:16:40','2015-12-16 09:16:40'),(82,'',1,1,'::1',0,83,0,0,NULL,'2015-12-16 09:16:42','2015-12-16 09:16:42'),(83,'',1,1,'::1',0,84,0,0,NULL,'2015-12-16 09:17:10','2015-12-16 09:17:10'),(84,'',1,1,'::1',0,85,0,0,NULL,'2015-12-16 09:17:11','2015-12-16 09:17:11'),(85,'',1,1,'::1',0,86,0,0,NULL,'2015-12-16 09:17:12','2015-12-16 09:17:12'),(86,'',1,1,'::1',0,87,0,0,NULL,'2015-12-16 09:17:13','2015-12-16 09:17:13'),(87,'',1,1,'::1',0,88,0,0,NULL,'2015-12-16 09:17:14','2015-12-16 09:17:14'),(88,'',1,1,'::1',0,89,0,0,NULL,'2015-12-16 09:17:15','2015-12-16 09:17:15');
/*!40000 ALTER TABLE `user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `role_group` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `role_group` (`role_group`),
  CONSTRAINT `users_role_group_foreign` FOREIGN KEY (`role_group`) REFERENCES `users_role` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Alban','Mulaki','','albanm','$2y$10$wzsCSpOQAr9DWw8o5q410u4P7xJ.2Q4r8bIoHEZgL67wmm260Sqya',2,NULL,'2015-12-16 08:48:54','2015-12-16 08:48:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_role`
--

DROP TABLE IF EXISTS `users_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_role`
--

LOCK TABLES `users_role` WRITE;
/*!40000 ALTER TABLE `users_role` DISABLE KEYS */;
INSERT INTO `users_role` VALUES (1,'Administrator',NULL,'2015-12-16 08:48:53','2015-12-16 08:48:53'),(2,'Super Administrator',NULL,'2015-12-16 08:48:53','2015-12-16 08:48:53'),(3,'Moderator',NULL,'2015-12-16 08:48:53','2015-12-16 08:48:53');
/*!40000 ALTER TABLE `users_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-17 15:04:30
