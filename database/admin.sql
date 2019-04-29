-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,NULL,'2019-04-18 11:59:57'),(2,0,6,'系统管理','fa-tasks',NULL,NULL,NULL,'2019-04-29 03:05:09'),(3,2,7,'管理员','fa-users','auth/users',NULL,NULL,'2019-04-29 03:05:09'),(4,2,8,'角色','fa-user','auth/roles',NULL,NULL,'2019-04-29 03:05:09'),(5,2,9,'权限','fa-ban','auth/permissions',NULL,NULL,'2019-04-29 03:05:09'),(6,2,10,'菜单','fa-bars','auth/menu',NULL,NULL,'2019-04-29 03:05:09'),(7,2,11,'操作日志','fa-history','auth/logs',NULL,NULL,'2019-04-29 03:05:09'),(8,0,2,'用户管理','fa-users','/users',NULL,'2019-04-18 12:14:50','2019-04-18 12:15:27'),(9,0,3,'商品管理','fa-cubes','/products',NULL,'2019-04-18 12:45:59','2019-04-18 12:46:20'),(10,0,4,'订单管理','fa-rmb','/orders',NULL,'2019-04-28 09:34:43','2019-04-28 09:34:50'),(11,0,5,'优惠券管理','fa-tags','/coupon_codes',NULL,'2019-04-29 03:04:56','2019-04-29 03:05:09');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','user','','/user*','2019-04-18 12:18:45','2019-04-18 12:18:45'),(7,'商品管理','products','','/products*','2019-04-29 08:03:08','2019-04-29 08:03:08'),(8,'优惠券管理','coupon_codes','','/coupon_codes*','2019-04-29 08:03:48','2019-04-29 08:03:48'),(9,'订单管理','orders','','/orders*','2019-04-29 08:04:18','2019-04-29 08:04:18');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(2,6,NULL,NULL),(2,7,NULL,NULL),(2,8,NULL,NULL),(2,9,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-04-17 18:46:41','2019-04-17 18:46:41'),(2,'运营','operator','2019-04-18 12:20:42','2019-04-18 12:20:42');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$ebmpNqjd0sGNNsfX669lEubd6HR2xTAwj3Nsybmq9iyQD0pL4OzWK','Administrator',NULL,'Z7vauBod5nIQhEQYSKJl3BHLDNSDr8cCqp9U5RRlt8EvY1Z3V4hjoIcanuun','2019-04-17 18:46:41','2019-04-17 18:46:41'),(2,'operator','$2y$10$SLL.Q34e3O8iOLlZznvfc.0mITuDKK7Nsi8gTTDkDLjWzmfRzpsUK','运营一',NULL,'WyCYE6d4d8yhN7jzcUWIMXDeqL3bO6zGqVGMNLYTg1HuYtmYk4XmTlJ897Pj','2019-04-18 12:22:04','2019-04-18 12:22:04');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-29  8:21:02
