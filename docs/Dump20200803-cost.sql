-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cost
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.40-MariaDB

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
-- Dumping data for table `advance_images`
--

LOCK TABLES `advance_images` WRITE;
/*!40000 ALTER TABLE `advance_images` DISABLE KEYS */;
INSERT INTO `advance_images` (`id`, `advance_id`, `path`, `image`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('a046e3b0-d155-11ea-a6e8-db27b6fc0881','22521d80-cfd1-11ea-b8f9-67f6f905f171','advance_images/fDiv6ilGXT4fyT8jriILhispnnrn3isgO6uwwRRE.jpeg','chairs-classroom-college-desks-289740.jpg','2020-07-29','2020-07-29 04:40:27','2020-07-29 04:40:27'),('a06a8ee0-d155-11ea-a3e2-41cb65a5f41c','22521d80-cfd1-11ea-b8f9-67f6f905f171','advance_images/K5uffY6I89P2GbTjXHT8eg4CIhdoFOVK473TCpAG.jpeg','three-persons-sitting-on-the-stairs-talking-with-each-other-1438072.jpg','2020-07-29','2020-07-29 04:40:28','2020-07-29 04:40:28'),('c6592e10-d155-11ea-b97c-83d0939c6b08','22521d80-cfd1-11ea-b8f9-67f6f905f171','advance_images/VxK9JZNSGOzOffAfCgG5y2Pz5KQVU2HNvptPu5gY.jpeg','row-of-books-in-shelf-256541.jpg','2020-07-29','2020-07-29 04:41:31','2020-07-29 04:41:31');
/*!40000 ALTER TABLE `advance_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `advances`
--

LOCK TABLES `advances` WRITE;
/*!40000 ALTER TABLE `advances` DISABLE KEYS */;
INSERT INTO `advances` (`id`, `project_id`, `status_id`, `programmed_percent`, `real_percent`, `scheduled_financing`, `real_financing`, `description_problems`, `description_issues`, `guaranties_doc`, `advance_doc`, `date_of_advance`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('22521d80-cfd1-11ea-b8f9-67f6f905f171','48f459d0-cbfc-11ea-a339-fdf607ea2f33','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669',1.00,1.00,32.00,7.80,'No Problem','HOME WORK DESIGN REVIEW','advance/GeWBiayJ7rTPp3LnBjYS4JQfcfnHT9RIo0aI3XgN.doc',NULL,'2020-07-15','2020-07-24 00:00:00','2020-07-27 06:19:31','2020-07-27 06:19:31'),('2d626a60-cfd1-11ea-b8a9-c175fa7e9092','48f459d0-cbfc-11ea-a339-fdf607ea2f33','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669',1.50,3.00,41.00,17.80,'No Problem','HOME WORK DESIGN REVIEW','advance/PNe8dY8f0jHp4H6LewwCBzpej4XTmjDpTyjFZX9d.doc',NULL,'2020-08-15','2020-07-24 00:00:00','2020-07-27 06:19:50','2020-07-27 06:19:50');
/*!40000 ALTER TABLE `advances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ammendments`
--

LOCK TABLES `ammendments` WRITE;
/*!40000 ALTER TABLE `ammendments` DISABLE KEYS */;
INSERT INTO `ammendments` (`id`, `engage_id`, `modification_number`, `modification_type`, `justification`, `adendum`, `current_price`, `current_contract_scope`, `status_id`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('bec5e440-cfa1-11ea-8569-0754e1c8ac44','a4b92290-cd80-11ea-9306-7bb4eecdffd0',1,'Change Duration of Contract','An extension was made to the contract of Astaldi (Contractor) to conclude with the Paving of El Porvenir Marale.','adendum/a481FnW71FL5ZyHnSvuFQqM7NmdF6uJiqv1PKpAz.docx',20405066,'An extension of time to 19 months and 3 days is requested to conclude with the Supervision of the El Porvenir Marale Paving works.','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','2020-07-16 00:00:00','2020-07-27 00:40:18','2020-07-27 00:40:18');
/*!40000 ALTER TABLE `ammendments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `award_statuses`
--

LOCK TABLES `award_statuses` WRITE;
/*!40000 ALTER TABLE `award_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `award_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `awards`
--

LOCK TABLES `awards` WRITE;
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
INSERT INTO `awards` (`id`, `tender_id`, `status_id`, `contract_method_id`, `process_number`, `participants_number`, `contract_estimate_cost`, `cost`, `opening_act`, `recomendation_report_act`, `award_resolution`, `others`, `published_at`, `created_at`, `updated_at`) VALUES ('30844620-cd63-11ea-9197-692cd39e29a1','101cd2e0-cc9c-11ea-a74c-290f7d724001','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','fc761d20-cd62-11ea-9510-4109487b814e','DGC-016-UEBM-2011',4,25800000,25396867.69,'awards/LvP3fJ6OI5Qpk5KEi3KmiBT2BS2nWNmwi1h0pqq7.pdf',NULL,NULL,NULL,'2020-07-24 00:00:00','2020-07-24 04:07:28','2020-07-24 04:07:28');
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets` DISABLE KEYS */;
INSERT INTO `budgets` (`id`, `name`, `description`, `start_date`, `end_date`, `duration`, `project_id`, `amount`, `created_at`, `updated_at`) VALUES ('182ff6e0-d07f-11ea-9512-e106d10ccac5','Budget for Project 16','This budget is from world bank (WB)','2020-06-28','2020-08-08',41,'48f459d0-cbfc-11ea-a339-fdf607ea2f33',402519670,'2020-07-28 03:04:47','2020-07-28 03:04:47');
/*!40000 ALTER TABLE `budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `completions`
--

LOCK TABLES `completions` WRITE;
/*!40000 ALTER TABLE `completions` DISABLE KEYS */;
INSERT INTO `completions` (`id`, `contracts_id`, `final_scope`, `description`, `date`, `justification`, `final_cost`, `created_at`, `updated_at`) VALUES ('c2d529e0-d14c-11ea-aff6-952834c09dd4','a4b92290-cd80-11ea-9306-7bb4eecdffd0','completion contract 2',NULL,'2020-07-24','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',25396867.69,'2020-07-29 03:37:00','2020-07-29 03:37:00');
/*!40000 ALTER TABLE `completions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `name`, `email`, `address`, `phone`, `position`, `created_at`, `updated_at`) VALUES ('42af3150-d162-11ea-8164-833f006035d6','JOSE FRANCISCO SAYBE','sps@saybeyasociados.com','2nd Street between 16 and 17 Avenue No 116','2557-2576','Director de Carreteras','2020-07-29 06:10:54','2020-07-29 06:17:29');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contract_methods`
--

LOCK TABLES `contract_methods` WRITE;
/*!40000 ALTER TABLE `contract_methods` DISABLE KEYS */;
INSERT INTO `contract_methods` (`id`, `method_name`, `created_at`, `updated_at`) VALUES ('dcb45920-cbc2-11ea-aeb0-2514f02e064f','Precio Más Bajo',NULL,NULL),('fc761d20-cd62-11ea-9510-4109487b814e','Lowest price',NULL,NULL);
/*!40000 ALTER TABLE `contract_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contract_statuses`
--

LOCK TABLES `contract_statuses` WRITE;
/*!40000 ALTER TABLE `contract_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `contract_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contract_types`
--

LOCK TABLES `contract_types` WRITE;
/*!40000 ALTER TABLE `contract_types` DISABLE KEYS */;
INSERT INTO `contract_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES ('101ae000-cc9c-11ea-8bee-67a0de19979e','Supervision','2020-07-23 04:22:04','2020-07-23 04:22:04'),('26d9bfe0-cbbf-11ea-b31a-bf68771e3fb8','Building','2020-07-22 02:00:43','2020-07-22 02:00:43'),('5b427760-cb43-11ea-b8e5-a904674584c2','Harga Satuan','2020-07-21 11:14:34','2020-07-21 11:15:54');
/*!40000 ALTER TABLE `contract_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` (`id`, `awards_id`, `number`, `start_date`, `end_date`, `max_extend_date`, `duration`, `contract_title`, `contract_scope`, `price_local_currency`, `price_usd_currency`, `suppliers_id`, `status_id`, `created_at`, `updated_at`) VALUES ('a4b92290-cd80-11ea-9306-7bb4eecdffd0','30844620-cd63-11ea-9197-692cd39e29a1','038/CO/DGC/INSEP/2016','2020-06-29 00:00:00','2020-09-25 00:00:00','2020-10-15 00:00:00',88,'DGC-UEBM-OB-001-2011, PAVIMENTACION DEL CARRETERA EL PORVENIR- MARALE, DEPARTMENT FCO.MORAZAN, FINANCING WORLD BANK, CREDIT No. AIF- 4466-HN','SUPERVISION OF THE ROAD EL PORVENIR MARALE, DEPARTMENT FRANCISCO MORAZAN',20405066.28,949072.85,'09aea810-cbbf-11ea-b5d0-bf54ed8f65c3','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','2020-07-24 07:38:19','2020-07-24 07:38:19');
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `disbursments`
--

LOCK TABLES `disbursments` WRITE;
/*!40000 ALTER TABLE `disbursments` DISABLE KEYS */;
INSERT INTO `disbursments` (`id`, `order`, `date`, `description`, `amount`, `executions_id`, `status_id`, `created_at`, `updated_at`) VALUES ('008b63e0-cfb8-11ea-8ae6-973be12d5241',1,'2020-07-23','ADVANCE PAYMENT 20% OF THE CONTRACTUAL AMOUNT',189814.57,'f5939a40-cfaf-11ea-9395-f7deb390df8e','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','2020-07-27 03:19:37','2020-07-27 03:19:37');
/*!40000 ALTER TABLE `disbursments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `engages`
--

LOCK TABLES `engages` WRITE;
/*!40000 ALTER TABLE `engages` DISABLE KEYS */;
/*!40000 ALTER TABLE `engages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `executions`
--

LOCK TABLES `executions` WRITE;
/*!40000 ALTER TABLE `executions` DISABLE KEYS */;
INSERT INTO `executions` (`id`, `vartime`, `varprice`, `start_date`, `program`, `contract_state`, `engage_id`, `contact_id`, `status_id`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('f5939a40-cfaf-11ea-9395-f7deb390df8e',NULL,5700000,'2020-07-08 00:00:00','this is program','state of contract','a4b92290-cd80-11ea-9306-7bb4eecdffd0',NULL,'d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','2020-07-14 00:00:00','2020-07-27 02:22:03','2020-07-27 02:22:03');
/*!40000 ALTER TABLE `executions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `offerers`
--

LOCK TABLES `offerers` WRITE;
/*!40000 ALTER TABLE `offerers` DISABLE KEYS */;
INSERT INTO `offerers` (`id`, `offerer_name`, `legal_name`, `description`, `phone`, `address`, `website`, `verification_website`, `created_at`, `updated_at`) VALUES ('09aea810-cbbf-11ea-b5d0-bf54ed8f65c3','Astaldi','Astaldi S.p.A.','ASTALDI\r\nBuilding for progress.\r\nWe are an international construction group with a leading position \r\nin Italy and among the top 100 International Contractors.','+39 06 41766 1','Bureau Administratif et Financier. Lottissement 19/20 Aissat - Idir Cheraga - W Alger','https://www.astaldi.com',0,'2020-07-22 01:59:54','2020-07-22 02:03:28');
/*!40000 ALTER TABLE `offerers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `officials`
--

LOCK TABLES `officials` WRITE;
/*!40000 ALTER TABLE `officials` DISABLE KEYS */;
INSERT INTO `officials` (`id`, `entity_unit_id`, `name`, `position`, `email`, `phone`, `created_at`, `updated_at`) VALUES ('94c34dc0-cb33-11ea-b37f-e9e864c50688','238e78c0-cb33-11ea-a26c-4fb26465c3fc','testing official v','Director de Carreteras','admin@t.com','0818542190dd','2020-07-21 09:21:38','2020-07-21 09:21:50'),('ba085260-d23c-11ea-a2f1-81d95ec4161d','a0f69670-d23c-11ea-ada1-ed2f6b9c9086','H. Akhmad Hambali,ST','PPK',NULL,NULL,'2020-07-30 08:14:44','2020-07-30 08:14:44'),('e26193f0-cb31-11ea-8bc4-f3c7ae143c38','0d01e0e0-cb13-11ea-b822-170a4a017234','Rene Echeverria','Credit Coordinator','reneecheverria2005@yahoo.es','33092329','2020-07-21 09:09:30','2020-07-21 09:09:30');
/*!40000 ALTER TABLE `officials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organization_units`
--

LOCK TABLES `organization_units` WRITE;
/*!40000 ALTER TABLE `organization_units` DISABLE KEYS */;
INSERT INTO `organization_units` (`id`, `unit_name`, `entity_id`, `created_at`, `updated_at`) VALUES ('0d01e0e0-cb13-11ea-b822-170a4a017234','UNIDAD DE APOYO TECNICO Y SEGURIDAD VIAL. (UATSV)','0fa28490-cb00-11ea-8faf-c1039333eea6','2020-07-21 05:28:47','2020-07-21 05:28:47'),('238e78c0-cb33-11ea-a26c-4fb26465c3fc','testing unit','1a490130-cb33-11ea-8750-673ecff42067','2020-07-21 09:18:28','2020-07-21 09:18:28'),('a0f69670-d23c-11ea-ada1-ed2f6b9c9086','Bina Marga','6e9c5520-d23c-11ea-a436-f9eb35462d29','2020-07-30 08:14:02','2020-07-30 08:14:02');
/*!40000 ALTER TABLE `organization_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` (`id`, `name`, `legal_name`, `description`, `address`, `phone`, `postal_code`, `main`, `open_uri`, `website`, `created_at`, `updated_at`) VALUES ('0fa28490-cb00-11ea-8faf-c1039333eea6','General Directorate of Roads (DGC)','General Directorate of Roads (DGC)','General Directorate of Roads (DGC)',NULL,'22-32-72-00 ext:1501','421423',1,NULL,NULL,'2020-07-21 03:12:51','2020-07-21 03:12:51'),('1a490130-cb33-11ea-8750-673ecff42067','testing','testing','testing',NULL,'22-32-72-00 ext:1501',NULL,1,NULL,NULL,'2020-07-21 09:18:13','2020-07-21 09:18:13'),('6e9c5520-d23c-11ea-a436-f9eb35462d29','Dinas PUPR Kab Lombok Barat','Dinas Pekerjaan Umum dan Penataan Ruang Bidang Bina Marga Kabupaten Lombok Barat',NULL,NULL,NULL,NULL,1,NULL,NULL,'2020-07-30 08:12:38','2020-07-30 08:12:38');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project_cities`
--

LOCK TABLES `project_cities` WRITE;
/*!40000 ALTER TABLE `project_cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project_documents`
--

LOCK TABLES `project_documents` WRITE;
/*!40000 ALTER TABLE `project_documents` DISABLE KEYS */;
INSERT INTO `project_documents` (`id`, `project_id`, `document_name`, `document_type`, `document_description`, `document_path`, `author`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('607d4800-d07a-11ea-b275-c12303eb5be0','48f459d0-cbfc-11ea-a339-fdf607ea2f33','Specifications and Plans of the Work','pdf','Specifications and Plans of the Work','project_files/2XuMUpLQq5eK6yU1Ar78rjGbELBouNh97XkW7pyK.pdf','Republica de honduras','2020-07-01','2020-07-28 02:31:01','2020-07-28 02:31:01');
/*!40000 ALTER TABLE `project_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `project_sources`
--

LOCK TABLES `project_sources` WRITE;
/*!40000 ALTER TABLE `project_sources` DISABLE KEYS */;
INSERT INTO `project_sources` (`id`, `project_id`, `source_id`, `budget_id`, `amount`, `created_at`, `updated_at`) VALUES ('7efaf1d0-d137-11ea-8df5-fb718c7ace47','48f459d0-cbfc-11ea-a339-fdf607ea2f33','7ef9d900-d137-11ea-b388-9f7deea8bb3a','182ff6e0-d07f-11ea-9512-e106d10ccac5',402519670,'2020-07-29 01:04:47','2020-07-29 01:04:47'),('f92e0cb0-d137-11ea-a9b7-07a9e97ed00e','48f459d0-cbfc-11ea-a339-fdf607ea2f33','4a862720-cb40-11ea-b0cc-fde750a3ad30','182ff6e0-d07f-11ea-9512-e106d10ccac5',402519670,'2020-07-29 01:08:12','2020-07-29 01:08:12');
/*!40000 ALTER TABLE `project_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `subsector_id`, `official_id`, `purpose_id`, `role_id`, `status_id`, `project_code`, `project_title`, `project_description`, `budget`, `code_sefin`, `environment_desc`, `settlement_desc`, `initial_lat`, `initial_lon`, `final_lat`, `final_lon`, `start_date`, `end_date`, `duration`, `lifetime_start_date`, `lifetime_end_date`, `date_of_publication`, `date_of_approved`, `created_at`, `updated_at`) VALUES ('48f459d0-cbfc-11ea-a339-fdf607ea2f33','e70d1200-cb3b-11ea-a475-abb7743d097f','e26193f0-cb31-11ea-8bc4-f3c7ae143c38','78dd1360-cb41-11ea-8bf1-05d233acdb6e','de513480-cb37-11ea-aa78-3d279c281a5a','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','PMR-283','REHABILITACIÓN DE TRAMOS CARRETEROS ALDEA LICONAS - COLONIA INFOP - LA PICONA, ALDEA LICONAS - LEJAMI, EN LOS MUNICIPIOS DE COMAYAGUA, LEJAMI Y LA PAZ, DEPARTAMENTOS DE COMAYAGUA Y LA PAZ, CON UNA LONGITUD DE 21.90 KM.','nothing',402519670,'001400073000','nothing to change but i dont really know','nothing','-8.692137995333427','116.1089825723389','-8.660834224493586','116.13108399206543','2020-07-01 00:00:00','2020-07-31 00:00:00',21,NULL,NULL,'2020-07-22 00:00:00','2020-07-22 00:00:00','2020-07-22 09:18:20','2020-07-29 06:46:02'),('d7f5bf10-d4b0-11ea-8eff-7f291cfa5174','e70d1200-cb3b-11ea-a475-abb7743d097f','ba085260-d23c-11ea-a2f1-81d95ec4161d','78dd1360-cb41-11ea-8bf1-05d233acdb6e','de513480-cb37-11ea-aa78-3d279c281a5a','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','P VI','Paket VI (Enam) Rehabilitasi/Pemeliharaan Berkala Ruas Jalan (022) Meninting - Midang, Rm + BMW 10 Ruas  (DANA PRIM)','Proyek ini difokuskan pada perbaikan jalan kabupaten yang ada di wilayah Lombok Barat yang terdiri dari pekerjaan rehabilitasu, pemeliharaan berkala, pekerjaan backlog dan minor work, dan pemeliharaan rutin dengan masa pelaksanaan 180 hari kalender',10207000000,'-','Tidak Ada','Dokumen RKPPL','-8.68127769192829','116.13078356721195','-8.676022419536908','116.14498856359863','2020-08-06 00:00:00','2020-09-05 00:00:00',30,NULL,NULL,'2020-08-22 00:00:00','2020-08-29 00:00:00','2020-08-02 11:10:59','2020-08-02 11:10:59');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `purposes`
--

LOCK TABLES `purposes` WRITE;
/*!40000 ALTER TABLE `purposes` DISABLE KEYS */;
INSERT INTO `purposes` (`id`, `purpose_name`, `created_at`, `updated_at`) VALUES ('73003f00-cb41-11ea-a7b2-058fdf551ef2','Construction of Works','2020-07-21 11:00:55','2020-07-21 11:00:55'),('78dd1360-cb41-11ea-8bf1-05d233acdb6e','Rehabilitacion','2020-07-21 11:01:04','2020-07-21 11:01:48');
/*!40000 ALTER TABLE `purposes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES ('de513480-cb37-11ea-aa78-3d279c281a5a','Coordinator','2020-07-21 09:52:20','2020-07-21 09:52:20');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sectors`
--

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;
INSERT INTO `sectors` (`id`, `sector_name`, `created_at`, `updated_at`) VALUES ('c32e5ee0-cb39-11ea-aef9-754f23c7ad77','Infrastructure Sector','2020-07-21 10:05:53','2020-07-21 10:05:53');
/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sources`
--

LOCK TABLES `sources` WRITE;
/*!40000 ALTER TABLE `sources` DISABLE KEYS */;
INSERT INTO `sources` (`id`, `source_name`, `acronym`, `created_at`, `updated_at`) VALUES ('4a862720-cb40-11ea-b0cc-fde750a3ad30','World Bank','WB','2020-07-21 10:52:37','2020-07-21 10:52:37'),('50c89af0-cb40-11ea-84a9-1956bb4a76fe','Fondos Nacionales','fns1','2020-07-21 10:52:48','2020-07-21 10:52:57'),('7ef9d900-d137-11ea-b388-9f7deea8bb3a','Bank Indonesia','BI','2020-07-29 01:04:47','2020-07-29 01:04:47');
/*!40000 ALTER TABLE `sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES ('d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','Publicated','2020-07-22 03:09:57','2020-07-22 03:09:57');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subsectors`
--

LOCK TABLES `subsectors` WRITE;
/*!40000 ALTER TABLE `subsectors` DISABLE KEYS */;
INSERT INTO `subsectors` (`id`, `sector_id`, `subsector_name`, `created_at`, `updated_at`) VALUES ('08b5f930-cb3c-11ea-82aa-39df64228c9d','c32e5ee0-cb39-11ea-aef9-754f23c7ad77','Conservacion y Matenimiento Vial red Pav y No Pav','2020-07-21 10:22:09','2020-07-21 10:22:09'),('e70d1200-cb3b-11ea-a475-abb7743d097f','c32e5ee0-cb39-11ea-aef9-754f23c7ad77','Road subsector','2020-07-21 10:21:12','2020-07-21 10:21:12');
/*!40000 ALTER TABLE `subsectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tender_methods`
--

LOCK TABLES `tender_methods` WRITE;
/*!40000 ALTER TABLE `tender_methods` DISABLE KEYS */;
INSERT INTO `tender_methods` (`id`, `method_name`, `created_at`, `updated_at`) VALUES ('101b7b60-cc9c-11ea-b67c-0bdfa897fe28','Public contest','2020-07-23 04:22:04','2020-07-23 04:22:04'),('d714f0d0-cbc1-11ea-8a7b-1940fa33bf3c','International Competitive Bidding','2020-07-22 02:19:58','2020-07-22 02:20:06');
/*!40000 ALTER TABLE `tender_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tender_offerers`
--

LOCK TABLES `tender_offerers` WRITE;
/*!40000 ALTER TABLE `tender_offerers` DISABLE KEYS */;
INSERT INTO `tender_offerers` (`id`, `offerer_id`, `tender_id`, `created_at`, `updated_at`) VALUES ('b212af10-ccb9-11ea-937d-c5431ff39b2d','09aea810-cbbf-11ea-b5d0-bf54ed8f65c3','101cd2e0-cc9c-11ea-a74c-290f7d724001','2020-07-23 07:54:11','2020-07-23 07:54:11');
/*!40000 ALTER TABLE `tender_offerers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tender_statuses`
--

LOCK TABLES `tender_statuses` WRITE;
/*!40000 ALTER TABLE `tender_statuses` DISABLE KEYS */;
INSERT INTO `tender_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES ('101c0640-cc9c-11ea-9fe0-7dc2d6fbe724','Not publicated','2020-07-23 04:22:04','2020-07-23 04:22:04');
/*!40000 ALTER TABLE `tender_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tenders`
--

LOCK TABLES `tenders` WRITE;
/*!40000 ALTER TABLE `tenders` DISABLE KEYS */;
INSERT INTO `tenders` (`id`, `project_id`, `contract_type_id`, `tender_method_id`, `official_id`, `process_number`, `project_process_name`, `start_date`, `end_date`, `max_extended_process`, `duration`, `amount`, `evaluation_process`, `international_invitation`, `basement`, `resolution`, `convocation`, `tdr`, `clarification`, `acceptance_certificate`, `status_id`, `tender_status_id`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('101cd2e0-cc9c-11ea-a74c-290f7d724001','48f459d0-cbfc-11ea-a339-fdf607ea2f33','101ae000-cc9c-11ea-8bee-67a0de19979e','101b7b60-cc9c-11ea-b67c-0bdfa897fe28','e26193f0-cb31-11ea-8bc4-f3c7ae143c38','DGC-016-UEBM-2011','SUPERVISION OF THE FLOORING WORKS OF THE HIGHWAY EL PORVENIR MARALE FRANCISCO MORAZAN','2020-06-30','2020-09-05','2020-09-23',67,402519670,NULL,'tender/7JB5NNE8mb8mm1Ag0HEKwQfNjE3VvAIRM44TvX9s.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','101c0640-cc9c-11ea-9fe0-7dc2d6fbe724','2020-08-08','2020-07-23 04:22:04','2020-07-23 04:22:04');
/*!40000 ALTER TABLE `tenders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('983022e0-cafe-11ea-917f-d7c41b699620','Administrator','admin','admin@cost.com','$2y$10$cC3DdFpf22a3S1EYq2hpLOVCv/a3rFU9coxbWy4HYXhJcEUBucQ12',NULL,'2020-07-21 03:02:21','2020-07-21 03:02:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `warranties`
--

LOCK TABLES `warranties` WRITE;
/*!40000 ALTER TABLE `warranties` DISABLE KEYS */;
INSERT INTO `warranties` (`id`, `amount`, `expiration_date`, `executions_id`, `warranty_types_id`, `status_id`, `date_of_publication`, `created_at`, `updated_at`) VALUES ('80253c00-cfc9-11ea-8165-19f91be57911',1,'2020-08-08 00:00:00','f5939a40-cfaf-11ea-9395-f7deb390df8e','8024aa70-cfc9-11ea-88cb-b71e60618fcc','d2dab4d0-cbc8-11ea-8d36-6ffcafeab669','2020-08-08 00:00:00','2020-07-27 05:24:53','2020-07-27 05:24:53');
/*!40000 ALTER TABLE `warranties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `warranty_types`
--

LOCK TABLES `warranty_types` WRITE;
/*!40000 ALTER TABLE `warranty_types` DISABLE KEYS */;
INSERT INTO `warranty_types` (`id`, `name`, `created_at`, `updated_at`) VALUES ('8024aa70-cfc9-11ea-88cb-b71e60618fcc','QUALITY GUARANTEE','2020-07-27 05:24:53','2020-07-27 05:24:53'),('e19e6360-cbc4-11ea-b80e-4daca5ceaeea','GARANTIA DE MANTENIMIENTO DE OFERTA','2020-07-22 02:41:44','2020-07-22 02:41:54');
/*!40000 ALTER TABLE `warranty_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-03 17:49:44
