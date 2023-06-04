ALTER TABLE `settings` CHANGE `type` `type` ENUM('installer_env_settings','client_secret','business_general','pos','email_smtp','email_template','sms','invoice','barcode','website_general','seo','app_login_signup','website_login_signup','app_general','gallary_setting','store_setting','business_notification_setting','app_display_in_setting','app_notification_setting','web_theme_setting','point_setting','membership_setting','email_notify_setting','login_credential','is_purchased_setting','kundol_web_setting','business_firebase_setting','business_google_setting','wallet_setting') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

ALTER TABLE `orders` CHANGE `payment_method` `payment_method` ENUM('cod','paypal','authorize_net','stripe','banktransfer','mollie','instamojo','braintree','hyperpay','razorpay','paytm','paystack','midtrans','wallet') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod';

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES (NULL, 'wallet_setting', 'enable', 'wallet_setting', NULL, NULL, NULL, NULL);

INSERT INTO `payment_methods` (`id`, `payment_method`, `title`, `status`, `default`, `environment`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES (NULL, 'wallet', 'wallet', '1', '0', '0', 'cod', NULL, NULL, NULL, NULL);

ALTER TABLE `orders` CHANGE `payment_method` `payment_method` ENUM('cod','paypal','authorize_net','stripe','banktransfer','mollie','instamojo','braintree','hyperpay','razorpay','paytm','paystack','midtrans','wallet','fygaro') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod';

INSERT INTO `payment_methods` (`id`, `payment_method`, `title`, `status`, `default`, `environment`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES (NULL, 'fygaro', 'fygaro', '1', '0', '0', 'webview', NULL, NULL, NULL, NULL);

INSERT INTO `payment_method_settings` (`id`, `payment_method_id`, `key`, `value`) VALUES (NULL, '13', 'FYGARO_API_KEY', 'a7cb170b-c36a-4b82-8461-1e8b24f1709e'), (NULL, '13', 'FYGARO_SECRET_KEY', 'w4WPWPp84spEC6k1VHWLbsY0mG8fOvJV4-ZAJezsnHQ');

INSERT INTO `payment_method_settings` (`id`, `payment_method_id`, `key`, `value`) VALUES (NULL, '13', 'FYGARO_Button_URL', 'https://www.fygaro.com/en/pb/87baafd3-a1e8-42e3-be61-10a030303580');