-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: hrms
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abroads`
--

DROP TABLE IF EXISTS `abroads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abroads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_success_fail` tinyint(1) DEFAULT '0',
  `training_success_count` text COLLATE utf8mb4_unicode_ci,
  `sponser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meet_with` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` int NOT NULL,
  `actual_abroad_date` date DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abroads_staff_id_foreign` (`staff_id`),
  KEY `abroads_country_id_foreign` (`country_id`),
  CONSTRAINT `abroads_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `abroads_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abroads`
--

LOCK TABLES `abroads` WRITE;
/*!40000 ALTER TABLE `abroads` DISABLE KEYS */;
/*!40000 ALTER TABLE `abroads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `award_types`
--

DROP TABLE IF EXISTS `award_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `award_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `award_types`
--

LOCK TABLES `award_types` WRITE;
/*!40000 ALTER TABLE `award_types` DISABLE KEYS */;
INSERT INTO `award_types` VALUES (1,'သုဓမ္မသင်္ဂဟဘွဲ့များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'ပြည်ထောင်စုစည်သူသင်္ဂဟဘွဲ့များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'တပ်မတော်ဆိုင်ရာစွမ်းရည်သတ္တိနှင့် စွမ်းဆောင်မှုဆိုင်ရာ ဂုဏ်ထူးဆောင်တံဆိပ်များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'မြန်မာနိုင်ငံရဲတပ်ဖွဲ့ဆိုင်ရာ စွမ်းရည်သတ္တိနှင့် စွမ်းဆောင်မှုဆိုင်ရာ ဂုဏ်ထူးဆောင်တံဆိပ်များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'ပြည်သူ့ဝန်ထမ်းဆိုင်ရာစွမ်းဆောင်မှုတံဆိပ်များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'စီးပွားထူးချွန်တံဆိပ်များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'ပညာရပ်ဆိုင်ရာထူးချွန်တံဆိပ်များ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'အခြားဘွဲ့ထူး/ဂုဏ်ထူး/တံဆိပ်များ','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `award_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `awardings`
--

DROP TABLE IF EXISTS `awardings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `awardings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `award_type_id` bigint unsigned DEFAULT NULL,
  `award_id` bigint unsigned DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `awardings_staff_id_foreign` (`staff_id`),
  KEY `awardings_award_type_id_foreign` (`award_type_id`),
  KEY `awardings_award_id_foreign` (`award_id`),
  CONSTRAINT `awardings_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`id`) ON DELETE SET NULL,
  CONSTRAINT `awardings_award_type_id_foreign` FOREIGN KEY (`award_type_id`) REFERENCES `award_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `awardings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `awardings`
--

