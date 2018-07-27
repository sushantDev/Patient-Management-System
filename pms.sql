-- --------------------------------------------------------
-- Host:                         192.168.99.100
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pms.appointments
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_doctor_id_foreign` (`doctor_id`),
  CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.appointments: ~2 rows (approximately)
DELETE FROM `appointments`;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` (`id`, `name`, `address`, `phone`, `date`, `time`, `doctor_id`, `created_at`, `updated_at`) VALUES
	(1, 'jkcasn', ',msdnvlksnd', 'klmddsvmvs', '2017-09-03', '23:53:30', 1, NULL, NULL),
	(2, 'Abigail Shepherd', 'Necessitatibus', '+382-31-2533631', '1982-08-21', '14:23:00', 1, '2017-09-03 18:36:23', '2017-09-03 18:36:23');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;


-- Dumping structure for table pms.doctors
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Female','Male','Others') COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.doctors: ~1 rows (approximately)
DELETE FROM `doctors`;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` (`id`, `name`, `username`, `address`, `phone`, `email`, `age`, `gender`, `department`, `created_at`, `updated_at`) VALUES
	(1, 'Bertha Molina', 'bertha-molina', 'Voluptatem', '+616-21-9603584', 'jkasnc@gmail.com', 95, 'Others', 'Necessitatibu', '2017-09-03 14:52:32', '2017-09-03 16:01:51'),
	(2, 'Melinda Morrow', 'melinda-morrow', 'Et minus ', '+168-17-4037191', 'nibipyv@gmail.com', 93, 'Female', 'Dolorem eu alias ', '2017-09-13 05:18:52', '2017-09-13 05:18:52');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;


-- Dumping structure for table pms.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_imageable_id_index` (`imageable_id`),
  KEY `images_imageable_type_index` (`imageable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.images: ~2 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`, `size`, `path`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
	(1, '114755-img-0222jpg', 254573, '4LZzn2sR3S2rgryUJppdceMuE1YI31gSzaVITokl.jpeg', 3, 'App\\patient', '2017-09-03 11:05:32', '2017-09-03 11:47:55'),
	(3, '160151-18816140-1520234611329108-212230147-npng', 38584, '6XEmxZ7KSfCr0tBrRldQHqQoyDQKBdbxCN1Mhjxj.png', 1, 'App\\doctor', '2017-09-03 14:52:33', '2017-09-03 16:01:52'),
	(4, '173921-18816140-1520234611329108-212230147-npng', 38584, 'GOeloKfdH2ZyOhP0aTeLIueSMkd31KyM65QDQvgA.png', 1, 'App\\staff', '2017-09-03 17:30:31', '2017-09-03 17:39:21'),
	(5, '174743-happy-personjpg', 39848, '3aU2imqz7pznynd2dvvPXEf98VxE6voTtP5Lg16w.jpeg', 4, 'App\\patient', '2017-10-12 17:47:44', '2017-10-12 17:47:44');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;


-- Dumping structure for table pms.inpatients
CREATE TABLE IF NOT EXISTS `inpatients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admit_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admit_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medicine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ward_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `staff_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inpatients_doctor_id_foreign` (`doctor_id`),
  KEY `inpatients_staff_id_foreign` (`staff_id`),
  CONSTRAINT `inpatients_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `inpatients_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `doctors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.inpatients: ~0 rows (approximately)
DELETE FROM `inpatients`;
/*!40000 ALTER TABLE `inpatients` DISABLE KEYS */;
INSERT INTO `inpatients` (`id`, `name`, `address`, `phone`, `skills`, `admit_type`, `admit_time`, `medicine`, `ward_no`, `room_no`, `doctor_id`, `staff_id`, `created_at`, `updated_at`) VALUES
	(1, 'Ivan Rios', 'Voluptate', '+323-49-96', 'Esse', 'Nisi', '06:49', 'Fugiat', 'Consequatu', 'Bla', 1, 1, '2017-09-04 05:14:02', '2017-09-04 05:36:02');
/*!40000 ALTER TABLE `inpatients` ENABLE KEYS */;


-- Dumping structure for table pms.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.migrations: ~8 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2014_10_12_000000_create_users_table', 1),
	(11, '2014_10_12_100000_create_password_resets_table', 1),
	(12, '2017_02_02_061044_create_settings_table', 1),
	(13, '2017_09_03_090306_create_patients_table', 2),
	(14, '2017_02_02_061206_create_images_table', 3),
	(15, '2017_09_03_142723_create_doctors_table', 4),
	(16, '2017_09_03_165832_create_staff_table', 5),
	(17, '2017_09_03_174453_create_appointments_table', 6),
	(18, '2017_09_04_040809_create_inpatients_table', 7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table pms.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table pms.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Female','Male','Others') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.patients: ~1 rows (approximately)
DELETE FROM `patients`;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` (`id`, `name`, `username`, `address`, `phone`, `age`, `gender`, `created_at`, `updated_at`) VALUES
	(3, 'Roary Obrien', 'roary-obrien', 'Reprehenderit autem', '+733-49-7137915', 12, 'Female', '2017-09-03 11:05:32', '2017-09-03 11:43:08'),
	(4, 'Alma Hensley', 'alma-hensley', 'Fugiat dolorum', 'kmxs', 100, 'Female', '2017-10-12 17:47:43', '2017-10-12 17:47:43'),
	(5, 'Flynn Barlow', 'flynn-barlow', 'Omnis deserunt eligendi nesciunt in labore', '8786756', 91, 'Others', '2017-11-04 02:38:08', '2017-11-04 02:38:32');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;


-- Dumping structure for table pms.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.settings: ~12 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `slug`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'title', 'Patient Management System', NULL, NULL),
	(2, 'description', 'PMS is the information system that is developed by the hospital in managing the records of the people that are involved in the organization.', NULL, NULL),
	(3, 'address', 'Dillibazar, ktm', NULL, NULL),
	(4, 'phone', '9843228246', NULL, NULL),
	(5, 'email', 'info@pms.com.np', NULL, NULL),
	(6, 'postbox', '', NULL, NULL),
	(7, 'facebook', 'https://www.facebook.com', NULL, NULL),
	(8, 'twitter', 'https://www.twitter.com', NULL, NULL),
	(9, 'google_plus', 'https://www.google.com', NULL, NULL),
	(10, 'logo', '/img/logo.png', NULL, NULL),
	(11, 'notification-emails', 'admin@pms.com.np', NULL, NULL),
	(12, 'placeholder', '/img/logo.jpg', NULL, NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table pms.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Female','Male','Others') COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_status` enum('Unmarried','Married') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.staff: ~0 rows (approximately)
DELETE FROM `staff`;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `name`, `staff_type`, `username`, `address`, `phone`, `email`, `age`, `dob`, `gender`, `marital_status`, `created_at`, `updated_at`) VALUES
	(1, 'Breanna Moses', 'jkhjkhj', 'breanna-moses', 'Ut officia', '+796-38-8472791', 'ma@hotmail.com', 41, '2008-05-09', 'Female', 'Married', '2017-09-03 17:30:31', '2017-09-03 17:39:21');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;


-- Dumping structure for table pms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pms.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'PMS Admin', 'pms-admin', 'admin@pms.com', '$2y$10$/ozp6g6c0L046DJTRIZUe.4PUcnYmNoevrxAX.zuFmeYVSBQA23ce', 't3lk4jZNmDcxh513mtCnUwgt1avp95msyqThU8GOmG6tP7a6vrUEV0Yso8Ns', '2017-09-03 06:41:40', '2017-09-03 06:41:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
