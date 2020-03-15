DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` VALUES (1,'user',NULL,NULL),(2,'admin',NULL,NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `roles_id` bigint unsigned NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` char(15)  DEFAULT NULL,
  `birth_place` varchar(225)  DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `address` text ,
  `phone` varchar(17)  DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_roles_id_foreign` (`roles_id`),
  CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` VALUES (1,'Fiki Firmansyah','fikiirmansyah@gmail.com',1,NULL,'$2y$10$og6CfOBUrtx8hA0DUgUCnOn5h/d6ECdL3a57RUYWtUKPZwF/CHKJi',NULL,'2020-03-13 13:38:13','2020-03-13 13:38:13','Male','Sukabumi','2020-03-24','sdgfhgjhkkl','879756543'),(2,'Fiki','fikifh@gmail.com',1,NULL,'$2y$10$s2vn4ngI4Zkknlfm2ovws.WHGTdpE83r5zJRS4eoTeJvytrV2Q3we',NULL,'2020-03-13 14:44:52','2020-03-13 14:44:52','Male','sdgfhjh','2020-03-16','sdgfhghj','87653'),(3,'Abdul Malik','pwnuadmin@gmail.com',2,NULL,'$2y$10$nm52xPZQa9GryZ8umpTOjuXFCUIPsrbOx43MK90GrEZeKDmyBjhjG',NULL,'2020-03-14 23:01:00','2020-03-14 23:01:00','Male','Sukabumi','1996-03-02','cidadap sukabumi','0834873897'),(4,'Septia','septia@gmail.com',1,NULL,'$2y$10$pFEXQMijW9jVPklmlbZkT.uSANkAt.zfVLFqAzaJwrj9ctPcMAZOe',NULL,'2020-03-15 04:02:20','2020-03-15 04:02:20','Male','Sukabumi','1997-03-10','citarum indah jakarta','0847577577');


CREATE TABLE `documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nik` varchar(255)  NOT NULL,
  `education` varchar(255)  NOT NULL,
  `jumlah_hafalan` varchar(255)  NOT NULL,
  `ktp` varchar(255)  NOT NULL,
  `ijazah` varchar(255)  NOT NULL,
  `surdes` varchar(255)  NOT NULL,
  `suror` varchar(255)  NOT NULL,
  `bukti_hafalan` varchar(255)  NOT NULL,
  `skck` varchar(255)  NOT NULL,
  `sur_ket_hafalan` varchar(255)  NOT NULL,
  `syahadah` varchar(255)  NOT NULL,
  `cv` varchar(255)  NOT NULL,
  `foto` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_user_id_foreign` (`user_id`),
  CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `documents` VALUES (1,2,'9348727875','S1 IF','30','1584211810_nuconect.jpeg','1584211810_img_20171104_215740598614569.jpg','1584211810_logo.png','1584211810_Screenshot from 2020-03-11 14-35-07.png','1584211810_Screenshot from 2020-03-07 15-20-20.png','1584211810_Screenshot from 2020-02-06 16-51-26.png','1584211810_Screenshot from 2020-02-03 11-09-13.png','1584211810_Screenshot from 2020-01-26 10-31-58.png','1584211810_Screenshot from 2020-01-20 13-42-24.png','1584211810_Screenshot from 2020-01-20 13-42-24.png','2020-03-14 11:50:10','2020-03-14 11:50:10'),(2,4,'32454894789587','S1 IF','30','1584272012_nuconect.jpeg','1584272012_img_20171104_215740598614569.jpg','1584272012_Screenshot from 2020-03-11 14-35-07.png','1584272012_Screenshot from 2020-03-11 13-46-03.png','1584272012_Screenshot from 2020-01-26 10-31-58.png','1584272012_Screenshot from 2020-01-20 13-42-24.png','1584272012_obras 2.jpg','1584272012_obras.jpg','1584272012_Screenshot from 2020-01-03 10-53-05.png','1584272012_Screenshot from 2019-12-28 19-26-23.png','2020-03-15 04:33:32','2020-03-15 04:33:32');

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` VALUES (1,'2014_10_12_000001_Role',1),(2,'2014_10_12_000002_create_users_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2014_10_12_100000_create_password_resets_table',2),(5,'2020_03_14_165359_document',2);

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