LOCK TABLES `awardings` WRITE;
/*!40000 ALTER TABLE `awardings` DISABLE KEYS */;
INSERT INTO `awardings` VALUES (2,3,8,28,'၁/၂၀၁၃','2013-04-01','-','2024-11-22 02:28:02','2024-11-22 02:28:02');
/*!40000 ALTER TABLE `awardings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `awards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint unsigned DEFAULT NULL,
  `award_type_id` bigint unsigned DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `awards_staff_id_foreign` (`staff_id`),
  KEY `awards_award_type_id_foreign` (`award_type_id`),
  CONSTRAINT `awards_award_type_id_foreign` FOREIGN KEY (`award_type_id`) REFERENCES `award_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `awards_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `awards`
--

LOCK TABLES `awards` WRITE;
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
INSERT INTO `awards` VALUES (1,'အဂ္ဂမဟာသီရိသုဓမ္မဘွဲ့',NULL,1,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'သတိုးသီရိသုဓမ္မဘွဲ့',NULL,1,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'မဟာသီရိသုဓမ္မဘွဲ့',NULL,1,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'အဂ္ဂမဟာသရေစည်သူဘွဲ့',NULL,2,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'သတိုးမဟာသရေစည်သူဘွဲ့',NULL,2,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'မဟာသရေစည်သူဘွဲ့',NULL,2,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'သရေစည်သူဘွဲ့',NULL,2,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'စည်သူဘွဲ့',NULL,2,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(9,'အောင်ဆန်းတံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(10,'သီဟဗလတံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(11,'သူရဲကောင်းမှတ်တမ်းဝင်တံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(12,'မြန်မာနိုင်ငံစစ်မှုထမ်းသင်္ဂတံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(13,'စစ်မှုထမ်းကောင်းတံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(14,'ပြည်သူ့သားကောင်းတံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(15,'နိုင်ငံတော်စစ်မှုထမ်းတံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(16,'ပြည်ပရန်နှိမ်တံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(17,'ပြည်သူ့စစ်တိုက်ပွဲဝင်တံဆိပ်',NULL,3,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(18,'ရဲသီဟတံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(19,'ရဲသူရတံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(20,'ရဲဗလတံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(21,'ရဲသူရိန်တံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(22,'ရဲကျော်စွာတံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(23,'ရဲကျော်သူတံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(24,'ရဲမှုထမ်းကောင်းတံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(25,'မြန်မာနိုင်ငံရဲပူးတွဲတိုက်ပွဲဝင်တံဆိပ်',NULL,4,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(26,'ပြည်သူ့ဝန်ထမ်းကောင်းတံဆိပ်',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(27,'ပြည်သူ့ဝန်ထမ်းတံဆိပ်',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(28,'ငြိမ်ဝပ်ပိပြားရေးနှင့် တရားဥပဒေစိုးမိုးရေးတံဆိပ်',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(29,'နိုင်ငံတော်အေးချမ်းသာယာရေးတံဆိပ်',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(30,'စီမံထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(31,'စီမံထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(32,'စီမံထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(33,'လူမှုထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(34,'လူမှုထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(35,'လူမှုထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,5,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(36,'လယ်ယာစီးပွားထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(37,'လယ်ယာစီးပွားထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(38,'လယ်ယာစီးပွားထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(39,'စက်မှုစီးပွားထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(40,'စက်မှုစီးပွားထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(41,'စက်မှုစီးပွားထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(42,'ကုန်သွယ်စီးပွားထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(43,'ကုန်သွယ်စီးပွားထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(44,'ကုန်သွယ်စီးပွားထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(45,'ဝန်ဆောင်စီးပွားထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(46,'ဝန်ဆောင်စီးပွားထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(47,'ဝန်ဆောင်စီးပွားထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,6,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(48,'သိပ္ပံပညာထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(49,'သိပ္ပံပညာထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(50,'သိပ္ပံပညာထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(51,'ဝိဇ္ဇာပညာထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(52,'ဝိဇ္ဇာပညာထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(53,'ဝိဇ္ဇာပညာထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(54,'ဆေးပညာထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(55,'ဆေးပညာထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(56,'ဆေးပညာထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(57,'နည်းပညာထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(58,'နည်းပညာထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(59,'နည်းပညာထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(60,'အနုပညာထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(61,'အနုပညာထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(62,'အနုပညာထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(63,'စာပေပညာထူးချွန်တံဆိပ်(ပထမဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(64,'စာပေပညာထူးချွန်တံဆိပ်(ဒုတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(65,'စာပေပညာထူးချွန်တံဆိပ်(တတိယဆင့်)',NULL,7,NULL,NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood_types`
--

DROP TABLE IF EXISTS `blood_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blood_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_types`
--

LOCK TABLES `blood_types` WRITE;
/*!40000 ALTER TABLE `blood_types` DISABLE KEYS */;
INSERT INTO `blood_types` VALUES (1,'A','2024-11-22 01:11:57','2024-11-22 01:11:57'),(2,'B','2024-11-22 01:11:58','2024-11-22 01:11:58'),(3,'AB','2024-11-22 01:11:58','2024-11-22 01:11:58'),(4,'O','2024-11-22 01:11:58','2024-11-22 01:11:58');
/*!40000 ALTER TABLE `blood_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('77de68daecd823babbb58edb1c8e14d7106e83bb','i:1;',1732870963),('77de68daecd823babbb58edb1c8e14d7106e83bb:timer','i:1732870963;',1732870963);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `childrens`
--

DROP TABLE IF EXISTS `childrens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `childrens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `childrens_staff_id_foreign` (`staff_id`),
  KEY `childrens_ethnic_id_foreign` (`ethnic_id`),
  KEY `childrens_religion_id_foreign` (`religion_id`),
  KEY `childrens_gender_id_foreign` (`gender_id`),
  KEY `childrens_relation_id_foreign` (`relation_id`),
  CONSTRAINT `childrens_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `childrens_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `childrens_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `childrens_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `childrens_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `childrens`
--

LOCK TABLES `childrens` WRITE;
/*!40000 ALTER TABLE `childrens` DISABLE KEYS */;
/*!40000 ALTER TABLE `childrens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(2,'Albania','2024-11-21 23:46:48','2024-11-21 23:46:48'),(3,'Algeria','2024-11-21 23:46:48','2024-11-21 23:46:48'),(4,'Andorra','2024-11-21 23:46:48','2024-11-21 23:46:48'),(5,'Angola','2024-11-21 23:46:48','2024-11-21 23:46:48'),(6,'Antigua and Barbuda','2024-11-21 23:46:48','2024-11-21 23:46:48'),(7,'Argentina','2024-11-21 23:46:48','2024-11-21 23:46:48'),(8,'Armenia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(9,'Australia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(10,'Austria','2024-11-21 23:46:48','2024-11-21 23:46:48'),(11,'Azerbaijan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(12,'Bahamas','2024-11-21 23:46:48','2024-11-21 23:46:48'),(13,'Bahrain','2024-11-21 23:46:48','2024-11-21 23:46:48'),(14,'Bangladesh','2024-11-21 23:46:48','2024-11-21 23:46:48'),(15,'Barbados','2024-11-21 23:46:48','2024-11-21 23:46:48'),(16,'Belarus','2024-11-21 23:46:48','2024-11-21 23:46:48'),(17,'Belgium','2024-11-21 23:46:48','2024-11-21 23:46:48'),(18,'Belize','2024-11-21 23:46:48','2024-11-21 23:46:48'),(19,'Benin','2024-11-21 23:46:48','2024-11-21 23:46:48'),(20,'Bhutan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(21,'Bolivia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(22,'Bosnia and Herzegovina','2024-11-21 23:46:48','2024-11-21 23:46:48'),(23,'Botswana','2024-11-21 23:46:48','2024-11-21 23:46:48'),(24,'Brazil','2024-11-21 23:46:48','2024-11-21 23:46:48'),(25,'Brunei','2024-11-21 23:46:48','2024-11-21 23:46:48'),(26,'Bulgaria','2024-11-21 23:46:48','2024-11-21 23:46:48'),(27,'Burkina Faso','2024-11-21 23:46:48','2024-11-21 23:46:48'),(28,'Burma / Myanmar','2024-11-21 23:46:48','2024-11-21 23:46:48'),(29,'Burundi','2024-11-21 23:46:48','2024-11-21 23:46:48'),(30,'Cambodia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(31,'Cameroon','2024-11-21 23:46:48','2024-11-21 23:46:48'),(32,'Canada','2024-11-21 23:46:48','2024-11-21 23:46:48'),(33,'Cape Verde','2024-11-21 23:46:48','2024-11-21 23:46:48'),(34,'Central African Republic','2024-11-21 23:46:48','2024-11-21 23:46:48'),(35,'Chad','2024-11-21 23:46:48','2024-11-21 23:46:48'),(36,'Chile','2024-11-21 23:46:48','2024-11-21 23:46:48'),(37,'China','2024-11-21 23:46:48','2024-11-21 23:46:48'),(38,'Colombia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(39,'Comoros','2024-11-21 23:46:48','2024-11-21 23:46:48'),(40,'Costa Rica','2024-11-21 23:46:48','2024-11-21 23:46:48'),(41,'Croatia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(42,'Cuba','2024-11-21 23:46:48','2024-11-21 23:46:48'),(43,'Cyprus','2024-11-21 23:46:48','2024-11-21 23:46:48'),(44,'Czech Republic','2024-11-21 23:46:48','2024-11-21 23:46:48'),(45,'Democratic Republic of Congo','2024-11-21 23:46:48','2024-11-21 23:46:48'),(46,'Denmark','2024-11-21 23:46:48','2024-11-21 23:46:48'),(47,'Djibouti','2024-11-21 23:46:48','2024-11-21 23:46:48'),(48,'Dominica','2024-11-21 23:46:48','2024-11-21 23:46:48'),(49,'Dominican Republic','2024-11-21 23:46:48','2024-11-21 23:46:48'),(50,'East Timor','2024-11-21 23:46:48','2024-11-21 23:46:48'),(51,'Ecuador','2024-11-21 23:46:48','2024-11-21 23:46:48'),(52,'Egypt','2024-11-21 23:46:48','2024-11-21 23:46:48'),(53,'El Salvador','2024-11-21 23:46:48','2024-11-21 23:46:48'),(54,'Equatorial Guinea','2024-11-21 23:46:48','2024-11-21 23:46:48'),(55,'Eritrea','2024-11-21 23:46:48','2024-11-21 23:46:48'),(56,'Estonia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(57,'Ethiopia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(58,'Fiji','2024-11-21 23:46:48','2024-11-21 23:46:48'),(59,'Finland','2024-11-21 23:46:48','2024-11-21 23:46:48'),(60,'France','2024-11-21 23:46:48','2024-11-21 23:46:48'),(61,'Gabon','2024-11-21 23:46:48','2024-11-21 23:46:48'),(62,'Gambia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(63,'Georgia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(64,'Germany','2024-11-21 23:46:48','2024-11-21 23:46:48'),(65,'Ghana','2024-11-21 23:46:48','2024-11-21 23:46:48'),(66,'Greece','2024-11-21 23:46:48','2024-11-21 23:46:48'),(67,'Grenada','2024-11-21 23:46:48','2024-11-21 23:46:48'),(68,'Guatemala','2024-11-21 23:46:48','2024-11-21 23:46:48'),(69,'Guinea','2024-11-21 23:46:48','2024-11-21 23:46:48'),(70,'Guinea-Bissau','2024-11-21 23:46:48','2024-11-21 23:46:48'),(71,'Guyana','2024-11-21 23:46:48','2024-11-21 23:46:48'),(72,'Haiti','2024-11-21 23:46:48','2024-11-21 23:46:48'),(73,'Honduras','2024-11-21 23:46:48','2024-11-21 23:46:48'),(74,'Hungary','2024-11-21 23:46:48','2024-11-21 23:46:48'),(75,'Iceland','2024-11-21 23:46:48','2024-11-21 23:46:48'),(76,'India','2024-11-21 23:46:48','2024-11-21 23:46:48'),(77,'Indonesia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(78,'Iran','2024-11-21 23:46:48','2024-11-21 23:46:48'),(79,'Iraq','2024-11-21 23:46:48','2024-11-21 23:46:48'),(80,'Ireland','2024-11-21 23:46:48','2024-11-21 23:46:48'),(81,'Israel','2024-11-21 23:46:48','2024-11-21 23:46:48'),(82,'Italy','2024-11-21 23:46:48','2024-11-21 23:46:48'),(83,'Ivory Coast','2024-11-21 23:46:48','2024-11-21 23:46:48'),(84,'Jamaica','2024-11-21 23:46:48','2024-11-21 23:46:48'),(85,'Japan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(86,'Jordan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(87,'Kazakhstan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(88,'Kenya','2024-11-21 23:46:48','2024-11-21 23:46:48'),(89,'Kiribati','2024-11-21 23:46:48','2024-11-21 23:46:48'),(90,'Kuwait','2024-11-21 23:46:48','2024-11-21 23:46:48'),(91,'Kyrgyzstan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(92,'Laos','2024-11-21 23:46:48','2024-11-21 23:46:48'),(93,'Latvia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(94,'Lebanon','2024-11-21 23:46:48','2024-11-21 23:46:48'),(95,'Lesotho','2024-11-21 23:46:48','2024-11-21 23:46:48'),(96,'Liberia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(97,'Libya','2024-11-21 23:46:48','2024-11-21 23:46:48'),(98,'Liechtenstein','2024-11-21 23:46:48','2024-11-21 23:46:48'),(99,'Lithuania','2024-11-21 23:46:48','2024-11-21 23:46:48'),(100,'Luxembourg','2024-11-21 23:46:48','2024-11-21 23:46:48'),(101,'Madagascar','2024-11-21 23:46:48','2024-11-21 23:46:48'),(102,'Malawi','2024-11-21 23:46:48','2024-11-21 23:46:48'),(103,'Malaysia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(104,'Maldives','2024-11-21 23:46:48','2024-11-21 23:46:48'),(105,'Mali','2024-11-21 23:46:48','2024-11-21 23:46:48'),(106,'Malta','2024-11-21 23:46:48','2024-11-21 23:46:48'),(107,'Marshall Islands','2024-11-21 23:46:48','2024-11-21 23:46:48'),(108,'Mauricio','2024-11-21 23:46:48','2024-11-21 23:46:48'),(109,'Mauritania','2024-11-21 23:46:48','2024-11-21 23:46:48'),(110,'Mexico','2024-11-21 23:46:48','2024-11-21 23:46:48'),(111,'Micronesia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(112,'Moldova','2024-11-21 23:46:48','2024-11-21 23:46:48'),(113,'Monaco','2024-11-21 23:46:48','2024-11-21 23:46:48'),(114,'Mongolia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(115,'Montenegro','2024-11-21 23:46:48','2024-11-21 23:46:48'),(116,'Morocco','2024-11-21 23:46:48','2024-11-21 23:46:48'),(117,'Mozambique','2024-11-21 23:46:48','2024-11-21 23:46:48'),(118,'Namibia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(119,'Nauru','2024-11-21 23:46:48','2024-11-21 23:46:48'),(120,'Nepal','2024-11-21 23:46:48','2024-11-21 23:46:48'),(121,'Netherlands','2024-11-21 23:46:48','2024-11-21 23:46:48'),(122,'New Zealand','2024-11-21 23:46:48','2024-11-21 23:46:48'),(123,'Nicaragua','2024-11-21 23:46:48','2024-11-21 23:46:48'),(124,'Niger','2024-11-21 23:46:48','2024-11-21 23:46:48'),(125,'Nigeria','2024-11-21 23:46:48','2024-11-21 23:46:48'),(126,'North Korea','2024-11-21 23:46:48','2024-11-21 23:46:48'),(127,'Norway','2024-11-21 23:46:48','2024-11-21 23:46:48'),(128,'Oman','2024-11-21 23:46:48','2024-11-21 23:46:48'),(129,'Pakistan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(130,'Palau','2024-11-21 23:46:48','2024-11-21 23:46:48'),(131,'Panama','2024-11-21 23:46:48','2024-11-21 23:46:48'),(132,'Papua New Guinea','2024-11-21 23:46:48','2024-11-21 23:46:48'),(133,'Paraguay','2024-11-21 23:46:48','2024-11-21 23:46:48'),(134,'Peru','2024-11-21 23:46:48','2024-11-21 23:46:48'),(135,'Philippines','2024-11-21 23:46:48','2024-11-21 23:46:48'),(136,'Poland','2024-11-21 23:46:48','2024-11-21 23:46:48'),(137,'Portugal','2024-11-21 23:46:48','2024-11-21 23:46:48'),(138,'Qatar','2024-11-21 23:46:48','2024-11-21 23:46:48'),(139,'Republic of Macedonia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(140,'Republic of the Congo','2024-11-21 23:46:48','2024-11-21 23:46:48'),(141,'Romania','2024-11-21 23:46:48','2024-11-21 23:46:48'),(142,'Russia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(143,'Rwanda','2024-11-21 23:46:48','2024-11-21 23:46:48'),(144,'Saint Kitts and Nevis','2024-11-21 23:46:48','2024-11-21 23:46:48'),(145,'Samoa','2024-11-21 23:46:48','2024-11-21 23:46:48'),(146,'San Marino','2024-11-21 23:46:48','2024-11-21 23:46:48'),(147,'Sao Tome and Principe','2024-11-21 23:46:48','2024-11-21 23:46:48'),(148,'Saudi Arabia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(149,'Senegal','2024-11-21 23:46:48','2024-11-21 23:46:48'),(150,'Serbia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(151,'Seychelles','2024-11-21 23:46:48','2024-11-21 23:46:48'),(152,'Sierra Leone','2024-11-21 23:46:48','2024-11-21 23:46:48'),(153,'Singapore','2024-11-21 23:46:48','2024-11-21 23:46:48'),(154,'Slovakia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(155,'Slovenia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(156,'Solomon Islands','2024-11-21 23:46:48','2024-11-21 23:46:48'),(157,'Somalia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(158,'South Africa','2024-11-21 23:46:48','2024-11-21 23:46:48'),(159,'South Korea','2024-11-21 23:46:48','2024-11-21 23:46:48'),(160,'South Sudan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(161,'Spain','2024-11-21 23:46:48','2024-11-21 23:46:48'),(162,'Sri Lanka','2024-11-21 23:46:48','2024-11-21 23:46:48'),(163,'St. Lucia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(164,'St. Vincent and the Grenadines','2024-11-21 23:46:48','2024-11-21 23:46:48'),(165,'Sudan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(166,'Surinam','2024-11-21 23:46:48','2024-11-21 23:46:48'),(167,'Swaziland','2024-11-21 23:46:48','2024-11-21 23:46:48'),(168,'Sweden','2024-11-21 23:46:48','2024-11-21 23:46:48'),(169,'Switzerland','2024-11-21 23:46:48','2024-11-21 23:46:48'),(170,'Syria','2024-11-21 23:46:48','2024-11-21 23:46:48'),(171,'Tajikistan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(172,'Tanzania','2024-11-21 23:46:48','2024-11-21 23:46:48'),(173,'Thailand','2024-11-21 23:46:48','2024-11-21 23:46:48'),(174,'Togo','2024-11-21 23:46:48','2024-11-21 23:46:48'),(175,'Tonga','2024-11-21 23:46:48','2024-11-21 23:46:48'),(176,'Trinidad and Tobago','2024-11-21 23:46:48','2024-11-21 23:46:48'),(177,'Tunisia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(178,'Turkey','2024-11-21 23:46:48','2024-11-21 23:46:48'),(179,'Turkmenistan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(180,'Tuvalu','2024-11-21 23:46:48','2024-11-21 23:46:48'),(181,'Uganda','2024-11-21 23:46:48','2024-11-21 23:46:48'),(182,'Ukraine','2024-11-21 23:46:48','2024-11-21 23:46:48'),(183,'United Arab Emirates','2024-11-21 23:46:48','2024-11-21 23:46:48'),(184,'United Kingdom','2024-11-21 23:46:48','2024-11-21 23:46:48'),(185,'United States of America','2024-11-21 23:46:48','2024-11-21 23:46:48'),(186,'Uruguay','2024-11-21 23:46:48','2024-11-21 23:46:48'),(187,'Uzbekistan','2024-11-21 23:46:48','2024-11-21 23:46:48'),(188,'Vanuatu','2024-11-21 23:46:48','2024-11-21 23:46:48'),(189,'Vatican City','2024-11-21 23:46:48','2024-11-21 23:46:48'),(190,'Venezuela','2024-11-21 23:46:48','2024-11-21 23:46:48'),(191,'Vietnam','2024-11-21 23:46:48','2024-11-21 23:46:48'),(192,'Yemen','2024-11-21 23:46:48','2024-11-21 23:46:48'),(193,'Zambia','2024-11-21 23:46:48','2024-11-21 23:46:48'),(194,'Zimbabwe','2024-11-21 23:46:48','2024-11-21 23:46:48');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_or_months`
--

DROP TABLE IF EXISTS `day_or_months`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `day_or_months` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_or_months`
--

LOCK TABLES `day_or_months` WRITE;
/*!40000 ALTER TABLE `day_or_months` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_or_months` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depromotions`
--

DROP TABLE IF EXISTS `depromotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depromotions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `previous_rank_id` bigint unsigned DEFAULT NULL,
  `depromoted_rank_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `depromotions_previous_rank_id_foreign` (`previous_rank_id`),
  KEY `depromotions_depromoted_rank_id_foreign` (`depromoted_rank_id`),
  CONSTRAINT `depromotions_depromoted_rank_id_foreign` FOREIGN KEY (`depromoted_rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `depromotions_previous_rank_id_foreign` FOREIGN KEY (`previous_rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depromotions`
--

LOCK TABLES `depromotions` WRITE;
/*!40000 ALTER TABLE `depromotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `depromotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `difficulty_levels`
--

DROP TABLE IF EXISTS `difficulty_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `difficulty_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hardship_allowance` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `difficulty_levels`
--

LOCK TABLES `difficulty_levels` WRITE;
/*!40000 ALTER TABLE `difficulty_levels` DISABLE KEYS */;
INSERT INTO `difficulty_levels` VALUES (1,'easy',0,'2024-11-21 23:46:48','2024-11-21 23:46:48'),(2,'hard',5000,'2024-11-21 23:46:48','2024-11-21 23:46:48');
/*!40000 ALTER TABLE `difficulty_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `districts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_region_id_foreign` (`region_id`),
  CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,'လယ်ဝေး',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'ပျဥ်းမနား',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'ဥတ္တရ',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'ဇေယျာသီရိ',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'ပူတာအို',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'ဗန်းမော်',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'မိုးညှင်း',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(8,'မြစ်ကြီးနား',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(9,'တနိုင်း',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(10,'ချီဖွေ',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(11,'လွိုင်ကော်',3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(12,'ဒီးမော့ဆို',3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(13,'ဘောလခဲ',3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(14,'မယ်စဲ့',3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(15,'ကော့ကရိတ်',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(16,'ကြာအင်းဆိပ်ကြီး',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(17,'ဖာပွန်',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(18,'ဘားအံ',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(19,'သံတောင်ကြီး',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(20,'မြဝတီ',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(21,'ဖလမ်း',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(22,'တီးတိန်',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(23,'မတူပီ',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(24,'ပလက်ဝ',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(25,'မင်းတပ်',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(26,'ဟားခါး',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(27,'နာဂ ကိုယ်ပိုင်အုပ်ချုပ်ခွင့်ရဒေသ',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(28,'ကလေး',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(29,'ကသာ',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(30,'ကောလင်း',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(31,'ကန့်ဘလူ',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(32,'ခန္တီး',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(33,'ဟုမ္မလင်း',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(34,'စစ်ကိုင်း',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(35,'တမူး',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(36,'မုံရွာ',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(37,'မော်လိုက်',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(38,'ယင်းမာပြင်',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(39,'ရွှေဘို',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(40,'ရေဦး',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(41,'ကော့သောင်း',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(42,'ဘုတ်ပြင်း',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(43,'ထားဝယ်',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(44,'မြိတ်',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(45,'တောင်ငူ',8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(46,'ပဲခူး',8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(47,'ညောင်လေးပင်',8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(48,'ပြည်',8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(49,'သာယာဝတီ',8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(50,'နတ်တလင်း',8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(51,'ဂန့်ဂေါ',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(52,'ပခုက္ကူ',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(53,'မကွေး',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(54,'ချောက်',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(55,'မင်းဘူး',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(56,'သရက်',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(57,'အောင်လံ',9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(58,'ကျောက်ဆည်',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(59,'တံတားဦး',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(60,'ညောင်ဦး',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(61,'ပြင်ဦးလွင်',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(62,'သပိတ်ကျင်း',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(63,'မဟာအောင်မြေ',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(64,'အောင်မြေသာဇံ',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(65,'အမရပူရ',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(66,'မိတ္ထီလာ',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(67,'မြင်းခြံ',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(68,'ရမည်းသင်း',10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(69,'မော်လမြိုင်',11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(70,'ရေး',11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(71,'သထုံ',11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(72,'ကျိုက်ထို',11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(73,'ကျောက်ဖြူ',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(74,'အမ်း',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(75,'စစ်တွေ',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(76,'မောင်တော',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(77,'မြောက်ဦး',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(78,'သံတွဲ',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(79,'တောင်ကုတ်',12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(80,'တိုက်ကြီး',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(81,'လှည်းကူး',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(82,'မှော်ဘီ',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(83,'မင်္ဂလာဒုံ',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(84,'အင်းစိန်',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(85,'သင်္ဃန်းကျွန်း',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(86,'ဗိုလ်တထောင်',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(87,'ဒဂုံမြို့သစ်',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(88,'သန်လျင်',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(89,'တွံတေး',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(90,'ကျောက်တံတား',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(91,'အလုံ',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(92,'မရမ်းကုန်း',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(93,'ကမာရွတ်',13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(94,'မက်မန်း',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(95,'ဟိုပန်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(96,'ဓနု(ကအဒ)',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(97,'ပအိုင်း(ကအဒ)',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(98,'ပလောင်(ကအဒ)',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(99,'ကိုးကန့်(ကအဒ)',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(100,'ကျောက်မဲ',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(101,'ကျိုင်းတုံ',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(102,'မိုင်းယန်း',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(103,'မိုင်းလား',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(104,'တာချီလိတ်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(105,'မိုင်းယောင်း',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(106,'တောင်ကြီး',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(107,'ကလော',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(108,'မူဆယ်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(109,'ကွတ်ခိုင်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(110,'မိုးမိတ်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(111,'မိူင်းဆတ်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(112,'မိုင်းတုံ',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(113,'လားရှိုး',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(114,'တန့်ယန်း',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(115,'လင်းခေး',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(116,'လွိုင်လင်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(117,'နမ့်စန်',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(118,'မိုင်းရှူး',14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(119,'ပုသိမ်',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(120,'ကျုံပျော်',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(121,'ဖျာပုံ',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(122,'မအူပင်',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(123,'မြောင်းမြ',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(124,'လပွတ္တာ',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(125,'ဟင်္သာတ',15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(126,'မြန်အောင်',15,'2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division_ranks`
--

DROP TABLE IF EXISTS `division_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division_ranks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint unsigned DEFAULT NULL,
  `rank_id` bigint unsigned DEFAULT NULL,
  `allowed_qty` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division_ranks`
--

LOCK TABLES `division_ranks` WRITE;
/*!40000 ALTER TABLE `division_ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `division_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division_types`
--

DROP TABLE IF EXISTS `division_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division_types`
--

LOCK TABLES `division_types` WRITE;
/*!40000 ALTER TABLE `division_types` DISABLE KEYS */;
INSERT INTO `division_types` VALUES (1,'Head Office','2024-11-21 23:46:48','2024-11-21 23:46:48'),(2,'State & Region','2024-11-21 23:46:48','2024-11-21 23:46:48');
/*!40000 ALTER TABLE `division_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `divisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_type_id` bigint unsigned DEFAULT NULL,
  `department_id` bigint unsigned DEFAULT NULL,
  `difficulty_level_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (1,'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၁','ရင်း-၁',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၂','ရင်း-၂',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၃','ရင်း-၃',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၄','ရင်း-၄',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'ရင်းနှီးမြှုပ်နှံမှုလုပ်ငန်းများကြီးကြပ်ရေးဌာနခွဲ','ရင်းနှီးကြီးကြပ်',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'စီမံကိန်းနှင့် စာရင်းအင်းဌာနခွဲ','စီမံကိန်း',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'ရင်းနှီးမြှုပ်နှံမှုမြှင့်တင်ရေးဌာနခွဲ','ရင်းနှီးမြှင့်တင်',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(8,'မူဝါဒနှင့်ဥပဒေဌာနခွဲ','မူဝါဒ',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(9,'ကုမ္ပဏီရေးရာဌာနခွဲ','ကုမ္ပဏီ',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(10,'လူ့စွမ်းအားအရင်းအမြစ်ဖွံ့ဖြိုးရေးနှင့် သုတေသနဌာနခွဲ','HR',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(11,'စီမံရေးနှင့် ငွေစာရင်းဌာနခွဲ','စီမံ',1,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(12,'ကချင်ပြည်နယ်ဦးစီးမှူးရုံး','ကချင်',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(13,'ကယားပြည်နယ်ဦးစီးမှူးရုံး','ကယား',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(14,'ကရင်ပြည်နယ်ဦးစီးမှူးရုံး','ကရင်',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(15,'ချင်းပြည်နယ်ဦးစီးမှူးရုံး','ချင်း',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(16,'စစ်ကိုင်းတိုင်းဒေသကြီးဦးစီးမှူးရုံး','စစ်ကိုင်း',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(17,'တနင်္သာရီတိုင်းဒေသကြီးဦးစီးမှူးရုံး','တနင်္သာရီ',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(18,'ပဲခူးတိုင်းဒေသကြီးဦးစီးမှူးရုံး','ပဲခူး',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(19,'မကွေးတိုင်းဒေသကြီးဦးစီးမှူးရုံး','မကွေး',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(20,'မန္တလေးတိုင်းဒေသကြီးဦးစီးမှူးရုံး','မန္တလေး',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(21,'မွန်ပြည်နယ်ဦးစီးမှူးရုံး','မွန်',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(22,'ရခိုင်ပြည်နယ်ဦးစီးမှူးရုံး','ရခိုင်',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(23,'ရန်ကုန်တိုင်းဒေသကြီးဦးစီးမှူးရုံး','ရန်ကုန်',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(24,'ရှမ်းပြည်နယ်ဦးစီးမှူးရုံး','ရှမ်း',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(25,'ဧရာဝတီတိုင်းဒေသကြီးဦးစီးမှူးရုံး','ဧရာဝတီ',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(26,'နေပြည်တော်တိုင်းဒေသကြီးဦးစီးမှူးရုံး','နေပြည်တော်',2,NULL,NULL,'2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_type_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `education_education_type_id_foreign` (`education_type_id`),
  CONSTRAINT `education_education_type_id_foreign` FOREIGN KEY (`education_type_id`) REFERENCES `education_types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=564 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (1,'ပထမတန်း',1,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(2,'ဒုတိယတန်း',1,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(3,'တတိယတန်း',1,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(4,'စတုတ္ထတန်း',1,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(5,'ပဉ္စမတန်း',2,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(6,'ဆဌမတန်း',2,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(7,'သတ္တမတန်း',2,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(8,'အဌမတန်း',2,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(9,'နဝမတန်း',3,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(10,'ဒဿမတန်း',3,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(11,'B.A (Business Science)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(12,'B.A (Music)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(13,'B.A (Dramatic Arts)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(14,'B.A (Painting)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(15,'B.A (Sculpture)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(16,'B.A (Cinematography & Drama)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(17,'B.A (Myanmar)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(18,'B.A (English)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(19,'B.A (Geography)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(20,'B.A (History)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(21,'B.A (Oriental Studies)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(22,'B.A (Philosophy)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(23,'B.A (Psychology)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(24,'B.A (Anthropology)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(25,'B.A (Archaeology)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(26,'B.A (Business Management)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(27,'B.A (Chinese)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(28,'B.A (French)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(29,'B.A (German)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(30,'B.A (Japanese)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(31,'B.A (Korean)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(32,'B.A (Thai)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(33,'B.A (Journalism)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(34,'B.A (Creative Writing)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(35,'B.A (Economics)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(36,'B.A (Home Economics)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(37,'LLB (Law)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(38,'B.A (International Relations)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(39,'B.A (Library & Information Studies)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(40,'B.A (Myanmar Studies)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(41,'B.A (Public Policy)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(42,'B.A (Russian)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(43,'B.A (Tourism)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(44,'B.A SEAP Studies (SEAP)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(45,'B.A (Business Law)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(46,'B.A (EPP)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(47,'B.A (Environment Studies)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(48,'BTHM',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(49,'BCom (Commerce)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(50,'BEcon (Economic) ',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(51,'BEcon (Statistics)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(52,'B.Act',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(53,'BB.A',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(54,'BPS',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(55,'BBM',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(56,'BDevS',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(57,'BPA',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(58,'B.A (DSA)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(59,'BED',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(60,'BED (Correspondence)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(61,'B.BSC (Bachelor of Business Science)',4,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(62,'B.Sc (Biochemistry)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(63,'B.Sc (Botany)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(64,'B.Sc (Chem) ',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(65,'B.Sc (Geology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(66,'B.Sc (Maths)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(67,'B.Sc (Microbiology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(68,'B.Sc (Physics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(69,'B.Sc (Zoology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(70,'B.Sc Eng (Informational Technology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(71,'B.Sc Eng (IT.EC Double Diploma )',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(72,'B.Sc Engineering (Cosmetic Technology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(73,'B.Sc (Biotechnology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(74,'B.Sc (Environmental Studies)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(75,'B.Sc (Environmental Science)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(76,'B.Sc (Industrial Chemistry)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(77,'B.Sc (Nuclear Physics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(78,'B.Sc (Sport)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(79,'M.B.B.S',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(80,'B.D.S',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(81,'B.M.T.M',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(82,'B.Sc (Apply Mathematics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(83,'B.Sc (Nuclear Chemistry)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(84,'B.Sc (Electronic)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(85,'B.E (Marine)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(86,'B.E (Marine Electrical System and Electronics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(87,'B.E (Aerospace - Propulsion and Flight Vehicles)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(88,'B.E (Aerospace -Avionics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(89,'B.E (Aerospace - Electrical System and Instrumentation)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(90,'B.E (FP)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(91,'B.E (SS)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(92,'B.E (CE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(93,'B.E (MPA)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(94,'B.E (MME)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(95,'B.E (Bio-T)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(96,'B.E (Hons) (CSE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(97,'B.E (Hons) (ECE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(98,'B.Ag',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(99,'B.Agr.Sc',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(100,'B.V.Sc',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(101,'B.SC (Marine Science)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(102,'B.E (Mechatronics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(103,'B.E (Chemical )',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(104,'B.N.Sc',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(105,'B.Pharm',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(106,'B.Med.Tech (Medical Laboratory Technology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(107,'B.Med.Tech (Medical Imaging Technology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(108,'B.Med.Tech (Physiotherapy)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(109,'B.Med.Tech (Prosthetics & Orthetics)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(110,'B.E (Civil)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(111,'B.E (EP)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(112,'B.E (EC)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(113,'B.E (Mech)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(114,'B.E (McE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(115,'B.E (IT)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(116,'B.E (CEIT)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(117,'B.E (Min)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(118,'B.E (ChE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(119,'B.E (Tex)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(120,'B.E (PE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(121,'B.E (Met)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(122,'B.E (NT)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(123,'B.E (Tele)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(124,'B.E (FT)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(125,'B.E (Agri)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(126,'B.Arch.',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(127,'B.E (PV)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(128,'B.E (AV)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(129,'B.E (EI)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(130,'B.Sc (Forestry)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(131,'B.E (NA)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(132,'B.E (ME)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(133,'B.E (PH)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(134,'B.E (RC)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(135,'B.E (MSE)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(136,'B.E (Information Science and Technology)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(137,'B.Tech.(Civil)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(138,'B.Tech.(MP)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(139,'B.Tech.(EP)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(140,'B.Tech.(EC)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(141,'B.Sc (DSA)',5,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(142,'B.C.Sc. (SE) ',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(143,'B.C.Sc. (KE)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(144,'B.C.Tech. (NEW)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(145,'B.C.Tech. (CS)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(146,'B.C.Tech. (ESY)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(147,'B.C.Tech. (CN)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(148,'B.C.Sc. (BIS)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(149,'B.C.Sc. (HPC)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(150,'B.C.Sc. (CSF)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(151,'B.C.Tech. (CSS)',6,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(152,'BPS(Hons)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(153,'BPA(Hons)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(154,'BDevs(Hons)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(155,'BEcon(Hons) (Statistics)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(156,'BEcon (Hons) (Economic)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(157,'BCom (Hons) (Commerce)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(158,'BBA(Hons)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(159,'B.A(Hons)(Musics)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(160,'B.Acts(Hons)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(161,'B.A(Hons)(Psychology)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(162,'B.A(Hons)(Philosophy)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(163,'B.A(Hons)(Dramatics Arts)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(164,'B.A(Hons)(Oriental Studies)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(165,'B.A(Hons)(Painting)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(166,'B.A(Hons)(Sculpture)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(167,'B.A(Hons)(Cinematography & Drama)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(168,'B.A(Hons)(Archaeology)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(169,'B.A(Hons)(International Relations)',7,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(170,'B.A(Hons)(Myanmar)',7,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(171,'B.A(Hons)(Creative Writing)',7,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(172,'B.A(Hons)(History)',7,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(173,'B.A(Hons)(Library & Information Studies)',7,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(174,'B.Sc(Hons)(Industrial Chemistry)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(175,'B.Sc(Hons)(Environment Science)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(176,'B.Sc(Hons)(Sport)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(177,'B.Sc(Hons)(Biotechnology)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(178,'B.Sc(Hons)(Zoology)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(179,'B.Sc(Hons)(NS)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(180,'B.Sc(Hons)(Hydrology)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(181,'B.Sc(Hons)(Meteorodogy)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(182,'B.Sc(Hons)(Nuclear Physics)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(183,'B.Sc(Hons)(Computer Sciences)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(184,'B.Sc(Hons)(Marine Science)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(185,'B.Sc(Hons)(Biochemistry)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(186,'B.Sc(Hons)(Botany)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(187,'B.Sc(Hons)(Chemistry)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(188,'B.Sc(Hons)(Geology)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(189,'B.Sc(Hons)(Mathematics)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(190,'B.Sc(Hons)(Microbiology)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(191,'B.Sc(Hons)(Physics)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(192,'B.A(Hons)(Geography)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(193,'B.A(Hons)(Myanmar Studies)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(194,'B.A(Hons)(English)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(195,'LLB(Hons) (Law)',8,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(196,'M.A (Myanmar)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(197,'M.A (English)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(198,'M.A (Geography)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(199,'M.A (History)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(200,'M.A (Oriental Studies)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(201,'M.A (Philosophy)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(202,'M.A (Psychology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(203,'M.A (Anthropology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(204,'M.A (Archaeology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(205,'LLM(Law)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(206,'M.A (TEFM)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(207,'M.A Ed',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(208,'M.Act',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(209,'MBF ',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(210,'MCom',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(211,'MDevs',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(212,'MPA',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(213,'M.Econ(Statistics)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(214,'M.Econ(Economics)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(215,'MPS',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(216,'MPhil(Botany)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(217,'MBA (Local)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(218,'MBA (Foreign)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(219,'MEd(Educational Methodology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(220,'MEd(Education Theory)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(221,'MPhil(English)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(222,'Med(Educational Psychology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(223,'MPhil(Geography)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(224,'Mphil(History)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(225,'Mphil(Industrial Chemistry)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(226,'Mphil(Psychology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(227,'Mphil(Physics)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(228,'Mphil(Myanmar)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(229,'Mphil(Zoology)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(230,'M.A (French)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(231,'M.A (German)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(232,'M.A (International Relations)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(233,'M.A (Japanese)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(234,'M.A (Myanmar Studies)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(235,'M.A (Russian)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(236,'M.A SEAP Studies(SEAP)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(237,'M.A (Business Law)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(238,'M.A (Chinese)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(239,'M.A (Creative Writing)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(240,'M.A (Korean)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(241,'M.A (Library and Information Studies)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(242,'Mphil(Philosophy)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(243,'Mphil(Methematics)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(244,'Mphil(Chemistry)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(245,'MPhil',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(246,'M.A (Defence Studies)',9,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(247,'M.Sc(SE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(248,'M.Pharm',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(249,'M.Sc(Env.E)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(250,'M.Sc(Env.M)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(251,'M.Sc(GE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(252,'M.Sc(TE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(253,'M.Sc(RES)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(254,'M.Sc(EcE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(255,'M.E(Marine Electrical System and Electronics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(256,'M.Sc(Tele)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(257,'M.E (Marine)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(258,'M.Sc(Bio.MET)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(259,'M.E(Naval Architecture)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(260,'M.Sc(TFT)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(261,'M.Sc(Electronics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(262,'M.S.(EAM)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(263,'M.S.(Adapt.Met)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(264,'M.Sc(Nuclear Chemistry)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(265,'M.S.(Arc.Met)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(266,'M.Sc(Geology)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(267,'M.Sc(Mathematics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(268,'M.Sc(Microbiology)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(269,'M.Sc(Physics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(270,'M.Sc(Zoology)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(271,'M.Sc(Engineering Physics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(272,'M.Sc(Apply Mathematics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(273,'M.M.T.M',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(274,'M.S.(E.Geol)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(275,'M.S.(Bio.T)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(276,'M.E.(Civil)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(277,'M.E.(CSE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(278,'M.E.(CWRE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(279,'M.E.(CGE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(280,'M.Comm.H',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(281,'M.E.(CTE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(282,'M.E.(CM)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(283,'M.E.(Mech)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(284,'M.E.(EP)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(285,'M.E.(EC)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(286,'M.E.(IT)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(287,'M.E.(CEIT)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(288,'M.E.(McE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(289,'M.E.(Chemical)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(290,'M.E.(Tex)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(291,'M.Sc(Biotechnology)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(292,'M.Sc(Engineering Mathematics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(293,'M.Sc(Environmental Studies)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(294,'M.Sc(Nuclear Physics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(295,'M.Sc(Industrial Chemistry)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(296,'M.E.(Mechatronics)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(297,'M.E.(Min)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(298,'M.E.(PE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(299,'M.E.(Met)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(300,'M.E.(Adapt.Met)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(301,'M.E.(Ext.Met)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(302,'M.E.(ChE)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(303,'M.E.(NT)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(304,'M.Arch',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(305,'M.F.T',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(306,'M.E.(PV)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(307,'M.E.(AV)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(308,'M.E.(EI)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(309,'M.Agr.Sc',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(310,'M.Sc(Forestry)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(311,'M.I.Sc',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(312,'M.A.Sc',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(313,'M.Sc(Forest Product)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(314,'M.Sc(Marine Science) ',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(315,'M.Sc(Biochemistry)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(316,'M.Sc(Botany)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(317,'M.Sc(Chemistry)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(318,'M.P.H',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(319,'M.H.A',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(320,'M.E.(Mechanical)',10,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(321,'M.C.Sc',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(322,'M.C.Tech',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(323,'M.E.(CS)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(324,'M.C.Sc.(SE)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(325,'M.C.Sc.(BIS)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(326,'M.C.Sc.(KE)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(327,'M.C.Sc.(HPC)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(328,'M.C.Sc.(CSF)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(329,'M.C.Tech.(NWK)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(330,'M.C.Tech.(ES,ES)',11,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(331,'MRes(Anthropology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(332,'Mres(Archaeology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(333,'Mres(Computer Sciences)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(334,'Mres(Creative Writing)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(335,'Mres(International Relations)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(336,'Mres(Law)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(337,'Mres(Librart and Information Studies)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(338,'Mres(Biotechnology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(339,'Mres(Environmental Studies)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(340,'Mres(Industrial Chemistry)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(341,'Mres(Myanmar)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(342,'Mres(English)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(343,'Mres(Marine Science)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(344,'Mres(Biochemistry)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(345,'Mres(Botany)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(346,'MRes(Geography)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(347,'Mres(Geology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(348,'Mres(Chemisty)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(349,'Mres(History)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(350,'Mres(Mathematics)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(351,'Mres(Microbiology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(352,'Mres(Oriental Studies)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(353,'Mres(Philosophy)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(354,'MRes(Physics)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(355,'Mres(Psychology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(356,'Mres(Zoology)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(357,'Mres(Myanmar Studies)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(358,'Mres(Nuclear Physics)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(359,'Mres(Statistics)',12,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(360,'Ph.D.(Civil)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(361,'Ph.D.(CSE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(362,'Ph.D.(CWRE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(363,'Ph.D.(CGE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(364,'Ph.D.(CTE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(365,'Ph.D.(CM)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(366,'Ph.D.(CCE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(367,'Ph.D.(Env.S)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(368,'Ph.D.(Myanmar)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(369,'Ph.D.(Oriental Studies)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(370,'Ph.D.(Philosophy)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(371,'Ph.D.(Physics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(372,'Ph.D.(English)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(373,'Ph.D.(Geography)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(374,'Ph.D.(Geology)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(375,'Ph.D.(Nanoscience and Nanotechnology)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(376,'Ph.D.(EE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(377,'Ph.D.(IME)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(378,'Ph.D.(TFE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(379,'Ph.D.(SSM)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(380,'Ph.D.(Mech)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(381,'Ph.D.(EP)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(382,'Ph.D.(EC)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(383,'Ph.D.(IT)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(384,'Ph.D.(Psychology)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(385,'Ph.D.(Statistics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(386,'Ph.D.(Zoology)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(387,'Ph.D.(Marine Science)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(388,'Ph.D.(Law)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(389,'Ph.D.(Mathematics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(390,'Ph.D.(Nuclear Physics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(391,'Ph.D.(CEIT)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(392,'Ph.D.(McE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(393,'Ph.D.(ChE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(394,'Ph.D.(Tex)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(395,'Ph.D.(TF)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(396,'Ph.D.(Mn)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(397,'Ph.D.(PE)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(398,'Ph.D.(Met)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(399,'Ph.D.(Anthropology)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(400,'Ph.D.(Archaeology)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(401,'Ph.D.(Chinese)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(402,'Ph.D.(Computer Sciences)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(403,'Ph.D.(Law)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(404,'Ph.D.(Mathematics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(405,'Ph.D.(Nuclear Physics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(406,'Ph.D.(Arch)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(407,'Ph.D.(NT)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(408,'Ph.D.(Bio-T)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(409,'Ph.D.(IT)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(410,'Ph.D.(Botany)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(411,'Ph.D.(Chemistry)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(412,'Ph.D.(Commerce)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(413,'Ph.D.(Economics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(414,'Ph.D.(Industrial Chemistry)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(415,'Ph.D.(Library ',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(416,'and Information Studies)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(417,'Ph.D.(Apply Mathematics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(418,'Ph.D.(Nuclear Chemistry)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(419,'Ph.D.(History)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(420,'Ph.D.(Electronics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(421,'Ph.D.(Electronics)',13,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(422,'Doctor of Letters (Honoris Causa) (English)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(423,'Doctor of Letters (Honoris Causa) (History)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(424,'Doctor of Letters (Honoris Causa) (Myanmar)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(425,'Doctor of Letters (Honoris Causa) (Zoology)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(426,'Doctor of Letters (Honoris Causa) (Law)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(427,'Doctor of Letters (Honoris Causa) (Mathematics)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(428,'Doctor of Letters (Honoris Causa) (Oriental Studies)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(429,'Doctor of Letters (Honoris Causa) (Philosophy)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(430,'Doctor of Letters (Honoris Causa) (Psychology)',14,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(431,'AGTI(Civil)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(432,'AGTI(EC)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(433,'AGTI(EP)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(434,'AGTI(Mech)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(435,'AGTI(IT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(436,'AGTI(IE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(437,'AGTI(FM)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(438,'AGTI(ATM)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(439,'AGTI(EEI)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(440,'GTHS(BT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(441,'GTHS(EcT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(442,'GTHS(ET)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(443,'GTHS(AT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(444,'GTHS(MT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(445,'GTHS(BST)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(446,'GTHS(MPT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(447,'GTHS(IT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(448,'Dip; IT',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(449,'Dip; C.Sc',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(450,'Dip; A.B.S',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(451,'Dip; (Foresty)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(452,'Dip; (NS)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(453,'Dip; (Mar.Tech)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(454,'Dip; (SE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(455,'Dip; (BM)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(456,'Dip; (ED)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(457,'Dip; (BFI)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(458,'Dip; (FM)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(459,'Dip; (BA)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(460,'PGD(NE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(461,'PGD(SD)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(462,'PGD(CSE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(463,'PGD(WRE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(464,'PGD(Env.E)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(465,'PGD(Env.M)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(466,'PGD(CGE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(467,'PGD(CM)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(468,'PGD(CTE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(469,'PGD(CA)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(470,'PGD(RE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(471,'PGD(MA)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(472,'PGD(IE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(473,'PGD(RES)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(474,'PGD(AA)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(475,'PGD(EcE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(476,'Dip; (MM)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(477,'Dip; (LWT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(478,'Dip; (Buddha Damma)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(479,'AGTI(MP)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(480,'Dip; RS',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(481,'Dip; S',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(482,'Dip; SE',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(483,'Dip; APsy',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(484,'Dip; BL',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(485,'Dip; IL',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(486,'Dip; ELT',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(487,'Dip; (English)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(488,'Dip; IR',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(489,'Dip; OS',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(490,'Dip; PS',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(491,'Dip; TSM',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(492,'Dip; DS',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(493,'Dip; AA',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(494,'Dip; B',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(495,'Dip; EM',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(496,'Dip; ES',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(497,'Dip; ELTM',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(498,'Dip; (Chinese)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(499,'Dip; (French)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(500,'Dip; (German)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(501,'Dip; (Italian)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(502,'Dip; (Japanese)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(503,'Dip; (Korean)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(504,'Dip; (Myanmar)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(505,'PGD(Tele)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(506,'PGD(Russian)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(507,'PGD(Bio.MET)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(508,'PGD(Korean)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(509,'PGD(Tex)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(510,'PGD(EIA/EMS)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(511,'PGD(Japanese)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(512,'PGD(FT)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(513,'PGD(German)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(514,'PGD(Arc.Met)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(515,'PGD(Ext.Met)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(516,'PGD(French)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(517,'PGD(Adapt.Met)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(518,'PGD(E.Geol)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(519,'PGD(Chinese)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(520,'PGD(SSSE)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(521,'Dip; (Russian)',15,'2024-11-21 23:46:53','2024-11-21 23:46:53'),(522,'Dip; (Thai)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(523,'Dip; (Anthropology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(524,'Dip; (Apply Geology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(525,'Dip; (Apply Physics)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(526,'Dip; (Geology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(527,'Dip; (IL)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(528,'Dip; (IR)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(529,'Dip; (Law)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(530,'Dip; (ML)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(531,'Dip; (DTSM) (Myanmar)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(532,'Dip; (EDCS) WBTS',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(533,'Dip; (ELT)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(534,'Dip; (GIS)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(535,'Dip; (Library and Information Studies)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(536,'Dip; (DPCS)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(537,'Dip; Industrial Chemistry (Food Technology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(538,'Dip; (Apply Psychology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(539,'Dip; (Archaeology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(540,'Dip; (Social Work)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(541,'Dip; (Management and Administration)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(542,'AGDI(MT&DE)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(543,'AGDI(Electronic)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(544,'AGDI(ME)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(545,'AGDI(S&H)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(546,'AGDI(Metallurgical Engineering)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(547,'AGDI(Chem)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(548,'Dip; Cs',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(549,'PGD(WE)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(550,'PGD(Global)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(551,'PGD(Sculpture)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(552,'PGD(Arg.S)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(553,'PGD(SM)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(554,'PGD(Painting)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(555,'PGD(PM)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(556,'PGD(Museology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(557,'PGD(Dramatic Art)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(558,'PGD(Applied Archaeology)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(559,'PGD(Music)',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(560,'ADCSM',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(561,'CPA',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(562,'DA',15,'2024-11-21 23:46:54','2024-11-21 23:46:54'),(563,'M.E',15,'2024-11-21 23:46:54','2024-11-21 23:46:54');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education_groups`
--

DROP TABLE IF EXISTS `education_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education_groups`
--

LOCK TABLES `education_groups` WRITE;
/*!40000 ALTER TABLE `education_groups` DISABLE KEYS */;
INSERT INTO `education_groups` VALUES (1,'အခြေခံပညာ','2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'ဘွဲ့ရ','2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'ဘွဲ့လွန်ဂုဏ်ထူးတန်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'ဘွဲ့လွန်(မဟာ)','2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'ပါရဂူဘွဲ့ Ph.D.','2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'Doctor of Letters','2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'ဒီပလိုမာဘွဲ့','2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `education_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education_types`
--

DROP TABLE IF EXISTS `education_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_group_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `education_types_education_group_id_foreign` (`education_group_id`),
  CONSTRAINT `education_types_education_group_id_foreign` FOREIGN KEY (`education_group_id`) REFERENCES `education_groups` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education_types`
--

LOCK TABLES `education_types` WRITE;
/*!40000 ALTER TABLE `education_types` DISABLE KEYS */;
INSERT INTO `education_types` VALUES (1,'မူလတန်း',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'အလယ်တန်း',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'အထက်တန်း',1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'B.A ဝိဇ္ဇာဘွဲ့ အမျိုးအစား',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'B.Sc သိပ္ပံဘွဲ့ အမျိုးအစား',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'B.C.Sc. ကွန်ပျူတာသိပ္ပံဘွဲ့အမျိုးအစား',2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'B.A(Hons.) ဝိဇ္ဇာဘွဲ့ဂုဏ်ထူးတန်း',3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(8,'B.Sc(Hons.) သိပ္ပံဘွဲ့ဂုဏ်ထူးတန်း',3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(9,'M.A (မဟာဝိဇ္ဇာဘွဲ့)',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(10,'M.Sc (မဟာသိပ္ပံဘွဲ့)',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(11,'M.C.Sc (မဟာကွန်ပျူတာသိပ္ပံဘွဲ့)',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(12,'M.Res',4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(13,'စီးပွားရေး',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(14,'အင်ဂျင်နီယာ',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(15,'ဥပဒေ',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(16,'ဘာသာစကား',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(17,'အခြား',5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(18,'စီးပွားရေး',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(19,'အင်ဂျင်နီယာ',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(20,'ဥပဒေ',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(21,'ဘာသာစကား',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(22,'အခြား',6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(23,'စီးပွားရေး',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(24,'အင်ဂျင်နီယာ',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(25,'ဥပဒေ',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(26,'ဘာသာစကား',7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(27,'အခြား',7,'2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `education_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ethnics`
--

DROP TABLE IF EXISTS `ethnics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ethnics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ethnics`
--

LOCK TABLES `ethnics` WRITE;
/*!40000 ALTER TABLE `ethnics` DISABLE KEYS */;
INSERT INTO `ethnics` VALUES (1,'ကချင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(2,'ထရုမ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(3,'ဒလောင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(4,'ဂျိမ်းဖော','2024-11-29 02:18:35','2024-11-29 02:18:35'),(5,'ဂေါ်ရီ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(6,'ခါ့ခူး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(7,'ဒူးလင်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(8,'လော်ဝေါ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(9,'ရဝမ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(10,'လရှီ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(11,'အဇီး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(12,'လီဆူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(13,'ကယား','2024-11-29 02:18:35','2024-11-29 02:18:35'),(14,'ဇယိန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(15,'ကယန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(16,'ဂေခို','2024-11-29 02:18:35','2024-11-29 02:18:35'),(17,'ဂေဘား','2024-11-29 02:18:35','2024-11-29 02:18:35'),(18,'ပရဲ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(19,'မနူမနော','2024-11-29 02:18:35','2024-11-29 02:18:35'),(20,'ယင်းတလဲ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(21,'ယင်းဘော်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(22,'ကရင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(23,'ကရင်ဖြူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(24,'ပလေကီး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(25,'မွန်ကရင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(26,'စကောကရင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(27,'တလှေပွာ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(28,'ပကူး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(29,'ဘွဲ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(30,'မောနေပွား','2024-11-29 02:18:35','2024-11-29 02:18:35'),(31,'မိုးပွ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(32,'ပိုးကရင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(33,'ချင်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(34,'ကသည်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(35,'ဆလိုင်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(36,'ကလင်ကော့','2024-11-29 02:18:35','2024-11-29 02:18:35'),(37,'ခမီ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(38,'အဝခမီ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(39,'ခေါနိုး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(40,'ခေါင်စို','2024-11-29 02:18:35','2024-11-29 02:18:35'),(41,'ခေါင်ဆိုင်ချင်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(42,'ခွာဆင်းမ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(43,'ခွန်လီ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(44,'ဂန်တဲ့','2024-11-29 02:18:35','2024-11-29 02:18:35'),(45,'ဂွေးတဲ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(46,'ငွန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(47,'ဆီစာန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(48,'ဆင်တန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(49,'ဆိုင်းဇန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(50,'ဇာဟောင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(51,'ဇိုတုံး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(52,'ဇိုဖေ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(53,'ဇို','2024-11-29 02:18:35','2024-11-29 02:18:35'),(54,'ဇန်ညှပ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(55,'တပေါင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(56,'တီးတိန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(57,'တေဇန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(58,'တိုင်ချွန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(59,'တာ့ဒိုး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(60,'တောရ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(61,'ဒင်မ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(62,'ဒိုင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(63,'နာဂ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(64,'တန်ဒူး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(65,'မာရင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(66,'ပနမ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(67,'မကန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(68,'မတူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(69,'မီရမ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(70,'မီအဲ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(71,'မွင်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(72,'လူရှည်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(73,'လေးမြို့','2024-11-29 02:18:35','2024-11-29 02:18:35'),(74,'လင်တဲ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(75,'လောက်ထူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(76,'လိုင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(77,'လိုင်ဇို','2024-11-29 02:18:35','2024-11-29 02:18:35'),(78,'မြို','2024-11-29 02:18:35','2024-11-29 02:18:35'),(79,'ထမန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(80,'အနူး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(81,'အနန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(82,'အူပူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(83,'လျင်းတု','2024-11-29 02:18:35','2024-11-29 02:18:35'),(84,'အရှိုချင်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(85,'ရောင်ထု','2024-11-29 02:18:35','2024-11-29 02:18:35'),(86,'ဗမာ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(87,'ထားဝယ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(88,'မြိတ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(89,'ယော','2024-11-29 02:18:35','2024-11-29 02:18:35'),(90,'တောင်သား','2024-11-29 02:18:35','2024-11-29 02:18:35'),(91,'ကဒူး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(92,'ကနန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(93,'ဆလုံ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(94,'ဖွန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(95,'မွန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(96,'ရခိုင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(97,'ကမန်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(98,'ခမီး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(99,'ဒိုင်းနက်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(100,'မရမာကြီး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(101,'မြို','2024-11-29 02:18:35','2024-11-29 02:18:35'),(102,'သက်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(103,'ရှမ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(104,'ယွန်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(105,'ကွီ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(106,'ဖျင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(107,'ယောင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(108,'ထနော့','2024-11-29 02:18:35','2024-11-29 02:18:35'),(109,'ပလေး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(110,'အင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(111,'မုံ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(112,'ခမူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(113,'အာခါ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(114,'ကိုးကန့်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(115,'ခန္တီးရှမ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(116,'ဂုံရှမ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(117,'တောင်ရိုး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(118,'ဓနု','2024-11-29 02:18:35','2024-11-29 02:18:35'),(119,'ပလောင်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(120,'မြောင်ဇီး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(121,'ယင်းကျား','2024-11-29 02:18:35','2024-11-29 02:18:35'),(122,'ယင်းနက်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(123,'ရှမ်းကလေး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(124,'ရှမ်းကြီး','2024-11-29 02:18:35','2024-11-29 02:18:35'),(125,'လားဟူ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(126,'အင်းသား','2024-11-29 02:18:35','2024-11-29 02:18:35'),(127,'အိုက်ဆွယ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(128,'ပအိုဝ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(129,'တိုင်းလွယ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(130,'တိုင်းလျမ်','2024-11-29 02:18:35','2024-11-29 02:18:35'),(131,'တိုင်းလုံ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(132,'တိုင်းလေ့','2024-11-29 02:18:35','2024-11-29 02:18:35'),(133,'မိုင်းသာ','2024-11-29 02:18:35','2024-11-29 02:18:35'),(134,'မောရှမ်း','2024-11-29 02:18:35','2024-11-29 02:18:35'),(135,'ဝ','2024-11-29 02:18:35','2024-11-29 02:18:35');
/*!40000 ALTER TABLE `ethnics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `father_siblings`
--

DROP TABLE IF EXISTS `father_siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `father_siblings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `father_siblings_staff_id_foreign` (`staff_id`),
  KEY `father_siblings_ethnic_id_foreign` (`ethnic_id`),
  KEY `father_siblings_religion_id_foreign` (`religion_id`),
  KEY `father_siblings_gender_id_foreign` (`gender_id`),
  KEY `father_siblings_relation_id_foreign` (`relation_id`),
  CONSTRAINT `father_siblings_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `father_siblings_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `father_siblings_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `father_siblings_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `father_siblings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `father_siblings`
--

LOCK TABLES `father_siblings` WRITE;
/*!40000 ALTER TABLE `father_siblings` DISABLE KEYS */;
INSERT INTO `father_siblings` VALUES (4,4,'ဒေါ်နှင်းဆီ',1,1,2,'ချောင်းကျိုးရွာ၊ ','မှီခို','ချောင်းကျိုးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',11,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(5,4,'ဒေါ်လှတူး',1,1,2,'ချောင်းကျိုးရွာ၊ ','မှီခို','ချောင်းကျိုးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',11,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(6,4,'ဦးမြင့်ဇော်',1,1,1,'ချောင်းကျိုးရွာ၊ ','တောင်ယာ','ချောင်းကျိုးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',9,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(10,2,'ဦးမောင် မောင်လွင်',1,1,1,'ရန်ကုန်မြို့','ကားအရောင်း၀ယ်','မုဒိတာအိမ်ယာ၂ အင်းစိန်မြို့',7,'2024-11-22 02:20:31','2024-11-22 02:20:31'),(11,2,'ဦးမောင် မောင်စိုး',1,1,1,'ရန်ကုန်မြို့','ကွယ်လွန်','၂၀၁၆',9,'2024-11-22 02:20:31','2024-11-22 02:20:31'),(12,2,'ဒေါ်နှင်းမာလာ',1,1,2,'ရန်ကုန်မြို့','စားသောက်ကုန်အရောင်းအ၀ယ်','မုဒိတာအိမ်ယာ၂ အင်းစိန်မြို့',11,'2024-11-22 02:20:31','2024-11-22 02:20:31');
/*!40000 ALTER TABLE `father_siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'ကျား','2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'မ','2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `increments`
--

DROP TABLE IF EXISTS `increments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `increments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `increment_rank_id` bigint unsigned DEFAULT NULL,
  `min_salary` int DEFAULT NULL,
  `increment` int DEFAULT NULL,
  `max_salary` int DEFAULT NULL,
  `increment_date` date DEFAULT NULL,
  `increment_time` int DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `increments_staff_id_foreign` (`staff_id`),
  KEY `increments_increment_rank_id_foreign` (`increment_rank_id`),
  CONSTRAINT `increments_increment_rank_id_foreign` FOREIGN KEY (`increment_rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `increments_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `increments`
--

LOCK TABLES `increments` WRITE;
/*!40000 ALTER TABLE `increments` DISABLE KEYS */;
/*!40000 ALTER TABLE `increments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labour_attendances`
--

DROP TABLE IF EXISTS `labour_attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `labour_attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `att_date` json DEFAULT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `labour_attendances_staff_id_foreign` (`staff_id`),
  CONSTRAINT `labour_attendances_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labour_attendances`
--

LOCK TABLES `labour_attendances` WRITE;
/*!40000 ALTER TABLE `labour_attendances` DISABLE KEYS */;
/*!40000 ALTER TABLE `labour_attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `last_pay_certificates`
--

DROP TABLE IF EXISTS `last_pay_certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `last_pay_certificates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `from_division_id` bigint unsigned NOT NULL,
  `to_division_id` bigint unsigned NOT NULL,
  `transfer_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_up_to_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `last_pay_certificates`
--

LOCK TABLES `last_pay_certificates` WRITE;
/*!40000 ALTER TABLE `last_pay_certificates` DISABLE KEYS */;
/*!40000 ALTER TABLE `last_pay_certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leave_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowed` int DEFAULT NULL,
  `day_or_month_id` bigint unsigned DEFAULT NULL,
  `is_yearly` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leave_types_day_or_month_id_foreign` (`day_or_month_id`),
  CONSTRAINT `leave_types_day_or_month_id_foreign` FOREIGN KEY (`day_or_month_id`) REFERENCES `day_or_months` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_types`
--

LOCK TABLES `leave_types` WRITE;
/*!40000 ALTER TABLE `leave_types` DISABLE KEYS */;
INSERT INTO `leave_types` VALUES (1,'လစာမဲ့ခွင့်',NULL,NULL,0,NULL,NULL),(2,'လုပ်သက်ခွင့်',NULL,NULL,0,NULL,NULL),(3,'ဆေးခွင့်',NULL,NULL,0,NULL,NULL),(4,'မီးဖွားခွင့်/သားပျက်ခွင့်',NULL,NULL,0,NULL,NULL),(5,'ရှောင်တခင်ခွင့်',NULL,NULL,0,NULL,NULL),(6,'ကြိုတင်ပြင်ဆင်ခွင့်',NULL,NULL,0,NULL,NULL),(7,'ကလေးပြုစုစောင့်ရှောက်ခွင့်',NULL,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `leave_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leaves` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `leave_type_id` bigint unsigned DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaves`
--

LOCK TABLES `leaves` WRITE;
/*!40000 ALTER TABLE `leaves` DISABLE KEYS */;
INSERT INTO `leaves` VALUES (1,3,2,'2023-10-23','2023-10-25',3,'၁/၂၀၁၃','-','2024-11-22 03:02:26','2024-11-22 03:02:26');
/*!40000 ALTER TABLE `leaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `letter_types`
--

DROP TABLE IF EXISTS `letter_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `letter_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_types`
--

LOCK TABLES `letter_types` WRITE;
/*!40000 ALTER TABLE `letter_types` DISABLE KEYS */;
INSERT INTO `letter_types` VALUES (1,'လျှိုဝှက်','2024-11-29 02:23:56','2024-11-29 02:23:56'),(2,'ကန့်သက်','2024-11-29 02:23:56','2024-11-29 02:23:56'),(3,'အတွင်းရေး','2024-11-29 02:23:56','2024-11-29 02:23:56');
/*!40000 ALTER TABLE `letter_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marital_statuses`
--

DROP TABLE IF EXISTS `marital_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marital_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marital_statuses`
--

LOCK TABLES `marital_statuses` WRITE;
/*!40000 ALTER TABLE `marital_statuses` DISABLE KEYS */;
INSERT INTO `marital_statuses` VALUES (1,'လူပျို','2024-11-29 02:22:58','2024-11-29 02:22:58'),(2,'အပျို','2024-11-29 02:22:58','2024-11-29 02:22:58'),(3,'မုဆိုးဖို','2024-11-29 02:22:58','2024-11-29 02:22:58'),(4,'မုဆိုးမ','2024-11-29 02:22:58','2024-11-29 02:22:58'),(5,'တခုလပ်','2024-11-29 02:22:58','2024-11-29 02:22:58');
/*!40000 ALTER TABLE `marital_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024_08_01_041615_create_staff_types_table',1),(2,'2024_08_01_041835_create_payscales_table',1),(3,'2024_08_01_042516_create_ranks_table',1),(4,'2024_08_01_042847_create_posts_table',1),(5,'2024_08_01_043156_create_day_or_months_table',1),(6,'2024_08_01_043213_create_leave_types_table',1),(7,'2024_08_01_044118_create_countries_table',1),(8,'2024_08_01_045728_create_penalty_types_table',1),(9,'2024_08_01_045933_create_pension_types_table',1),(10,'2024_08_01_050049_create_education_groups_table',1),(11,'2024_08_01_050109_create_education_types_table',1),(12,'2024_08_01_050119_create_education_table',1),(13,'2024_08_01_050247_create_training_locations_table',1),(14,'2024_08_01_050824_create_ethnics_table',1),(15,'2024_08_01_051012_create_religions_table',1),(16,'2024_08_01_051132_create_genders_table',1),(17,'2024_08_01_052354_create_relations_table',1),(18,'2024_08_01_052548_create_pension_years_table',1),(19,'2024_08_01_053024_create_roles_table',1),(20,'2024_08_01_054220_create_permissions_table',1),(21,'2024_08_01_054327_create_role_permissions_table',1),(22,'2024_08_01_075544_create_blood_types_table',1),(23,'2024_08_01_081339_create_regions_table',1),(24,'2024_08_01_081513_create_districts_table',1),(25,'2024_08_01_081743_create_townships_table',1),(26,'2024_08_01_083204_create_nrc_region_ids_table',1),(27,'2024_08_01_083222_create_nrc_township_codes_table',1),(28,'2024_08_01_083242_create_nrc_signs_table',1),(29,'2024_08_01_101536_create_difficulty_levels_table',1),(30,'2024_08_01_110414_create_ministries_table',1),(31,'2024_08_01_110545_create_departments_table',1),(32,'2024_08_01_110637_create_divisions_table',1),(33,'2024_08_01_110728_create_sections_table',1),(34,'2024_08_01_112615_create_nationalities_table',1),(35,'2024_08_02_040941_create_staff_table',1),(36,'2024_08_02_041956_create_training_types_table',1),(37,'2024_08_02_044816_create_award_types_table',1),(38,'2024_08_02_045525_create_recommendations_table',1),(39,'2024_08_02_046256_create_division_ranks_table',1),(40,'2024_08_02_048941_create_marital_statuses_table',1),(41,'2024_08_02_051401_create_social_activities_table',1),(42,'2024_08_02_051542_create_siblings_table',1),(43,'2024_08_02_060817_create_father__siblings_table',1),(44,'2024_08_02_062619_create_mother__siblings_table',1),(45,'2024_08_02_064647_create_spouses_table',1),(46,'2024_08_02_065449_create_childrens_table',1),(47,'2024_08_02_070351_create_spouse__siblings_table',1),(48,'2024_08_02_072029_create_spouse__father__siblings_table',1),(49,'2024_08_02_072421_create_spouse__mother__siblings_table',1),(50,'2024_08_03_040343_create_abroads_table',1),(51,'2024_08_03_040629_create_schools_table',1),(52,'2024_08_03_042802_create_punishment_criminals_table',1),(53,'2024_08_14_045444_create_staff_education_table',1),(54,'2024_08_14_053052_create_awards_table',1),(55,'2024_08_15_052753_create_awardings_table',1),(56,'2024_08_27_074039_create_past_occupations_table',1),(57,'2024_09_07_083226_create_division_types_table',1),(58,'2024_09_07_092720_create_leaves_table',1),(59,'2024_09_07_093933_create_increments_table',1),(60,'2024_09_17_091544_create_languages_table',1),(61,'2024_09_18_082046_create_staff_languages_table',1),(62,'2024_09_21_040942_create_postings_table',1),(63,'2024_09_22_042505_create_trainings_table',1),(64,'2024_09_23_044046_create_punishments_table',1),(65,'2024_09_23_063529_create_retire_types_table',1),(66,'2024_10_05_091718_create_salaries_table',1),(67,'2024_10_05_092818_create_promotions_table',1),(68,'2024_11_11_062157_create_statuses_table',1),(69,'2024_11_12_105304_create_labour_attendances_table',1),(70,'2024_11_13_025217_create_depromotions_table',1),(71,'2024_11_16_111332_create_last_pay_certificates_table',1),(72,'2025_0001_01_01_000001_create_cache_table',1),(73,'2025_0001_01_01_000002_create_jobs_table',1),(74,'2025_01_01_01_000000_create_users_table',1),(75,'2024_11_23_074721_create_letter_types_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ministries`
--

DROP TABLE IF EXISTS `ministries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ministries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ministries`
--

LOCK TABLES `ministries` WRITE;
/*!40000 ALTER TABLE `ministries` DISABLE KEYS */;
INSERT INTO `ministries` VALUES (1,'ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေး ၀န်ကြီးဌာန','2024-11-29 02:22:41','2024-11-29 02:22:41');
/*!40000 ALTER TABLE `ministries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mother_siblings`
--

DROP TABLE IF EXISTS `mother_siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mother_siblings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mother_siblings_staff_id_foreign` (`staff_id`),
  KEY `mother_siblings_ethnic_id_foreign` (`ethnic_id`),
  KEY `mother_siblings_religion_id_foreign` (`religion_id`),
  KEY `mother_siblings_gender_id_foreign` (`gender_id`),
  KEY `mother_siblings_relation_id_foreign` (`relation_id`),
  CONSTRAINT `mother_siblings_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `mother_siblings_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `mother_siblings_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `mother_siblings_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `mother_siblings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mother_siblings`
--

LOCK TABLES `mother_siblings` WRITE;
/*!40000 ALTER TABLE `mother_siblings` DISABLE KEYS */;
INSERT INTO `mother_siblings` VALUES (2,4,'ဒေါ်ဌေးကြည်',1,1,2,'ချောင်းကျိုးရွာ','မှီခို','ပိန်းတောကျေးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',11,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(4,2,'ဦးဒါလီမင်း',1,1,1,'ရန်ကုန်မြို့','ကွယ်လွန်၁၉၉၃','ရန်ကုန်မြို့',7,'2024-11-22 02:20:31','2024-11-22 02:20:31');
/*!40000 ALTER TABLE `mother_siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nationalities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationalities`
--

LOCK TABLES `nationalities` WRITE;
/*!40000 ALTER TABLE `nationalities` DISABLE KEYS */;
INSERT INTO `nationalities` VALUES (1,'ကချင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'ကယား','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'ကရင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'ချင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'ဗမာ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'မွန်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'ရခိုင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'ရှမ်း','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `nationalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nrc_region_ids`
--

DROP TABLE IF EXISTS `nrc_region_ids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nrc_region_ids` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nrc_region_ids`
--

LOCK TABLES `nrc_region_ids` WRITE;
/*!40000 ALTER TABLE `nrc_region_ids` DISABLE KEYS */;
INSERT INTO `nrc_region_ids` VALUES (1,'၁/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'၂/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'၃/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'၄/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'၅/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'၆/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'၇/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'၈/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(9,'၉/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(10,'၁၀/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(11,'၁၁/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(12,'၁၂/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(13,'၁၃/','2024-11-21 23:46:50','2024-11-21 23:46:50'),(14,'၁၄/','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `nrc_region_ids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nrc_signs`
--

DROP TABLE IF EXISTS `nrc_signs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nrc_signs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nrc_signs`
--

LOCK TABLES `nrc_signs` WRITE;
/*!40000 ALTER TABLE `nrc_signs` DISABLE KEYS */;
INSERT INTO `nrc_signs` VALUES (1,'(နိုင်)','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'(ပြု)','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'(ဧည့်)','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `nrc_signs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nrc_township_codes`
--

DROP TABLE IF EXISTS `nrc_township_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nrc_township_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrc_region_id_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nrc_township_codes_nrc_region_id_id_foreign` (`nrc_region_id_id`),
  CONSTRAINT `nrc_township_codes_nrc_region_id_id_foreign` FOREIGN KEY (`nrc_region_id_id`) REFERENCES `nrc_region_ids` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=431 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nrc_township_codes`
--

LOCK TABLES `nrc_township_codes` WRITE;
/*!40000 ALTER TABLE `nrc_township_codes` DISABLE KEYS */;
INSERT INTO `nrc_township_codes` VALUES (1,'ကမတ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'ကမန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'ကပတ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'ခဘဒ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'ခလဖ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'ခဖန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'‌ဆဘတ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'ဆဒန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(9,'ဆလန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(10,'ဆပဘ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(11,'တနန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(12,'ဒဖယ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(13,'နမန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(14,'ပဝန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(15,'ပတအ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(16,'ပနဒ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(17,'ဖကန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(18,'ဗမန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(19,'မခဘ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(20,'မကန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(21,'မလန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(22,'မကတ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(23,'မမန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(24,'မညန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(25,'မစန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(26,'ရဗယ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(27,'ရကန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(28,'လဂန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(29,'ဝမန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(30,'ဟပန',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(31,'အဂယ',1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(32,'ဒမဆ',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(33,'ဖဆန',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(34,'ဖရဆ',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(35,'ဘလခ',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(36,'မစန',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(37,'ရတန',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(38,'ရသန',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(39,'လကန',2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(40,'ကမမ',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(41,'ကကရ',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(42,'ကဆက',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(43,'ကဒန',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(44,'စကလ',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(45,'ပကန',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(46,'ဖပန',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(47,'ဘသဆ',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(48,'ဘအန',3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(49,'ဘဂလ',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(50,'မဝတ',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(51,'ရရသ',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(52,'လဘန',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(53,'လသန',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(54,'ဝလမ',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(55,'သတက',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(56,'သတန',3,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(57,'ကခန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(58,'ကပလ',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(59,'ဆမန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(60,'တတန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(61,'တဇန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(62,'ထတလ',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(63,'ပလဝ',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(64,'ဖလန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(65,'မတန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(66,'မတပ',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(67,'ရခဒ',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(68,'ရဇန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(69,'ဟခန',4,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(70,'ကလထ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(71,'ကလဝ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(72,'ကဘလ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(73,'ကလန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(74,'ကမန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(75,'ကနန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(76,'ကသန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(77,'ကလတ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(78,'ခပန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(79,'ခတန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(80,'ခဥန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(81,'ခဥတ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(82,'ငဇန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(83,'စကန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(84,'ဆမရ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(85,'ဆလက',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(86,'တဆန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(87,'တမန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(88,'ထခန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(89,'ထပခ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(90,'ဒဟန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(91,'ဒပယ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(92,'နယန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(93,'ပလန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(94,'ပလဘ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(95,'ပဆန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(96,'ဖပန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(97,'ဗမန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(98,'ဘတလ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(99,'မမတ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(100,'မမန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(101,'မသန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(102,'မလန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(103,'မရန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(104,'မကန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(105,'မပလ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(106,'ယမပ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(107,'ရဘန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(108,'ရဥန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(109,'လရန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(110,'လဟန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(111,'ဝလန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(112,'ဝသန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(113,'ဟမလ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(114,'အရတ',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(115,'အတန',5,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(116,'ကစန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(117,'ကလအ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(118,'ကသန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(119,'ကရရ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(120,'ခမက',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(121,'တသရ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(122,'ထဝန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(123,'ပကမ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(124,'ပလန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(125,'ပလတ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(126,'ဘပန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(127,'မတန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(128,'မအရ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(129,'မအန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(130,'မမန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(131,'ရဖန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(132,'လလန',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(133,'သရခ',6,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(134,'ကကန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(135,'ကတခ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(136,'ကဝန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(137,'ကပက',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(138,'ဇကန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(139,'ညလပ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(140,'တငန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(141,'ထတပ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(142,'ဒဥန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(143,'နတလ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(144,'ပခန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(145,'ပမန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(146,'ပတတ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(147,'ပတန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(148,'ပခတ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(149,'ဖမန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(150,'မလန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(151,'မညန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(152,'ရတန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(153,'ရတရ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(154,'ရကန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(155,'လပတ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(156,'ဝမန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(157,'သဝတ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(158,'သနပ',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(159,'သကန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(160,'အဖန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(161,'အတန',7,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(162,'ကမန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(163,'ကထန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(164,'ခမန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(165,'ဂဂန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(166,'ငဖန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(167,'စလန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(168,'စတရ',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(169,'ဆပဝ',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(170,'ဆဖန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(171,'ဆမန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(172,'တတက',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(173,'ထလန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(174,'နမန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(175,'ပဖန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(176,'ပခက',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(177,'ပမန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(178,'မကန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(179,'မသန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(180,'မဘန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(181,'မလန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(182,'မမန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(183,'မထန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(184,'မတန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(185,'ရနခ',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(186,'ရစက',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(187,'သရန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(188,'အလန',8,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(189,'ကဆန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(190,'ကပတ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(191,'ခအဇ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(192,'ခမစ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(193,'ငဇန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(194,'ငသရ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(195,'ညဥန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(196,'စကန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(197,'စကတ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(198,'ဇဗသ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(199,'ဇယသ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(200,'တကတ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(201,'တတဥ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(202,'တကန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(203,'တသန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(204,'ဒခသ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(205,'နထက',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(206,'ပကခ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(207,'ပသက',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(208,'ပဥလ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(209,'ပဘန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(210,'ပဗသ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(211,'ပမန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(212,'မနတ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(213,'မရမ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(214,'မရတ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(215,'မဟမ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(216,'မမန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(217,'မတရ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(218,'မကန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(219,'မနမ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(220,'မသန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(221,'မခန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(222,'မထလ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(223,'မလန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(224,'ရမသ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(225,'လဝန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(226,'ဝတန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(227,'သစန',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(228,'သပက',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(229,'အမဇ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(230,'အမရ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(231,'ဥတသ',9,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(232,'ကမရ',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(233,'ကထန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(234,'ခဆန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(235,'ခဇန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(236,'ပမန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(237,'ဘလန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(238,'မလမ',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(239,'မဒန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(240,'ရမန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(241,'လမန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(242,'သဖရ',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(243,'သထန',10,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(244,'ကတန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(245,'ကဖန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(246,'ကတလ',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(247,'ဂမန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(248,'စတန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(249,'တပဝ',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(250,'တကန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(251,'ပဏက',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(252,'ပတန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(253,'ဘသတ',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(254,'မဥန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(255,'မပန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(256,'မအန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(257,'မပန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(258,'မအတ',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(259,'မတန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(260,'ရသတ',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(261,'ရဗန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(262,'ရဗန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(263,'သတန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(264,'အမန',11,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(265,'ကတတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(266,'ကမတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(267,'ကမရ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(268,'ကတန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(269,'ကမန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(270,'ကခက',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(271,'ကကက',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(272,'ခရန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(273,'စခန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(274,'ဆကခ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(275,'ဆကန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(276,'တမန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(277,'တတတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(278,'တတန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(279,'တကန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(280,'တတထ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(281,'ထတပ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(282,'ဒပန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(283,'ဒဂန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(284,'ဒဂမ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(285,'ဒဂရ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(286,'ဒဂတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(287,'ဒဂဆ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(288,'ဒလန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(289,'ပဇတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(290,'ပဘတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(291,'ဗတထ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(292,'ဗဟန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(293,'မရက',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(294,'မဂဒ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(295,'မဘန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(296,'မဂတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(297,'ရကန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(298,'ရပသ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(299,'လမတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(300,'လသန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(301,'လမန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(302,'လကန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(303,'လသယ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(304,'သဃက',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(305,'သလန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(306,'သခန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(307,'သကတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(308,'အစန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(309,'အလန',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(310,'ဥကတ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(311,'ဥကမ',12,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(312,'ကလန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(313,'ကတလ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(314,'ကဟန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(315,'ကသန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(316,'ကလဒ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(317,'ကတတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(318,'ကလတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(319,'ကခန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(320,'ကမန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(321,'ကကန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(322,'ကတန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(323,'ကလထ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(324,'ခလန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(325,'ခရဟ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(326,'ဆဆန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(327,'ညရန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(328,'တကန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(329,'တယန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(330,'တခလ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(331,'တလန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(332,'တမည',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(333,'တတန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(334,'နတရ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(335,'နစန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(336,'နဖန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(337,'နခန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(338,'နခတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(339,'နမတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(340,'နဆန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(341,'နတန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(342,'ပတယ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(343,'ပဝန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(344,'ပလန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(345,'ပယန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(346,'ပလတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(347,'ပဆန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(348,'ပဆတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(349,'ပလထ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(350,'ပပက',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(351,'ဖခန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(352,'မကန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(353,'မရန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(354,'မနတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(355,'မနန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(356,'မမန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(357,'မပန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(358,'မစန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(359,'မရတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(360,'မဖတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(361,'မကထ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(362,'မဆတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(363,'မထတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(364,'မလန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(365,'မယန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(366,'မပထ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(367,'မခန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(368,'မပတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(369,'မတတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(370,'မငန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(371,'မလတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(372,'မမတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(373,'မဘန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(374,'မဟရ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(375,'မမထ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(376,'မဆန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(377,'မခတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(378,'မတန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(379,'မကတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(380,'မထန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(381,'မဖန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(382,'မယတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(383,'မယထ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(384,'ရငန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(385,'ရစန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(386,'လလန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(387,'လခန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(388,'လခတ',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(389,'လရန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(390,'လကန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(391,'သနန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(392,'သပန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(393,'ဟပန',13,'2024-11-21 23:46:51','2024-11-21 23:46:51'),(394,'ဟမန',13,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(395,'ဟပတ',13,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(396,'အတန',13,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(397,'ကကထ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(398,'ကကန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(399,'ကပန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(400,'ကခန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(401,'ကလန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(402,'ငဆန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(403,'ငပတ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(404,'ငရက',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(405,'ငသခ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(406,'ဇလန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(407,'ညတန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(408,'ဒဒရ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(409,'ဓနဖ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(410,'ပသန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(411,'ပတန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(412,'ပသရ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(413,'ပစလ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(414,'ဖပန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(415,'ဘကလ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(416,'မအန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(417,'မအပ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(418,'မမက',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(419,'မမန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(420,'ရသယ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(421,'ရကန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(422,'လမန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(423,'လပတ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(424,'ဝခမ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(425,'သပန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(426,'ဟသတ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(427,'ဟကက',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(428,'အမတ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(429,'အဂပ',14,'2024-11-21 23:46:52','2024-11-21 23:46:52'),(430,'အမန',14,'2024-11-21 23:46:52','2024-11-21 23:46:52');
/*!40000 ALTER TABLE `nrc_township_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `past_occupations`
--

DROP TABLE IF EXISTS `past_occupations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `past_occupations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `rank_id` bigint unsigned DEFAULT NULL,
  `department_id` bigint unsigned DEFAULT NULL,
  `section_id` bigint unsigned DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `past_occupations_staff_id_foreign` (`staff_id`),
  KEY `past_occupations_rank_id_foreign` (`rank_id`),
  KEY `past_occupations_department_id_foreign` (`department_id`),
  KEY `past_occupations_section_id_foreign` (`section_id`),
  CONSTRAINT `past_occupations_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `past_occupations_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `past_occupations_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL,
  CONSTRAINT `past_occupations_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `past_occupations`
--

LOCK TABLES `past_occupations` WRITE;
/*!40000 ALTER TABLE `past_occupations` DISABLE KEYS */;
INSERT INTO `past_occupations` VALUES (5,3,14,1,1,'နေပြည်တော်','2011-03-09','2012-08-17','-','2024-11-22 02:28:02','2024-11-22 02:28:02'),(6,3,12,1,1,'ရန်ကုန်','2018-08-18','2018-07-31','-','2024-11-22 02:28:02','2024-11-22 02:28:02'),(7,3,11,1,1,'ရန်ကုန်','2018-06-01','2021-02-25','-','2024-11-22 02:28:02','2024-11-22 02:28:02'),(8,3,7,1,1,'ရန်ကုန်','2021-02-26','2024-11-22','-','2024-11-22 02:28:02','2024-11-22 02:28:02');
/*!40000 ALTER TABLE `past_occupations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payscales`
--

DROP TABLE IF EXISTS `payscales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payscales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `increment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `similiar_rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supply` int NOT NULL DEFAULT '0',
  `staff_type_id` bigint unsigned DEFAULT NULL,
  `allowed_qty` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payscales_staff_type_id_foreign` (`staff_type_id`),
  CONSTRAINT `payscales_staff_type_id_foreign` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payscales`
--

LOCK TABLES `payscales` WRITE;
/*!40000 ALTER TABLE `payscales` DISABLE KEYS */;
INSERT INTO `payscales` VALUES (1,'၅၅၀၀၀၀','550000','0','ညွှန်ကြားရေးမှုးချုပ် / ဦးဆောင်ညွှန်ကြားရေးမှုးနှင့်အဆင့်တူ','550000',0,1,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'၄၁၈၀၀၀-၄၀၀၀-၄၃၈၀၀၀','418000','40000','ဒုတိယညွှန်ကြားရေးမှုးချုပ်နှင့် အဆင့်တူ','438000',0,1,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'၃၇၄၀၀၀-၄၀၀၀-၃၉၄၀၀၀','374000','40000','ညွှန်ကြားရေးမှုးနှင့်အဆင့်တူ','394000',0,1,26,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'၃၄၁၀၀၀-၄၀၀၀-၃၆၁၀၀၀','341000','40000','ဒုတိယညွှန်ကြားရေးမှုးနှင့်အဆင့်တူ','361000',0,1,68,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'၃၀၈၀၀၀-၄၀၀၀-၃၂၈၀၀၀','308000','40000','လက်ထောက်ညွှန်ကြားရေးမှုးနှင့်အဆင့်တူ','328000',0,1,101,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'၂၇၅၀၀၀-၄၀၀၀-၂၉၅၀၀၀','275000','40000','ဦးစီးအရာရှိနှင့်အဆင့်တူ','295000',0,1,175,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'၂၃၄၀၀၀-၂၀၀၀-၂၄၄၀၀၀','234000','2000','ရုံးအုပ်နှင့်အဆင့်တူ','244000',0,2,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(8,'၂၁၆၀၀၀-၂၀၀၀-၂၂၆၀၀၀','216000','2000','ဒုတိယဦးစီးမှုးနှင့်အဆင့်တူ','226000',0,2,194,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(9,'၁၉၈၀၀၀-၂၀၀၀-၂၀၈၀၀၀','198000','2000','အကြီးတန်းစာရေးနှင့်အဆင့်တူ','208000',0,2,98,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(10,'၁၈၀၀၀၀-၂၀၀၀-၁၉၀၀၀၀','180000','2000','အငယ်တန်းစာရေးနှင့်အဆင့်တူ','190000',0,2,91,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(11,'၁၆၂၀၀၀-၂၀၀၀-၁၇၂၀၀၀','162000','2000','ရုံးအကူမှူးနှင့်အဆင့်တူ','172000',0,2,39,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(12,'၁၄၄၀၀၀-၂၀၀၀-၁၅၄၀၀၀','144000','2000','ရုံးအကူနှင့်အဆင့်တူ','154000',0,2,56,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(13,'4800','4800','0','နေ့စား','6800',0,3,100,'2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `payscales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penalty_types`
--

DROP TABLE IF EXISTS `penalty_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penalty_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penalty_types`
--

LOCK TABLES `penalty_types` WRITE;
/*!40000 ALTER TABLE `penalty_types` DISABLE KEYS */;
INSERT INTO `penalty_types` VALUES (1,'စာဖြင့်သတိပေးခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'နှစ်တိုးလစာရပ်ဆိုင်းခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'ရာထူးတိုးမြှင့်ခြင်းကိုရပ်ဆိုင်းခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'လစာနှုန်းအတွင်း လစာလျှော့ချခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'ရာထူးအဆင့်လျှော့ချခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'ငွေကြေးဆုံးရှုံးမှုတန်ဖိုး အပြည့်အဝ (သို့) တစ်စိတ်တစ်ဒေသကို ပေးလျော်စေခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'တာဝန်မှယာယီရပ်ဆိုင်းခဲ့သည့်ကာလအတွက် လစာအပြည့်ခံစားခွင့်မပြုခြင်း (သို့) တာဝန်ချိန်အဖြစ်မသတ်မှတ်ခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'ရာထူးမှထုတ်ပယ်ခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(9,'ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်ခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(10,'တာဝန်မှယာယီရပ်စဲခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(11,'ဒေသပြောင်းရွှေ့ခြင်း','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `penalty_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pension_types`
--

DROP TABLE IF EXISTS `pension_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pension_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pension_types`
--

LOCK TABLES `pension_types` WRITE;
/*!40000 ALTER TABLE `pension_types` DISABLE KEYS */;
INSERT INTO `pension_types` VALUES (1,'သက်ပြည့်ပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'နှစ်ပြည့်ပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'နာမကျန်းပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'လျော်ကြေးပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'အထူးပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'မိသားစုပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'လျှော့ပေါ့ပင်စင်','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `pension_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pension_years`
--

DROP TABLE IF EXISTS `pension_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pension_years` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pension_years`
--

LOCK TABLES `pension_years` WRITE;
/*!40000 ALTER TABLE `pension_years` DISABLE KEYS */;
INSERT INTO `pension_years` VALUES (1,'1010','2024-11-21 23:46:52','2024-11-21 23:46:52');
/*!40000 ALTER TABLE `pension_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postings`
--

DROP TABLE IF EXISTS `postings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `rank_id` bigint unsigned DEFAULT NULL,
  `post_id` bigint unsigned DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `department_id` bigint unsigned DEFAULT NULL,
  `division_id` bigint unsigned DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ministry_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `postings_staff_id_foreign` (`staff_id`),
  KEY `postings_rank_id_foreign` (`rank_id`),
  KEY `postings_post_id_foreign` (`post_id`),
  KEY `postings_department_id_foreign` (`department_id`),
  KEY `postings_division_id_foreign` (`division_id`),
  CONSTRAINT `postings_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `postings_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `postings_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `postings_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `postings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postings`
--

LOCK TABLES `postings` WRITE;
/*!40000 ALTER TABLE `postings` DISABLE KEYS */;
INSERT INTO `postings` VALUES (2,4,14,1,'2018-02-05','2021-02-25',1,4,'ရန်ကုန်မြို့','-',1,'2024-11-22 01:56:53','2024-11-22 01:56:53'),(3,4,12,1,'2021-02-26','2023-06-25',1,11,'ရန်ကုန်မြို့','-',1,'2024-11-22 01:56:53','2024-11-22 01:56:53'),(4,4,9,1,'2023-06-26','2024-11-22',1,11,'ရန်ကုန်မြို့','-',1,'2024-11-22 01:56:53','2024-11-22 01:56:53'),(5,5,20,1,'0019-09-04','2021-11-07',1,11,'ရန်ကုန်','-',1,'2024-11-22 01:59:42','2024-11-22 01:59:42'),(6,5,14,1,'2021-11-08','2024-11-22',1,11,'ရန်ကုန်','-',1,'2024-11-22 01:59:42','2024-11-22 01:59:42'),(7,3,14,1,'2011-03-09','2012-08-17',1,9,'နေပြည်တော်','-',1,'2024-11-22 02:03:14','2024-11-22 02:03:14'),(8,3,12,1,'2012-08-18','2018-07-31',1,2,'ရန်ကုန်','-',1,'2024-11-22 02:03:14','2024-11-22 02:03:14'),(9,3,11,1,'2018-06-01','2021-02-25',1,11,'ရန်ကုန်','-',1,'2024-11-22 02:03:14','2024-11-22 02:03:14'),(10,3,7,1,'2021-02-26','2024-11-22',1,11,'ရန်ကုန်','-',1,'2024-11-22 02:03:14','2024-11-22 02:03:14'),(11,2,6,1,'2024-11-18','2024-11-18',1,11,'ရန်ကုန်','ဝန်ထမ်းရေးရာ',1,'2024-11-22 02:15:20','2024-11-22 02:15:20'),(12,6,14,1,'2016-03-25','2016-11-10',1,1,'ရန်ကုန်','-',1,'2024-11-28 03:47:22','2024-11-28 03:47:22');
/*!40000 ALTER TABLE `postings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'aa','2024-11-21 23:46:54','2024-11-21 23:46:54');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `rank_id` bigint unsigned DEFAULT NULL,
  `previous_rank_id` bigint unsigned DEFAULT NULL,
  `promotion_date` date NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_previous_rank_id_foreign` (`previous_rank_id`),
  CONSTRAINT `promotions_previous_rank_id_foreign` FOREIGN KEY (`previous_rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `punishment_criminals`
--

DROP TABLE IF EXISTS `punishment_criminals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `punishment_criminals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `verdict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `punishment_criminals_staff_id_foreign` (`staff_id`),
  CONSTRAINT `punishment_criminals_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punishment_criminals`
--

LOCK TABLES `punishment_criminals` WRITE;
/*!40000 ALTER TABLE `punishment_criminals` DISABLE KEYS */;
/*!40000 ALTER TABLE `punishment_criminals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `punishments`
--

DROP TABLE IF EXISTS `punishments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `punishments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `penalty_type_id` bigint unsigned DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `punishments_staff_id_foreign` (`staff_id`),
  KEY `punishments_penalty_type_id_foreign` (`penalty_type_id`),
  CONSTRAINT `punishments_penalty_type_id_foreign` FOREIGN KEY (`penalty_type_id`) REFERENCES `penalty_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `punishments_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punishments`
--

LOCK TABLES `punishments` WRITE;
/*!40000 ALTER TABLE `punishments` DISABLE KEYS */;
/*!40000 ALTER TABLE `punishments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ranks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_type_id` bigint unsigned DEFAULT NULL,
  `payscale_id` bigint unsigned DEFAULT NULL,
  `allowed_qty` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ranks_staff_type_id_foreign` (`staff_type_id`),
  KEY `ranks_payscale_id_foreign` (`payscale_id`),
  CONSTRAINT `ranks_payscale_id_foreign` FOREIGN KEY (`payscale_id`) REFERENCES `payscales` (`id`) ON DELETE SET NULL,
  CONSTRAINT `ranks_staff_type_id_foreign` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
INSERT INTO `ranks` VALUES (1,'ညွှန်ကြားရေးမှူးချုပ်',1,1,1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'ဒုတိယညွှန်ကြားရေးမှူးချုပ်',1,2,4,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'ညွှန်ကြားရေးမှူး',1,3,26,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'ဒုတိယညွှန်ကြားရေးမှူး',1,4,68,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'လက်ထောက်ညွှန်ကြားရေးမှူး',1,5,101,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'ဦးစီးအရာရှိ',1,6,175,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'ရုံးအုပ်',2,7,3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'စာရင်းကိုင်(၁)',2,7,3,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(9,'ဒုတိယဦးစီးမှူး',2,8,179,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(10,'စာရင်းကိုင်(၂)',2,8,8,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(11,'ဌာနခွဲစာရေး',2,8,7,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(12,'အကြီးတန်းစာ‌ရေး',2,9,86,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(13,'စာရင်းကိုင်(၃)',2,9,12,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(14,'အငယ်တန်းစာရေး',2,10,78,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(15,'စာရင်းကိုင်(၄)',2,10,12,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(16,'ယာဉ်မောင်းစက်ပြင်',2,10,1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(17,'ရုံးအကူမှူး',2,11,2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(18,'စာကူးစက်လှည့်',2,11,1,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(19,'ယာဉ်မောင်း(၅)',2,11,36,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(20,'ရုံးအကူ',2,12,37,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(21,'သန့်ရှင်း‌ရေးအကူ',2,12,17,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(22,'အစောင့်',2,12,2,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(23,'နေ့စား',3,13,100,'2024-11-21 23:46:50','2024-11-21 23:46:50'),(24,'﻿ညွှန်ကြားရေးမှူးချုပ်',NULL,NULL,0,NULL,NULL),(25,'ဒုတိယညွှန်ကြားရေးမှူးချုပ်',NULL,NULL,0,NULL,NULL),(26,'ညွှန်ကြားရေးမှူး',NULL,NULL,0,NULL,NULL),(27,'ဒုတိယညွှန်ကြားရေးမှူး',NULL,NULL,0,NULL,NULL),(28,'လက်ထောက်ညွှန်ကြားရေးမှူး',NULL,NULL,0,NULL,NULL),(29,'ဦးစီးအရာရှိ',NULL,NULL,0,NULL,NULL),(30,'ရုံးအုပ်',NULL,NULL,0,NULL,NULL),(31,'စာရင်းကိုင်(၁)',NULL,NULL,0,NULL,NULL),(32,'ဒုတိယဦးစီးမှူး',NULL,NULL,0,NULL,NULL),(33,'ဌာနခွဲစာရေး',NULL,NULL,0,NULL,NULL),(34,'စာရင်းကိုင်(၂)',NULL,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommendations`
--

DROP TABLE IF EXISTS `recommendations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recommendations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `recommend_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommendation_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recommendations_staff_id_foreign` (`staff_id`),
  CONSTRAINT `recommendations_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommendations`
--

LOCK TABLES `recommendations` WRITE;
/*!40000 ALTER TABLE `recommendations` DISABLE KEYS */;
INSERT INTO `recommendations` VALUES (1,5,'မရှိပါ။','ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန','ရင်းနီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန','အငယ်တန်းစာရေး ','-','-','2024-11-22 01:59:42','2024-11-22 01:59:42'),(2,6,'ဦးမင်းဇော်ဦး','ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန','ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန','ဒုတိယညွှန်ကြားရေးမှူးချုပ်','ငငနး်နးနင်ြန','---','2024-11-28 03:47:22','2024-11-28 03:47:22');
/*!40000 ALTER TABLE `recommendations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'နေပြည်တော်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'ကချင်ပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'ကယားပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'ကရင်ပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'ချင်းပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'စစ်ကိုင်းတိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'တနင်္သာရီတိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(8,'ပဲခူးတိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(9,'မကွေးတိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(10,'မန္တလေးတိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(11,'မွန်ပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(12,'ရခိုင်ပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(13,'ရန်ကုန်တိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49'),(14,'ရှမ်းပြည်နယ်','2024-11-21 23:46:49','2024-11-21 23:46:49'),(15,'ဧရာဝတီတိုင်း','2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (1,'ဇနီး','2024-11-21 23:46:50','2024-11-21 23:46:50'),(2,'ခင်ပွန်း','2024-11-21 23:46:50','2024-11-21 23:46:50'),(3,'သား','2024-11-21 23:46:50','2024-11-21 23:46:50'),(4,'သမီး','2024-11-21 23:46:50','2024-11-21 23:46:50'),(5,'မိခင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(6,'ဖခင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(7,'အကို','2024-11-21 23:46:50','2024-11-21 23:46:50'),(8,'အမ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(9,'ညီ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(10,'မောင်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(11,'ညီမ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(12,'ဦးလေး','2024-11-21 23:46:50','2024-11-21 23:46:50'),(13,'အဒေါ်','2024-11-21 23:46:50','2024-11-21 23:46:50'),(14,'တူ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(15,'တူမ','2024-11-21 23:46:50','2024-11-21 23:46:50'),(16,'အဖိုး','2024-11-21 23:46:50','2024-11-21 23:46:50'),(17,'အဖွား','2024-11-21 23:46:50','2024-11-21 23:46:50'),(18,'မြေး','2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religions`
--

DROP TABLE IF EXISTS `religions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `religions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religions`
--

LOCK TABLES `religions` WRITE;
/*!40000 ALTER TABLE `religions` DISABLE KEYS */;
INSERT INTO `religions` VALUES (1,'ဗုဒ္ဓ','2024-11-21 23:46:52','2024-11-21 23:46:52'),(2,'ခရစ်ယာန်','2024-11-21 23:46:52','2024-11-21 23:46:52'),(3,'ဟိန္ဒူ','2024-11-21 23:46:52','2024-11-21 23:46:52'),(4,'အစ္စလာမ်','2024-11-21 23:46:52','2024-11-21 23:46:52'),(5,'အခြား','2024-11-21 23:46:52','2024-11-21 23:46:52');
/*!40000 ALTER TABLE `religions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retire_types`
--

DROP TABLE IF EXISTS `retire_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `retire_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retire_types`
--

LOCK TABLES `retire_types` WRITE;
/*!40000 ALTER TABLE `retire_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `retire_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `permission_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permissions_role_id_foreign` (`role_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin',NULL,NULL),(2,'HR',NULL,NULL),(3,'Finance',NULL,NULL),(4,'HR User',NULL,NULL),(5,'Finance User',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `rank_id` bigint unsigned DEFAULT NULL,
  `salary_month` date DEFAULT NULL,
  `current_salary` int DEFAULT NULL,
  `current_salary_day` date DEFAULT NULL,
  `previous_salary_before_increment` int DEFAULT NULL,
  `previous_salary_before_increment_day` date DEFAULT NULL,
  `previous_salary_before_promotion` int DEFAULT NULL,
  `previous_salary_before_promotion_day` date DEFAULT NULL,
  `addition` int DEFAULT NULL,
  `addition_education` int DEFAULT NULL,
  `addition_ration` int DEFAULT NULL,
  `deduction` int DEFAULT NULL,
  `deduction_insurance` int DEFAULT NULL,
  `deduction_tax` int DEFAULT NULL,
  `actual_salary` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries`
--

LOCK TABLES `salaries` WRITE;
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `education_group_id` bigint unsigned DEFAULT NULL,
  `education_type_id` bigint unsigned DEFAULT NULL,
  `education_id` bigint unsigned DEFAULT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schools_staff_id_foreign` (`staff_id`),
  KEY `schools_education_group_id_foreign` (`education_group_id`),
  KEY `schools_education_type_id_foreign` (`education_type_id`),
  KEY `schools_education_id_foreign` (`education_id`),
  CONSTRAINT `schools_education_group_id_foreign` FOREIGN KEY (`education_group_id`) REFERENCES `education_groups` (`id`) ON DELETE SET NULL,
  CONSTRAINT `schools_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE SET NULL,
  CONSTRAINT `schools_education_type_id_foreign` FOREIGN KEY (`education_type_id`) REFERENCES `education_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `schools_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (2,3,2,4,19,'ဒဂုံတက္ကသိုလ်','ရန်ကုန်','စတုတ္ထနှစ်','၄ပ-၃၆၅','ပထဝီ','2019-03-22','2019-05-22','၂၀၁၉','-','-','-','2024-11-22 02:28:02','2024-11-22 02:28:02');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_division_id_foreign` (`division_id`),
  CONSTRAINT `sections_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'test',NULL,'2024-11-21 23:46:50','2024-11-21 23:46:50');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `1` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('JVSsOGu0s8r7JZ2In4MMChfBILuNqR2jYl2nM8t5',1,'172.16.11.253','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:132.0) Gecko/20100101 Firefox/132.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNDFWU1ZPUFRNTzV2Y0htSkpGemVwdmpNUGVQOEJmZVZoM2k1dWZsZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xNzIuMTYuMTEuMjUzOjgwODAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1732869893),('UQxiZ6wh640k9kjFWDizOpzmP2s3SbVkio7GxH7X',NULL,'172.16.11.253','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:132.0) Gecko/20100101 Firefox/132.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXRSeGhOcnVUaU5GM0hXNzlQM3VjM01jRUlzT05HNVJRdDJNNFVsUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xNzIuMTYuMTEuMjUzOjgwODAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1733111954),('WBRIe8L6o8KSEJvb82ixqecFUjFzfXMGSWy0ERqm',3,'172.16.11.105','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzBtTkVhWkFQdDkyQTFDcHZ5Sm92d3Y2b25Mb3JGdGJKSmdSM0laRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xNzIuMTYuMTEuMjUzOjgwODAvc3RhZmZfZGV0YWlsLzAvMS82L3JlbGF0aXZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9',1732874465);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siblings`
--

DROP TABLE IF EXISTS `siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siblings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `siblings_staff_id_foreign` (`staff_id`),
  KEY `siblings_ethnic_id_foreign` (`ethnic_id`),
  KEY `siblings_religion_id_foreign` (`religion_id`),
  KEY `siblings_gender_id_foreign` (`gender_id`),
  KEY `siblings_relation_id_foreign` (`relation_id`),
  CONSTRAINT `siblings_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `siblings_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `siblings_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `siblings_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `siblings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siblings`
--

LOCK TABLES `siblings` WRITE;
/*!40000 ALTER TABLE `siblings` DISABLE KEYS */;
INSERT INTO `siblings` VALUES (2,4,'ဦးကျော်မျိုးဦး',1,1,1,'ချောင်းကျိုးရွာ၊ ','တောင်ယာ','ချောင်းကျိုးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',7,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(3,4,'ဦးရဲမင်းဇော်',1,1,1,'ချောင်းကျိုးရွာ၊ ','တောင်ယာ','ချောင်းကျိုးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',7,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(4,4,'ဒေါ်အေးအေးမွန်',1,1,2,'ချောင်းကျိုးရွာ၊ ','မူပြ','တောင်လည်ကျေးရွာစံပြအုပ်စု၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး',11,'2024-11-22 02:16:15','2024-11-22 02:16:15'),(6,2,'‌ဒေါ်ရူပမာ လာသွင်',1,1,2,'ရန်ကုန်မြို့','ကထိက(IR) ဒဂုံတက္ကသိုလ်','အမှတ်(၄)ရပ်ကွက်၊ ကျန်စစ် သား(၂)လမ်း၊ လှည်းကူးမြို့။',8,'2024-11-22 02:20:31','2024-11-22 02:20:31');
/*!40000 ALTER TABLE `siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_activities`
--

DROP TABLE IF EXISTS `social_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_activities_staff_id_foreign` (`staff_id`),
  CONSTRAINT `social_activities_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_activities`
--

LOCK TABLES `social_activities` WRITE;
/*!40000 ALTER TABLE `social_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spouse_father_siblings`
--

DROP TABLE IF EXISTS `spouse_father_siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spouse_father_siblings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spouse_father_siblings_staff_id_foreign` (`staff_id`),
  KEY `spouse_father_siblings_ethnic_id_foreign` (`ethnic_id`),
  KEY `spouse_father_siblings_religion_id_foreign` (`religion_id`),
  KEY `spouse_father_siblings_gender_id_foreign` (`gender_id`),
  KEY `spouse_father_siblings_relation_id_foreign` (`relation_id`),
  CONSTRAINT `spouse_father_siblings_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_father_siblings_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_father_siblings_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_father_siblings_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_father_siblings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spouse_father_siblings`
--

LOCK TABLES `spouse_father_siblings` WRITE;
/*!40000 ALTER TABLE `spouse_father_siblings` DISABLE KEYS */;
/*!40000 ALTER TABLE `spouse_father_siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spouse_mother_siblings`
--

DROP TABLE IF EXISTS `spouse_mother_siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spouse_mother_siblings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spouse_mother_siblings_staff_id_foreign` (`staff_id`),
  KEY `spouse_mother_siblings_ethnic_id_foreign` (`ethnic_id`),
  KEY `spouse_mother_siblings_religion_id_foreign` (`religion_id`),
  KEY `spouse_mother_siblings_gender_id_foreign` (`gender_id`),
  KEY `spouse_mother_siblings_relation_id_foreign` (`relation_id`),
  CONSTRAINT `spouse_mother_siblings_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_mother_siblings_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_mother_siblings_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_mother_siblings_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_mother_siblings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spouse_mother_siblings`
--

LOCK TABLES `spouse_mother_siblings` WRITE;
/*!40000 ALTER TABLE `spouse_mother_siblings` DISABLE KEYS */;
/*!40000 ALTER TABLE `spouse_mother_siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spouse_siblings`
--

DROP TABLE IF EXISTS `spouse_siblings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spouse_siblings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spouse_siblings_staff_id_foreign` (`staff_id`),
  KEY `spouse_siblings_ethnic_id_foreign` (`ethnic_id`),
  KEY `spouse_siblings_religion_id_foreign` (`religion_id`),
  KEY `spouse_siblings_gender_id_foreign` (`gender_id`),
  KEY `spouse_siblings_relation_id_foreign` (`relation_id`),
  CONSTRAINT `spouse_siblings_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_siblings_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_siblings_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_siblings_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouse_siblings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spouse_siblings`
--

LOCK TABLES `spouse_siblings` WRITE;
/*!40000 ALTER TABLE `spouse_siblings` DISABLE KEYS */;
/*!40000 ALTER TABLE `spouse_siblings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spouses`
--

DROP TABLE IF EXISTS `spouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spouses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `gender_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` bigint unsigned DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spouses_staff_id_foreign` (`staff_id`),
  KEY `spouses_ethnic_id_foreign` (`ethnic_id`),
  KEY `spouses_religion_id_foreign` (`religion_id`),
  KEY `spouses_gender_id_foreign` (`gender_id`),
  KEY `spouses_relation_id_foreign` (`relation_id`),
  CONSTRAINT `spouses_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouses_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouses_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouses_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `spouses_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spouses`
--

LOCK TABLES `spouses` WRITE;
/*!40000 ALTER TABLE `spouses` DISABLE KEYS */;
INSERT INTO `spouses` VALUES (1,3,'ဦးအောင်ကိုသက်',1,1,1,'ဒုတ်ရိုက်ကုန်းရွာ၊ မြန်အောင်မြို့နယ်၊ ဧရာဝတီတိုင်း','ဝန်ထမ်း','ဒုတ်ရိုက်ကုန်းရွာ၊ မြန်အောင်မြို့နယ်၊ ဧရာဝတီတိုင်း',2,NULL,'2024-11-22 02:15:50','2024-11-22 02:15:50');
/*!40000 ALTER TABLE `spouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_photo` text COLLATE utf8mb4_unicode_ci,
  `staff_no` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci,
  `nick_name` text COLLATE utf8mb4_unicode_ci,
  `other_name` text COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `attendid` text COLLATE utf8mb4_unicode_ci,
  `gpms_staff_no` text COLLATE utf8mb4_unicode_ci,
  `spouse_name` text COLLATE utf8mb4_unicode_ci,
  `gender_id` bigint unsigned DEFAULT NULL,
  `ethnic_id` bigint unsigned DEFAULT NULL,
  `religion_id` bigint unsigned DEFAULT NULL,
  `height_feet` int DEFAULT NULL,
  `height_inch` int DEFAULT NULL,
  `hair_color` text COLLATE utf8mb4_unicode_ci,
  `eye_color` text COLLATE utf8mb4_unicode_ci,
  `prominent_mark` text COLLATE utf8mb4_unicode_ci,
  `skin_color` text COLLATE utf8mb4_unicode_ci,
  `weight` text COLLATE utf8mb4_unicode_ci,
  `blood_type_id` bigint unsigned DEFAULT NULL,
  `place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `nrc_region_id_id` bigint unsigned DEFAULT NULL,
  `nrc_township_code_id` bigint unsigned DEFAULT NULL,
  `nrc_sign_id` bigint unsigned DEFAULT NULL,
  `nrc_code` text COLLATE utf8mb4_unicode_ci,
  `nrc_front` text COLLATE utf8mb4_unicode_ci,
  `nrc_back` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `life_insurance_proposal` text COLLATE utf8mb4_unicode_ci,
  `life_insurance_policy_no` text COLLATE utf8mb4_unicode_ci,
  `life_insurance_premium` text COLLATE utf8mb4_unicode_ci,
  `current_address_street` text COLLATE utf8mb4_unicode_ci,
  `current_address_ward` text COLLATE utf8mb4_unicode_ci,
  `current_address_township_or_town_id` bigint unsigned DEFAULT NULL,
  `current_address_district_id` bigint unsigned DEFAULT NULL,
  `current_address_region_id` bigint unsigned DEFAULT NULL,
  `permanent_address_street` text COLLATE utf8mb4_unicode_ci,
  `permanent_address_ward` text COLLATE utf8mb4_unicode_ci,
  `permanent_address_township_or_town_id` bigint unsigned DEFAULT NULL,
  `permanent_address_district_id` bigint unsigned DEFAULT NULL,
  `permanent_address_region_id` bigint unsigned DEFAULT NULL,
  `previous_addresses` text COLLATE utf8mb4_unicode_ci,
  `military_solider_no` text COLLATE utf8mb4_unicode_ci,
  `military_join_date` date DEFAULT NULL,
  `military_dsa_no` text COLLATE utf8mb4_unicode_ci,
  `military_gazetted_no` text COLLATE utf8mb4_unicode_ci,
  `veteran_no` text COLLATE utf8mb4_unicode_ci,
  `veteran_date` date DEFAULT NULL,
  `military_gazetted_date` date DEFAULT NULL,
  `military_leave_date` date DEFAULT NULL,
  `military_leave_reason` text COLLATE utf8mb4_unicode_ci,
  `military_served_army` text COLLATE utf8mb4_unicode_ci,
  `military_brief_history_or_penalty` text COLLATE utf8mb4_unicode_ci,
  `military_pension` int DEFAULT NULL,
  `last_serve_army` text COLLATE utf8mb4_unicode_ci,
  `health_condition` text COLLATE utf8mb4_unicode_ci,
  `tax_exception` text COLLATE utf8mb4_unicode_ci,
  `education_group_id` bigint unsigned DEFAULT NULL,
  `education_type_id` bigint unsigned DEFAULT NULL,
  `education_id` bigint unsigned DEFAULT NULL,
  `father_name` text COLLATE utf8mb4_unicode_ci,
  `father_ethnic_id` bigint unsigned DEFAULT NULL,
  `father_religion_id` bigint unsigned DEFAULT NULL,
  `father_place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `father_occupation` text COLLATE utf8mb4_unicode_ci,
  `father_address_street` text COLLATE utf8mb4_unicode_ci,
  `father_address_ward` text COLLATE utf8mb4_unicode_ci,
  `father_address_township_or_town_id` bigint unsigned DEFAULT NULL,
  `father_address_district_id` bigint unsigned DEFAULT NULL,
  `father_address_region_id` bigint unsigned DEFAULT NULL,
  `spouse_father_name` text COLLATE utf8mb4_unicode_ci,
  `spouse_father_ethnic_id` bigint unsigned DEFAULT NULL,
  `spouse_father_religion_id` bigint unsigned DEFAULT NULL,
  `spouse_father_place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `spouse_father_occupation` text COLLATE utf8mb4_unicode_ci,
  `spouse_father_address_street` text COLLATE utf8mb4_unicode_ci,
  `spouse_father_address_ward` text COLLATE utf8mb4_unicode_ci,
  `spouse_father_address_township_or_town_id` bigint unsigned DEFAULT NULL,
  `spouse_father_address_district_id` bigint unsigned DEFAULT NULL,
  `spouse_father_address_region_id` bigint unsigned DEFAULT NULL,
  `mother_name` text COLLATE utf8mb4_unicode_ci,
  `mother_ethnic_id` bigint unsigned DEFAULT NULL,
  `mother_religion_id` bigint unsigned DEFAULT NULL,
  `mother_place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `mother_occupation` text COLLATE utf8mb4_unicode_ci,
  `mother_address_street` text COLLATE utf8mb4_unicode_ci,
  `mother_address_ward` text COLLATE utf8mb4_unicode_ci,
  `mother_address_township_or_town_id` bigint unsigned DEFAULT NULL,
  `mother_address_district_id` bigint unsigned DEFAULT NULL,
  `mother_address_region_id` bigint unsigned DEFAULT NULL,
  `spouse_mother_name` text COLLATE utf8mb4_unicode_ci,
  `spouse_mother_ethnic_id` bigint unsigned DEFAULT NULL,
  `spouse_mother_religion_id` bigint unsigned DEFAULT NULL,
  `spouse_mother_place_of_birth` text COLLATE utf8mb4_unicode_ci,
  `spouse_mother_occupation` text COLLATE utf8mb4_unicode_ci,
  `spouse_mother_address_street` text COLLATE utf8mb4_unicode_ci,
  `spouse_mother_address_ward` text COLLATE utf8mb4_unicode_ci,
  `spouse_mother_address_township_or_town_id` bigint unsigned DEFAULT NULL,
  `spouse_mother_address_district_id` bigint unsigned DEFAULT NULL,
  `spouse_mother_address_region_id` bigint unsigned DEFAULT NULL,
  `family_in_politics` tinyint(1) NOT NULL DEFAULT '0',
  `is_parents_citizen_when_staff_born` tinyint(1) NOT NULL DEFAULT '0',
  `current_rank_id` bigint unsigned DEFAULT NULL,
  `current_rank_date` date DEFAULT NULL,
  `current_department_id` bigint unsigned DEFAULT NULL,
  `transfer_department_id` bigint unsigned DEFAULT NULL,
  `current_division_id` bigint unsigned DEFAULT NULL,
  `transfer_remark` text COLLATE utf8mb4_unicode_ci,
  `side_department_id` bigint unsigned DEFAULT NULL,
  `side_division_id` bigint unsigned DEFAULT NULL,
  `salary_paid_by` bigint unsigned DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `government_staff_started_date` date DEFAULT NULL,
  `is_newly_appointed` tinyint(1) NOT NULL DEFAULT '0',
  `is_direct_appointed` tinyint(1) NOT NULL DEFAULT '0',
  `payscale_id` bigint unsigned DEFAULT NULL,
  `current_salary` int DEFAULT NULL,
  `current_increment_time` int DEFAULT NULL,
  `last_school_name` text COLLATE utf8mb4_unicode_ci,
  `last_school_subject` text COLLATE utf8mb4_unicode_ci,
  `last_school_row_no` text COLLATE utf8mb4_unicode_ci,
  `last_school_major` text COLLATE utf8mb4_unicode_ci,
  `student_life_political_social` text COLLATE utf8mb4_unicode_ci,
  `habit` text COLLATE utf8mb4_unicode_ci,
  `revolution` text COLLATE utf8mb4_unicode_ci,
  `transfer_reason_salary` text COLLATE utf8mb4_unicode_ci,
  `during_work_political_social` text COLLATE utf8mb4_unicode_ci,
  `has_military_friend` tinyint(1) DEFAULT '0',
  `foreigner_friend_name` text COLLATE utf8mb4_unicode_ci,
  `foreigner_friend_occupation` text COLLATE utf8mb4_unicode_ci,
  `foreigner_friend_nationality_id` bigint unsigned DEFAULT NULL,
  `foreigner_friend_country_id` bigint unsigned DEFAULT NULL,
  `foreigner_friend_how_to_know` text COLLATE utf8mb4_unicode_ci,
  `recommended_by_military_person` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status_changed_at` timestamp NULL DEFAULT NULL,
  `retire_date` date DEFAULT NULL,
  `retire_type_id` bigint unsigned DEFAULT NULL,
  `lost_contact_from_date` date DEFAULT NULL,
  `retire_remark` text COLLATE utf8mb4_unicode_ci,
  `pension_type_id` bigint unsigned DEFAULT NULL,
  `pension_salary` int DEFAULT NULL,
  `gratuity` int DEFAULT NULL,
  `pension_bank` text COLLATE utf8mb4_unicode_ci,
  `pension_office_order` text COLLATE utf8mb4_unicode_ci,
  `date_of_death` date DEFAULT NULL,
  `family_pension_inheritor` text COLLATE utf8mb4_unicode_ci,
  `family_pension_inheritor_relation_id` bigint unsigned DEFAULT NULL,
  `family_pension_date` date DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_gender_id_foreign` (`gender_id`),
  KEY `staff_ethnic_id_foreign` (`ethnic_id`),
  KEY `staff_religion_id_foreign` (`religion_id`),
  KEY `staff_blood_type_id_foreign` (`blood_type_id`),
  KEY `staff_nrc_region_id_id_foreign` (`nrc_region_id_id`),
  KEY `staff_nrc_township_code_id_foreign` (`nrc_township_code_id`),
  KEY `staff_nrc_sign_id_foreign` (`nrc_sign_id`),
  KEY `staff_current_address_township_or_town_id_foreign` (`current_address_township_or_town_id`),
  KEY `staff_current_address_district_id_foreign` (`current_address_district_id`),
  KEY `staff_current_address_region_id_foreign` (`current_address_region_id`),
  KEY `staff_permanent_address_township_or_town_id_foreign` (`permanent_address_township_or_town_id`),
  KEY `staff_permanent_address_district_id_foreign` (`permanent_address_district_id`),
  KEY `staff_permanent_address_region_id_foreign` (`permanent_address_region_id`),
  KEY `staff_father_ethnic_id_foreign` (`father_ethnic_id`),
  KEY `staff_father_religion_id_foreign` (`father_religion_id`),
  KEY `staff_father_address_township_or_town_id_foreign` (`father_address_township_or_town_id`),
  KEY `staff_father_address_district_id_foreign` (`father_address_district_id`),
  KEY `staff_father_address_region_id_foreign` (`father_address_region_id`),
  KEY `staff_spouse_father_ethnic_id_foreign` (`spouse_father_ethnic_id`),
  KEY `staff_spouse_father_religion_id_foreign` (`spouse_father_religion_id`),
  KEY `staff_spouse_father_address_township_or_town_id_foreign` (`spouse_father_address_township_or_town_id`),
  KEY `staff_spouse_father_address_district_id_foreign` (`spouse_father_address_district_id`),
  KEY `staff_spouse_father_address_region_id_foreign` (`spouse_father_address_region_id`),
  KEY `staff_mother_ethnic_id_foreign` (`mother_ethnic_id`),
  KEY `staff_mother_religion_id_foreign` (`mother_religion_id`),
  KEY `staff_mother_address_township_or_town_id_foreign` (`mother_address_township_or_town_id`),
  KEY `staff_mother_address_district_id_foreign` (`mother_address_district_id`),
  KEY `staff_mother_address_region_id_foreign` (`mother_address_region_id`),
  KEY `staff_spouse_mother_ethnic_id_foreign` (`spouse_mother_ethnic_id`),
  KEY `staff_spouse_mother_religion_id_foreign` (`spouse_mother_religion_id`),
  KEY `staff_spouse_mother_address_township_or_town_id_foreign` (`spouse_mother_address_township_or_town_id`),
  KEY `staff_spouse_mother_address_district_id_foreign` (`spouse_mother_address_district_id`),
  KEY `staff_spouse_mother_address_region_id_foreign` (`spouse_mother_address_region_id`),
  KEY `staff_current_rank_id_foreign` (`current_rank_id`),
  KEY `staff_current_department_id_foreign` (`current_department_id`),
  KEY `staff_transfer_department_id_foreign` (`transfer_department_id`),
  KEY `staff_current_division_id_foreign` (`current_division_id`),
  KEY `staff_side_department_id_foreign` (`side_department_id`),
  KEY `staff_side_division_id_foreign` (`side_division_id`),
  KEY `staff_salary_paid_by_foreign` (`salary_paid_by`),
  KEY `staff_payscale_id_foreign` (`payscale_id`),
  KEY `staff_foreigner_friend_nationality_id_foreign` (`foreigner_friend_nationality_id`),
  KEY `staff_foreigner_friend_country_id_foreign` (`foreigner_friend_country_id`),
  KEY `staff_pension_type_id_foreign` (`pension_type_id`),
  KEY `staff_family_pension_inheritor_relation_id_foreign` (`family_pension_inheritor_relation_id`),
  CONSTRAINT `staff_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_current_address_district_id_foreign` FOREIGN KEY (`current_address_district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_current_address_region_id_foreign` FOREIGN KEY (`current_address_region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_current_address_township_or_town_id_foreign` FOREIGN KEY (`current_address_township_or_town_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_current_department_id_foreign` FOREIGN KEY (`current_department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_current_division_id_foreign` FOREIGN KEY (`current_division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_current_rank_id_foreign` FOREIGN KEY (`current_rank_id`) REFERENCES `ranks` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_ethnic_id_foreign` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_family_pension_inheritor_relation_id_foreign` FOREIGN KEY (`family_pension_inheritor_relation_id`) REFERENCES `relations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_father_address_district_id_foreign` FOREIGN KEY (`father_address_district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_father_address_region_id_foreign` FOREIGN KEY (`father_address_region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_father_address_township_or_town_id_foreign` FOREIGN KEY (`father_address_township_or_town_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_father_ethnic_id_foreign` FOREIGN KEY (`father_ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_father_religion_id_foreign` FOREIGN KEY (`father_religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_foreigner_friend_country_id_foreign` FOREIGN KEY (`foreigner_friend_country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_foreigner_friend_nationality_id_foreign` FOREIGN KEY (`foreigner_friend_nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_mother_address_district_id_foreign` FOREIGN KEY (`mother_address_district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_mother_address_region_id_foreign` FOREIGN KEY (`mother_address_region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_mother_address_township_or_town_id_foreign` FOREIGN KEY (`mother_address_township_or_town_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_mother_ethnic_id_foreign` FOREIGN KEY (`mother_ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_mother_religion_id_foreign` FOREIGN KEY (`mother_religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_nrc_region_id_id_foreign` FOREIGN KEY (`nrc_region_id_id`) REFERENCES `nrc_region_ids` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_nrc_sign_id_foreign` FOREIGN KEY (`nrc_sign_id`) REFERENCES `nrc_signs` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_nrc_township_code_id_foreign` FOREIGN KEY (`nrc_township_code_id`) REFERENCES `nrc_township_codes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_payscale_id_foreign` FOREIGN KEY (`payscale_id`) REFERENCES `payscales` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_pension_type_id_foreign` FOREIGN KEY (`pension_type_id`) REFERENCES `pension_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_permanent_address_district_id_foreign` FOREIGN KEY (`permanent_address_district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_permanent_address_region_id_foreign` FOREIGN KEY (`permanent_address_region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_permanent_address_township_or_town_id_foreign` FOREIGN KEY (`permanent_address_township_or_town_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_salary_paid_by_foreign` FOREIGN KEY (`salary_paid_by`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_side_department_id_foreign` FOREIGN KEY (`side_department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_side_division_id_foreign` FOREIGN KEY (`side_division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_father_address_district_id_foreign` FOREIGN KEY (`spouse_father_address_district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_father_address_region_id_foreign` FOREIGN KEY (`spouse_father_address_region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_father_address_township_or_town_id_foreign` FOREIGN KEY (`spouse_father_address_township_or_town_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_father_ethnic_id_foreign` FOREIGN KEY (`spouse_father_ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_father_religion_id_foreign` FOREIGN KEY (`spouse_father_religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_mother_address_district_id_foreign` FOREIGN KEY (`spouse_mother_address_district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_mother_address_region_id_foreign` FOREIGN KEY (`spouse_mother_address_region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_mother_address_township_or_town_id_foreign` FOREIGN KEY (`spouse_mother_address_township_or_town_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_mother_ethnic_id_foreign` FOREIGN KEY (`spouse_mother_ethnic_id`) REFERENCES `ethnics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_spouse_mother_religion_id_foreign` FOREIGN KEY (`spouse_mother_religion_id`) REFERENCES `religions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_transfer_department_id_foreign` FOREIGN KEY (`transfer_department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,NULL,'333',' hnin su mon','hnin su mon','t','1987-09-05',NULL,NULL,'no',2,17,1,5,2,'black','black','left eye','brown','138',2,'weee',12,311,1,'207439','staffs/RW9NQcq2Vs3kLXBH2TsRX6lVgW0EFdxLcMgsmkKA.webp',NULL,'09420737495Local Training Report2','09420737495','snowsumon55@gmail.com',NULL,NULL,NULL,'eindra 8 lLocal Training Report2an ','ta ward',247,NULL,13,'eindra 8 lan ','ta ward',247,NULL,13,'wwww',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'kg ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5','2024-11-22 00:40:25','2024-11-22 00:52:27'),(2,NULL,'မရှိပါ','ဒေါ်သီရိမာလွင်','','ငငင','1999-08-31',NULL,NULL,NULL,2,1,1,5,6,'အနက်','အနက်','နဖူးမှဲ့ရှိ','အဖြူ','၈၇ ပေါင်။',3,'အမှတ်(၉)ရပ်ကွက်၊ အောင်ရတနာလမ်း၊ဘားအံမြို့၊ ကရင်ပြည်နယ်။',3,48,1,'၃၈၄၇၈၅','staffs/0pbWJ68Abw7rj2Ot2CFul2ey921t4MS04X5TWeqj.jpg','staffs/mq9H570g5U8hmceG9BArgEcbkhwpyCWBhwYs4zuK.jpg','၀၉၆၇၄၆၁၄၅၉၅','၀၉၆၇၄၆၁၄၅၉၅','B.A(Hons) ၊ M.A(History)',NULL,NULL,NULL,'ကျန်စစ် သား(၂)လမ်း၊','အမှတ်(၄)ရပ်ကွက်၊ ',206,NULL,13,'ကျန်စစ် သား(၂)လမ်း၊','အမှတ်(၄)ရပ်ကွက်၊ ',206,NULL,13,'အမှတ်(၉)ရပ်ကွက်၊ အောင်ရတနာလမ်း၊ဘားအံမြို့။',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ဦးမောင်မောင်သွင်',1,1,'ရန်ကုန်မြို့','အထည်လိပ်ကုန်သည်','ကျန်စစ် သား(၂)လမ်း၊ ','အမှတ်(၄)ရပ်ကွက်၊ ',205,NULL,13,'မရှိပါ',1,1,'မောင်နီ','Freelance Teacher.','ကျန်စစ် သား(၂)လမ်း၊ ','အမှတ်(၄)ရပ်ကွက်၊ ',1,NULL,1,'‌‌ဒေါ်နန်းမြင့်',1,1,'ရန်ကုန်မြို့','Freelance Teacher.','ကျန်စစ် သား(၂)လမ်း၊ ','အမှတ်(၄)ရပ်ကွက်၊ ',206,NULL,13,'မနမန',1,1,'ရန်ကုန်မြို့','တောင်သူ','၂၅၅၅၅','၅၅၅၅',216,NULL,13,0,1,6,'2024-11-18',1,NULL,11,NULL,NULL,NULL,NULL,'2024-11-18','2024-11-18',1,1,6,275000,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'တော်စပ်ပုံများပြင်ရန်','5','2024-11-22 01:24:24','2024-11-22 02:20:31'),(3,'staffs/PjouxWPBGJWLYtxyHciZqf5mR3eD5GTDhKYQkv4o.jpg','၁၂၃၄','ဒေါ်ဖြူဖြူလှိုင်','မရှိ','မရှိ','1986-06-13',NULL,NULL,'ဦးအောင်ကိုသက်',1,1,1,5,4,'အနက်','အနက်','နှာတံမှဲရှိ','အဖြူရောင်','၁၁၀',4,'ပေါ်တော်မူကျေးရွာ၊ ဘိုကလေးမြို့နယ်၊ ဧရာဝတီတိုင်းဒေသကြီး',14,415,1,'205021','staffs/U4407vq6aatS7yCC6uoV1eVRu0mAeSfb1K1fxnom.jpg','staffs/oL9ORoVQPIuGd1Yx54WYD51xeTaAerm3sJSZY6ye.jpg','၀၉-၄၅၀၆၂၉၇၆၁','၀၉-၄၅၀၆၂၉၇၆၁','phyuhlaing.1987@gmail.com',NULL,NULL,NULL,'ရွှေဝါဝင်းလမ်း','၃- ရပ်ကွက်',315,NULL,15,'ရွှေဝါဝင်းလမ်း','၃- ရပ်ကွက်',315,NULL,15,'ပေါ်တော်မူကျေးရွာ၊ ဘိုကလေးမြို့နယ်၊ ဧရာဝတီတိုင်းဒေသကြီး။',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ကောင်း',NULL,NULL,NULL,NULL,'ဦးလှိုင်ထွန်း',1,1,'ပေါ်တော်မူကျေးရွာ','လယ်','ရွှေဝါဝင်းလမ်း','၃ ရပ်ကွက်',315,NULL,15,'ဦးသာအေး',1,1,'ဒုတ်ရိုက်ကုန်းရွာ','လယ်','ရွှေဝါဝင်းလမ်း','၃ ရပ်ကွက်',328,NULL,15,'ဒေါ်တင်လှ',1,1,'ပေါ်တော်မူကျေးရွာ','မှီခို','ရွှေဝါဝင်းလမ်း','၃ ရပ်ကွက်',315,NULL,15,'ဒေါ်လှမြင့်',1,1,'ဒုတ်ရိုက်ကုန်းရွာ','မှီခို','ရွှေဝါဝင်းလမ်း','၃ ရပ်ကွက်',328,NULL,15,0,1,7,'2021-02-26',1,NULL,11,NULL,NULL,NULL,1,'2011-03-09','2011-03-09',0,0,7,234000,1,'ဒဂုံတက္ကသိုလ်','စတုတ္ထနှစ်','၄ပ-၃၆၅','ပထဝီဝင်','မရှိပါ','အားကစား',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5','2024-11-22 01:37:30','2024-11-22 02:27:47'),(4,'staffs/0SHv9wgn0bmuULJBco5ZiZftZDk6Ii59O1PPwOQo.png','မရှိပါ။','ဒေါ်ဆွေဆွေမာ',NULL,'မရှိပါ။','1987-01-20',NULL,NULL,'မရှိပါ။',2,1,1,5,2,'အနက်ရောင်','အနက်ရောင်','လည်ပင်းမှဲ့ရှိ','အဖြူ','၁၀၉ ပေါင်',1,'ချောင်းကျိုးကျေးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',7,148,1,'၀၆၆၉၅၆','staffs/IfbgthaU2mcC8n3up8N2Ad9rpLPiapY5AVKEJWzW.png','staffs/uGEeE64amefcPb0Pjh2J3NquxEQbObyt8l1rSyZJ.png','၀၉-၂၅၀၁၉၄၄၄၃','၀၉-၂၅၀၁၉၄၄၄၃','sweswemardica1@gmail.com',NULL,NULL,NULL,'သဇင်ရုံလမ်း၊ ','(၅)ရပ်ကွက်',245,NULL,13,'သဇင်ရုံလမ်း၊ ','(၅)ရပ်ကွက်',245,NULL,13,'ချောင်းကျိုးကျေးရွာ၊ ပေါက်ခေါင်းမြို့နယ်၊ ပဲခူးတိုင်းဒေသကြီး။',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ဦးအောင်စိန်',1,1,'ချောင်းကျိုးရွာ','ကွယ်လွန်','မရှိပါ။','မရှိပါ။',112,NULL,8,'မရှိပါ။',1,1,'မရှိပါ။','ြ်ုု','---','--',245,NULL,13,'ဒေါ်စန်းရီ',1,1,'ချောင်းကျိုးရွာ၊ ','မှီခို','--','--',112,NULL,8,'မရှိပါ။',1,1,'--','---','-','-',245,NULL,13,0,1,9,'2023-06-26',1,NULL,11,NULL,NULL,NULL,NULL,'2018-02-05','2018-02-05',1,1,8,216000,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5','2024-11-22 01:42:57','2024-11-22 02:16:15'),(5,'staffs/Z0sFxAY9oP1N0zPY5hHtmQ900dT5Ge6DzORB0fgR.jpg','မရှိပါ','ဒေါ်ဝင်းလဲ့ရည်','လဲ့လဲ့','လဲ့လဲ့','2024-12-06','မရှိပါ','မရှိပါ','မရှိပါ',2,1,1,-5,-1,'အနက်','အနက်','နှူတ်ခမ်း\'အမာရွတ်ရှိ','အဖြူ','၁၁၇',2,'အမှတ်(၃၁၁/က)ပင်းယ (၁၃)လမ်း၊ ၅ရပ်ကွက်၊တောင်ဥက္ကလာပမြို့နယ်၊ရန်ကုန်တိုင်းဒေသကြီး,',12,310,1,'၁၇၃၂၃၅',NULL,NULL,'09420740973','09420740973','winlettyee95.dica@gmail.com',NULL,NULL,NULL,'၁၃လမ်း','၅ရပ်ကွက်',215,NULL,13,'၁၃လမ်း','၅ရပ်ကွက်',215,NULL,13,'အမှတ်(၃၁၁/က)ပင်းယ (၁၃)လမ်း၊ ၅ရပ်ကွက်၊တောင်ဥက္ကလာပမြို့နယ်၊ရန်ကုန်တိုင်းဒေသကြီး,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,14,'2021-11-08',1,NULL,11,'မရှိ',NULL,NULL,NULL,'2019-09-04','2019-09-04',0,0,10,180000,-1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5','2024-11-22 01:43:38','2024-11-22 01:59:42'),(6,'staffs/q1Eo9yMaAKdRJdp88hLXcSZ95xU1NrYjxzu9OTeO.jpg','မရှိပါ','ဒေါ်သန်းသန်းစိုး','လုံးလုံး','မရှိပါ','1982-05-02','မရှိပါ','မရှိပါ',NULL,2,1,1,4,9,'အနက်','အနက်','ဂုတ်မှဲ့ရှိ','အညို','၁၁၈ပေါင်',4,'စစ်ကိုင်းတိုင်း၊မြောင်မြို့နယ်၊မကျည်းဘုတ်ကျေးရွာ',5,100,1,'၀၅၈၈၉၄','staffs/1jVoFiHrNCR92PMAL9xCjtELXoo959PysPXCfxJz.jpg','staffs/Jf6Bwn0LUi91G3rycEY0Y0QBoNanrOsx2HCUVYwD.jpg','၀၉-၄၅၉၂၂၈၂၃၆','၀၉-၇၉၀၁၄၉၄၀၅','ttsygn@gmail.com',NULL,NULL,NULL,'သဇင်ရုံလမ်း၊နာဂလှိုဏ်ဂူအိမ်ယာဝင်း','အမှတ်(5)ရပ်ကွက်၊ ',245,NULL,13,'မရှိပါ','မကျည်းဘုတ်ရွာ',69,NULL,6,'စစ်ကိုင်းတိုင်း၊မြောင်မြို့နယ်၊မကျည်းဘုတ်ရွာ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,9,'2021-02-26',1,1,11,NULL,NULL,NULL,NULL,'2013-11-15','2013-11-15',0,0,8,216000,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2024-11-28 03:31:36','2024-11-28 03:47:22');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_education`
--

DROP TABLE IF EXISTS `staff_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_education` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `education_group_id` bigint unsigned DEFAULT NULL,
  `education_type_id` bigint unsigned DEFAULT NULL,
  `education_id` bigint unsigned DEFAULT NULL,
  `staff_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_education_education_group_id_foreign` (`education_group_id`),
  KEY `staff_education_education_type_id_foreign` (`education_type_id`),
  KEY `staff_education_education_id_foreign` (`education_id`),
  KEY `staff_education_staff_id_foreign` (`staff_id`),
  CONSTRAINT `staff_education_education_group_id_foreign` FOREIGN KEY (`education_group_id`) REFERENCES `education_groups` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_education_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_education_education_type_id_foreign` FOREIGN KEY (`education_type_id`) REFERENCES `education_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `staff_education_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_education`
--

LOCK TABLES `staff_education` WRITE;
/*!40000 ALTER TABLE `staff_education` DISABLE KEYS */;
INSERT INTO `staff_education` VALUES (6,2,15,195,1,'2024-11-22 00:52:27','2024-11-22 00:52:27'),(11,2,4,19,4,'2024-11-22 01:42:57','2024-11-22 01:42:57'),(12,2,5,63,5,'2024-11-22 01:43:39','2024-11-22 01:43:39'),(13,2,7,199,2,'2024-11-22 02:17:22','2024-11-22 02:17:22'),(14,2,4,19,3,'2024-11-22 02:30:52','2024-11-22 02:30:52'),(15,2,5,63,6,'2024-11-28 03:31:36','2024-11-28 03:31:36'),(16,7,17,469,6,'2024-11-28 03:31:36','2024-11-28 03:31:36'),(17,7,22,550,6,'2024-11-28 03:31:36','2024-11-28 03:31:36'),(18,7,17,492,6,'2024-11-28 03:31:36','2024-11-28 03:31:36');
/*!40000 ALTER TABLE `staff_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_languages`
--

DROP TABLE IF EXISTS `staff_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_languages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `language_id` bigint unsigned NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speaking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_languages_staff_id_foreign` (`staff_id`),
  KEY `staff_languages_language_id_foreign` (`language_id`),
  CONSTRAINT `staff_languages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `staff_languages_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_languages`
--

LOCK TABLES `staff_languages` WRITE;
/*!40000 ALTER TABLE `staff_languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_types`
--

DROP TABLE IF EXISTS `staff_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_types`
--

LOCK TABLES `staff_types` WRITE;
/*!40000 ALTER TABLE `staff_types` DISABLE KEYS */;
INSERT INTO `staff_types` VALUES (1,'အရာထမ်း',NULL,NULL),(2,'အမှုထမ်း',NULL,NULL),(3,'နေ့စား',NULL,NULL);
/*!40000 ALTER TABLE `staff_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'saveDraft',NULL,NULL),(2,'submit',NULL,NULL),(3,'reject',NULL,NULL),(4,'resubmit',NULL,NULL),(5,'approve',NULL,NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `townships`
--

DROP TABLE IF EXISTS `townships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `townships` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint unsigned DEFAULT NULL,
  `region_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `townships_district_id_foreign` (`district_id`),
  KEY `townships_region_id_foreign` (`region_id`),
  CONSTRAINT `townships_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `townships_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `townships`
--

LOCK TABLES `townships` WRITE;
/*!40000 ALTER TABLE `townships` DISABLE KEYS */;
INSERT INTO `townships` VALUES (1,'လယ်ဝေး',1,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(2,'ဒက္ခိဏသီရိ',1,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(3,'ပျဥ်းမနား',2,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(4,'ဇမ္မူသီရိ',2,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(5,'ဥတ္တရသီရိ',3,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(6,'တပ်ကုန်း',3,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(7,'ဇေယျာသီရိ',4,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(8,'ပုဗ္ဗသီရိ',4,1,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(9,'ပူတာအို',5,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(10,'နောင်မွန်း',5,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(11,'မချမ်းဘော',5,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(12,'ခေါင်လန်ဖူး',5,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(13,'ဆွမ်ပရာဘွမ်',5,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(14,'ဗန်းမော်',6,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(15,'မိုးမောက်',6,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(16,'မံစီ',6,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(17,'ရွှေကူ',6,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(18,'မိုးညှင်း',7,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(19,'မိုးကောင်း',7,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(20,'ဖားကန့်',7,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(21,'မြစ်ကြီးနား',8,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(22,'ဝိုင်းမော်',8,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(23,'အင်ဂျန်းယန်',8,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(24,'တနိုင်း',9,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(25,'ချီဖွေ',10,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(26,'ဆော့လော်',10,2,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(27,'လွိုင်ကော်',11,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(28,'ရှားတော',11,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(29,'ဒီးမော့ဆို',12,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(30,'ဖရူဆို',12,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(31,'ဘောလခဲ',13,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(32,'ဖားဆောင်း',13,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(33,'မယ်စဲ့',14,3,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(34,'ကော့ကရိတ်',15,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(35,'ကြာအင်းဆိပ်ကြီး',16,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(36,'ဖာပွန်',17,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(37,'ဘားအံ',18,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(38,'လှိုင်းဘွဲ့',18,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(39,'သံတောင်ကြီး',19,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(40,'မြဝတီ',20,4,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(41,'ဖလမ်း',21,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(42,'တီးတိန်',22,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(43,'တွန်းဇံ',22,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(44,'မတူပီ',23,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(45,'ပလက်ဝ',24,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(46,'ကန်ပက်လက်',25,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(47,'မင်းတပ်',25,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(48,'ထန်တလန်',26,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(49,'ဟားခါး',26,5,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(50,'လေရှီး',27,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(51,'လဟယ်',27,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(52,'နန်းယွန်း',27,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(53,'ကလေး',28,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(54,'ကလေးဝ',28,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(55,'မင်းကင်း',28,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(56,'ကသာ',29,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(57,'ထီးချိုင့်',29,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(58,'ဗန်းမောက်',29,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(59,'အင်းတော်',29,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(60,'ကောလင်း',30,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(61,'ပင်လည်ဘူး',30,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(62,'ဝန်းသို',30,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(63,'ကန့်ဘလူ',31,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(64,'ကျွန်းလှ',31,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(65,'ခန္တီး',32,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(66,'ဟုမ္မလင်း',33,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(67,'စစ်ကိုင်း',34,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(68,'မြင်းမု',34,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(69,'မြောင်',34,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(70,'တမူး',35,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(71,'ချောင်းဦး',36,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(72,'ဘုတလင်',36,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(73,'မုံရွာ',36,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(74,'အရာတော်',36,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(75,'ဖောင်းပြင်',37,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(76,'မော်လိုက်',37,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(77,'ကနီ',38,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(78,'ဆားလင်းကြီဂ',38,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(79,'ပုလဲ',38,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(80,'ယင်းမာပင်',38,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(81,'ရွှေဘို',39,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(82,'ခင်ဦး',39,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(83,'ဝက်လက်',39,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(84,'ရေဦး',40,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(85,'တန့်ဆည်',40,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(86,'ဒီပဲယင်း',40,6,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(87,'ကော့သောင်း',41,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(88,'ဘုတ်ပြင်း',42,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(89,'ထားဝယ်',43,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(90,'ရေဖြူ',43,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(91,'လောင်းလုံ',43,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(92,'သရက်ချောင်း',43,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(93,'ကျွန်းစု',44,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(94,'တနင်္သာရီ',44,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(95,'ပုလော',44,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(96,'မြိတ်',44,7,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(97,'တောင်ငူ',45,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(98,'အုတ်တွင်း',45,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(99,'ရေတာရှည်',45,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(100,'ဖြူး',45,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(101,'ထန်းတပင်',45,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(102,'ပဲခူး',46,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(103,'ကဝ',46,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(104,'ဝေါ',46,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(105,'သနပ်ပင်',46,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(106,'ညောင်လေးပင်',47,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(107,'ကျောက်တံခါး',47,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(108,'ဒိုက်ဦး',47,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(109,'ရွှေကျင်',47,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(110,'ကျောက်ကြီး',47,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(111,'ပြည်',48,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(112,'ပေါက်ခေါင်း',48,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(113,'ပန်းတောင်း',48,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(114,'ရွှေတောင်',48,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(115,'သာယာဝတီ',49,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(116,'လက်ပံတန်း',49,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(117,'မင်းလှ',49,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(118,'မိုးညို',49,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(119,'အုတ်ဖို',49,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(120,'ကြို့ပင်ကောက်',49,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(121,'နတ်တလင်း',50,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(122,'ဇီးကုန်း',50,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(123,'သဲကုန်း',50,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(124,'ပေါင်းတည်',50,8,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(125,'ဂန့်ဂေါ',51,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(126,'ဆော',51,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(127,'ထီးလင်း',51,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(128,'ပခုက္ကူ',52,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(129,'ဆိပ်ဖြူ',52,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(130,'ပေါက်',52,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(131,'ရေစကြို',52,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(132,'မြိုင်',52,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(133,'မကွေး',53,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(134,'တောင်တွင်းကြီး',53,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(135,'မြို့သစ်',53,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(136,'နတ်မောက်',53,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(137,'ချောက်',54,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(138,'ရေနံချောင်း',54,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(139,'မင်းဘူး',55,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(140,'ငဖဲ',55,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(141,'စလင်း',55,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(142,'စေတုတ္တရာ',55,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(143,'ပွင့်ဖြူ',55,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(144,'သရက်',56,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(145,'ကံမ',56,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(146,'မင်းတုန်း',56,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(147,'မင်းလှ',56,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(148,'အောင်လံ',57,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(149,'ဆင်ပေါင်ဝဲ',57,9,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(150,'ကျောက်ဆည်',58,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(151,'စဥ့်ကိုင်',58,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(152,'မြစ်သား',58,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(153,'တံတားဦး',59,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(154,'ငါန်းဇွန်',59,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(155,'ညောင်ဦး',60,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(156,'ကျောက်ပန်းတောင်း',60,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(157,'ပြင်ဦးလွင်',61,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(158,'သပိတ်ကျင်း',62,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(159,'မိုးကုတ်',62,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(160,'စဉ့်ကူး',62,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(161,'မဟာအောင်မြေ',63,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(162,'ချမ်းအေးသာဇံ',63,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(163,'ချမ်းမြသာစည်',63,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(164,'ပြည်ကြီးတံခွန်',63,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(165,'အောင်မြေသာဇံ',64,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(166,'ပုသိမ်ကြီး',64,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(167,'မတ္တရာ',64,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(168,'အမရပူရ',65,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(169,'မလှိုင်',66,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(170,'မိတ္ထီလာ',66,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(171,'ဝမ်းတွင်း',66,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(172,'သာစည်',66,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(173,'မြင်းခြံ',67,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(174,'တောင်သာ',67,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(175,'နွားထိုးကြီး',67,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(176,'ရမည်းသင်း',68,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(177,'ပျော်ဘွယ်',68,10,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(178,'မော်လမြိုင်',69,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(179,'ကျိုက်မရော',69,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(180,'ချောင်းဆုံ',69,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(181,'သံဖြူဇရပ်',69,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(182,'မုဒုံ',69,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(183,'ရေး',70,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(184,'သထုံ',71,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(185,'ပေါင်',71,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(186,'ကျိုက်ထို',72,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(187,'ဘီးလင်း',72,11,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(188,'ကျောက်ဖြူ',73,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(189,'ရမ်းဗြဲ',73,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(190,'အမ်း',74,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(191,'စစ်တွေ',75,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(192,'ပေါက်တော',75,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(193,'ပုဏ္ဏကျွန်း',75,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(194,'ရသေ့တောင်',75,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(195,'မောင်တော',76,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(196,'ဘူးသီးတောင်',76,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(197,'ကျောက်တော်',77,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(198,'မင်းပြား',77,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(199,'မြေပုံ',77,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(200,'မြောက်ဦး',77,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(201,'သံတွဲ',78,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(202,'ဂွ',78,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(203,'တောင်ကုတ်',79,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(204,'မာန်အောင်',79,12,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(205,'တိုက်ကြီး',80,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(206,'လှည်းကူး',81,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(207,'မှော်ဘီ',82,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(208,'ထန်းတပင်',82,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(209,'မင်္ဂလာဒုံ',83,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(210,'ရွှေပြည်သာ',83,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(211,'အင်းစိန်',84,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(212,'လှိုင်သာယာ(အရှေ့ပိုင်)',84,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(213,'လှိုင်သာယာ(အနောက်ပိုင်း)',84,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(214,'သင်္ဃန်းကျွန်း',85,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(215,'တောင်ဥက္ကလာပ',85,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(216,'ရန်ကင်း',85,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(217,'တာမွေ',85,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(218,'ဗိုလ်တထောင်',86,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(219,'ဒေါပုံ',86,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(220,'မင်္ဂလာတောင်ညွန့်',86,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(221,'ပုဇွန်တောင်',86,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(222,'သာကေတ',86,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(223,'ဒဂုံမြို့သစ်(တောင်ပိုင်း)',87,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(224,'ဒဂုံမြို့သစ်(မြောက်ပိုင်း)',87,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(225,'ဒဂုံမြို့သစ်(အရှေ့ပိုင်း)',87,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(226,'ဒဂုံမြို့သစ်(ဆိပ်ကမ်း)',87,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(227,'သန်လျင်',88,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(228,'ကျောက်တန်း',88,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(229,'သုံးခွ',88,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(230,'ခရမ်း',88,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(231,'ကိုကိုးကျွန်း',88,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(232,'တွံတေး',89,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(233,'ဆိပ်ကြီး/ခနောင်တို',89,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(234,'ဒလ',89,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(235,'ကော့မှူး',89,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(236,'ကွမ်းခြံကုန်း',89,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(237,'ကျောက်တံတား',90,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(238,'ပန်းဘဲတန်း',90,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(239,'လသာ',90,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(240,'လမ်းမတော်',90,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(241,'ဒဂုံ',90,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(242,'အလုံ',91,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(243,'ကြည့်မြင့်တိုင်',91,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(244,'စမ်းချောင်း',91,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(245,'မရမ်းကုန်း',92,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(246,'လှိုင်',92,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(247,'မြောက်ဥက္ကလာပ',92,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(248,'ကမာရွတ်',93,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(249,'ဗဟန်း',93,13,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(250,'မက်မန်း',94,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(251,'ပန်ဆန်း(ပန်ခမ်း)',94,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(252,'နားဖန်း',94,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(253,'ဟိုပန်',95,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(254,'မိုင်းမော',95,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(255,'ပန်ဝိုင်',95,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(256,'ရွာငံ',96,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(257,'ပင်းတယ',96,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(258,'ဟိုပုံး',97,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(259,'ဆီဆိုင်',97,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(260,'ပင်လောင်း',97,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(261,'နမ့်ဆန်',98,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(262,'မန်တုံ',98,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(263,'ကုန်းကြမ်း',99,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(264,'လောက်ကိုင်',99,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(265,'ကျောက်မဲ',100,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(266,'နမ္မတူ',100,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(267,'နောင်ချို',100,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(268,'သီပေါ',100,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(269,'ကျိုင်းတုံ',101,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(270,'မိုင်းခတ်',101,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(271,'မိုင်းပျဥ်း',101,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(272,'မိုင်းယန်း',102,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(273,'မိုင်းလား',103,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(274,'တာချီလိတ်',104,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(275,'မိုင်းဖြတ်',104,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(276,'မိုင်းယောင်း',105,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(277,'တောင်ကြီ\'',106,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(278,'ရပ်စောက်',106,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(279,'ကလော',107,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(280,'ဖယ်ခုံ',107,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(281,'ညောင်ရွှေ',107,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(282,'မူဆယ်',108,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(283,'နန့်ခမ်း',108,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(284,'ကွတ်ခိုင်',109,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(285,'မဘိမ်း',110,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(286,'မိုးမိတ်',110,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(287,'မိုင်းဆတ်',111,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(288,'မိုင်းတုံ',112,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(289,'လာရှိုး',113,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(290,'သိန္နီ',113,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(291,'ကွမ်းလုံ',113,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(292,'တန့်ယန်း',114,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(293,'မိုင်းရယ်',114,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(294,'လင်းခေး',115,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(295,'မောင်မယ်',115,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(296,'မိုင်းပန်',115,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(297,'လွိုင်လင်',116,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(298,'လဲချား',116,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(299,'မိုင်းကိုင်',116,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(300,'နမ့်စန်',117,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(301,'ကွမ်ဟိန်း',117,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(302,'မိုးနဲ',117,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(303,'မိုင်းနှူး',118,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(304,'ကျေးသီး',118,14,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(305,'ပုသိမ်',119,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(306,'ကန်ကြီးထောင့်',119,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(307,'သာပေါင်း',119,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(308,'ငပုတော',119,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(309,' ကျုံပျော်',120,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(310,'ရေကြည်',120,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(311,'ကျောင်းကုန်ူ',120,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(312,'ကျိုက်လတ်',121,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(313,'ဒေးဒရဲ',121,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(314,'ဖျာပုံ',121,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(315,'ဘိုကလေး',121,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(316,'ညောင်တုန်း',122,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(317,'ဓနုဖြူ',122,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(318,'ပန်းတနော်',122,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(319,'မအူပင်',122,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(320,'မြောင်းမြ',123,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(321,'ဝါးခယ်မ',123,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(322,'အိမ်မဲ',123,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(323,'မော်လမြိုင်ကျွန်း',124,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(324,'လပွတ္တာ',124,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(325,'ဟင်္သာတ',125,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(326,'ဇလွန်',125,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(327,'လေးမျက်နှာ',125,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(328,'မြန်အောင်',126,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(329,'ကြံခင်း',126,15,'2024-11-21 23:46:49','2024-11-21 23:46:49'),(330,'အင်္ဂပူ',126,15,'2024-11-21 23:46:49','2024-11-21 23:46:49');
/*!40000 ALTER TABLE `townships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_locations`
--

DROP TABLE IF EXISTS `training_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_locations`
--

LOCK TABLES `training_locations` WRITE;
/*!40000 ALTER TABLE `training_locations` DISABLE KEYS */;
INSERT INTO `training_locations` VALUES (1,'ပြည်တွင်း',NULL,NULL),(2,'ပြည်ပ',NULL,NULL);
/*!40000 ALTER TABLE `training_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_types`
--

DROP TABLE IF EXISTS `training_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_types`
--

LOCK TABLES `training_types` WRITE;
/*!40000 ALTER TABLE `training_types` DISABLE KEYS */;
INSERT INTO `training_types` VALUES (1,'ဝန်ထမ်းအဖွဲ့အစည်းအကြီးအမှူးသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(2,'အဆင့်မြင့်အရာထမ်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(3,'အလယ်အလတ်အဆင့်အရာထမ်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(4,'အရာထမ်းလောင်း(အထူး)သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(5,'အရာထမ်းအခြေခံသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(6,'အရာထမ်းငယ်သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(7,'စာရေးဝန်ထမ်းကြီးကြပ်သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(8,'စာရေးဝန်ထမ်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(9,'အုပ်ချုပ်မှုစွမ်းရည်မြင့်မားရေးသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(10,'ဝန်ထမ်းအဖွဲ့အစည်းအကြီးအမှူးစီမံခန့်ခွဲမှုသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(11,'ဝန်ထမ်းအဖွဲ့အစည်းဒုတိယအကြီးအမှူးစီမံခန့်ခွဲမှုသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(12,'အဆင့်မြင့်အရာထမ်းစီမံခန့်ခွဲမှုသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(13,'အလယ်အလတ်အဆင့်အရာထမ်းစီမံခန့်ခွဲမှုသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(14,'အလယ်အလတ်အဆင့်အရာထမ်းစီမံခန့်ခွဲမှုသင်တန်း၊ ပြည်သူ့ဝန်ထမ်းစီမံခန့်ခွဲမှုအဆင့်မြင့်ဒီပလိုမာသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(15,'အကြိုဝန်ထမ်းလောင်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(16,'အရာထမ်းလောင်းအခြေခံသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(17,'အရာထမ်းလောင်းအခြေခံသင်တန်း၊ ပြည်သူ့ဝန်ထမ်းစီမံခန့်ခွဲမှုဘွဲ့လွန်ဒီပလိုမာသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(18,'အထူးဝန်ထမ်းလောင်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(19,'အရာထမ်းလောင်းအခြေခံ(အထူး)သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(20,'အခြေခံပြည်သူ့ရေးရာဝန်ထမ်းလောင်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(21,'အခြေခံဝန်ထမ်းလောင်း(အငယ်တန်း)သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(22,'အရာထမ်းငယ်အခြေခံသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(23,'ပြည်သူ့ရေးရာစာရေးဝန်ထမ်း(ကြီးကြပ်မှု)သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(24,'စာရေးဝန်ထမ်း(ကြီးကြပ်မှု)သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(25,'စာရေးဝန်ထမ်းကြီးကြပ်မှုတန်းမြင့်သင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(26,'အခြေခံပြည်သူ့ရေးရာစာရေးဝန်ထမ်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(27,'အခြေခံစာရေးဝန်ထမ်းသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(28,'စာရေးဝန်ထမ်းအခြေခံသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(29,'ဌာနတွင်းဝန်ထမ်းစွမ်းဆောင်ရည်မြှင့်တင်ရေးသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(30,'ဝန်ကြီးဌာနဝန်ထမ်းစွမ်းဆောင်ရည်မြှင့်တင်ရေးသင်တန်း','2024-11-21 23:46:52','2024-11-21 23:46:52'),(31,'နိုင်ငံတော်ကာကွယ်ရေးတက္ကသိုလ်','2024-11-21 23:46:52','2024-11-21 23:46:52'),(32,'အခြား','2024-11-21 23:46:52','2024-11-21 23:46:52');
/*!40000 ALTER TABLE `training_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trainings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned DEFAULT NULL,
  `training_type_id` bigint unsigned DEFAULT NULL,
  `diploma_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` int DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `training_location_id` bigint unsigned DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trainings_staff_id_foreign` (`staff_id`),
  KEY `trainings_training_type_id_foreign` (`training_type_id`),
  KEY `trainings_country_id_foreign` (`country_id`),
  KEY `trainings_training_location_id_foreign` (`training_location_id`),
  CONSTRAINT `trainings_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  CONSTRAINT `trainings_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  CONSTRAINT `trainings_training_location_id_foreign` FOREIGN KEY (`training_location_id`) REFERENCES `training_locations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `trainings_training_type_id_foreign` FOREIGN KEY (`training_type_id`) REFERENCES `training_types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainings`
--

LOCK TABLES `trainings` WRITE;
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `role_id` bigint unsigned DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'admin','$2y$12$JKXRYaTPHFEJ8i/Q1bXG1enjQKqX1GvbezSXRhcWTdW4rarB6o/ZS',11,0,2,'admin@gmail.com',NULL,NULL,'2024-11-21 23:46:48','2024-11-21 23:46:48'),(3,NULL,'admin','$2y$12$JKXRYaTPHFEJ8i/Q1bXG1enjQKqX1GvbezSXRhcWTdW4rarB6o/ZS',11,0,3,'users@gmail.com',NULL,'AbzXH3sZOU1SP9ZJPA5wYeEJKJHif7UMMl2K7U7YiwRfixRDKzRd7zkWbFl4','2024-11-21 23:46:48','2024-11-21 23:46:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-24 15:51:19
