-- change becasue of fixing delete unit algorithm
ALTER TABLE `products` CHANGE `product_unit` `unit_id` INT(11) NULL DEFAULT NULL;

ALTER TABLE `products` CHANGE `video_url` `video_url` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `languages` ADD `status` ENUM('active','inactive','disable') NOT NULL DEFAULT 'active' AFTER `is_default`;
ALTER TABLE `countries` ADD `status` ENUM('active','inactive','disable') NOT NULL DEFAULT 'active' AFTER `country_code`;
ALTER TABLE `states` ADD `status` ENUM('active','inactive','disable') NOT NULL DEFAULT 'active' AFTER `country_id`;
ALTER TABLE `cities` ADD `status` ENUM('active','inactive','disable') NOT NULL DEFAULT 'active' AFTER `country_id`;

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES (NULL, 'same_for_billing', '1', 'business_general', NULL, NULL, NULL, NULL);

INSERT INTO `permission` (`id`, `key`, `value`, `parent_id`, `created_at`, `updated_at`) VALUES (NULL, 'NewsletterContact Settings', 'NewsletterContact-list', '60', NULL, NULL), (NULL, 'Manage NewsletterContact Settings', 'NewsletterContact-delete', '60', NULL, NULL);

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES (NULL, '109', '1', '1', '1', '2021-04-25 07:05:35', '2021-08-16 10:48:41'), (NULL, '110', '1', '1', '1', '2021-04-25 07:05:35', '2021-04-25 07:05:35');

ALTER TABLE `timezones` ADD `is_default` TINYINT(4) NOT NULL DEFAULT '0' COMMENT 'if 1 then timezone is set to as default!' AFTER `diff_from_gtm`;
