CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
);
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  ADD    UNIQUE KEY `users_email_unique` (`email`),
  ADD    KEY `users_student_id_foreign` (`student_id`),
    ADD  CONSTRAINT `users_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
);
CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  ADD    KEY `audits_user_id_foreign` (`user_id`),
  ADD    CONSTRAINT `audits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);
- CREATE TABLE `audit_modifications` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` int(11) NOT NULL,
  `permanence` int(11) NOT NULL,
  `audit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  ADD    KEY `audit_modifications_audit_id_foreign` (`audit_id`),
  ADD    CONSTRAINT `audit_modifications_audit_id_foreign` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`id`)
);
CREATE TABLE `audit_permanence` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);
CREATE TABLE `audit_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `browser` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_init` int(11) NOT NULL,
  `time_hours_init` int(11) NOT NULL,
  `time_minutes_init` int(11) NOT NULL,
  `time_seconds_init` int(11) NOT NULL,
  `date_final` int(11) NOT NULL,
  `time_hours_final` int(11) NOT NULL,
  `time_minutes_final` int(11) NOT NULL,
  `time_seconds_final` int(11) NOT NULL,
  `audit_id` bigint(20) UNSIGNED NOT NULL
  ADD    KEY `audit_sessions_audit_id_foreign` (`audit_id`),
    ADD  CONSTRAINT `audit_sessions_audit_id_foreign` FOREIGN KEY (`audit_id`) REFERENCES `audits` (`id`)
);


