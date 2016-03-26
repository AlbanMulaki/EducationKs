-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Linux (i686)
--
-- Host: localhost    Database: educationks
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertising`
--

LOCK TABLES `advertising` WRITE;
/*!40000 ALTER TABLE `advertising` DISABLE KEYS */;
INSERT INTO `advertising` VALUES (1,'ADS 1','2016-12-01 05:40:05',0,1,'<div id=\"ad\">\n    <div class=\"smartad_header\" id=\"smad_parent2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\"\n         style=\n         \"border: none; padding: 0px; margin: 0px; clear: both; position: relative; height: 200px; width: auto; text-align: center; min-width: 1000px; z-index: 5000;\">\n        <div id=\"smad_outer_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" style=\n             \"position: absolute; display: block; visibility: visible; z-index: 5000; left: 50%; margin-left: -500px; top: 0px; width: 1000px; height: 200px; overflow: hidden;\">\n            <div id=\"cb_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" onmouseout=\n                 \\\"javascript:smartad_set_attribute(\"2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\", \\\"switching\\\", true);\\\"\n                 onmouseover=\n                 \"javascript:smartad_set_attribute(\"2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\", \"switching\", false);\"\n                 style=\n                 \"height: 21px; width: 21px; z-index: 10000; position: absolute; cursor: pointer; display: block; top: 0px; right: 0px; visibility: visible;\">\n                <img id=\"cb_inner_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" onclick=\n                     \"javascript:smartad_close( & quot; 2231cbac - 0db7 - 482f - 9862 - 7339f4ba057ea4f11a7e - 5bc9 - 41fa - 8d96 - ddc2fb8a9861 & quot; );\"\n                     src=\"http://static.bepolite.eu/files/close-gray.png\" style=\n                     \"border: none; width: 100%; height: 100%; z-index: 999999; display: block; position: relative;\">\n            </div>\n\n\n            <div id=\"smad_first2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" style=\n                 \"width: 1000px; height: 200px; position: relative; top: 0px;\">\n                <iframe frameborder=\"0\" height=\"100%\" id=\n                        \"adFrame2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\" marginheight=\"0\"\n                        marginwidth=\"0\" name=\"adFrame2231cbac-0db7-482f-9862-7339f4ba057ea4f11a7e-5bc9-41fa-8d96-ddc2fb8a9861\"\n                        scrolling=\"no\" src=\n                        \"//static.bepolite.eu/banners/4567d125-a325-4ae9-980e-fd59617c2aa4/index.html?banner_id=2231cbac0db7482f98627339f4ba057ea4f11a7e5bc941fa8d96ddc2fb8a9861&click_url=http%3A%2F%2Fserving.bepolite.eu%2Fevent%3Fkey%3DFYFWuDany3hwv6rfuoAYF3UCxdtOgd6BqdzvjEMozjV4kCGZ4-LS_eXL9wQ4dQJ9YHbIeLaqPzaXgLON-pkr4fck3f9NVwWAarg1V_1FnEYaNXXLNDrLDskw5bo6Xk6XNerWaFJBxOHF80MLreabQY3hwFDFEtRfZQ9xFhWEE937ZQODPXD-DDNEiFFI27mquuE-fYOoOEu5vptoK4sVDL_5TZeTu2kuOoTGiO__1Gm_cH8q-baKEEND8KSCsor_n0hq-maDCC-g5FOsGfF30-XkiClAAAbsscsavBVsfIXa5hY8OvOxWaQQS9P0iYfnngZXtFEp1ljuqs475VAp1Q%26&dynamic_url=http%3A%2F%2Fserving.bepolite.eu%2Fevent%3Fkey%3DFYFWuDany3hwv6rfuoAYF3UCxdtOgd6BqdzvjEMozjV4kCGZ4-LS_eXL9wQ4dQJ9YHbIeLaqPzaXgLON-pkr4fck3f9NVwWAarg1V_1FnEYaNXXLNDrLDskw5bo6Xk6XNerWaFJBxOHF80MLreabQY3hwFDFEtRfZQ9xFhWEE937ZQODPXD-DDNEiFFI27mquuE-fYOoOEu5vptoK4sVDL_5TZeTu2kuOoTGiO__1Gm_cH8q-baKEEND8KSCsor_n0hq-maDCC-g5FOsGfF30-XkiClAAAbsscsavBVsfIXa5hY8OvOxWaQQS9P0iYfnngZXtFEp1ljuqs475VAp1Q%26clink%3D\"\n                        style=\"height: 200px; width: 1000px;\" width=\"100%\"></iframe>\n            </div>\n        </div>\n    </div>\n</div>',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(2,'ADS 2','2016-12-01 05:40:05',0,1,'<script src=\"./index_files/ca-pub-2205536736208325.js\"></script><script src=\"./index_files/display.php\" type=\"text/javascript\">\n    </script><!-- WARNING : SWF FILES THAT ARE ACCESSED BY URL WILL BE DELETED, SWF FILES ABUSING SYSTEM RESOURCES WILL BE DELETED -->\n    <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0\" width=\"160\" height=\"600\">\n        <param name=\"movie\" value=\"http://h2.flashvortex.com/files/23/2_1448302664_8829_693_0_160_600_10_2_23.swf\">\n        <param name=\"quality\" value=\"best\">\n        <param name=\"menu\" value=\"true\">\n        <param name=\"allowScriptAccess\" value=\"always\">\n        <embed src=\"http://h2.flashvortex.com/files/23/2_1448302664_8829_693_0_160_600_10_2_23.swf\" quality=\"best\" menu=\"true\" width=\"160\" height=\"600\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" allowscriptaccess=\"always\">\n    </object>',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(3,'ADS 3','2016-12-01 05:40:05',0,1,'<a href=\"#\"><img src=\"assets/img/300x250.png\"  width=\"300\" height=\"250\" border=\"0\"/></a>',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(4,'ADS 4','2016-12-01 05:40:05',0,1,'<a href=\"#\"><img src=\"assets/img/300x250.png\"  width=\"300\" height=\"250\" border=\"0\"/></a>',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(5,'ADS 5','2016-12-01 05:40:05',0,1,'<a href=\"#\"><img src=\"assets/img/300x250.png\"  width=\"300\" height=\"250\" border=\"0\"/></a>',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(6,'ADS 6','2016-12-01 05:40:05',0,1,'<a href=\"#\"><img src=\"assets/img/300x250.png\"  width=\"300\" height=\"250\" border=\"0\"/></a>',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43');
/*!40000 ALTER TABLE `advertising` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `autonet_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachment`
--

LOCK TABLES `attachment` WRITE;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_image` (`feature_image`),
  KEY `sub_category` (`sub_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_album`
--

DROP TABLE IF EXISTS `gallery_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_album_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_album_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_album`
--

LOCK TABLES `gallery_album` WRITE;
/*!40000 ALTER TABLE `gallery_album` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_image`
--

DROP TABLE IF EXISTS `gallery_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attachment_id` int(10) unsigned NOT NULL,
  `album_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_image_album_id_foreign` (`album_id`),
  KEY `gallery_image_attachment_id_foreign` (`attachment_id`),
  CONSTRAINT `gallery_image_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `gallery_album` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `gallery_image_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachment` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_image`
--

LOCK TABLES `gallery_image` WRITE;
/*!40000 ALTER TABLE `gallery_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_image` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
INSERT INTO `migrations` VALUES ('2015_12_14_113823_structure',1),('2015_12_18_091455_structure_v0_1',2),('2016_01_05_073952_structure_v0_3',3);
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'Autopub','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','autopub@dev','autopub.dev','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','','','','','','','',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43');
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
  `title_ee` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_lv` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_lt` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ru` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_lv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_lt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_image` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_lv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_category_id_foreign` (`category_id`),
  KEY `post_feature_image_foreign` (`feature_image`),
  CONSTRAINT `post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_feature_image_foreign` FOREIGN KEY (`feature_image`) REFERENCES `gallery_image` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
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
  `gallery_image_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort_index` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_image_post_id_foreign` (`post_id`),
  KEY `post_image_gallery_image_id_foreign` (`gallery_image_id`),
  CONSTRAINT `post_image_gallery_image_id_foreign` FOREIGN KEY (`gallery_image_id`) REFERENCES `gallery_image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
INSERT INTO `users` VALUES (1,'Alban','Mulaki','','albanm','$2y$10$jyEyo/HGbgKBzXpYc.5zduC.kjFQB9Z8zCtN.gEcbAlsPWo0OJRHK',2,NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43','');
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_role`
--

LOCK TABLES `users_role` WRITE;
/*!40000 ALTER TABLE `users_role` DISABLE KEYS */;
INSERT INTO `users_role` VALUES (1,'Administrator',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(2,'Super Administrator',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(3,'Moderator',NULL,'2016-03-25 22:49:43','2016-03-25 22:49:43'),(4,'Editor',NULL,'2016-03-25 22:50:36','2016-03-25 22:50:36'),(5,'Editor English',NULL,'2016-03-25 22:50:36','2016-03-25 22:50:36'),(6,'Editor Estonian',NULL,'2016-03-25 22:50:36','2016-03-25 22:50:36'),(7,'Editor Russian',NULL,'2016-03-25 22:50:36','2016-03-25 22:50:36'),(8,'Editor Lithuania',NULL,'2016-03-25 22:50:36','2016-03-25 22:50:36'),(9,'Editor Latvia',NULL,'2016-03-25 22:50:36','2016-03-25 22:50:36');
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

-- Dump completed on 2016-03-26  1:36:02
