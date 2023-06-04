<?php

namespace Database\Seeders;

use App\Models\Admin\Customer;
use App\Models\Admin\Purchaser;
use App\Models\Admin\Setting;
use App\Models\Admin\Warehouse;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $customers = Customer::oldest()->first();
        $purchaser = Purchaser::oldest()->first();
        $warehouse = Warehouse::oldest()->first();

        //POS Settiings 
        if ($customers && $purchaser && $warehouse) {

            Setting::where('id', '>', '0')->delete();
            Setting::insertOrIgnore([
                [
                    'key' => 'default_customer',
                    'value' => $customers->id,
                    'type' => 'pos',
                ],
                [
                    'key' => 'default_biller',
                    'value' => $purchaser->id,
                    'type' => 'pos',
                ],
                [
                    'key' => 'default_warehouse',
                    'value' => $warehouse->id,
                    'type' => 'pos',
                ],
                [
                    'key' => 'no_of_products',
                    'value' => 4,
                    'type' => 'pos',
                ],
            ]);
        }

        //Email Smtp Setting
        Setting::insertOrIgnore([
            [
                'key' => 'mail_engine',
                'value' => env('MAIL_MAILER', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_host',
                'value' => env('MAIL_HOST', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_port',
                'value' => env('MAIL_PORT', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_encription',
                'value' => env('MAIL_ENCRYPTION', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_username',
                'value' => env('MAIL_USERNAME', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_password',
                'value' => env('MAIL_PASSWORD', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_from_email',
                'value' => env('MAIL_FROM_ADDRESS', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_from_name',
                'value' => env('MAIL_FROM_NAME', 'test'),
                'type' => 'email_smtp',
            ],
            [
                'key' => 'smtp_status',
                'value' => 'active',
                'type' => 'email_smtp',
            ],
        ]);

        //sms settings

        Setting::insertOrIgnore([
            [
                'key' => 'gateway',
                'value' => 'twilio',
                'type' => 'sms',
            ],
            [
                'key' => 'twilio_sid',
                'value' => rand(),
                'type' => 'sms',
            ],
            [
                'key' => 'twilio_auth_token',
                'value' => '',
                'type' => 'sms',
            ],
            [
                'key' => 'twilio_number',
                'value' => '12345678',
                'type' => 'sms',
            ],
            [
                'key' => 'firebase_api_key',
                'value' => '12345678',
                'type' => 'sms',
            ],
            [
                'key' => 'firebase_secret_key',
                'value' => '12345678',
                'type' => 'sms',
            ],
        ]);

        //Invoice settings

        Setting::insertOrIgnore([
            [
                'key' => 'invoice_logo',
                'value' => '/gallary/01-logo.png',
                'type' => 'invoice',
            ],
            [
                'key' => 'invoice_address',
                'value' => 'New York, USA.',
                'type' => 'invoice',
            ],
            [
                'key' => 'invoice_email',
                'value' => 'info@your-site.com',
                'type' => 'invoice',
            ],
            [
                'key' => 'invoice_mobile',
                'value' => '0123456789',
                'type' => 'invoice',
            ],
            [
                'key' => 'invoice_phone',
                'value' => '0123456789',
                'type' => 'invoice',
            ],
            [
                'key' => 'invoice_prefix',
                'value' => 'TXN-',
                'type' => 'invoice',
            ],
            [
                'key' => 'invoice_footer_content',
                'value' => 'your-site.com',
                'type' => 'invoice',
            ],
        ]);

        //Barcode settings

        Setting::insertOrIgnore([
            [
                'key' => 'barcode_style',
                'value' => 'abc 4x 45y dummy',
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_site_name',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_product_name',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_price',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_currency',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_unit',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_category',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_variant',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_product_image',
                'value' => true,
                'type' => 'barcode',
            ],
            [
                'key' => 'barcode_check_promotional_price',
                'value' => true,
                'type' => 'barcode',
            ],
        ]);

        //Website General settings

        Setting::insertOrIgnore([
            [
                'key' => 'site_name_or_logo',
                'value' => 'logo',
                'type' => 'website_general',
            ],
            [
                'key' => 'site_name',
                'value' => 'LOGO',
                'type' => 'website_general',
            ],
            [
                'key' => 'site_logo',
                'value' => '/gallary/01-logo.png',
                'type' => 'website_general',
            ],
            [
                'key' => 'favicon',
                'value' => '/gallary/01-fav.png',
                'type' => 'website_general',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'google_url',
                'value' => 'https://google.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com',
                'type' => 'website_general',
            ],
            [
                'key' => 'about_store',
                'value' => 'About store text will goes here',
                'type' => 'website_general',
            ],
            [
                'key' => 'contect_us_description',
                'value' => 'contact us text will goes here',
                'type' => 'website_general',
            ],
            [
                'key' => 'allow_cookies',
                'value' => true,
                'type' => 'website_general',
            ],
            [
                'key' => 'client_secret',
                'value' => 'sk_1234',
                'type' => 'website_general',
            ],
            [
                'key' => 'client_id',
                'value' => '1234',
                'type' => 'website_general',
            ],
            [
                'key' => 'instagram_embed',
                'value' => 'Instagram Widget',
                'type' => 'website_general',
            ]
        ]);

        //SEO settings

        Setting::insertOrIgnore([
            [
                'key' => 'seo_title',
                'value' => 'abc xyz',
                'type' => 'seo',
            ],
            [
                'key' => 'seo_meta_tags',
                'value' => 'ecommers',
                'type' => 'seo',
            ],
            [
                'key' => 'seo_keywords',
                'value' => 'abc,xyz,ecommerce',
                'type' => 'seo',
            ],
            [
                'key' => 'seo_description',
                'value' => 'bss',
                'type' => 'seo',
            ],
        ]);

        // Webiste login/signup setting
        Setting::insertOrIgnore([
            [
                'key' => 'authenticate_with_email_password',
                'value' => true,
                'type' => 'website_login_signup',
            ],
            [
                'key' => 'authenticate_with_phone',
                'value' => true,
                'type' => 'website_login_signup',
            ],
            [
                'key' => 'authenticate_with_facebook',
                'value' => true,
                'type' => 'website_login_signup',
            ],
            [
                'key' => 'authenticate_with_google',
                'value' => true,
                'type' => 'website_login_signup',
            ],
            [
                'key' => 'authenticate_with_guest_checkout',
                'value' => true,
                'type' => 'website_login_signup',
            ],
            [
                'key' => 'login_signup_form',
                'value' => '1',
                'type' => 'website_login_signup',
            ],
        ]);

        // Webiste sociallite login setting
        Setting::insertOrIgnore([
            [
                'key' => 'facebook_client_id',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'facebook_client_secret',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'facebook_redirect',
                'value' => url('/') . '/api/client/customer_login/facebook/callback',
                'type' => 'login_credential',
            ],
            [
                'key' => 'google_client_id',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'google_client_secret',
                'value' => '',
                'type' => 'login_credential',
            ],
            [
                'key' => 'google_redirect',
                'value' => url('/') . '/api/client/customer_login/google/callback',
                'type' => 'login_credential',
            ],
            [
                'key' => 'sociallite_login',
                'value' => true,
                'type' => 'login_credential',
            ],
        ]);

        //Website Theme Settings
        Setting::insertOrIgnore([
            [
                "key" => "card_style",
                "value" => "style1",
                "type" => "web_theme_setting"
            ], [
                "key" => "header_style",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "Footer_style",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "slider_style",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "about_us_web",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "blog",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "banner_style",
                "value" => "style2",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "cart_page",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "contact_us",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "login",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "product_detail",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "shop",
                "value" => "style1",
                "type" => "web_theme_setting"
            ],
            [
                "key" => "color",
                "value" => "style",
                "type" => "web_theme_setting"
            ]

        ]);

        //App genral settings

        Setting::insertOrIgnore([
            [
                'key' => 'app_name',
                'value' => 'Ecommerce Solution',
                'type' => 'app_general',
            ],
            [
                'key' => 'category_style',
                'value' => '4',
                'type' => 'app_general',
            ],
            [
                'key' => 'home_style',
                'value' => '4',
                'type' => 'app_general',
            ],
            [
                'key' => 'card_style',
                'value' => '1',
                'type' => 'app_general',
            ],
            [
                'key' => 'banner_style',
                'value' => '1',
                'type' => 'app_general',
            ],
            [
                'key' => 'ios_app_url',
                'value' => 'http://apple.com',
                'type' => 'app_general',
            ],
            [
                'key' => 'google_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'facebook_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'phone_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'email_login',
                'value' => false,
                'type' => 'app_general',
            ],
            [
                'key' => 'inventory',
                'value' => false,
                'type' => 'app_general',
            ],

        ]);

        // App Display In Menu/Sidebar
        Setting::insertOrIgnore([
            [
                'key' => 'wishList',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'edit_profile',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'shipping_address',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'my_orders',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'contact_us',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'about_us',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'news',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'introduction',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'shareApp',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'rateapp',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
            [
                'key' => 'setting',
                'value' => 'show',
                'type' => 'app_display_in_setting',
            ],
        ]);

        //app Local Notification

        Setting::insertOrIgnore([
            [
                'key' => 'title',
                'value' => 'Ionic Ecommerce',
                'type' => 'app_notification_setting',
            ],
            [
                'key' => 'detail',
                'value' => 'A bundle of products waiting for you!',
                'type' => 'app_notification_setting',
            ],
            [
                'key' => 'notification_duration',
                'value' => 'Year',
                'type' => 'app_notification_setting',
            ],
        ]);

        //App Login / sign up settings

        Setting::insertOrIgnore([
            [
                'key' => 'authenticate_with_email_password',
                'value' => true,
                'type' => 'app_login_signup',
            ],
            [
                'key' => 'authenticate_with_phone',
                'value' => true,
                'type' => 'app_login_signup',
            ],
            [
                'key' => 'authenticate_with_facebook',
                'value' => true,
                'type' => 'app_login_signup',
            ],
            [
                'key' => 'authenticate_with_google',
                'value' => true,
                'type' => 'app_login_signup',
            ],
            [
                'key' => 'authenticate_with_guest_checkout',
                'value' => true,
                'type' => 'app_login_signup',
            ],
            [
                'key' => 'login_signup_form',
                'value' => '1',
                'type' => 'app_login_signup',
            ],
        ]);

        //gallary setting
        Setting::insertOrIgnore([
            [
                'key' => 'thumbnail_height',
                'value' => '400',
                'type' => 'gallary_setting',
            ],
            [
                'key' => 'thumbnail_width',
                'value' => '400',
                'type' => 'gallary_setting',
            ],
            [
                'key' => 'medium_height',
                'value' => '600',
                'type' => 'gallary_setting',
            ],
            [
                'key' => 'medium_width',
                'value' => '600',
                'type' => 'gallary_setting',
            ],

            [
                'key' => 'large_height',
                'value' => '900',
                'type' => 'gallary_setting',
            ],

            [
                'key' => 'large_width',
                'value' => '900',
                'type' => 'gallary_setting',
            ],
        ]);

        //Store setting
        Setting::insertOrIgnore([
            [
                'key' => 'physical_store',
                'value' => 1,
                'type' => 'store_setting',
            ],
            [
                'key' => 'physical_store_inventory',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'physical_store_simple',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'physical_store_advance',
                'value' => 0,
                'type' => 'store_setting',
            ], [
                'key' => 'physical_store_pos',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'physical_store_pos_warehouse',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'physical_store_account_managment',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'physical_store_purchasing',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'digital_store',
                'value' => 0,
                'type' => 'store_setting',
            ],
            [
                'key' => 'digital_store_account_managment',
                'value' => 0,
                'type' => 'store_setting',
            ],
        ]);

        //Business Notification setting
        Setting::insertOrIgnore([
            [
                'key' => 'default_notification',
                'value' => 'FCM',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'onesignal_app_id',
                'value' => '6053d948-b8f6-472a-87e4-379fa89f78d8',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'onsignal_sender_id',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'firebase_api_key',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'firebase_auth_domain',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'firebase_database_url',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'firebase_project_id',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'firebase_storage_bucket',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
            [
                'key' => 'firebase_sender_id',
                'value' => '50877237723',
                'type' => 'business_notification_setting',
            ],
        ]);




        //Business Notification setting
        Setting::insertOrIgnore([
            [
                'key' => 'about_us',
                'value' => 'Themes-Coder is a clothing brand offers more than 100+ International brands at 20%-70% discount, all 365 days a year. We offer customers a wide range of brands and categories at absolutely great prices in an ambience that is refreshingly enjoyable. ',
                'type' => 'business_general',
            ],
            [
                'key' => 'address',
                'value' => 'New York, USA',
                'type' => 'business_general',
            ],
            [
                'key' => 'business_name',
                'value' => 'The Kundol Shop',
                'type' => 'business_general',
            ],
            [
                'key' => 'phone_number',
                'value' => '888 - 963 - 600',
                'type' => 'business_general',
            ],
            [
                'key' => 'email',
                'value' => 'bussiness@email.com',
                'type' => 'business_general',
            ],
            [
                'key' => 'new_bage_on_product_card_visibility',
                'value' => 30,
                'type' => 'business_general',
            ],
            [
                'key' => 'minimum_order_total',
                'value' => 150,
                'type' => 'business_general',
            ],
            [
                'key' => 'free_shipping_order_price',
                'value' => 299,
                'type' => 'business_general',
            ]
        ]);


        //Point Settings
        Setting::insertOrIgnore([
            [
                "key" => "point_setting",
                "value" => "enable",
                "type" => "point_setting"
            ],
            [
                "key" => "checkin_point",
                "value" => "0.01",
                "type" => "point_setting"
            ],
            [
                "key" => "checkin_hour",
                "value" => "24",
                "type" => "point_setting"
            ],
            [
                "key" => "per_point",
                "value" => "0.05",
                "type" => "point_setting"
            ],
            [
                "key" => "product_share_point",
                "value" => "5",
                "type" => "point_setting"
            ],
            [
                "key" => "invite_friend_share_point",
                "value" => "5",
                "type" => "point_setting"
            ],

            [
                "key" => "register_points",
                "value" => "5",
                "type" => "point_setting"
            ],

            [
                "key" => "per_order_price_point",
                "value" => "50",
                "type" => "point_setting"
            ],
            [
                "key" => "redeem_point",
                "value" => "100",
                "type" => "point_setting"
            ],
        ]);

        //Wallet Setting
        Setting::insertOrIgnore([
            [
                "key" => 'wallet_setting',
                "value" => 'enable',
                "type" => 'wallet_setting'
            ]
        ]);

        //Membership Settings
        Setting::insertOrIgnore([
            [
                "key" => "first_level_amount",
                "value" => "100",
                "type" => "membership_setting"
            ],
            [
                "key" => "second_level_amount",
                "value" => "200",
                "type" => "membership_setting"
            ],
            [
                "key" => "third_level_amount",
                "value" => "500",
                "type" => "membership_setting"
            ],
            [
                "key" => "fourth_level_amount",
                "value" => "1000",
                "type" => "membership_setting"
            ],
            [
                "key" => "fifth_level_amount",
                "value" => "5000",
                "type" => "membership_setting"
            ],
        ]);

        //Email notification Setting
        Setting::insertOrIgnore([
            [
                "key" => "notify_email",
                "value" => "saqi628@gmail.com",
                "type" => "email_notify_setting"
            ],
        ]);


        //is_purchased_setting
        Setting::insertOrIgnore([
            [
                "key" => "is_web_purchased",
                "value" => true,
                "type" => "is_purchased_setting"
            ],
            [
                "key" => "is_app_purchased",
                "value" => true,
                "type" => "is_purchased_setting"
            ],
            [
                "key" => "is_deliveryboyapp_purchased",
                "value" => true,
                "type" => "is_purchased_setting"
            ],
        ]);


        //installer_env_settings
        Setting::insertOrIgnore([
            [
                "key" => "external_website_link",
                "value" => '',
                "type" => "installer_env_settings"
            ],
            [
                "key" => "app_name",
                "value" => '',
                "type" => "installer_env_settings"
            ],
            [
                "key" => "environment",
                "value" => '',
                "type" => "installer_env_settings"
            ],
        ]);


        //business firebase setting
        Setting::insertOrIgnore([
            [
                'key' => 'api_key',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'auth_domain',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'database_url',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'peoject_id',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'storage_bucket',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'messaging_sender_id',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'app_id',
                'value' => '',
                'type' => 'business_firebase_setting',
            ]
        ]);

        //email templates setting
        Setting::insertOrIgnore([
            [
                'key' => 'forget_email_template',
                'value' => '',
                'type' => 'email_template',
            ],
            [
                'key' => 'contact_us_email_template',
                'value' => '',
                'type' => 'email_template',
            ]
        ]);
        //email templates setting
        Setting::insertOrIgnore([
            [
                'key' => 'welcome_email_template',
                'value' => '',
                'type' => 'email_template',
            ],
            [
                'key' => 'order_email_template',
                'value' => '',
                'type' => 'email_template',
            ]
        ]);

        //business business_google_setting setting
        Setting::insertOrIgnore([
            [
                'key' => 'google_map_api_string',
                'value' => '',
                'type' => 'business_google_setting',
            ]
        ]);
        

        //kundol_settings_main
        

        Setting::insertOrIgnore([
            [
                "key" => "home_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "shop_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "product_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "cart_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "about_us_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "contact_us_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "blog_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            [
                "key" => "login_page",
                "value" => 'style1',
                "type" => "kundol_web_setting"
            ],
            
        ]);

        //kundol_settings_home
        
        \DB::table('settings')->insert(array (
            170 => 
            array (
                'key' => 'language1_home1_text1',
                'value' => 'Get 50% OFF',
                'type' => 'kundol_web_setting',
            ),
            171 => 
            array (
                'key' => 'language1_home1_text2',
                'value' => 'Spring',
                'type' => 'kundol_web_setting',
            ),
            172 => 
            array (
                'key' => 'language1_home1_text3',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            173 => 
            array (
                'key' => 'language1_home1_text4',
                'value' => '202205244452banner_image_1.png',
                'type' => 'kundol_web_setting',
            ),
            174 => 
            array (
                'key' => 'language1_home1_text5',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            175 => 
            array (
                'key' => 'language1_home1_text6',
                'value' => 'Geostrock',
                'type' => 'kundol_web_setting',
            ),
            176 => 
            array (
                'key' => 'language1_home1_text7',
                'value' => 'Get 37%',
                'type' => 'kundol_web_setting',
            ),
            177 => 
            array (
                'key' => 'language1_home1_text8',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            178 => 
            array (
                'key' => 'language1_home1_text9',
                'value' => '202205244454banner_image_2.png',
                'type' => 'kundol_web_setting',
            ),
            179 => 
            array (
                'key' => 'language1_home1_text10',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            180 => 
            array (
                'key' => 'language1_home1_text11',
                'value' => 'Exclusive Design',
                'type' => 'kundol_web_setting',
            ),
            181 => 
            array (
                'key' => 'language1_home1_text12',
                'value' => 'Minimal',
                'type' => 'kundol_web_setting',
            ),
            182 => 
            array (
                'key' => 'language1_home1_text13',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            183 => 
            array (
                'key' => 'language1_home1_text14',
                'value' => '202205244457banner_image_3.png',
                'type' => 'kundol_web_setting',
            ),
            184 => 
            array (
                'key' => 'language1_home1_text15',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            185 => 
            array (
                'key' => 'language1_home1_text16',
                'value' => 'Special offers',
                'type' => 'kundol_web_setting',
            ),
            186 => 
            array (
                'key' => 'language1_home1_text17',
                'value' => 'Decore Furniture',
                'type' => 'kundol_web_setting',
            ),
            187 => 
            array (
                'key' => 'language1_home1_text18',
                'value' => 'language1_home1_text18',
                'type' => 'kundol_web_setting',
            ),
            188 => 
            array (
                'key' => 'language1_home1_text19',
                'value' => 'lorem ispsum dlre sit lorem ispsum dlre sit lorem ispsum dlre sit lorem ispsum dlre sit',
                'type' => 'kundol_web_setting',
            ),
            189 => 
            array (
                'key' => 'language1_home1_text20',
                'value' => '202205244413furniture-bg.jpg',
                'type' => 'kundol_web_setting',
            ),
            190 => 
            array (
                'key' => 'language1_home1_text21',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            191 => 
            array (
                'key' => 'language1_home1_text22',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            192 => 
            array (
                'key' => 'language1_home1_text23',
                'value' => 'Collection',
                'type' => 'kundol_web_setting',
            ),
            193 => 
            array (
                'key' => 'language1_home1_text24',
                'value' => 'OFF',
                'type' => 'kundol_web_setting',
            ),
            194 => 
            array (
                'key' => 'language1_home1_text25',
                'value' => 'Chair',
                'type' => 'kundol_web_setting',
            ),
            195 => 
            array (
                'key' => 'language1_home1_text26',
                'value' => 'language1_home1_text26',
                'type' => 'kundol_web_setting',
            ),
            196 => 
            array (
                'key' => 'language1_home1_text27',
                'value' => 'language1_home1_text27',
                'type' => 'kundol_web_setting',
            ),
            197 => 
            array (
                'key' => 'language1_home1_text28',
                'value' => 'language1_home1_text28',
                'type' => 'kundol_web_setting',
            ),
            198 => 
            array (
                'key' => 'language1_home1_text29',
                'value' => 'language1_home1_text29',
                'type' => 'kundol_web_setting',
            ),
            199 => 
            array (
                'key' => 'language1_home1_text30',
                'value' => 'language1_home1_text30',
                'type' => 'kundol_web_setting',
            ),
            200 => 
            array (
                'key' => 'language1_home2_text1',
                'value' => 'language1_home2_text1',
                'type' => 'kundol_web_setting',
            ),
            201 => 
            array (
                'key' => 'language1_home2_text2',
                'value' => 'language1_home2_text2',
                'type' => 'kundol_web_setting',
            ),
            202 => 
            array (
                'key' => 'language1_home2_text3',
                'value' => 'language1_home2_text3',
                'type' => 'kundol_web_setting',
            ),
            203 => 
            array (
                'key' => 'language1_home2_text4',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            204 => 
            array (
                'key' => 'language1_home2_text5',
                'value' => 'language1_home2_text5',
                'type' => 'kundol_web_setting',
            ),
            205 => 
            array (
                'key' => 'language1_home2_text6',
                'value' => 'language1_home2_text6',
                'type' => 'kundol_web_setting',
            ),
            206 => 
            array (
                'key' => 'language1_home2_text7',
                'value' => 'language1_home2_text7',
                'type' => 'kundol_web_setting',
            ),
            207 => 
            array (
                'key' => 'language1_home2_text8',
                'value' => 'language1_home2_text8',
                'type' => 'kundol_web_setting',
            ),
            208 => 
            array (
                'key' => 'language1_home2_text9',
                'value' => 'language1_home2_text9',
                'type' => 'kundol_web_setting',
            ),
            209 => 
            array (
                'key' => 'language1_home2_text10',
                'value' => 'language1_home2_text10',
                'type' => 'kundol_web_setting',
            ),
            210 => 
            array (
                'key' => 'language1_home2_text11',
                'value' => '202109025813banner_368x550.jpg',
                'type' => 'kundol_web_setting',
            ),
            211 => 
            array (
                'key' => 'language1_home2_text12',
                'value' => 'language1_home2_text12',
                'type' => 'kundol_web_setting',
            ),
            212 => 
            array (
                'key' => 'language1_home2_text13',
                'value' => 'Newest Collection',
                'type' => 'kundol_web_setting',
            ),
            213 => 
            array (
                'key' => 'language1_home2_text14',
                'value' => 'Black Dress',
                'type' => 'kundol_web_setting',
            ),
            214 => 
            array (
                'key' => 'language1_home2_text15',
                'value' => 'Women',
                'type' => 'kundol_web_setting',
            ),
            215 => 
            array (
                'key' => 'language1_home2_text16',
                'value' => '202205240500fullwidthbanner.jpg',
                'type' => 'kundol_web_setting',
            ),
            216 => 
            array (
                'key' => 'language1_home2_text17',
                'value' => 'VIEW ALL COLLECTION',
                'type' => 'kundol_web_setting',
            ),
            217 => 
            array (
                'key' => 'language1_home2_text18',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            218 => 
            array (
                'key' => 'language1_home2_text19',
                'value' => 'language1_home2_text19',
                'type' => 'kundol_web_setting',
            ),
            219 => 
            array (
                'key' => 'language1_home2_text20',
                'value' => 'language1_home2_text20',
                'type' => 'kundol_web_setting',
            ),
            220 => 
            array (
                'key' => 'language1_home2_text21',
                'value' => 'language1_home2_text21',
                'type' => 'kundol_web_setting',
            ),
            221 => 
            array (
                'key' => 'language1_home2_text22',
                'value' => 'language1_home2_text22',
                'type' => 'kundol_web_setting',
            ),
            222 => 
            array (
                'key' => 'language1_home2_text23',
                'value' => 'language1_home2_text23',
                'type' => 'kundol_web_setting',
            ),
            223 => 
            array (
                'key' => 'language1_home2_text24',
                'value' => 'language1_home2_text24',
                'type' => 'kundol_web_setting',
            ),
            224 => 
            array (
                'key' => 'language1_home2_text25',
                'value' => 'language1_home2_text25',
                'type' => 'kundol_web_setting',
            ),
            225 => 
            array (
                'key' => 'language1_home2_text26',
                'value' => 'language1_home2_text26',
                'type' => 'kundol_web_setting',
            ),
            226 => 
            array (
                'key' => 'language1_home2_text27',
                'value' => 'language1_home2_text27',
                'type' => 'kundol_web_setting',
            ),
            227 => 
            array (
                'key' => 'language1_home2_text28',
                'value' => 'language1_home2_text28',
                'type' => 'kundol_web_setting',
            ),
            228 => 
            array (
                'key' => 'language1_home2_text29',
                'value' => 'language1_home2_text29',
                'type' => 'kundol_web_setting',
            ),
            229 => 
            array (
                'key' => 'language1_home2_text30',
                'value' => 'language1_home2_text30',
                'type' => 'kundol_web_setting',
            ),
            230 => 
            array (
                'key' => 'language1_home3_text1',
                'value' => 'Jhon Deo',
                'type' => 'kundol_web_setting',
            ),
            231 => 
            array (
                'key' => 'language1_home3_text2',
                'value' => 'lorem ipsums dolore lorem ipsums dolore lorem ipsums dolore lorem ipsums dolore',
                'type' => 'kundol_web_setting',
            ),
            232 => 
            array (
                'key' => 'language1_home3_text3',
                'value' => '4',
                'type' => 'kundol_web_setting',
            ),
            233 => 
            array (
                'key' => 'language1_home3_text4',
                'value' => '202205240651profile1.png',
                'type' => 'kundol_web_setting',
            ),
            234 => 
            array (
                'key' => 'language1_home3_text5',
                'value' => 'ALexa Vendor',
                'type' => 'kundol_web_setting',
            ),
            235 => 
            array (
                'key' => 'language1_home3_text6',
                'value' => 'lorem ipsum dolr lorem ipsum dolr lorem ipsum dolr lorem ipsum dolr lorem ipsum dolr lorem ipsum dolr',
                'type' => 'kundol_web_setting',
            ),
            236 => 
            array (
                'key' => 'language1_home3_text7',
                'value' => '3',
                'type' => 'kundol_web_setting',
            ),
            237 => 
            array (
                'key' => 'language1_home3_text8',
                'value' => '202205240651profile1.png',
                'type' => 'kundol_web_setting',
            ),
            238 => 
            array (
                'key' => 'language1_home3_text9',
                'value' => 'language1_home3_text9',
                'type' => 'kundol_web_setting',
            ),
            239 => 
            array (
                'key' => 'language1_home3_text10',
                'value' => 'language1_home3_text10',
                'type' => 'kundol_web_setting',
            ),
            240 => 
            array (
                'key' => 'language1_home3_text11',
                'value' => 'language1_home3_text11',
                'type' => 'kundol_web_setting',
            ),
            241 => 
            array (
                'key' => 'language1_home3_text12',
                'value' => 'language1_home3_text12',
                'type' => 'kundol_web_setting',
            ),
            242 => 
            array (
                'key' => 'language1_home3_text13',
                'value' => 'language1_home3_text13',
                'type' => 'kundol_web_setting',
            ),
            243 => 
            array (
                'key' => 'language1_home3_text14',
                'value' => 'language1_home3_text14',
                'type' => 'kundol_web_setting',
            ),
            244 => 
            array (
                'key' => 'language1_home3_text15',
                'value' => 'language1_home3_text15',
                'type' => 'kundol_web_setting',
            ),
            245 => 
            array (
                'key' => 'language1_home3_text16',
                'value' => 'language1_home3_text16',
                'type' => 'kundol_web_setting',
            ),
            246 => 
            array (
                'key' => 'language1_home3_text17',
                'value' => 'language1_home3_text17',
                'type' => 'kundol_web_setting',
            ),
            247 => 
            array (
                'key' => 'language1_home3_text18',
                'value' => 'language1_home3_text18',
                'type' => 'kundol_web_setting',
            ),
            248 => 
            array (
                'key' => 'language1_home3_text19',
                'value' => 'language1_home3_text19',
                'type' => 'kundol_web_setting',
            ),
            249 => 
            array (
                'key' => 'language1_home3_text20',
                'value' => 'language1_home3_text20',
                'type' => 'kundol_web_setting',
            ),
            250 => 
            array (
                'key' => 'language1_home3_text21',
                'value' => 'language1_home3_text21',
                'type' => 'kundol_web_setting',
            ),
            251 => 
            array (
                'key' => 'language1_home3_text22',
                'value' => 'language1_home3_text22',
                'type' => 'kundol_web_setting',
            ),
            252 => 
            array (
                'key' => 'language1_home3_text23',
                'value' => 'language1_home3_text23',
                'type' => 'kundol_web_setting',
            ),
            253 => 
            array (
                'key' => 'language1_home3_text24',
                'value' => 'language1_home3_text24',
                'type' => 'kundol_web_setting',
            ),
            254 => 
            array (
                'key' => 'language1_home3_text25',
                'value' => 'language1_home3_text25',
                'type' => 'kundol_web_setting',
            ),
            255 => 
            array (
                'key' => 'language1_home3_text26',
                'value' => 'language1_home3_text26',
                'type' => 'kundol_web_setting',
            ),
            256 => 
            array (
                'key' => 'language1_home3_text27',
                'value' => 'language1_home3_text27',
                'type' => 'kundol_web_setting',
            ),
            257 => 
            array (
                'key' => 'language1_home3_text28',
                'value' => 'language1_home3_text28',
                'type' => 'kundol_web_setting',
            ),
            258 => 
            array (
                'key' => 'language1_home3_text29',
                'value' => 'language1_home3_text29',
                'type' => 'kundol_web_setting',
            ),
            259 => 
            array (
                'key' => 'language1_home3_text30',
                'value' => 'language1_home3_text30',
                'type' => 'kundol_web_setting',
            ),
            260 => 
            array (
                'key' => 'language1_home4_text1',
                'value' => 'backed',
                'type' => 'kundol_web_setting',
            ),
            261 => 
            array (
                'key' => 'language1_home4_text2',
                'value' => 'Muffines',
                'type' => 'kundol_web_setting',
            ),
            262 => 
            array (
                'key' => 'language1_home4_text3',
                'value' => 'Shop Now',
                'type' => 'kundol_web_setting',
            ),
            263 => 
            array (
                'key' => 'language1_home4_text4',
                'value' => '202205241013banner-01.jpg',
                'type' => 'kundol_web_setting',
            ),
            264 => 
            array (
                'key' => 'language1_home4_text5',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            265 => 
            array (
                'key' => 'language1_home4_text6',
                'value' => 'Fresh',
                'type' => 'kundol_web_setting',
            ),
            266 => 
            array (
                'key' => 'language1_home4_text7',
                'value' => 'Orange',
                'type' => 'kundol_web_setting',
            ),
            267 => 
            array (
                'key' => 'language1_home4_text8',
                'value' => 'Shop Now',
                'type' => 'kundol_web_setting',
            ),
            268 => 
            array (
                'key' => 'language1_home4_text9',
                'value' => '202205241015banner-02.jpg',
                'type' => 'kundol_web_setting',
            ),
            269 => 
            array (
                'key' => 'language1_home4_text10',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            270 => 
            array (
                'key' => 'language1_home4_text11',
                'value' => 'Decore Furniture',
                'type' => 'kundol_web_setting',
            ),
            271 => 
            array (
                'key' => 'language1_home4_text12',
                'value' => 'Get Fresh Juices From Our Firm',
                'type' => 'kundol_web_setting',
            ),
            272 => 
            array (
                'key' => 'language1_home4_text13',
                'value' => 'Discover Now',
                'type' => 'kundol_web_setting',
            ),
            273 => 
            array (
                'key' => 'language1_home4_text14',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            274 => 
            array (
                'key' => 'language1_home4_text15',
                'value' => '202205241135paralex.jpg',
                'type' => 'kundol_web_setting',
            ),
            275 => 
            array (
                'key' => 'language1_home4_text16',
                'value' => 'Egg',
                'type' => 'kundol_web_setting',
            ),
            276 => 
            array (
                'key' => 'language1_home4_text17',
                'value' => 'Dairy',
                'type' => 'kundol_web_setting',
            ),
            277 => 
            array (
                'key' => 'language1_home4_text18',
                'value' => 'language1_home4_text18',
                'type' => 'kundol_web_setting',
            ),
            278 => 
            array (
                'key' => 'language1_home4_text19',
                'value' => '202205241025cate-03.jpg',
                'type' => 'kundol_web_setting',
            ),
            279 => 
            array (
                'key' => 'language1_home4_text20',
                'value' => 'Detail',
                'type' => 'kundol_web_setting',
            ),
            280 => 
            array (
                'key' => 'language1_home4_text21',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            281 => 
            array (
                'key' => 'language1_home4_text22',
                'value' => 'Fresh',
                'type' => 'kundol_web_setting',
            ),
            282 => 
            array (
                'key' => 'language1_home4_text23',
                'value' => 'Meat',
                'type' => 'kundol_web_setting',
            ),
            283 => 
            array (
                'key' => 'language1_home4_text24',
                'value' => 'language1_home4_text24',
                'type' => 'kundol_web_setting',
            ),
            284 => 
            array (
                'key' => 'language1_home4_text25',
                'value' => '202205241027cate-04.jpg',
                'type' => 'kundol_web_setting',
            ),
            285 => 
            array (
                'key' => 'language1_home4_text26',
                'value' => 'Detail',
                'type' => 'kundol_web_setting',
            ),
            286 => 
            array (
                'key' => 'language1_home4_text27',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            287 => 
            array (
                'key' => 'language1_home4_text28',
                'value' => 'Juices',
                'type' => 'kundol_web_setting',
            ),
            288 => 
            array (
                'key' => 'language1_home4_text29',
                'value' => 'Coffee',
                'type' => 'kundol_web_setting',
            ),
            289 => 
            array (
                'key' => 'language1_home4_text30',
                'value' => 'language1_home4_text30',
                'type' => 'kundol_web_setting',
            ),
            290 => 
            array (
                'key' => 'language1_home4_text31',
                'value' => '202205240910cate-05.jpg',
                'type' => 'kundol_web_setting',
            ),
            291 => 
            array (
                'key' => 'language1_home4_text32',
                'value' => 'Detail',
                'type' => 'kundol_web_setting',
            ),
            292 => 
            array (
                'key' => 'language1_home4_text33',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            293 => 
            array (
                'key' => 'language1_home4_text34',
                'value' => 'Snack',
                'type' => 'kundol_web_setting',
            ),
            294 => 
            array (
                'key' => 'language1_home4_text35',
                'value' => 'Candy',
                'type' => 'kundol_web_setting',
            ),
            295 => 
            array (
                'key' => 'language1_home4_text36',
                'value' => 'language1_home4_text36',
                'type' => 'kundol_web_setting',
            ),
            296 => 
            array (
                'key' => 'language1_home4_text37',
                'value' => '202205241022cate-02.jpg',
                'type' => 'kundol_web_setting',
            ),
            297 => 
            array (
                'key' => 'language1_home4_text38',
                'value' => 'Detail',
                'type' => 'kundol_web_setting',
            ),
            298 => 
            array (
                'key' => 'language1_home4_text39',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            299 => 
            array (
                'key' => 'language1_home4_text40',
                'value' => 'Fruit',
                'type' => 'kundol_web_setting',
            ),
            300 => 
            array (
                'key' => 'language1_home4_text41',
                'value' => 'Vegetables',
                'type' => 'kundol_web_setting',
            ),
            301 => 
            array (
                'key' => 'language1_home4_text42',
                'value' => 'language1_home4_text42',
                'type' => 'kundol_web_setting',
            ),
            302 => 
            array (
                'key' => 'language1_home4_text43',
                'value' => '202205241020cate-01.jpg',
                'type' => 'kundol_web_setting',
            ),
            303 => 
            array (
                'key' => 'language1_home4_text44',
                'value' => 'Detail',
                'type' => 'kundol_web_setting',
            ),
            304 => 
            array (
                'key' => 'language1_home4_text45',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            305 => 
            array (
                'key' => 'language1_home4_text46',
                'value' => 'language1_home4_text46',
                'type' => 'kundol_web_setting',
            ),
            306 => 
            array (
                'key' => 'language1_home4_text47',
                'value' => 'language1_home4_text47',
                'type' => 'kundol_web_setting',
            ),
            307 => 
            array (
                'key' => 'language1_home4_text48',
                'value' => 'language1_home4_text48',
                'type' => 'kundol_web_setting',
            ),
            308 => 
            array (
                'key' => 'language1_home4_text49',
                'value' => 'language1_home4_text49',
                'type' => 'kundol_web_setting',
            ),
            309 => 
            array (
                'key' => 'language1_home4_text50',
                'value' => 'language1_home4_text50',
                'type' => 'kundol_web_setting',
            ),
            310 => 
            array (
                'key' => 'language1_home4_text51',
                'value' => 'language1_home4_text51',
                'type' => 'kundol_web_setting',
            ),
            311 => 
            array (
                'key' => 'language1_home4_text52',
                'value' => 'language1_home4_text52',
                'type' => 'kundol_web_setting',
            ),
            312 => 
            array (
                'key' => 'language1_home4_text53',
                'value' => 'language1_home4_text53',
                'type' => 'kundol_web_setting',
            ),
            313 => 
            array (
                'key' => 'language1_home4_text54',
                'value' => 'language1_home4_text54',
                'type' => 'kundol_web_setting',
            ),
            314 => 
            array (
                'key' => 'language1_home4_text55',
                'value' => 'language1_home4_text55',
                'type' => 'kundol_web_setting',
            ),
            315 => 
            array (
                'key' => 'language1_home4_text56',
                'value' => 'language1_home4_text56',
                'type' => 'kundol_web_setting',
            ),
            316 => 
            array (
                'key' => 'language1_home4_text57',
                'value' => 'language1_home4_text57',
                'type' => 'kundol_web_setting',
            ),
            317 => 
            array (
                'key' => 'language1_home4_text58',
                'value' => 'language1_home4_text58',
                'type' => 'kundol_web_setting',
            ),
            318 => 
            array (
                'key' => 'language1_home4_text59',
                'value' => 'language1_home4_text59',
                'type' => 'kundol_web_setting',
            ),
            319 => 
            array (
                'key' => 'language1_home4_text60',
                'value' => 'language1_home4_text60',
                'type' => 'kundol_web_setting',
            ),
            320 => 
            array (
                'key' => 'language1_home5_text1',
                'value' => 'Free Shipping',
                'type' => 'kundol_web_setting',
            ),
            321 => 
            array (
                'key' => 'language1_home5_text2',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            322 => 
            array (
                'key' => 'language1_home5_text3',
                'value' => 'Money Return',
                'type' => 'kundol_web_setting',
            ),
            323 => 
            array (
                'key' => 'language1_home5_text4',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            324 => 
            array (
                'key' => 'language1_home5_text5',
                'value' => 'Support 24/7',
                'type' => 'kundol_web_setting',
            ),
            325 => 
            array (
                'key' => 'language1_home5_text6',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            326 => 
            array (
                'key' => 'language1_home5_text7',
                'value' => 'Safe Payment',
                'type' => 'kundol_web_setting',
            ),
            327 => 
            array (
                'key' => 'language1_home5_text8',
                'value' => '202109025909banner_370x230.jpg',
                'type' => 'kundol_web_setting',
            ),
            328 => 
            array (
                'key' => 'language1_home5_text9',
                'value' => 'Upto 30% Off',
                'type' => 'kundol_web_setting',
            ),
            329 => 
            array (
                'key' => 'language1_home5_text10',
                'value' => 'Lip Gloss',
                'type' => 'kundol_web_setting',
            ),
            330 => 
            array (
                'key' => 'language1_home5_text11',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            331 => 
            array (
                'key' => 'language1_home5_text12',
                'value' => '202205241136offers-1.png',
                'type' => 'kundol_web_setting',
            ),
            332 => 
            array (
                'key' => 'language1_home5_text13',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            333 => 
            array (
                'key' => 'language1_home5_text14',
                'value' => 'Upto 30% Off',
                'type' => 'kundol_web_setting',
            ),
            334 => 
            array (
                'key' => 'language1_home5_text15',
                'value' => 'Gel Eye Mask',
                'type' => 'kundol_web_setting',
            ),
            335 => 
            array (
                'key' => 'language1_home5_text16',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            336 => 
            array (
                'key' => 'language1_home5_text17',
                'value' => '202205241138offers-2.png',
                'type' => 'kundol_web_setting',
            ),
            337 => 
            array (
                'key' => 'language1_home5_text18',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            338 => 
            array (
                'key' => 'language1_home5_text19',
                'value' => 'Upto 50% Off',
                'type' => 'kundol_web_setting',
            ),
            339 => 
            array (
                'key' => 'language1_home5_text20',
                'value' => 'Blackhead',
                'type' => 'kundol_web_setting',
            ),
            340 => 
            array (
                'key' => 'language1_home5_text21',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            341 => 
            array (
                'key' => 'language1_home5_text22',
                'value' => '202205241141offers-3.png',
                'type' => 'kundol_web_setting',
            ),
            342 => 
            array (
                'key' => 'language1_home5_text23',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            343 => 
            array (
                'key' => 'language1_home5_text24',
                'value' => 'language1_home5_text24',
                'type' => 'kundol_web_setting',
            ),
            344 => 
            array (
                'key' => 'language1_home5_text25',
                'value' => 'language1_home5_text25',
                'type' => 'kundol_web_setting',
            ),
            345 => 
            array (
                'key' => 'language1_home5_text26',
                'value' => 'language1_home5_text26',
                'type' => 'kundol_web_setting',
            ),
            346 => 
            array (
                'key' => 'language1_home5_text27',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            347 => 
            array (
                'key' => 'language1_home5_text28',
                'value' => 'language1_home5_text28',
                'type' => 'kundol_web_setting',
            ),
            348 => 
            array (
                'key' => 'language1_home5_text29',
                'value' => 'language1_home5_text29',
                'type' => 'kundol_web_setting',
            ),
            349 => 
            array (
                'key' => 'language1_home5_text30',
                'value' => 'language1_home5_text30',
                'type' => 'kundol_web_setting',
            ),
            350 => 
            array (
                'key' => 'language1_home5_text31',
                'value' => 'language1_home5_text31',
                'type' => 'kundol_web_setting',
            ),
            351 => 
            array (
                'key' => 'language1_home5_text32',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            352 => 
            array (
                'key' => 'language1_home5_text33',
                'value' => 'language1_home5_text33',
                'type' => 'kundol_web_setting',
            ),
            353 => 
            array (
                'key' => 'language1_home5_text34',
                'value' => 'language1_home5_text34',
                'type' => 'kundol_web_setting',
            ),
            354 => 
            array (
                'key' => 'language1_home5_text35',
                'value' => 'language1_home5_text35',
                'type' => 'kundol_web_setting',
            ),
            355 => 
            array (
                'key' => 'language1_home5_text36',
                'value' => 'language1_home5_text36',
                'type' => 'kundol_web_setting',
            ),
            356 => 
            array (
                'key' => 'language1_home5_text37',
                'value' => 'language1_home5_text37',
                'type' => 'kundol_web_setting',
            ),
            357 => 
            array (
                'key' => 'language1_home5_text38',
                'value' => 'language1_home5_text38',
                'type' => 'kundol_web_setting',
            ),
            358 => 
            array (
                'key' => 'language1_home5_text39',
                'value' => 'language1_home5_text39',
                'type' => 'kundol_web_setting',
            ),
            359 => 
            array (
                'key' => 'language1_home5_text40',
                'value' => 'language1_home5_text40',
                'type' => 'kundol_web_setting',
            ),
            360 => 
            array (
                'key' => 'language1_home5_text41',
                'value' => 'language1_home5_text41',
                'type' => 'kundol_web_setting',
            ),
            361 => 
            array (
                'key' => 'language1_home5_text42',
                'value' => 'language1_home5_text42',
                'type' => 'kundol_web_setting',
            ),
            362 => 
            array (
                'key' => 'language1_home5_text43',
                'value' => 'language1_home5_text43',
                'type' => 'kundol_web_setting',
            ),
            363 => 
            array (
                'key' => 'language1_home5_text44',
                'value' => 'language1_home5_text44',
                'type' => 'kundol_web_setting',
            ),
            364 => 
            array (
                'key' => 'language1_home5_text45',
                'value' => 'language1_home5_text45',
                'type' => 'kundol_web_setting',
            ),
            365 => 
            array (
                'key' => 'language1_home5_text46',
                'value' => 'language1_home5_text46',
                'type' => 'kundol_web_setting',
            ),
            366 => 
            array (
                'key' => 'language1_home5_text47',
                'value' => 'language1_home5_text47',
                'type' => 'kundol_web_setting',
            ),
            367 => 
            array (
                'key' => 'language1_home5_text48',
                'value' => 'language1_home5_text48',
                'type' => 'kundol_web_setting',
            ),
            368 => 
            array (
                'key' => 'language1_home5_text49',
                'value' => 'language1_home5_text49',
                'type' => 'kundol_web_setting',
            ),
            369 => 
            array (
                'key' => 'language1_home5_text50',
                'value' => 'language1_home5_text50',
                'type' => 'kundol_web_setting',
            ),
            370 => 
            array (
                'key' => 'language1_home6_text1',
                'value' => 'WILD',
                'type' => 'kundol_web_setting',
            ),
            371 => 
            array (
                'key' => 'language1_home6_text2',
                'value' => 'COLLECTION',
                'type' => 'kundol_web_setting',
            ),
            372 => 
            array (
                'key' => 'language1_home6_text3',
                'value' => 'lorem ipsum slor  lorem ipsum slor  lorem ipsum slor  lorem ipsum slor  lorem ipsum slor',
                'type' => 'kundol_web_setting',
            ),
            373 => 
            array (
                'key' => 'language1_home6_text4',
                'value' => '202205241301bg-paralax.jpg',
                'type' => 'kundol_web_setting',
            ),
            374 => 
            array (
                'key' => 'language1_home6_text5',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            375 => 
            array (
                'key' => 'language1_home6_text6',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            376 => 
            array (
                'key' => 'language1_home6_text7',
                'value' => 'language1_home6_text7',
                'type' => 'kundol_web_setting',
            ),
            377 => 
            array (
                'key' => 'language1_home6_text8',
                'value' => 'language1_home6_text8',
                'type' => 'kundol_web_setting',
            ),
            378 => 
            array (
                'key' => 'language1_home6_text9',
                'value' => 'language1_home6_text9',
                'type' => 'kundol_web_setting',
            ),
            379 => 
            array (
                'key' => 'language1_home6_text10',
                'value' => 'language1_home6_text10',
                'type' => 'kundol_web_setting',
            ),
            380 => 
            array (
                'key' => 'language1_home6_text11',
                'value' => 'language1_home6_text11',
                'type' => 'kundol_web_setting',
            ),
            381 => 
            array (
                'key' => 'language1_home6_text12',
                'value' => 'language1_home6_text12',
                'type' => 'kundol_web_setting',
            ),
            382 => 
            array (
                'key' => 'language1_home6_text13',
                'value' => 'language1_home6_text13',
                'type' => 'kundol_web_setting',
            ),
            383 => 
            array (
                'key' => 'language1_home6_text14',
                'value' => 'language1_home6_text14',
                'type' => 'kundol_web_setting',
            ),
            384 => 
            array (
                'key' => 'language1_home6_text15',
                'value' => 'language1_home6_text15',
                'type' => 'kundol_web_setting',
            ),
            385 => 
            array (
                'key' => 'language1_home6_text16',
                'value' => 'language1_home6_text16',
                'type' => 'kundol_web_setting',
            ),
            386 => 
            array (
                'key' => 'language1_home6_text17',
                'value' => 'language1_home6_text17',
                'type' => 'kundol_web_setting',
            ),
            387 => 
            array (
                'key' => 'language1_home6_text18',
                'value' => 'language1_home6_text18',
                'type' => 'kundol_web_setting',
            ),
            388 => 
            array (
                'key' => 'language1_home6_text19',
                'value' => 'language1_home6_text19',
                'type' => 'kundol_web_setting',
            ),
            389 => 
            array (
                'key' => 'language1_home6_text20',
                'value' => 'language1_home6_text20',
                'type' => 'kundol_web_setting',
            ),
            390 => 
            array (
                'key' => 'language1_home7_text1',
                'value' => 'Men Casual',
                'type' => 'kundol_web_setting',
            ),
            391 => 
            array (
                'key' => 'language1_home7_text2',
                'value' => 'upto 30% off',
                'type' => 'kundol_web_setting',
            ),
            392 => 
            array (
                'key' => 'language1_home7_text3',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            393 => 
            array (
                'key' => 'language1_home7_text4',
                'value' => '202205241541cate-banner1.jpg',
                'type' => 'kundol_web_setting',
            ),
            394 => 
            array (
                'key' => 'language1_home7_text5',
                'value' => 'Women Dresses',
                'type' => 'kundol_web_setting',
            ),
            395 => 
            array (
                'key' => 'language1_home7_text6',
                'value' => 'upto 30% off',
                'type' => 'kundol_web_setting',
            ),
            396 => 
            array (
                'key' => 'language1_home7_text7',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            397 => 
            array (
                'key' => 'language1_home7_text8',
                'value' => '202205241614element-banner5-center.jpg',
                'type' => 'kundol_web_setting',
            ),
            398 => 
            array (
                'key' => 'language1_home7_text9',
                'value' => 'Kid collection',
                'type' => 'kundol_web_setting',
            ),
            399 => 
            array (
                'key' => 'language1_home7_text10',
                'value' => 'upto 30% off',
                'type' => 'kundol_web_setting',
            ),
            400 => 
            array (
                'key' => 'language1_home7_text11',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            401 => 
            array (
                'key' => 'language1_home7_text12',
                'value' => '202205241543cate-banner3.jpg',
                'type' => 'kundol_web_setting',
            ),
            402 => 
            array (
                'key' => 'language1_home7_text13',
                'value' => 'Spring',
                'type' => 'kundol_web_setting',
            ),
            403 => 
            array (
                'key' => 'language1_home7_text14',
                'value' => 'Trends',
                'type' => 'kundol_web_setting',
            ),
            404 => 
            array (
                'key' => 'language1_home7_text15',
                'value' => 'SHOP NEW ARRIVAL',
                'type' => 'kundol_web_setting',
            ),
            405 => 
            array (
                'key' => 'language1_home7_text16',
                'value' => '202205241535banner7.jpg',
                'type' => 'kundol_web_setting',
            ),
            406 => 
            array (
                'key' => 'language1_home7_text17',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            407 => 
            array (
                'key' => 'language1_home7_text18',
                'value' => 'language1_home7_text18',
                'type' => 'kundol_web_setting',
            ),
            408 => 
            array (
                'key' => 'language1_home7_text19',
                'value' => 'language1_home7_text19',
                'type' => 'kundol_web_setting',
            ),
            409 => 
            array (
                'key' => 'language1_home7_text20',
                'value' => 'language1_home7_text20',
                'type' => 'kundol_web_setting',
            ),
            410 => 
            array (
                'key' => 'language1_home7_text21',
                'value' => 'language1_home7_text21',
                'type' => 'kundol_web_setting',
            ),
            411 => 
            array (
                'key' => 'language1_home7_text22',
                'value' => 'language1_home7_text22',
                'type' => 'kundol_web_setting',
            ),
            412 => 
            array (
                'key' => 'language1_home7_text23',
                'value' => 'language1_home7_text23',
                'type' => 'kundol_web_setting',
            ),
            413 => 
            array (
                'key' => 'language1_home7_text24',
                'value' => 'language1_home7_text24',
                'type' => 'kundol_web_setting',
            ),
            414 => 
            array (
                'key' => 'language1_home7_text25',
                'value' => 'language1_home7_text25',
                'type' => 'kundol_web_setting',
            ),
            415 => 
            array (
                'key' => 'language1_home7_text26',
                'value' => 'language1_home7_text26',
                'type' => 'kundol_web_setting',
            ),
            416 => 
            array (
                'key' => 'language1_home7_text27',
                'value' => 'language1_home7_text27',
                'type' => 'kundol_web_setting',
            ),
            417 => 
            array (
                'key' => 'language1_home7_text28',
                'value' => 'language1_home7_text28',
                'type' => 'kundol_web_setting',
            ),
            418 => 
            array (
                'key' => 'language1_home7_text29',
                'value' => 'language1_home7_text29',
                'type' => 'kundol_web_setting',
            ),
            419 => 
            array (
                'key' => 'language1_home7_text30',
                'value' => 'language1_home7_text30',
                'type' => 'kundol_web_setting',
            ),
            420 => 
            array (
                'key' => 'language1_home8_text1',
                'value' => 'upto 20% of',
                'type' => 'kundol_web_setting',
            ),
            421 => 
            array (
                'key' => 'language1_home8_text2',
                'value' => 'Summers',
                'type' => 'kundol_web_setting',
            ),
            422 => 
            array (
                'key' => 'language1_home8_text3',
                'value' => 'Shop Nows',
                'type' => 'kundol_web_setting',
            ),
            423 => 
            array (
                'key' => 'language1_home8_text4',
                'value' => '202205241457Flower-banner1.jpg',
                'type' => 'kundol_web_setting',
            ),
            424 => 
            array (
                'key' => 'language1_home8_text5',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            425 => 
            array (
                'key' => 'language1_home8_text6',
                'value' => 'Wedding Collection',
                'type' => 'kundol_web_setting',
            ),
            426 => 
            array (
                'key' => 'language1_home8_text7',
                'value' => 'Flower',
                'type' => 'kundol_web_setting',
            ),
            427 => 
            array (
                'key' => 'language1_home8_text8',
                'value' => 'Shop Now',
                'type' => 'kundol_web_setting',
            ),
            428 => 
            array (
                'key' => 'language1_home8_text9',
                'value' => '202205241459Flower-banner2.jpg',
                'type' => 'kundol_web_setting',
            ),
            429 => 
            array (
                'key' => 'language1_home8_text10',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            430 => 
            array (
                'key' => 'language1_home8_text11',
                'value' => 'Beautiful Range  of',
                'type' => 'kundol_web_setting',
            ),
            431 => 
            array (
                'key' => 'language1_home8_text12',
                'value' => 'Colorfull Birthday Flower',
                'type' => 'kundol_web_setting',
            ),
            432 => 
            array (
                'key' => 'language1_home8_text13',
                'value' => 'View All Range',
                'type' => 'kundol_web_setting',
            ),
            433 => 
            array (
                'key' => 'language1_home8_text14',
                'value' => '202205241501paralax.jpg',
                'type' => 'kundol_web_setting',
            ),
            434 => 
            array (
                'key' => 'language1_home8_text15',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            435 => 
            array (
                'key' => 'language1_home8_text16',
                'value' => 'language1_home8_text16',
                'type' => 'kundol_web_setting',
            ),
            436 => 
            array (
                'key' => 'language1_home8_text17',
                'value' => 'language1_home8_text17',
                'type' => 'kundol_web_setting',
            ),
            437 => 
            array (
                'key' => 'language1_home8_text18',
                'value' => 'language1_home8_text18',
                'type' => 'kundol_web_setting',
            ),
            438 => 
            array (
                'key' => 'language1_home8_text19',
                'value' => 'language1_home8_text19',
                'type' => 'kundol_web_setting',
            ),
            439 => 
            array (
                'key' => 'language1_home8_text20',
                'value' => 'language1_home8_text20',
                'type' => 'kundol_web_setting',
            ),
            440 => 
            array (
                'key' => 'language1_home8_text21',
                'value' => 'language1_home8_text21',
                'type' => 'kundol_web_setting',
            ),
            441 => 
            array (
                'key' => 'language1_home8_text22',
                'value' => 'language1_home8_text22',
                'type' => 'kundol_web_setting',
            ),
            442 => 
            array (
                'key' => 'language1_home8_text23',
                'value' => 'language1_home8_text23',
                'type' => 'kundol_web_setting',
            ),
            443 => 
            array (
                'key' => 'language1_home8_text24',
                'value' => 'language1_home8_text24',
                'type' => 'kundol_web_setting',
            ),
            444 => 
            array (
                'key' => 'language1_home8_text25',
                'value' => 'language1_home8_text25',
                'type' => 'kundol_web_setting',
            ),
            445 => 
            array (
                'key' => 'language1_home8_text26',
                'value' => 'language1_home8_text26',
                'type' => 'kundol_web_setting',
            ),
            446 => 
            array (
                'key' => 'language1_home8_text27',
                'value' => 'language1_home8_text27',
                'type' => 'kundol_web_setting',
            ),
            447 => 
            array (
                'key' => 'language1_home8_text28',
                'value' => 'language1_home8_text28',
                'type' => 'kundol_web_setting',
            ),
            448 => 
            array (
                'key' => 'language1_home8_text29',
                'value' => 'language1_home8_text29',
                'type' => 'kundol_web_setting',
            ),
            449 => 
            array (
                'key' => 'language1_home8_text30',
                'value' => 'language1_home8_text30',
                'type' => 'kundol_web_setting',
            ),
            450 => 
            array (
                'key' => 'language1_home9_text1',
                'value' => 'DEAL OF THE DAY',
                'type' => 'kundol_web_setting',
            ),
            451 => 
            array (
                'key' => 'language1_home9_text2',
                'value' => 'LAB GROWN',
                'type' => 'kundol_web_setting',
            ),
            452 => 
            array (
                'key' => 'language1_home9_text3',
                'value' => 'DAIMONDS',
                'type' => 'kundol_web_setting',
            ),
            453 => 
            array (
                'key' => 'language1_home9_text4',
                'value' => 'Discover TheExceptional Quailty And Sparkle Of Our Lab',
                'type' => 'kundol_web_setting',
            ),
            454 => 
            array (
                'key' => 'language1_home9_text5',
                'value' => 'Grown Daimonds',
                'type' => 'kundol_web_setting',
            ),
            455 => 
            array (
                'key' => 'language1_home9_text6',
                'value' => '180.00',
                'type' => 'kundol_web_setting',
            ),
            456 => 
            array (
                'key' => 'language1_home9_text7',
                'value' => '200.00',
                'type' => 'kundol_web_setting',
            ),
            457 => 
            array (
                'key' => 'language1_home9_text8',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            458 => 
            array (
                'key' => 'language1_home9_text9',
                'value' => '202205241811banner2.jpg',
                'type' => 'kundol_web_setting',
            ),
            459 => 
            array (
                'key' => 'language1_home9_text10',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            460 => 
            array (
                'key' => 'language1_home9_text11',
                'value' => 'DEAL OF THE DAY',
                'type' => 'kundol_web_setting',
            ),
            461 => 
            array (
                'key' => 'language1_home9_text12',
                'value' => 'DESIGN OWN',
                'type' => 'kundol_web_setting',
            ),
            462 => 
            array (
                'key' => 'language1_home9_text13',
                'value' => 'CUSTOM RINGS',
                'type' => 'kundol_web_setting',
            ),
            463 => 
            array (
                'key' => 'language1_home9_text14',
                'value' => 'Discover The Excutive Beauty Qaulity And Sparkle of Our Lab',
                'type' => 'kundol_web_setting',
            ),
            464 => 
            array (
                'key' => 'language1_home9_text15',
                'value' => 'Custom Rings',
                'type' => 'kundol_web_setting',
            ),
            465 => 
            array (
                'key' => 'language1_home9_text16',
                'value' => '180.00',
                'type' => 'kundol_web_setting',
            ),
            466 => 
            array (
                'key' => 'language1_home9_text17',
                'value' => '200.00',
                'type' => 'kundol_web_setting',
            ),
            467 => 
            array (
                'key' => 'language1_home9_text18',
                'value' => 'SHOP NOW',
                'type' => 'kundol_web_setting',
            ),
            468 => 
            array (
                'key' => 'language1_home9_text19',
                'value' => '202205241816banner3.jpg',
                'type' => 'kundol_web_setting',
            ),
            469 => 
            array (
                'key' => 'language1_home9_text20',
                'value' => '/shop',
                'type' => 'kundol_web_setting',
            ),
            470 => 
            array (
                'key' => 'language1_home9_text21',
                'value' => '202205241735look1.jpg',
                'type' => 'kundol_web_setting',
            ),
            471 => 
            array (
                'key' => 'language1_home9_text22',
                'value' => '202205241741look2.jpg',
                'type' => 'kundol_web_setting',
            ),
            472 => 
            array (
                'key' => 'language1_home9_text23',
                'value' => '202205241744look3.jpg',
                'type' => 'kundol_web_setting',
            ),
            473 => 
            array (
                'key' => 'language1_home9_text24',
                'value' => '202205241735look1.jpg',
                'type' => 'kundol_web_setting',
            ),
            474 => 
            array (
                'key' => 'language1_home9_text25',
                'value' => '202205241741look2.jpg',
                'type' => 'kundol_web_setting',
            ),
            475 => 
            array (
                'key' => 'language1_home9_text26',
                'value' => '202205241744look3.jpg',
                'type' => 'kundol_web_setting',
            ),
            476 => 
            array (
                'key' => 'language1_home9_text27',
                'value' => 'language1_home9_text27',
                'type' => 'kundol_web_setting',
            ),
            477 => 
            array (
                'key' => 'language1_home9_text28',
                'value' => 'language1_home9_text28',
                'type' => 'kundol_web_setting',
            ),
            478 => 
            array (
                'key' => 'language1_home9_text29',
                'value' => 'language1_home9_text29',
                'type' => 'kundol_web_setting',
            ),
            479 => 
            array (
                'key' => 'language1_home9_text30',
                'value' => 'language1_home9_text30',
                'type' => 'kundol_web_setting',
            ),
            480 => 
            array (
                'key' => 'language1_home9_text31',
                'value' => 'language1_home9_text31',
                'type' => 'kundol_web_setting',
            ),
            481 => 
            array (
                'key' => 'language1_home9_text32',
                'value' => 'language1_home9_text32',
                'type' => 'kundol_web_setting',
            ),
            482 => 
            array (
                'key' => 'language1_home9_text33',
                'value' => 'language1_home9_text33',
                'type' => 'kundol_web_setting',
            ),
            483 => 
            array (
                'key' => 'language1_home9_text34',
                'value' => 'language1_home9_text34',
                'type' => 'kundol_web_setting',
            ),
            484 => 
            array (
                'key' => 'language1_home9_text35',
                'value' => 'language1_home9_text35',
                'type' => 'kundol_web_setting',
            ),
            485 => 
            array (
                'key' => 'language1_home9_text36',
                'value' => 'language1_home9_text36',
                'type' => 'kundol_web_setting',
            ),
            486 => 
            array (
                'key' => 'language1_home9_text37',
                'value' => 'language1_home9_text37',
                'type' => 'kundol_web_setting',
            ),
            487 => 
            array (
                'key' => 'language1_home9_text38',
                'value' => 'language1_home9_text38',
                'type' => 'kundol_web_setting',
            ),
            488 => 
            array (
                'key' => 'language1_home9_text39',
                'value' => 'language1_home9_text39',
                'type' => 'kundol_web_setting',
            ),
            489 => 
            array (
                'key' => 'language1_home9_text40',
                'value' => 'language1_home9_text40',
                'type' => 'kundol_web_setting',
            ),
            490 => 
            array (
                'key' => 'language1_home9_text41',
                'value' => 'language1_home9_text41',
                'type' => 'kundol_web_setting',
            ),
            491 => 
            array (
                'key' => 'language1_home9_text42',
                'value' => 'language1_home9_text42',
                'type' => 'kundol_web_setting',
            ),
            492 => 
            array (
                'key' => 'language1_home9_text43',
                'value' => 'language1_home9_text43',
                'type' => 'kundol_web_setting',
            ),
            493 => 
            array (
                'key' => 'language1_home9_text44',
                'value' => 'language1_home9_text44',
                'type' => 'kundol_web_setting',
            ),
            494 => 
            array (
                'key' => 'language1_home9_text45',
                'value' => 'language1_home9_text45',
                'type' => 'kundol_web_setting',
            ),
            495 => 
            array (
                'key' => 'language1_home9_text46',
                'value' => 'language1_home9_text46',
                'type' => 'kundol_web_setting',
            ),
            496 => 
            array (
                'key' => 'language1_home9_text47',
                'value' => 'language1_home9_text47',
                'type' => 'kundol_web_setting',
            ),
            497 => 
            array (
                'key' => 'language1_home9_text48',
                'value' => 'language1_home9_text48',
                'type' => 'kundol_web_setting',
            ),
            498 => 
            array (
                'key' => 'language1_home9_text49',
                'value' => 'language1_home9_text49',
                'type' => 'kundol_web_setting',
            ),
            499 => 
            array (
                'key' => 'language1_home9_text50',
                'value' => 'language1_home9_text50',
                'type' => 'kundol_web_setting',
            ),
        ));
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'key' => 'language2_home1_text1',
                'value' => 'language2_home1_text1',
                'type' => 'kundol_web_setting',
            ),
            1 => 
            array (
                'key' => 'language2_home1_text2',
                'value' => 'language2_home1_text2',
                'type' => 'kundol_web_setting',
            ),
            2 => 
            array (
                'key' => 'language2_home1_text3',
                'value' => 'language2_home1_text3',
                'type' => 'kundol_web_setting',
            ),
            3 => 
            array (
                'key' => 'language2_home1_text4',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            4 => 
            array (
                'key' => 'language2_home1_text5',
                'value' => 'language2_home1_text5',
                'type' => 'kundol_web_setting',
            ),
            5 => 
            array (
                'key' => 'language2_home1_text6',
                'value' => 'language2_home1_text6',
                'type' => 'kundol_web_setting',
            ),
            6 => 
            array (
                'key' => 'language2_home1_text7',
                'value' => 'language2_home1_text7',
                'type' => 'kundol_web_setting',
            ),
            7 => 
            array (
                'key' => 'language2_home1_text8',
                'value' => 'language2_home1_text8',
                'type' => 'kundol_web_setting',
            ),
            8 => 
            array (
                'key' => 'language2_home1_text9',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            9 => 
            array (
                'key' => 'language2_home1_text10',
                'value' => 'language2_home1_text10',
                'type' => 'kundol_web_setting',
            ),
            10 => 
            array (
                'key' => 'language2_home1_text11',
                'value' => 'language2_home1_text11',
                'type' => 'kundol_web_setting',
            ),
            11 => 
            array (
                'key' => 'language2_home1_text12',
                'value' => 'language2_home1_text12',
                'type' => 'kundol_web_setting',
            ),
            12 => 
            array (
                'key' => 'language2_home1_text13',
                'value' => 'language2_home1_text13',
                'type' => 'kundol_web_setting',
            ),
            13 => 
            array (
                'key' => 'language2_home1_text14',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            14 => 
            array (
                'key' => 'language2_home1_text15',
                'value' => 'language2_home1_text15',
                'type' => 'kundol_web_setting',
            ),
            15 => 
            array (
                'key' => 'language2_home1_text16',
                'value' => 'language2_home1_text16',
                'type' => 'kundol_web_setting',
            ),
            16 => 
            array (
                'key' => 'language2_home1_text17',
                'value' => 'language2_home1_text17',
                'type' => 'kundol_web_setting',
            ),
            17 => 
            array (
                'key' => 'language2_home1_text18',
                'value' => 'language2_home1_text18',
                'type' => 'kundol_web_setting',
            ),
            18 => 
            array (
                'key' => 'language2_home1_text19',
                'value' => 'language2_home1_text19',
                'type' => 'kundol_web_setting',
            ),
            19 => 
            array (
                'key' => 'language2_home1_text20',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            20 => 
            array (
                'key' => 'language2_home1_text21',
                'value' => 'language2_home1_text21',
                'type' => 'kundol_web_setting',
            ),
            21 => 
            array (
                'key' => 'language2_home1_text22',
                'value' => 'language2_home1_text22',
                'type' => 'kundol_web_setting',
            ),
            22 => 
            array (
                'key' => 'language2_home1_text23',
                'value' => 'language2_home1_text23',
                'type' => 'kundol_web_setting',
            ),
            23 => 
            array (
                'key' => 'language2_home1_text24',
                'value' => 'language2_home1_text24',
                'type' => 'kundol_web_setting',
            ),
            24 => 
            array (
                'key' => 'language2_home1_text25',
                'value' => 'language2_home1_text25',
                'type' => 'kundol_web_setting',
            ),
            25 => 
            array (
                'key' => 'language2_home1_text26',
                'value' => 'language2_home1_text26',
                'type' => 'kundol_web_setting',
            ),
            26 => 
            array (
                'key' => 'language2_home1_text27',
                'value' => 'language2_home1_text27',
                'type' => 'kundol_web_setting',
            ),
            27 => 
            array (
                'key' => 'language2_home1_text28',
                'value' => 'language2_home1_text28',
                'type' => 'kundol_web_setting',
            ),
            28 => 
            array (
                'key' => 'language2_home1_text29',
                'value' => 'language2_home1_text29',
                'type' => 'kundol_web_setting',
            ),
            29 => 
            array (
                'key' => 'language2_home1_text30',
                'value' => 'language2_home1_text30',
                'type' => 'kundol_web_setting',
            ),
            30 => 
            array (
                'key' => 'language2_home2_text1',
                'value' => 'language2_home2_text1',
                'type' => 'kundol_web_setting',
            ),
            31 => 
            array (
                'key' => 'language2_home2_text2',
                'value' => 'language2_home2_text2',
                'type' => 'kundol_web_setting',
            ),
            32 => 
            array (
                'key' => 'language2_home2_text3',
                'value' => 'language2_home2_text3',
                'type' => 'kundol_web_setting',
            ),
            33 => 
            array (
                'key' => 'language2_home2_text4',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            34 => 
            array (
                'key' => 'language2_home2_text5',
                'value' => 'language2_home2_text5',
                'type' => 'kundol_web_setting',
            ),
            35 => 
            array (
                'key' => 'language2_home2_text6',
                'value' => 'language2_home2_text6',
                'type' => 'kundol_web_setting',
            ),
            36 => 
            array (
                'key' => 'language2_home2_text7',
                'value' => 'language2_home2_text7',
                'type' => 'kundol_web_setting',
            ),
            37 => 
            array (
                'key' => 'language2_home2_text8',
                'value' => 'language2_home2_text8',
                'type' => 'kundol_web_setting',
            ),
            38 => 
            array (
                'key' => 'language2_home2_text9',
                'value' => 'language2_home2_text9',
                'type' => 'kundol_web_setting',
            ),
            39 => 
            array (
                'key' => 'language2_home2_text10',
                'value' => 'language2_home2_text10',
                'type' => 'kundol_web_setting',
            ),
            40 => 
            array (
                'key' => 'language2_home2_text11',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            41 => 
            array (
                'key' => 'language2_home2_text12',
                'value' => 'language2_home2_text12',
                'type' => 'kundol_web_setting',
            ),
            42 => 
            array (
                'key' => 'language2_home2_text13',
                'value' => 'language2_home2_text13',
                'type' => 'kundol_web_setting',
            ),
            43 => 
            array (
                'key' => 'language2_home2_text14',
                'value' => 'language2_home2_text14',
                'type' => 'kundol_web_setting',
            ),
            44 => 
            array (
                'key' => 'language2_home2_text15',
                'value' => 'language2_home2_text15',
                'type' => 'kundol_web_setting',
            ),
            45 => 
            array (
                'key' => 'language2_home2_text16',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            46 => 
            array (
                'key' => 'language2_home2_text17',
                'value' => 'language2_home2_text17',
                'type' => 'kundol_web_setting',
            ),
            47 => 
            array (
                'key' => 'language2_home2_text18',
                'value' => 'language2_home2_text18',
                'type' => 'kundol_web_setting',
            ),
            48 => 
            array (
                'key' => 'language2_home2_text19',
                'value' => 'language2_home2_text19',
                'type' => 'kundol_web_setting',
            ),
            49 => 
            array (
                'key' => 'language2_home2_text20',
                'value' => 'language2_home2_text20',
                'type' => 'kundol_web_setting',
            ),
            50 => 
            array (
                'key' => 'language2_home2_text21',
                'value' => 'language2_home2_text21',
                'type' => 'kundol_web_setting',
            ),
            51 => 
            array (
                'key' => 'language2_home2_text22',
                'value' => 'language2_home2_text22',
                'type' => 'kundol_web_setting',
            ),
            52 => 
            array (
                'key' => 'language2_home2_text23',
                'value' => 'language2_home2_text23',
                'type' => 'kundol_web_setting',
            ),
            53 => 
            array (
                'key' => 'language2_home2_text24',
                'value' => 'language2_home2_text24',
                'type' => 'kundol_web_setting',
            ),
            54 => 
            array (
                'key' => 'language2_home2_text25',
                'value' => 'language2_home2_text25',
                'type' => 'kundol_web_setting',
            ),
            55 => 
            array (
                'key' => 'language2_home2_text26',
                'value' => 'language2_home2_text26',
                'type' => 'kundol_web_setting',
            ),
            56 => 
            array (
                'key' => 'language2_home2_text27',
                'value' => 'language2_home2_text27',
                'type' => 'kundol_web_setting',
            ),
            57 => 
            array (
                'key' => 'language2_home2_text28',
                'value' => 'language2_home2_text28',
                'type' => 'kundol_web_setting',
            ),
            58 => 
            array (
                'key' => 'language2_home2_text29',
                'value' => 'language2_home2_text29',
                'type' => 'kundol_web_setting',
            ),
            59 => 
            array (
                'key' => 'language2_home2_text30',
                'value' => 'language2_home2_text30',
                'type' => 'kundol_web_setting',
            ),
            60 => 
            array (
                'key' => 'language2_home3_text1',
                'value' => 'language2_home3_text1',
                'type' => 'kundol_web_setting',
            ),
            61 => 
            array (
                'key' => 'language2_home3_text2',
                'value' => 'language2_home3_text2',
                'type' => 'kundol_web_setting',
            ),
            62 => 
            array (
                'key' => 'language2_home3_text3',
                'value' => 'language2_home3_text3',
                'type' => 'kundol_web_setting',
            ),
            63 => 
            array (
                'key' => 'language2_home3_text4',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            64 => 
            array (
                'key' => 'language2_home3_text5',
                'value' => 'language2_home3_text5',
                'type' => 'kundol_web_setting',
            ),
            65 => 
            array (
                'key' => 'language2_home3_text6',
                'value' => 'language2_home3_text6',
                'type' => 'kundol_web_setting',
            ),
            66 => 
            array (
                'key' => 'language2_home3_text7',
                'value' => 'language2_home3_text7',
                'type' => 'kundol_web_setting',
            ),
            67 => 
            array (
                'key' => 'language2_home3_text8',
                'value' => 'language2_home3_text8',
                'type' => 'kundol_web_setting',
            ),
            68 => 
            array (
                'key' => 'language2_home3_text9',
                'value' => 'language2_home3_text9',
                'type' => 'kundol_web_setting',
            ),
            69 => 
            array (
                'key' => 'language2_home3_text10',
                'value' => 'language2_home3_text10',
                'type' => 'kundol_web_setting',
            ),
            70 => 
            array (
                'key' => 'language2_home3_text11',
                'value' => 'language2_home3_text11',
                'type' => 'kundol_web_setting',
            ),
            71 => 
            array (
                'key' => 'language2_home3_text12',
                'value' => 'language2_home3_text12',
                'type' => 'kundol_web_setting',
            ),
            72 => 
            array (
                'key' => 'language2_home3_text13',
                'value' => 'language2_home3_text13',
                'type' => 'kundol_web_setting',
            ),
            73 => 
            array (
                'key' => 'language2_home3_text14',
                'value' => 'language2_home3_text14',
                'type' => 'kundol_web_setting',
            ),
            74 => 
            array (
                'key' => 'language2_home3_text15',
                'value' => 'language2_home3_text15',
                'type' => 'kundol_web_setting',
            ),
            75 => 
            array (
                'key' => 'language2_home3_text16',
                'value' => 'language2_home3_text16',
                'type' => 'kundol_web_setting',
            ),
            76 => 
            array (
                'key' => 'language2_home3_text17',
                'value' => 'language2_home3_text17',
                'type' => 'kundol_web_setting',
            ),
            77 => 
            array (
                'key' => 'language2_home3_text18',
                'value' => 'language2_home3_text18',
                'type' => 'kundol_web_setting',
            ),
            78 => 
            array (
                'key' => 'language2_home3_text19',
                'value' => 'language2_home3_text19',
                'type' => 'kundol_web_setting',
            ),
            79 => 
            array (
                'key' => 'language2_home3_text20',
                'value' => 'language2_home3_text20',
                'type' => 'kundol_web_setting',
            ),
            80 => 
            array (
                'key' => 'language2_home3_text21',
                'value' => 'language2_home3_text21',
                'type' => 'kundol_web_setting',
            ),
            81 => 
            array (
                'key' => 'language2_home3_text22',
                'value' => 'language2_home3_text22',
                'type' => 'kundol_web_setting',
            ),
            82 => 
            array (
                'key' => 'language2_home3_text23',
                'value' => 'language2_home3_text23',
                'type' => 'kundol_web_setting',
            ),
            83 => 
            array (
                'key' => 'language2_home3_text24',
                'value' => 'language2_home3_text24',
                'type' => 'kundol_web_setting',
            ),
            84 => 
            array (
                'key' => 'language2_home3_text25',
                'value' => 'language2_home3_text25',
                'type' => 'kundol_web_setting',
            ),
            85 => 
            array (
                'key' => 'language2_home3_text26',
                'value' => 'language2_home3_text26',
                'type' => 'kundol_web_setting',
            ),
            86 => 
            array (
                'key' => 'language2_home3_text27',
                'value' => 'language2_home3_text27',
                'type' => 'kundol_web_setting',
            ),
            87 => 
            array (
                'key' => 'language2_home3_text28',
                'value' => 'language2_home3_text28',
                'type' => 'kundol_web_setting',
            ),
            88 => 
            array (
                'key' => 'language2_home3_text29',
                'value' => 'language2_home3_text29',
                'type' => 'kundol_web_setting',
            ),
            89 => 
            array (
                'key' => 'language2_home3_text30',
                'value' => 'language2_home3_text30',
                'type' => 'kundol_web_setting',
            ),
            90 => 
            array (
                'key' => 'language2_home4_text1',
                'value' => 'language2_home4_text1',
                'type' => 'kundol_web_setting',
            ),
            91 => 
            array (
                'key' => 'language2_home4_text2',
                'value' => 'language2_home4_text2',
                'type' => 'kundol_web_setting',
            ),
            92 => 
            array (
                'key' => 'language2_home4_text3',
                'value' => 'language2_home4_text3',
                'type' => 'kundol_web_setting',
            ),
            93 => 
            array (
                'key' => 'language2_home4_text4',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            94 => 
            array (
                'key' => 'language2_home4_text5',
                'value' => 'language2_home4_text5',
                'type' => 'kundol_web_setting',
            ),
            95 => 
            array (
                'key' => 'language2_home4_text6',
                'value' => 'language2_home4_text6',
                'type' => 'kundol_web_setting',
            ),
            96 => 
            array (
                'key' => 'language2_home4_text7',
                'value' => 'language2_home4_text7',
                'type' => 'kundol_web_setting',
            ),
            97 => 
            array (
                'key' => 'language2_home4_text8',
                'value' => 'language2_home4_text8',
                'type' => 'kundol_web_setting',
            ),
            98 => 
            array (
                'key' => 'language2_home4_text9',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            99 => 
            array (
                'key' => 'language2_home4_text10',
                'value' => 'language2_home4_text10',
                'type' => 'kundol_web_setting',
            ),
            100 => 
            array (
                'key' => 'language2_home4_text11',
                'value' => 'language2_home4_text11',
                'type' => 'kundol_web_setting',
            ),
            101 => 
            array (
                'key' => 'language2_home4_text12',
                'value' => 'language2_home4_text12',
                'type' => 'kundol_web_setting',
            ),
            102 => 
            array (
                'key' => 'language2_home4_text13',
                'value' => 'language2_home4_text13',
                'type' => 'kundol_web_setting',
            ),
            103 => 
            array (
                'key' => 'language2_home4_text14',
                'value' => 'language2_home4_text14',
                'type' => 'kundol_web_setting',
            ),
            104 => 
            array (
                'key' => 'language2_home4_text15',
                'value' => '202109025813banner_368x550.jpg',
                'type' => 'kundol_web_setting',
            ),
            105 => 
            array (
                'key' => 'language2_home4_text16',
                'value' => 'language2_home4_text16',
                'type' => 'kundol_web_setting',
            ),
            106 => 
            array (
                'key' => 'language2_home4_text17',
                'value' => 'language2_home4_text17',
                'type' => 'kundol_web_setting',
            ),
            107 => 
            array (
                'key' => 'language2_home4_text18',
                'value' => 'language2_home4_text18',
                'type' => 'kundol_web_setting',
            ),
            108 => 
            array (
                'key' => 'language2_home4_text19',
                'value' => 'language2_home4_text19',
                'type' => 'kundol_web_setting',
            ),
            109 => 
            array (
                'key' => 'language2_home4_text20',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            110 => 
            array (
                'key' => 'language2_home4_text21',
                'value' => 'language2_home4_text21',
                'type' => 'kundol_web_setting',
            ),
            111 => 
            array (
                'key' => 'language2_home4_text22',
                'value' => 'language2_home4_text22',
                'type' => 'kundol_web_setting',
            ),
            112 => 
            array (
                'key' => 'language2_home4_text23',
                'value' => 'language2_home4_text23',
                'type' => 'kundol_web_setting',
            ),
            113 => 
            array (
                'key' => 'language2_home4_text24',
                'value' => 'language2_home4_text24',
                'type' => 'kundol_web_setting',
            ),
            114 => 
            array (
                'key' => 'language2_home4_text25',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            115 => 
            array (
                'key' => 'language2_home4_text26',
                'value' => 'language2_home4_text26',
                'type' => 'kundol_web_setting',
            ),
            116 => 
            array (
                'key' => 'language2_home4_text27',
                'value' => 'language2_home4_text27',
                'type' => 'kundol_web_setting',
            ),
            117 => 
            array (
                'key' => 'language2_home4_text28',
                'value' => 'language2_home4_text28',
                'type' => 'kundol_web_setting',
            ),
            118 => 
            array (
                'key' => 'language2_home4_text29',
                'value' => 'language2_home4_text29',
                'type' => 'kundol_web_setting',
            ),
            119 => 
            array (
                'key' => 'language2_home4_text30',
                'value' => 'language2_home4_text30',
                'type' => 'kundol_web_setting',
            ),
            120 => 
            array (
                'key' => 'language2_home4_text31',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            121 => 
            array (
                'key' => 'language2_home4_text32',
                'value' => 'language2_home4_text32',
                'type' => 'kundol_web_setting',
            ),
            122 => 
            array (
                'key' => 'language2_home4_text33',
                'value' => 'language2_home4_text33',
                'type' => 'kundol_web_setting',
            ),
            123 => 
            array (
                'key' => 'language2_home4_text34',
                'value' => 'language2_home4_text34',
                'type' => 'kundol_web_setting',
            ),
            124 => 
            array (
                'key' => 'language2_home4_text35',
                'value' => 'language2_home4_text35',
                'type' => 'kundol_web_setting',
            ),
            125 => 
            array (
                'key' => 'language2_home4_text36',
                'value' => 'language2_home4_text36',
                'type' => 'kundol_web_setting',
            ),
            126 => 
            array (
                'key' => 'language2_home4_text37',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            127 => 
            array (
                'key' => 'language2_home4_text38',
                'value' => 'language2_home4_text38',
                'type' => 'kundol_web_setting',
            ),
            128 => 
            array (
                'key' => 'language2_home4_text39',
                'value' => 'language2_home4_text39',
                'type' => 'kundol_web_setting',
            ),
            129 => 
            array (
                'key' => 'language2_home4_text40',
                'value' => 'language2_home4_text40',
                'type' => 'kundol_web_setting',
            ),
            130 => 
            array (
                'key' => 'language2_home4_text41',
                'value' => 'language2_home4_text41',
                'type' => 'kundol_web_setting',
            ),
            131 => 
            array (
                'key' => 'language2_home4_text42',
                'value' => 'language2_home4_text42',
                'type' => 'kundol_web_setting',
            ),
            132 => 
            array (
                'key' => 'language2_home4_text43',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            133 => 
            array (
                'key' => 'language2_home4_text44',
                'value' => 'language2_home4_text44',
                'type' => 'kundol_web_setting',
            ),
            134 => 
            array (
                'key' => 'language2_home4_text45',
                'value' => 'language2_home4_text45',
                'type' => 'kundol_web_setting',
            ),
            135 => 
            array (
                'key' => 'language2_home4_text46',
                'value' => 'language2_home4_text46',
                'type' => 'kundol_web_setting',
            ),
            136 => 
            array (
                'key' => 'language2_home4_text47',
                'value' => 'language2_home4_text47',
                'type' => 'kundol_web_setting',
            ),
            137 => 
            array (
                'key' => 'language2_home4_text48',
                'value' => 'language2_home4_text48',
                'type' => 'kundol_web_setting',
            ),
            138 => 
            array (
                'key' => 'language2_home4_text49',
                'value' => 'language2_home4_text49',
                'type' => 'kundol_web_setting',
            ),
            139 => 
            array (
                'key' => 'language2_home4_text50',
                'value' => 'language2_home4_text50',
                'type' => 'kundol_web_setting',
            ),
            140 => 
            array (
                'key' => 'language2_home4_text51',
                'value' => 'language2_home4_text51',
                'type' => 'kundol_web_setting',
            ),
            141 => 
            array (
                'key' => 'language2_home4_text52',
                'value' => 'language2_home4_text52',
                'type' => 'kundol_web_setting',
            ),
            142 => 
            array (
                'key' => 'language2_home4_text53',
                'value' => 'language2_home4_text53',
                'type' => 'kundol_web_setting',
            ),
            143 => 
            array (
                'key' => 'language2_home4_text54',
                'value' => 'language2_home4_text54',
                'type' => 'kundol_web_setting',
            ),
            144 => 
            array (
                'key' => 'language2_home4_text55',
                'value' => 'language2_home4_text55',
                'type' => 'kundol_web_setting',
            ),
            145 => 
            array (
                'key' => 'language2_home4_text56',
                'value' => 'language2_home4_text56',
                'type' => 'kundol_web_setting',
            ),
            146 => 
            array (
                'key' => 'language2_home4_text57',
                'value' => 'language2_home4_text57',
                'type' => 'kundol_web_setting',
            ),
            147 => 
            array (
                'key' => 'language2_home4_text58',
                'value' => 'language2_home4_text58',
                'type' => 'kundol_web_setting',
            ),
            148 => 
            array (
                'key' => 'language2_home4_text59',
                'value' => 'language2_home4_text59',
                'type' => 'kundol_web_setting',
            ),
            149 => 
            array (
                'key' => 'language2_home4_text60',
                'value' => 'language2_home4_text60',
                'type' => 'kundol_web_setting',
            ),
            150 => 
            array (
                'key' => 'language2_home5_text1',
                'value' => 'language2_home5_text1',
                'type' => 'kundol_web_setting',
            ),
            151 => 
            array (
                'key' => 'language2_home5_text2',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            152 => 
            array (
                'key' => 'language2_home5_text3',
                'value' => 'language2_home5_text3',
                'type' => 'kundol_web_setting',
            ),
            153 => 
            array (
                'key' => 'language2_home5_text4',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            154 => 
            array (
                'key' => 'language2_home5_text5',
                'value' => 'language2_home5_text5',
                'type' => 'kundol_web_setting',
            ),
            155 => 
            array (
                'key' => 'language2_home5_text6',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            156 => 
            array (
                'key' => 'language2_home5_text7',
                'value' => 'language2_home5_text7',
                'type' => 'kundol_web_setting',
            ),
            157 => 
            array (
                'key' => 'language2_home5_text8',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            158 => 
            array (
                'key' => 'language2_home5_text9',
                'value' => 'language2_home5_text9',
                'type' => 'kundol_web_setting',
            ),
            159 => 
            array (
                'key' => 'language2_home5_text10',
                'value' => 'language2_home5_text10',
                'type' => 'kundol_web_setting',
            ),
            160 => 
            array (
                'key' => 'language2_home5_text11',
                'value' => 'language2_home5_text11',
                'type' => 'kundol_web_setting',
            ),
            161 => 
            array (
                'key' => 'language2_home5_text12',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            162 => 
            array (
                'key' => 'language2_home5_text13',
                'value' => 'language2_home5_text13',
                'type' => 'kundol_web_setting',
            ),
            163 => 
            array (
                'key' => 'language2_home5_text14',
                'value' => 'language2_home5_text14',
                'type' => 'kundol_web_setting',
            ),
            164 => 
            array (
                'key' => 'language2_home5_text15',
                'value' => 'language2_home5_text15',
                'type' => 'kundol_web_setting',
            ),
            165 => 
            array (
                'key' => 'language2_home5_text16',
                'value' => 'language2_home5_text16',
                'type' => 'kundol_web_setting',
            ),
            166 => 
            array (
                'key' => 'language2_home5_text17',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            167 => 
            array (
                'key' => 'language2_home5_text18',
                'value' => 'language2_home5_text18',
                'type' => 'kundol_web_setting',
            ),
            168 => 
            array (
                'key' => 'language2_home5_text19',
                'value' => 'language2_home5_text19',
                'type' => 'kundol_web_setting',
            ),
            169 => 
            array (
                'key' => 'language2_home5_text20',
                'value' => 'language2_home5_text20',
                'type' => 'kundol_web_setting',
            ),
            170 => 
            array (
                'key' => 'language2_home5_text21',
                'value' => 'language2_home5_text21',
                'type' => 'kundol_web_setting',
            ),
            171 => 
            array (
                'key' => 'language2_home5_text22',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            172 => 
            array (
                'key' => 'language2_home5_text23',
                'value' => 'language2_home5_text23',
                'type' => 'kundol_web_setting',
            ),
            173 => 
            array (
                'key' => 'language2_home5_text24',
                'value' => 'language2_home5_text24',
                'type' => 'kundol_web_setting',
            ),
            174 => 
            array (
                'key' => 'language2_home5_text25',
                'value' => 'language2_home5_text25',
                'type' => 'kundol_web_setting',
            ),
            175 => 
            array (
                'key' => 'language2_home5_text26',
                'value' => 'language2_home5_text26',
                'type' => 'kundol_web_setting',
            ),
            176 => 
            array (
                'key' => 'language2_home5_text27',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            177 => 
            array (
                'key' => 'language2_home5_text28',
                'value' => 'language2_home5_text28',
                'type' => 'kundol_web_setting',
            ),
            178 => 
            array (
                'key' => 'language2_home5_text29',
                'value' => 'language2_home5_text29',
                'type' => 'kundol_web_setting',
            ),
            179 => 
            array (
                'key' => 'language2_home5_text30',
                'value' => 'language2_home5_text30',
                'type' => 'kundol_web_setting',
            ),
            180 => 
            array (
                'key' => 'language2_home5_text31',
                'value' => 'language2_home5_text31',
                'type' => 'kundol_web_setting',
            ),
            181 => 
            array (
                'key' => 'language2_home5_text32',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            182 => 
            array (
                'key' => 'language2_home5_text33',
                'value' => 'language2_home5_text33',
                'type' => 'kundol_web_setting',
            ),
            183 => 
            array (
                'key' => 'language2_home5_text34',
                'value' => 'language2_home5_text34',
                'type' => 'kundol_web_setting',
            ),
            184 => 
            array (
                'key' => 'language2_home5_text35',
                'value' => 'language2_home5_text35',
                'type' => 'kundol_web_setting',
            ),
            185 => 
            array (
                'key' => 'language2_home5_text36',
                'value' => 'language2_home5_text36',
                'type' => 'kundol_web_setting',
            ),
            186 => 
            array (
                'key' => 'language2_home5_text37',
                'value' => 'language2_home5_text37',
                'type' => 'kundol_web_setting',
            ),
            187 => 
            array (
                'key' => 'language2_home5_text38',
                'value' => 'language2_home5_text38',
                'type' => 'kundol_web_setting',
            ),
            188 => 
            array (
                'key' => 'language2_home5_text39',
                'value' => 'language2_home5_text39',
                'type' => 'kundol_web_setting',
            ),
            189 => 
            array (
                'key' => 'language2_home5_text40',
                'value' => 'language2_home5_text40',
                'type' => 'kundol_web_setting',
            ),
            190 => 
            array (
                'key' => 'language2_home5_text41',
                'value' => 'language2_home5_text41',
                'type' => 'kundol_web_setting',
            ),
            191 => 
            array (
                'key' => 'language2_home5_text42',
                'value' => 'language2_home5_text42',
                'type' => 'kundol_web_setting',
            ),
            192 => 
            array (
                'key' => 'language2_home5_text43',
                'value' => 'language2_home5_text43',
                'type' => 'kundol_web_setting',
            ),
            193 => 
            array (
                'key' => 'language2_home5_text44',
                'value' => 'language2_home5_text44',
                'type' => 'kundol_web_setting',
            ),
            194 => 
            array (
                'key' => 'language2_home5_text45',
                'value' => 'language2_home5_text45',
                'type' => 'kundol_web_setting',
            ),
            195 => 
            array (
                'key' => 'language2_home5_text46',
                'value' => 'language2_home5_text46',
                'type' => 'kundol_web_setting',
            ),
            196 => 
            array (
                'key' => 'language2_home5_text47',
                'value' => 'language2_home5_text47',
                'type' => 'kundol_web_setting',
            ),
            197 => 
            array (
                'key' => 'language2_home5_text48',
                'value' => 'language2_home5_text48',
                'type' => 'kundol_web_setting',
            ),
            198 => 
            array (
                'key' => 'language2_home5_text49',
                'value' => 'language2_home5_text49',
                'type' => 'kundol_web_setting',
            ),
            199 => 
            array (
                'key' => 'language2_home5_text50',
                'value' => 'language2_home5_text50',
                'type' => 'kundol_web_setting',
            ),
            200 => 
            array (
                'key' => 'language2_home6_text1',
                'value' => 'language2_home6_text1',
                'type' => 'kundol_web_setting',
            ),
            201 => 
            array (
                'key' => 'language2_home6_text2',
                'value' => 'language2_home6_text2',
                'type' => 'kundol_web_setting',
            ),
            202 => 
            array (
                'key' => 'language2_home6_text3',
                'value' => 'language2_home6_text3',
                'type' => 'kundol_web_setting',
            ),
            203 => 
            array (
                'key' => 'language2_home6_text4',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            204 => 
            array (
                'key' => 'language2_home6_text5',
                'value' => 'language2_home6_text5',
                'type' => 'kundol_web_setting',
            ),
            205 => 
            array (
                'key' => 'language2_home6_text6',
                'value' => 'language2_home6_text6',
                'type' => 'kundol_web_setting',
            ),
            206 => 
            array (
                'key' => 'language2_home6_text7',
                'value' => 'language2_home6_text7',
                'type' => 'kundol_web_setting',
            ),
            207 => 
            array (
                'key' => 'language2_home6_text8',
                'value' => 'language2_home6_text8',
                'type' => 'kundol_web_setting',
            ),
            208 => 
            array (
                'key' => 'language2_home6_text9',
                'value' => 'language2_home6_text9',
                'type' => 'kundol_web_setting',
            ),
            209 => 
            array (
                'key' => 'language2_home6_text10',
                'value' => 'language2_home6_text10',
                'type' => 'kundol_web_setting',
            ),
            210 => 
            array (
                'key' => 'language2_home6_text11',
                'value' => 'language2_home6_text11',
                'type' => 'kundol_web_setting',
            ),
            211 => 
            array (
                'key' => 'language2_home6_text12',
                'value' => 'language2_home6_text12',
                'type' => 'kundol_web_setting',
            ),
            212 => 
            array (
                'key' => 'language2_home6_text13',
                'value' => 'language2_home6_text13',
                'type' => 'kundol_web_setting',
            ),
            213 => 
            array (
                'key' => 'language2_home6_text14',
                'value' => 'language2_home6_text14',
                'type' => 'kundol_web_setting',
            ),
            214 => 
            array (
                'key' => 'language2_home6_text15',
                'value' => 'language2_home6_text15',
                'type' => 'kundol_web_setting',
            ),
            215 => 
            array (
                'key' => 'language2_home6_text16',
                'value' => 'language2_home6_text16',
                'type' => 'kundol_web_setting',
            ),
            216 => 
            array (
                'key' => 'language2_home6_text17',
                'value' => 'language2_home6_text17',
                'type' => 'kundol_web_setting',
            ),
            217 => 
            array (
                'key' => 'language2_home6_text18',
                'value' => 'language2_home6_text18',
                'type' => 'kundol_web_setting',
            ),
            218 => 
            array (
                'key' => 'language2_home6_text19',
                'value' => 'language2_home6_text19',
                'type' => 'kundol_web_setting',
            ),
            219 => 
            array (
                'key' => 'language2_home6_text20',
                'value' => 'language2_home6_text20',
                'type' => 'kundol_web_setting',
            ),
            220 => 
            array (
                'key' => 'language2_home7_text1',
                'value' => 'language2_home7_text1',
                'type' => 'kundol_web_setting',
            ),
            221 => 
            array (
                'key' => 'language2_home7_text2',
                'value' => 'language2_home7_text2',
                'type' => 'kundol_web_setting',
            ),
            222 => 
            array (
                'key' => 'language2_home7_text3',
                'value' => 'language2_home7_text3',
                'type' => 'kundol_web_setting',
            ),
            223 => 
            array (
                'key' => 'language2_home7_text4',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            224 => 
            array (
                'key' => 'language2_home7_text5',
                'value' => 'language2_home7_text5',
                'type' => 'kundol_web_setting',
            ),
            225 => 
            array (
                'key' => 'language2_home7_text6',
                'value' => 'language2_home7_text6',
                'type' => 'kundol_web_setting',
            ),
            226 => 
            array (
                'key' => 'language2_home7_text7',
                'value' => 'language2_home7_text7',
                'type' => 'kundol_web_setting',
            ),
            227 => 
            array (
                'key' => 'language2_home7_text8',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            228 => 
            array (
                'key' => 'language2_home7_text9',
                'value' => 'language2_home7_text9',
                'type' => 'kundol_web_setting',
            ),
            229 => 
            array (
                'key' => 'language2_home7_text10',
                'value' => 'language2_home7_text10',
                'type' => 'kundol_web_setting',
            ),
            230 => 
            array (
                'key' => 'language2_home7_text11',
                'value' => 'language2_home7_text11',
                'type' => 'kundol_web_setting',
            ),
            231 => 
            array (
                'key' => 'language2_home7_text12',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            232 => 
            array (
                'key' => 'language2_home7_text13',
                'value' => 'language2_home7_text13',
                'type' => 'kundol_web_setting',
            ),
            233 => 
            array (
                'key' => 'language2_home7_text14',
                'value' => 'language2_home7_text14',
                'type' => 'kundol_web_setting',
            ),
            234 => 
            array (
                'key' => 'language2_home7_text15',
                'value' => 'language2_home7_text15',
                'type' => 'kundol_web_setting',
            ),
            235 => 
            array (
                'key' => 'language2_home7_text16',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            236 => 
            array (
                'key' => 'language2_home7_text17',
                'value' => 'language2_home7_text17',
                'type' => 'kundol_web_setting',
            ),
            237 => 
            array (
                'key' => 'language2_home7_text18',
                'value' => 'language2_home7_text18',
                'type' => 'kundol_web_setting',
            ),
            238 => 
            array (
                'key' => 'language2_home7_text19',
                'value' => 'language2_home7_text19',
                'type' => 'kundol_web_setting',
            ),
            239 => 
            array (
                'key' => 'language2_home7_text20',
                'value' => 'language2_home7_text20',
                'type' => 'kundol_web_setting',
            ),
            240 => 
            array (
                'key' => 'language2_home7_text21',
                'value' => 'language2_home7_text21',
                'type' => 'kundol_web_setting',
            ),
            241 => 
            array (
                'key' => 'language2_home7_text22',
                'value' => 'language2_home7_text22',
                'type' => 'kundol_web_setting',
            ),
            242 => 
            array (
                'key' => 'language2_home7_text23',
                'value' => 'language2_home7_text23',
                'type' => 'kundol_web_setting',
            ),
            243 => 
            array (
                'key' => 'language2_home7_text24',
                'value' => 'language2_home7_text24',
                'type' => 'kundol_web_setting',
            ),
            244 => 
            array (
                'key' => 'language2_home7_text25',
                'value' => 'language2_home7_text25',
                'type' => 'kundol_web_setting',
            ),
            245 => 
            array (
                'key' => 'language2_home7_text26',
                'value' => 'language2_home7_text26',
                'type' => 'kundol_web_setting',
            ),
            246 => 
            array (
                'key' => 'language2_home7_text27',
                'value' => 'language2_home7_text27',
                'type' => 'kundol_web_setting',
            ),
            247 => 
            array (
                'key' => 'language2_home7_text28',
                'value' => 'language2_home7_text28',
                'type' => 'kundol_web_setting',
            ),
            248 => 
            array (
                'key' => 'language2_home7_text29',
                'value' => 'language2_home7_text29',
                'type' => 'kundol_web_setting',
            ),
            249 => 
            array (
                'key' => 'language2_home7_text30',
                'value' => 'language2_home7_text30',
                'type' => 'kundol_web_setting',
            ),
            250 => 
            array (
                'key' => 'language2_home8_text1',
                'value' => 'language2_home8_text1',
                'type' => 'kundol_web_setting',
            ),
            251 => 
            array (
                'key' => 'language2_home8_text2',
                'value' => 'language2_home8_text2',
                'type' => 'kundol_web_setting',
            ),
            252 => 
            array (
                'key' => 'language2_home8_text3',
                'value' => 'language2_home8_text3',
                'type' => 'kundol_web_setting',
            ),
            253 => 
            array (
                'key' => 'language2_home8_text4',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            254 => 
            array (
                'key' => 'language2_home8_text5',
                'value' => 'language2_home8_text5',
                'type' => 'kundol_web_setting',
            ),
            255 => 
            array (
                'key' => 'language2_home8_text6',
                'value' => 'language2_home8_text6',
                'type' => 'kundol_web_setting',
            ),
            256 => 
            array (
                'key' => 'language2_home8_text7',
                'value' => 'language2_home8_text7',
                'type' => 'kundol_web_setting',
            ),
            257 => 
            array (
                'key' => 'language2_home8_text8',
                'value' => 'language2_home8_text8',
                'type' => 'kundol_web_setting',
            ),
            258 => 
            array (
                'key' => 'language2_home8_text9',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            259 => 
            array (
                'key' => 'language2_home8_text10',
                'value' => 'language2_home8_text10',
                'type' => 'kundol_web_setting',
            ),
            260 => 
            array (
                'key' => 'language2_home8_text11',
                'value' => 'language2_home8_text11',
                'type' => 'kundol_web_setting',
            ),
            261 => 
            array (
                'key' => 'language2_home8_text12',
                'value' => 'language2_home8_text12',
                'type' => 'kundol_web_setting',
            ),
            262 => 
            array (
                'key' => 'language2_home8_text13',
                'value' => 'language2_home8_text13',
                'type' => 'kundol_web_setting',
            ),
            263 => 
            array (
                'key' => 'language2_home8_text14',
                'value' => '202109025823banner_370x210.jpg',
                'type' => 'kundol_web_setting',
            ),
            264 => 
            array (
                'key' => 'language2_home8_text15',
                'value' => 'language2_home8_text15',
                'type' => 'kundol_web_setting',
            ),
            265 => 
            array (
                'key' => 'language2_home8_text16',
                'value' => 'language2_home8_text16',
                'type' => 'kundol_web_setting',
            ),
            266 => 
            array (
                'key' => 'language2_home8_text17',
                'value' => 'language2_home8_text17',
                'type' => 'kundol_web_setting',
            ),
            267 => 
            array (
                'key' => 'language2_home8_text18',
                'value' => 'language2_home8_text18',
                'type' => 'kundol_web_setting',
            ),
            268 => 
            array (
                'key' => 'language2_home8_text19',
                'value' => 'language2_home8_text19',
                'type' => 'kundol_web_setting',
            ),
            269 => 
            array (
                'key' => 'language2_home8_text20',
                'value' => 'language2_home8_text20',
                'type' => 'kundol_web_setting',
            ),
            270 => 
            array (
                'key' => 'language2_home8_text21',
                'value' => 'language2_home8_text21',
                'type' => 'kundol_web_setting',
            ),
            271 => 
            array (
                'key' => 'language2_home8_text22',
                'value' => 'language2_home8_text22',
                'type' => 'kundol_web_setting',
            ),
            272 => 
            array (
                'key' => 'language2_home8_text23',
                'value' => 'language2_home8_text23',
                'type' => 'kundol_web_setting',
            ),
            273 => 
            array (
                'key' => 'language2_home8_text24',
                'value' => 'language2_home8_text24',
                'type' => 'kundol_web_setting',
            ),
            274 => 
            array (
                'key' => 'language2_home8_text25',
                'value' => 'language2_home8_text25',
                'type' => 'kundol_web_setting',
            ),
            275 => 
            array (
                'key' => 'language2_home8_text26',
                'value' => 'language2_home8_text26',
                'type' => 'kundol_web_setting',
            ),
            276 => 
            array (
                'key' => 'language2_home8_text27',
                'value' => 'language2_home8_text27',
                'type' => 'kundol_web_setting',
            ),
            277 => 
            array (
                'key' => 'language2_home8_text28',
                'value' => 'language2_home8_text28',
                'type' => 'kundol_web_setting',
            ),
            278 => 
            array (
                'key' => 'language2_home8_text29',
                'value' => 'language2_home8_text29',
                'type' => 'kundol_web_setting',
            ),
            279 => 
            array (
                'key' => 'language2_home8_text30',
                'value' => 'language2_home8_text30',
                'type' => 'kundol_web_setting',
            ),
            280 => 
            array (
                'key' => 'language2_home9_text1',
                'value' => 'language2_home9_text1',
                'type' => 'kundol_web_setting',
            ),
            281 => 
            array (
                'key' => 'language2_home9_text2',
                'value' => 'language2_home9_text2',
                'type' => 'kundol_web_setting',
            ),
            282 => 
            array (
                'key' => 'language2_home9_text3',
                'value' => 'language2_home9_text3',
                'type' => 'kundol_web_setting',
            ),
            283 => 
            array (
                'key' => 'language2_home9_text4',
                'value' => 'language2_home9_text4',
                'type' => 'kundol_web_setting',
            ),
            284 => 
            array (
                'key' => 'language2_home9_text5',
                'value' => 'language2_home9_text5',
                'type' => 'kundol_web_setting',
            ),
            285 => 
            array (
                'key' => 'language2_home9_text6',
                'value' => 'language2_home9_text6',
                'type' => 'kundol_web_setting',
            ),
            286 => 
            array (
                'key' => 'language2_home9_text7',
                'value' => 'language2_home9_text7',
                'type' => 'kundol_web_setting',
            ),
            287 => 
            array (
                'key' => 'language2_home9_text8',
                'value' => 'language2_home9_text8',
                'type' => 'kundol_web_setting',
            ),
            288 => 
            array (
                'key' => 'language2_home9_text9',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            289 => 
            array (
                'key' => 'language2_home9_text10',
                'value' => 'language2_home9_text10',
                'type' => 'kundol_web_setting',
            ),
            290 => 
            array (
                'key' => 'language2_home9_text11',
                'value' => 'language2_home9_text11',
                'type' => 'kundol_web_setting',
            ),
            291 => 
            array (
                'key' => 'language2_home9_text12',
                'value' => 'language2_home9_text12',
                'type' => 'kundol_web_setting',
            ),
            292 => 
            array (
                'key' => 'language2_home9_text13',
                'value' => 'language2_home9_text13',
                'type' => 'kundol_web_setting',
            ),
            293 => 
            array (
                'key' => 'language2_home9_text14',
                'value' => 'language2_home9_text14',
                'type' => 'kundol_web_setting',
            ),
            294 => 
            array (
                'key' => 'language2_home9_text15',
                'value' => 'language2_home9_text15',
                'type' => 'kundol_web_setting',
            ),
            295 => 
            array (
                'key' => 'language2_home9_text16',
                'value' => 'language2_home9_text16',
                'type' => 'kundol_web_setting',
            ),
            296 => 
            array (
                'key' => 'language2_home9_text17',
                'value' => 'language2_home9_text17',
                'type' => 'kundol_web_setting',
            ),
            297 => 
            array (
                'key' => 'language2_home9_text18',
                'value' => 'language2_home9_text18',
                'type' => 'kundol_web_setting',
            ),
            298 => 
            array (
                'key' => 'language2_home9_text19',
                'value' => '202109042309banner_271x451.jpg',
                'type' => 'kundol_web_setting',
            ),
            299 => 
            array (
                'key' => 'language2_home9_text20',
                'value' => 'language2_home9_text20',
                'type' => 'kundol_web_setting',
            ),
            300 => 
            array (
                'key' => 'language2_home9_text21',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            301 => 
            array (
                'key' => 'language2_home9_text22',
                'value' => '202109042309banner_271x451.jpg',
                'type' => 'kundol_web_setting',
            ),
            302 => 
            array (
                'key' => 'language2_home9_text23',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            303 => 
            array (
                'key' => 'language2_home9_text24',
                'value' => '202109042527banner_270x211.jpg',
                'type' => 'kundol_web_setting',
            ),
            304 => 
            array (
                'key' => 'language2_home9_text25',
                'value' => '202109025727banner_270x229.jpg',
                'type' => 'kundol_web_setting',
            ),
            305 => 
            array (
                'key' => 'language2_home9_text26',
                'value' => '202109025851banner_370x220.jpg',
                'type' => 'kundol_web_setting',
            ),
            306 => 
            array (
                'key' => 'language2_home9_text27',
                'value' => 'language2_home9_text27',
                'type' => 'kundol_web_setting',
            ),
            307 => 
            array (
                'key' => 'language2_home9_text28',
                'value' => 'language2_home9_text28',
                'type' => 'kundol_web_setting',
            ),
            308 => 
            array (
                'key' => 'language2_home9_text29',
                'value' => 'language2_home9_text29',
                'type' => 'kundol_web_setting',
            ),
            309 => 
            array (
                'key' => 'language2_home9_text30',
                'value' => 'language2_home9_text30',
                'type' => 'kundol_web_setting',
            ),
            310 => 
            array (
                'key' => 'language2_home9_text31',
                'value' => 'language2_home9_text31',
                'type' => 'kundol_web_setting',
            ),
            311 => 
            array (
                'key' => 'language2_home9_text32',
                'value' => 'language2_home9_text32',
                'type' => 'kundol_web_setting',
            ),
            312 => 
            array (
                'key' => 'language2_home9_text33',
                'value' => 'language2_home9_text33',
                'type' => 'kundol_web_setting',
            ),
            313 => 
            array (
                'key' => 'language2_home9_text34',
                'value' => 'language2_home9_text34',
                'type' => 'kundol_web_setting',
            ),
            314 => 
            array (
                'key' => 'language2_home9_text35',
                'value' => 'language2_home9_text35',
                'type' => 'kundol_web_setting',
            ),
            315 => 
            array (
                'key' => 'language2_home9_text36',
                'value' => 'language2_home9_text36',
                'type' => 'kundol_web_setting',
            ),
            316 => 
            array (
                'key' => 'language2_home9_text37',
                'value' => 'language2_home9_text37',
                'type' => 'kundol_web_setting',
            ),
            317 => 
            array (
                'key' => 'language2_home9_text38',
                'value' => 'language2_home9_text38',
                'type' => 'kundol_web_setting',
            ),
            318 => 
            array (
                'key' => 'language2_home9_text39',
                'value' => 'language2_home9_text39',
                'type' => 'kundol_web_setting',
            ),
            319 => 
            array (
                'key' => 'language2_home9_text40',
                'value' => 'language2_home9_text40',
                'type' => 'kundol_web_setting',
            ),
            320 => 
            array (
                'key' => 'language2_home9_text41',
                'value' => 'language2_home9_text41',
                'type' => 'kundol_web_setting',
            ),
            321 => 
            array (
                'key' => 'language2_home9_text42',
                'value' => 'language2_home9_text42',
                'type' => 'kundol_web_setting',
            ),
            322 => 
            array (
                'key' => 'language2_home9_text43',
                'value' => 'language2_home9_text43',
                'type' => 'kundol_web_setting',
            ),
            323 => 
            array (
                'key' => 'language2_home9_text44',
                'value' => 'language2_home9_text44',
                'type' => 'kundol_web_setting',
            ),
            324 => 
            array (
                'key' => 'language2_home9_text45',
                'value' => 'language2_home9_text45',
                'type' => 'kundol_web_setting',
            ),
            325 => 
            array (
                'key' => 'language2_home9_text46',
                'value' => 'language2_home9_text46',
                'type' => 'kundol_web_setting',
            ),
            326 => 
            array (
                'key' => 'language2_home9_text47',
                'value' => 'language2_home9_text47',
                'type' => 'kundol_web_setting',
            ),
            327 => 
            array (
                'key' => 'language2_home9_text48',
                'value' => 'language2_home9_text48',
                'type' => 'kundol_web_setting',
            ),
            328 => 
            array (
                'key' => 'language2_home9_text49',
                'value' => 'language2_home9_text49',
                'type' => 'kundol_web_setting',
            ),
            329 => 
            array (
                'key' => 'language2_home9_text50',
                'value' => 'language2_home9_text50',
                'type' => 'kundol_web_setting',
            ),
            330 => 
            array (
                'key' => 'language3_home1_text1',
                'value' => 'language3_home1_text1',
                'type' => 'kundol_web_setting',
            ),
            331 => 
            array (
                'key' => 'language3_home1_text2',
                'value' => 'language3_home1_text2',
                'type' => 'kundol_web_setting',
            ),
            332 => 
            array (
                'key' => 'language3_home1_text3',
                'value' => 'language3_home1_text3',
                'type' => 'kundol_web_setting',
            ),
            333 => 
            array (
                'key' => 'language3_home1_text4',
                'value' => 'language3_home1_text4',
                'type' => 'kundol_web_setting',
            ),
            334 => 
            array (
                'key' => 'language3_home1_text5',
                'value' => 'language3_home1_text5',
                'type' => 'kundol_web_setting',
            ),
            335 => 
            array (
                'key' => 'language3_home1_text6',
                'value' => 'language3_home1_text6',
                'type' => 'kundol_web_setting',
            ),
            336 => 
            array (
                'key' => 'language3_home1_text7',
                'value' => 'language3_home1_text7',
                'type' => 'kundol_web_setting',
            ),
            337 => 
            array (
                'key' => 'language3_home1_text8',
                'value' => 'language3_home1_text8',
                'type' => 'kundol_web_setting',
            ),
            338 => 
            array (
                'key' => 'language3_home1_text9',
                'value' => 'language3_home1_text9',
                'type' => 'kundol_web_setting',
            ),
            339 => 
            array (
                'key' => 'language3_home1_text10',
                'value' => 'language3_home1_text10',
                'type' => 'kundol_web_setting',
            ),
            340 => 
            array (
                'key' => 'language3_home1_text11',
                'value' => 'language3_home1_text11',
                'type' => 'kundol_web_setting',
            ),
            341 => 
            array (
                'key' => 'language3_home1_text12',
                'value' => 'language3_home1_text12',
                'type' => 'kundol_web_setting',
            ),
            342 => 
            array (
                'key' => 'language3_home1_text13',
                'value' => 'language3_home1_text13',
                'type' => 'kundol_web_setting',
            ),
            343 => 
            array (
                'key' => 'language3_home1_text14',
                'value' => 'language3_home1_text14',
                'type' => 'kundol_web_setting',
            ),
            344 => 
            array (
                'key' => 'language3_home1_text15',
                'value' => 'language3_home1_text15',
                'type' => 'kundol_web_setting',
            ),
            345 => 
            array (
                'key' => 'language3_home1_text16',
                'value' => 'language3_home1_text16',
                'type' => 'kundol_web_setting',
            ),
            346 => 
            array (
                'key' => 'language3_home1_text17',
                'value' => 'language3_home1_text17',
                'type' => 'kundol_web_setting',
            ),
            347 => 
            array (
                'key' => 'language3_home1_text18',
                'value' => 'language3_home1_text18',
                'type' => 'kundol_web_setting',
            ),
            348 => 
            array (
                'key' => 'language3_home1_text19',
                'value' => 'language3_home1_text19',
                'type' => 'kundol_web_setting',
            ),
            349 => 
            array (
                'key' => 'language3_home1_text20',
                'value' => 'language3_home1_text20',
                'type' => 'kundol_web_setting',
            ),
            350 => 
            array (
                'key' => 'language3_home1_text21',
                'value' => 'language3_home1_text21',
                'type' => 'kundol_web_setting',
            ),
            351 => 
            array (
                'key' => 'language3_home1_text22',
                'value' => 'language3_home1_text22',
                'type' => 'kundol_web_setting',
            ),
            352 => 
            array (
                'key' => 'language3_home1_text23',
                'value' => 'language3_home1_text23',
                'type' => 'kundol_web_setting',
            ),
            353 => 
            array (
                'key' => 'language3_home1_text24',
                'value' => 'language3_home1_text24',
                'type' => 'kundol_web_setting',
            ),
            354 => 
            array (
                'key' => 'language3_home1_text25',
                'value' => 'language3_home1_text25',
                'type' => 'kundol_web_setting',
            ),
            355 => 
            array (
                'key' => 'language3_home1_text26',
                'value' => 'language3_home1_text26',
                'type' => 'kundol_web_setting',
            ),
            356 => 
            array (
                'key' => 'language3_home1_text27',
                'value' => 'language3_home1_text27',
                'type' => 'kundol_web_setting',
            ),
            357 => 
            array (
                'key' => 'language3_home1_text28',
                'value' => 'language3_home1_text28',
                'type' => 'kundol_web_setting',
            ),
            358 => 
            array (
                'key' => 'language3_home1_text29',
                'value' => 'language3_home1_text29',
                'type' => 'kundol_web_setting',
            ),
            359 => 
            array (
                'key' => 'language3_home1_text30',
                'value' => 'language3_home1_text30',
                'type' => 'kundol_web_setting',
            ),
            360 => 
            array (
                'key' => 'language3_home2_text1',
                'value' => 'language3_home2_text1',
                'type' => 'kundol_web_setting',
            ),
            361 => 
            array (
                'key' => 'language3_home2_text2',
                'value' => 'language3_home2_text2',
                'type' => 'kundol_web_setting',
            ),
            362 => 
            array (
                'key' => 'language3_home2_text3',
                'value' => 'language3_home2_text3',
                'type' => 'kundol_web_setting',
            ),
            363 => 
            array (
                'key' => 'language3_home2_text4',
                'value' => 'language3_home2_text4',
                'type' => 'kundol_web_setting',
            ),
            364 => 
            array (
                'key' => 'language3_home2_text5',
                'value' => 'language3_home2_text5',
                'type' => 'kundol_web_setting',
            ),
            365 => 
            array (
                'key' => 'language3_home2_text6',
                'value' => 'language3_home2_text6',
                'type' => 'kundol_web_setting',
            ),
            366 => 
            array (
                'key' => 'language3_home2_text7',
                'value' => 'language3_home2_text7',
                'type' => 'kundol_web_setting',
            ),
            367 => 
            array (
                'key' => 'language3_home2_text8',
                'value' => 'language3_home2_text8',
                'type' => 'kundol_web_setting',
            ),
            368 => 
            array (
                'key' => 'language3_home2_text9',
                'value' => 'language3_home2_text9',
                'type' => 'kundol_web_setting',
            ),
            369 => 
            array (
                'key' => 'language3_home2_text10',
                'value' => 'language3_home2_text10',
                'type' => 'kundol_web_setting',
            ),
            370 => 
            array (
                'key' => 'language3_home2_text11',
                'value' => 'language3_home2_text11',
                'type' => 'kundol_web_setting',
            ),
            371 => 
            array (
                'key' => 'language3_home2_text12',
                'value' => 'language3_home2_text12',
                'type' => 'kundol_web_setting',
            ),
            372 => 
            array (
                'key' => 'language3_home2_text13',
                'value' => 'language3_home2_text13',
                'type' => 'kundol_web_setting',
            ),
            373 => 
            array (
                'key' => 'language3_home2_text14',
                'value' => 'language3_home2_text14',
                'type' => 'kundol_web_setting',
            ),
            374 => 
            array (
                'key' => 'language3_home2_text15',
                'value' => 'language3_home2_text15',
                'type' => 'kundol_web_setting',
            ),
            375 => 
            array (
                'key' => 'language3_home2_text16',
                'value' => 'language3_home2_text16',
                'type' => 'kundol_web_setting',
            ),
            376 => 
            array (
                'key' => 'language3_home2_text17',
                'value' => 'language3_home2_text17',
                'type' => 'kundol_web_setting',
            ),
            377 => 
            array (
                'key' => 'language3_home2_text18',
                'value' => 'language3_home2_text18',
                'type' => 'kundol_web_setting',
            ),
            378 => 
            array (
                'key' => 'language3_home2_text19',
                'value' => 'language3_home2_text19',
                'type' => 'kundol_web_setting',
            ),
            379 => 
            array (
                'key' => 'language3_home2_text20',
                'value' => 'language3_home2_text20',
                'type' => 'kundol_web_setting',
            ),
            380 => 
            array (
                'key' => 'language3_home2_text21',
                'value' => 'language3_home2_text21',
                'type' => 'kundol_web_setting',
            ),
            381 => 
            array (
                'key' => 'language3_home2_text22',
                'value' => 'language3_home2_text22',
                'type' => 'kundol_web_setting',
            ),
            382 => 
            array (
                'key' => 'language3_home2_text23',
                'value' => 'language3_home2_text23',
                'type' => 'kundol_web_setting',
            ),
            383 => 
            array (
                'key' => 'language3_home2_text24',
                'value' => 'language3_home2_text24',
                'type' => 'kundol_web_setting',
            ),
            384 => 
            array (
                'key' => 'language3_home2_text25',
                'value' => 'language3_home2_text25',
                'type' => 'kundol_web_setting',
            ),
            385 => 
            array (
                'key' => 'language3_home2_text26',
                'value' => 'language3_home2_text26',
                'type' => 'kundol_web_setting',
            ),
            386 => 
            array (
                'key' => 'language3_home2_text27',
                'value' => 'language3_home2_text27',
                'type' => 'kundol_web_setting',
            ),
            387 => 
            array (
                'key' => 'language3_home2_text28',
                'value' => 'language3_home2_text28',
                'type' => 'kundol_web_setting',
            ),
            388 => 
            array (
                'key' => 'language3_home2_text29',
                'value' => 'language3_home2_text29',
                'type' => 'kundol_web_setting',
            ),
            389 => 
            array (
                'key' => 'language3_home2_text30',
                'value' => 'language3_home2_text30',
                'type' => 'kundol_web_setting',
            ),
            390 => 
            array (
                'key' => 'language3_home3_text1',
                'value' => 'language3_home3_text1',
                'type' => 'kundol_web_setting',
            ),
            391 => 
            array (
                'key' => 'language3_home3_text2',
                'value' => 'language3_home3_text2',
                'type' => 'kundol_web_setting',
            ),
            392 => 
            array (
                'key' => 'language3_home3_text3',
                'value' => 'language3_home3_text3',
                'type' => 'kundol_web_setting',
            ),
            393 => 
            array (
                'key' => 'language3_home3_text4',
                'value' => 'language3_home3_text4',
                'type' => 'kundol_web_setting',
            ),
            394 => 
            array (
                'key' => 'language3_home3_text5',
                'value' => 'language3_home3_text5',
                'type' => 'kundol_web_setting',
            ),
            395 => 
            array (
                'key' => 'language3_home3_text6',
                'value' => 'language3_home3_text6',
                'type' => 'kundol_web_setting',
            ),
            396 => 
            array (
                'key' => 'language3_home3_text7',
                'value' => 'language3_home3_text7',
                'type' => 'kundol_web_setting',
            ),
            397 => 
            array (
                'key' => 'language3_home3_text8',
                'value' => 'language3_home3_text8',
                'type' => 'kundol_web_setting',
            ),
            398 => 
            array (
                'key' => 'language3_home3_text9',
                'value' => 'language3_home3_text9',
                'type' => 'kundol_web_setting',
            ),
            399 => 
            array (
                'key' => 'language3_home3_text10',
                'value' => 'language3_home3_text10',
                'type' => 'kundol_web_setting',
            ),
            400 => 
            array (
                'key' => 'language3_home3_text11',
                'value' => 'language3_home3_text11',
                'type' => 'kundol_web_setting',
            ),
            401 => 
            array (
                'key' => 'language3_home3_text12',
                'value' => 'language3_home3_text12',
                'type' => 'kundol_web_setting',
            ),
            402 => 
            array (
                'key' => 'language3_home3_text13',
                'value' => 'language3_home3_text13',
                'type' => 'kundol_web_setting',
            ),
            403 => 
            array (
                'key' => 'language3_home3_text14',
                'value' => 'language3_home3_text14',
                'type' => 'kundol_web_setting',
            ),
            404 => 
            array (
                'key' => 'language3_home3_text15',
                'value' => 'language3_home3_text15',
                'type' => 'kundol_web_setting',
            ),
            405 => 
            array (
                'key' => 'language3_home3_text16',
                'value' => 'language3_home3_text16',
                'type' => 'kundol_web_setting',
            ),
            406 => 
            array (
                'key' => 'language3_home3_text17',
                'value' => 'language3_home3_text17',
                'type' => 'kundol_web_setting',
            ),
            407 => 
            array (
                'key' => 'language3_home3_text18',
                'value' => 'language3_home3_text18',
                'type' => 'kundol_web_setting',
            ),
            408 => 
            array (
                'key' => 'language3_home3_text19',
                'value' => 'language3_home3_text19',
                'type' => 'kundol_web_setting',
            ),
            409 => 
            array (
                'key' => 'language3_home3_text20',
                'value' => 'language3_home3_text20',
                'type' => 'kundol_web_setting',
            ),
            410 => 
            array (
                'key' => 'language3_home3_text21',
                'value' => 'language3_home3_text21',
                'type' => 'kundol_web_setting',
            ),
            411 => 
            array (
                'key' => 'language3_home3_text22',
                'value' => 'language3_home3_text22',
                'type' => 'kundol_web_setting',
            ),
            412 => 
            array (
                'key' => 'language3_home3_text23',
                'value' => 'language3_home3_text23',
                'type' => 'kundol_web_setting',
            ),
            413 => 
            array (
                'key' => 'language3_home3_text24',
                'value' => 'language3_home3_text24',
                'type' => 'kundol_web_setting',
            ),
            414 => 
            array (
                'key' => 'language3_home3_text25',
                'value' => 'language3_home3_text25',
                'type' => 'kundol_web_setting',
            ),
            415 => 
            array (
                'key' => 'language3_home3_text26',
                'value' => 'language3_home3_text26',
                'type' => 'kundol_web_setting',
            ),
            416 => 
            array (
                'key' => 'language3_home3_text27',
                'value' => 'language3_home3_text27',
                'type' => 'kundol_web_setting',
            ),
            417 => 
            array (
                'key' => 'language3_home3_text28',
                'value' => 'language3_home3_text28',
                'type' => 'kundol_web_setting',
            ),
            418 => 
            array (
                'key' => 'language3_home3_text29',
                'value' => 'language3_home3_text29',
                'type' => 'kundol_web_setting',
            ),
            419 => 
            array (
                'key' => 'language3_home3_text30',
                'value' => 'language3_home3_text30',
                'type' => 'kundol_web_setting',
            ),
            420 => 
            array (
                'key' => 'language3_home4_text1',
                'value' => 'language3_home4_text1',
                'type' => 'kundol_web_setting',
            ),
            421 => 
            array (
                'key' => 'language3_home4_text2',
                'value' => 'language3_home4_text2',
                'type' => 'kundol_web_setting',
            ),
            422 => 
            array (
                'key' => 'language3_home4_text3',
                'value' => 'language3_home4_text3',
                'type' => 'kundol_web_setting',
            ),
            423 => 
            array (
                'key' => 'language3_home4_text4',
                'value' => 'language3_home4_text4',
                'type' => 'kundol_web_setting',
            ),
            424 => 
            array (
                'key' => 'language3_home4_text5',
                'value' => 'language3_home4_text5',
                'type' => 'kundol_web_setting',
            ),
            425 => 
            array (
                'key' => 'language3_home4_text6',
                'value' => 'language3_home4_text6',
                'type' => 'kundol_web_setting',
            ),
            426 => 
            array (
                'key' => 'language3_home4_text7',
                'value' => 'language3_home4_text7',
                'type' => 'kundol_web_setting',
            ),
            427 => 
            array (
                'key' => 'language3_home4_text8',
                'value' => 'language3_home4_text8',
                'type' => 'kundol_web_setting',
            ),
            428 => 
            array (
                'key' => 'language3_home4_text9',
                'value' => 'language3_home4_text9',
                'type' => 'kundol_web_setting',
            ),
            429 => 
            array (
                'key' => 'language3_home4_text10',
                'value' => 'language3_home4_text10',
                'type' => 'kundol_web_setting',
            ),
            430 => 
            array (
                'key' => 'language3_home4_text11',
                'value' => 'language3_home4_text11',
                'type' => 'kundol_web_setting',
            ),
            431 => 
            array (
                'key' => 'language3_home4_text12',
                'value' => 'language3_home4_text12',
                'type' => 'kundol_web_setting',
            ),
            432 => 
            array (
                'key' => 'language3_home4_text13',
                'value' => 'language3_home4_text13',
                'type' => 'kundol_web_setting',
            ),
            433 => 
            array (
                'key' => 'language3_home4_text14',
                'value' => 'language3_home4_text14',
                'type' => 'kundol_web_setting',
            ),
            434 => 
            array (
                'key' => 'language3_home4_text15',
                'value' => 'language3_home4_text15',
                'type' => 'kundol_web_setting',
            ),
            435 => 
            array (
                'key' => 'language3_home4_text16',
                'value' => 'language3_home4_text16',
                'type' => 'kundol_web_setting',
            ),
            436 => 
            array (
                'key' => 'language3_home4_text17',
                'value' => 'language3_home4_text17',
                'type' => 'kundol_web_setting',
            ),
            437 => 
            array (
                'key' => 'language3_home4_text18',
                'value' => 'language3_home4_text18',
                'type' => 'kundol_web_setting',
            ),
            438 => 
            array (
                'key' => 'language3_home4_text19',
                'value' => 'language3_home4_text19',
                'type' => 'kundol_web_setting',
            ),
            439 => 
            array (
                'key' => 'language3_home4_text20',
                'value' => 'language3_home4_text20',
                'type' => 'kundol_web_setting',
            ),
            440 => 
            array (
                'key' => 'language3_home4_text21',
                'value' => 'language3_home4_text21',
                'type' => 'kundol_web_setting',
            ),
            441 => 
            array (
                'key' => 'language3_home4_text22',
                'value' => 'language3_home4_text22',
                'type' => 'kundol_web_setting',
            ),
            442 => 
            array (
                'key' => 'language3_home4_text23',
                'value' => 'language3_home4_text23',
                'type' => 'kundol_web_setting',
            ),
            443 => 
            array (
                'key' => 'language3_home4_text24',
                'value' => 'language3_home4_text24',
                'type' => 'kundol_web_setting',
            ),
            444 => 
            array (
                'key' => 'language3_home4_text25',
                'value' => 'language3_home4_text25',
                'type' => 'kundol_web_setting',
            ),
            445 => 
            array (
                'key' => 'language3_home4_text26',
                'value' => 'language3_home4_text26',
                'type' => 'kundol_web_setting',
            ),
            446 => 
            array (
                'key' => 'language3_home4_text27',
                'value' => 'language3_home4_text27',
                'type' => 'kundol_web_setting',
            ),
            447 => 
            array (
                'key' => 'language3_home4_text28',
                'value' => 'language3_home4_text28',
                'type' => 'kundol_web_setting',
            ),
            448 => 
            array (
                'key' => 'language3_home4_text29',
                'value' => 'language3_home4_text29',
                'type' => 'kundol_web_setting',
            ),
            449 => 
            array (
                'key' => 'language3_home4_text30',
                'value' => 'language3_home4_text30',
                'type' => 'kundol_web_setting',
            ),
            450 => 
            array (
                'key' => 'language3_home4_text31',
                'value' => 'language3_home4_text31',
                'type' => 'kundol_web_setting',
            ),
            451 => 
            array (
                'key' => 'language3_home4_text32',
                'value' => 'language3_home4_text32',
                'type' => 'kundol_web_setting',
            ),
            452 => 
            array (
                'key' => 'language3_home4_text33',
                'value' => 'language3_home4_text33',
                'type' => 'kundol_web_setting',
            ),
            453 => 
            array (
                'key' => 'language3_home4_text34',
                'value' => 'language3_home4_text34',
                'type' => 'kundol_web_setting',
            ),
            454 => 
            array (
                'key' => 'language3_home4_text35',
                'value' => 'language3_home4_text35',
                'type' => 'kundol_web_setting',
            ),
            455 => 
            array (
                'key' => 'language3_home4_text36',
                'value' => 'language3_home4_text36',
                'type' => 'kundol_web_setting',
            ),
            456 => 
            array (
                'key' => 'language3_home4_text37',
                'value' => 'language3_home4_text37',
                'type' => 'kundol_web_setting',
            ),
            457 => 
            array (
                'key' => 'language3_home4_text38',
                'value' => 'language3_home4_text38',
                'type' => 'kundol_web_setting',
            ),
            458 => 
            array (
                'key' => 'language3_home4_text39',
                'value' => 'language3_home4_text39',
                'type' => 'kundol_web_setting',
            ),
            459 => 
            array (
                'key' => 'language3_home4_text40',
                'value' => 'language3_home4_text40',
                'type' => 'kundol_web_setting',
            ),
            460 => 
            array (
                'key' => 'language3_home4_text41',
                'value' => 'language3_home4_text41',
                'type' => 'kundol_web_setting',
            ),
            461 => 
            array (
                'key' => 'language3_home4_text42',
                'value' => 'language3_home4_text42',
                'type' => 'kundol_web_setting',
            ),
            462 => 
            array (
                'key' => 'language3_home4_text43',
                'value' => 'language3_home4_text43',
                'type' => 'kundol_web_setting',
            ),
            463 => 
            array (
                'key' => 'language3_home4_text44',
                'value' => 'language3_home4_text44',
                'type' => 'kundol_web_setting',
            ),
            464 => 
            array (
                'key' => 'language3_home4_text45',
                'value' => 'language3_home4_text45',
                'type' => 'kundol_web_setting',
            ),
            465 => 
            array (
                'key' => 'language3_home4_text46',
                'value' => 'language3_home4_text46',
                'type' => 'kundol_web_setting',
            ),
            466 => 
            array (
                'key' => 'language3_home4_text47',
                'value' => 'language3_home4_text47',
                'type' => 'kundol_web_setting',
            ),
            467 => 
            array (
                'key' => 'language3_home4_text48',
                'value' => 'language3_home4_text48',
                'type' => 'kundol_web_setting',
            ),
            468 => 
            array (
                'key' => 'language3_home4_text49',
                'value' => 'language3_home4_text49',
                'type' => 'kundol_web_setting',
            ),
            469 => 
            array (
                'key' => 'language3_home4_text50',
                'value' => 'language3_home4_text50',
                'type' => 'kundol_web_setting',
            ),
            470 => 
            array (
                'key' => 'language3_home4_text51',
                'value' => 'language3_home4_text51',
                'type' => 'kundol_web_setting',
            ),
            471 => 
            array (
                'key' => 'language3_home4_text52',
                'value' => 'language3_home4_text52',
                'type' => 'kundol_web_setting',
            ),
            472 => 
            array (
                'key' => 'language3_home4_text53',
                'value' => 'language3_home4_text53',
                'type' => 'kundol_web_setting',
            ),
            473 => 
            array (
                'key' => 'language3_home4_text54',
                'value' => 'language3_home4_text54',
                'type' => 'kundol_web_setting',
            ),
            474 => 
            array (
                'key' => 'language3_home4_text55',
                'value' => 'language3_home4_text55',
                'type' => 'kundol_web_setting',
            ),
            475 => 
            array (
                'key' => 'language3_home4_text56',
                'value' => 'language3_home4_text56',
                'type' => 'kundol_web_setting',
            ),
            476 => 
            array (
                'key' => 'language3_home4_text57',
                'value' => 'language3_home4_text57',
                'type' => 'kundol_web_setting',
            ),
            477 => 
            array (
                'key' => 'language3_home4_text58',
                'value' => 'language3_home4_text58',
                'type' => 'kundol_web_setting',
            ),
            478 => 
            array (
                'key' => 'language3_home4_text59',
                'value' => 'language3_home4_text59',
                'type' => 'kundol_web_setting',
            ),
            479 => 
            array (
                'key' => 'language3_home4_text60',
                'value' => 'language3_home4_text60',
                'type' => 'kundol_web_setting',
            ),
            480 => 
            array (
                'key' => 'language3_home5_text1',
                'value' => 'language3_home5_text1',
                'type' => 'kundol_web_setting',
            ),
            481 => 
            array (
                'key' => 'language3_home5_text2',
                'value' => 'language3_home5_text2',
                'type' => 'kundol_web_setting',
            ),
            482 => 
            array (
                'key' => 'language3_home5_text3',
                'value' => 'language3_home5_text3',
                'type' => 'kundol_web_setting',
            ),
            483 => 
            array (
                'key' => 'language3_home5_text4',
                'value' => 'language3_home5_text4',
                'type' => 'kundol_web_setting',
            ),
            484 => 
            array (
                'key' => 'language3_home5_text5',
                'value' => 'language3_home5_text5',
                'type' => 'kundol_web_setting',
            ),
            485 => 
            array (
                'key' => 'language3_home5_text6',
                'value' => 'language3_home5_text6',
                'type' => 'kundol_web_setting',
            ),
            486 => 
            array (
                'key' => 'language3_home5_text7',
                'value' => 'language3_home5_text7',
                'type' => 'kundol_web_setting',
            ),
            487 => 
            array (
                'key' => 'language3_home5_text8',
                'value' => 'language3_home5_text8',
                'type' => 'kundol_web_setting',
            ),
            488 => 
            array (
                'key' => 'language3_home5_text9',
                'value' => 'language3_home5_text9',
                'type' => 'kundol_web_setting',
            ),
            489 => 
            array (
                'key' => 'language3_home5_text10',
                'value' => 'language3_home5_text10',
                'type' => 'kundol_web_setting',
            ),
            490 => 
            array (
                'key' => 'language3_home5_text11',
                'value' => 'language3_home5_text11',
                'type' => 'kundol_web_setting',
            ),
            491 => 
            array (
                'key' => 'language3_home5_text12',
                'value' => 'language3_home5_text12',
                'type' => 'kundol_web_setting',
            ),
            492 => 
            array (
                'key' => 'language3_home5_text13',
                'value' => 'language3_home5_text13',
                'type' => 'kundol_web_setting',
            ),
            493 => 
            array (
                'key' => 'language3_home5_text14',
                'value' => 'language3_home5_text14',
                'type' => 'kundol_web_setting',
            ),
            494 => 
            array (
                'key' => 'language3_home5_text15',
                'value' => 'language3_home5_text15',
                'type' => 'kundol_web_setting',
            ),
            495 => 
            array (
                'key' => 'language3_home5_text16',
                'value' => 'language3_home5_text16',
                'type' => 'kundol_web_setting',
            ),
            496 => 
            array (
                'key' => 'language3_home5_text17',
                'value' => 'language3_home5_text17',
                'type' => 'kundol_web_setting',
            ),
            497 => 
            array (
                'key' => 'language3_home5_text18',
                'value' => 'language3_home5_text18',
                'type' => 'kundol_web_setting',
            ),
            498 => 
            array (
                'key' => 'language3_home5_text19',
                'value' => 'language3_home5_text19',
                'type' => 'kundol_web_setting',
            ),
            499 => 
            array (
                'key' => 'language3_home5_text20',
                'value' => 'language3_home5_text20',
                'type' => 'kundol_web_setting',
            ),
        ));
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'key' => 'language3_home5_text21',
                'value' => 'language3_home5_text21',
                'type' => 'kundol_web_setting',
            ),
            1 => 
            array (
                'key' => 'language3_home5_text22',
                'value' => 'language3_home5_text22',
                'type' => 'kundol_web_setting',
            ),
            2 => 
            array (
                'key' => 'language3_home5_text23',
                'value' => 'language3_home5_text23',
                'type' => 'kundol_web_setting',
            ),
            3 => 
            array (
                'key' => 'language3_home5_text24',
                'value' => 'language3_home5_text24',
                'type' => 'kundol_web_setting',
            ),
            4 => 
            array (
                'key' => 'language3_home5_text25',
                'value' => 'language3_home5_text25',
                'type' => 'kundol_web_setting',
            ),
            5 => 
            array (
                'key' => 'language3_home5_text26',
                'value' => 'language3_home5_text26',
                'type' => 'kundol_web_setting',
            ),
            6 => 
            array (
                'key' => 'language3_home5_text27',
                'value' => 'language3_home5_text27',
                'type' => 'kundol_web_setting',
            ),
            7 => 
            array (
                'key' => 'language3_home5_text28',
                'value' => 'language3_home5_text28',
                'type' => 'kundol_web_setting',
            ),
            8 => 
            array (
                'key' => 'language3_home5_text29',
                'value' => 'language3_home5_text29',
                'type' => 'kundol_web_setting',
            ),
            9 => 
            array (
                'key' => 'language3_home5_text30',
                'value' => 'language3_home5_text30',
                'type' => 'kundol_web_setting',
            ),
            10 => 
            array (
                'key' => 'language3_home5_text31',
                'value' => 'language3_home5_text31',
                'type' => 'kundol_web_setting',
            ),
            11 => 
            array (
                'key' => 'language3_home5_text32',
                'value' => 'language3_home5_text32',
                'type' => 'kundol_web_setting',
            ),
            12 => 
            array (
                'key' => 'language3_home5_text33',
                'value' => 'language3_home5_text33',
                'type' => 'kundol_web_setting',
            ),
            13 => 
            array (
                'key' => 'language3_home5_text34',
                'value' => 'language3_home5_text34',
                'type' => 'kundol_web_setting',
            ),
            14 => 
            array (
                'key' => 'language3_home5_text35',
                'value' => 'language3_home5_text35',
                'type' => 'kundol_web_setting',
            ),
            15 => 
            array (
                'key' => 'language3_home5_text36',
                'value' => 'language3_home5_text36',
                'type' => 'kundol_web_setting',
            ),
            16 => 
            array (
                'key' => 'language3_home5_text37',
                'value' => 'language3_home5_text37',
                'type' => 'kundol_web_setting',
            ),
            17 => 
            array (
                'key' => 'language3_home5_text38',
                'value' => 'language3_home5_text38',
                'type' => 'kundol_web_setting',
            ),
            18 => 
            array (
                'key' => 'language3_home5_text39',
                'value' => 'language3_home5_text39',
                'type' => 'kundol_web_setting',
            ),
            19 => 
            array (
                'key' => 'language3_home5_text40',
                'value' => 'language3_home5_text40',
                'type' => 'kundol_web_setting',
            ),
            20 => 
            array (
                'key' => 'language3_home5_text41',
                'value' => 'language3_home5_text41',
                'type' => 'kundol_web_setting',
            ),
            21 => 
            array (
                'key' => 'language3_home5_text42',
                'value' => 'language3_home5_text42',
                'type' => 'kundol_web_setting',
            ),
            22 => 
            array (
                'key' => 'language3_home5_text43',
                'value' => 'language3_home5_text43',
                'type' => 'kundol_web_setting',
            ),
            23 => 
            array (
                'key' => 'language3_home5_text44',
                'value' => 'language3_home5_text44',
                'type' => 'kundol_web_setting',
            ),
            24 => 
            array (
                'key' => 'language3_home5_text45',
                'value' => 'language3_home5_text45',
                'type' => 'kundol_web_setting',
            ),
            25 => 
            array (
                'key' => 'language3_home5_text46',
                'value' => 'language3_home5_text46',
                'type' => 'kundol_web_setting',
            ),
            26 => 
            array (
                'key' => 'language3_home5_text47',
                'value' => 'language3_home5_text47',
                'type' => 'kundol_web_setting',
            ),
            27 => 
            array (
                'key' => 'language3_home5_text48',
                'value' => 'language3_home5_text48',
                'type' => 'kundol_web_setting',
            ),
            28 => 
            array (
                'key' => 'language3_home5_text49',
                'value' => 'language3_home5_text49',
                'type' => 'kundol_web_setting',
            ),
            29 => 
            array (
                'key' => 'language3_home5_text50',
                'value' => 'language3_home5_text50',
                'type' => 'kundol_web_setting',
            ),
            30 => 
            array (
                'key' => 'language3_home6_text1',
                'value' => 'language3_home6_text1',
                'type' => 'kundol_web_setting',
            ),
            31 => 
            array (
                'key' => 'language3_home6_text2',
                'value' => 'language3_home6_text2',
                'type' => 'kundol_web_setting',
            ),
            32 => 
            array (
                'key' => 'language3_home6_text3',
                'value' => 'language3_home6_text3',
                'type' => 'kundol_web_setting',
            ),
            33 => 
            array (
                'key' => 'language3_home6_text4',
                'value' => 'language3_home6_text4',
                'type' => 'kundol_web_setting',
            ),
            34 => 
            array (
                'key' => 'language3_home6_text5',
                'value' => 'language3_home6_text5',
                'type' => 'kundol_web_setting',
            ),
            35 => 
            array (
                'key' => 'language3_home6_text6',
                'value' => 'language3_home6_text6',
                'type' => 'kundol_web_setting',
            ),
            36 => 
            array (
                'key' => 'language3_home6_text7',
                'value' => 'language3_home6_text7',
                'type' => 'kundol_web_setting',
            ),
            37 => 
            array (
                'key' => 'language3_home6_text8',
                'value' => 'language3_home6_text8',
                'type' => 'kundol_web_setting',
            ),
            38 => 
            array (
                'key' => 'language3_home6_text9',
                'value' => 'language3_home6_text9',
                'type' => 'kundol_web_setting',
            ),
            39 => 
            array (
                'key' => 'language3_home6_text10',
                'value' => 'language3_home6_text10',
                'type' => 'kundol_web_setting',
            ),
            40 => 
            array (
                'key' => 'language3_home6_text11',
                'value' => 'language3_home6_text11',
                'type' => 'kundol_web_setting',
            ),
            41 => 
            array (
                'key' => 'language3_home6_text12',
                'value' => 'language3_home6_text12',
                'type' => 'kundol_web_setting',
            ),
            42 => 
            array (
                'key' => 'language3_home6_text13',
                'value' => 'language3_home6_text13',
                'type' => 'kundol_web_setting',
            ),
            43 => 
            array (
                'key' => 'language3_home6_text14',
                'value' => 'language3_home6_text14',
                'type' => 'kundol_web_setting',
            ),
            44 => 
            array (
                'key' => 'language3_home6_text15',
                'value' => 'language3_home6_text15',
                'type' => 'kundol_web_setting',
            ),
            45 => 
            array (
                'key' => 'language3_home6_text16',
                'value' => 'language3_home6_text16',
                'type' => 'kundol_web_setting',
            ),
            46 => 
            array (
                'key' => 'language3_home6_text17',
                'value' => 'language3_home6_text17',
                'type' => 'kundol_web_setting',
            ),
            47 => 
            array (
                'key' => 'language3_home6_text18',
                'value' => 'language3_home6_text18',
                'type' => 'kundol_web_setting',
            ),
            48 => 
            array (
                'key' => 'language3_home6_text19',
                'value' => 'language3_home6_text19',
                'type' => 'kundol_web_setting',
            ),
            49 => 
            array (
                'key' => 'language3_home6_text20',
                'value' => 'language3_home6_text20',
                'type' => 'kundol_web_setting',
            ),
            50 => 
            array (
                'key' => 'language3_home7_text1',
                'value' => 'language3_home7_text1',
                'type' => 'kundol_web_setting',
            ),
            51 => 
            array (
                'key' => 'language3_home7_text2',
                'value' => 'language3_home7_text2',
                'type' => 'kundol_web_setting',
            ),
            52 => 
            array (
                'key' => 'language3_home7_text3',
                'value' => 'language3_home7_text3',
                'type' => 'kundol_web_setting',
            ),
            53 => 
            array (
                'key' => 'language3_home7_text4',
                'value' => 'language3_home7_text4',
                'type' => 'kundol_web_setting',
            ),
            54 => 
            array (
                'key' => 'language3_home7_text5',
                'value' => 'language3_home7_text5',
                'type' => 'kundol_web_setting',
            ),
            55 => 
            array (
                'key' => 'language3_home7_text6',
                'value' => 'language3_home7_text6',
                'type' => 'kundol_web_setting',
            ),
            56 => 
            array (
                'key' => 'language3_home7_text7',
                'value' => 'language3_home7_text7',
                'type' => 'kundol_web_setting',
            ),
            57 => 
            array (
                'key' => 'language3_home7_text8',
                'value' => 'language3_home7_text8',
                'type' => 'kundol_web_setting',
            ),
            58 => 
            array (
                'key' => 'language3_home7_text9',
                'value' => 'language3_home7_text9',
                'type' => 'kundol_web_setting',
            ),
            59 => 
            array (
                'key' => 'language3_home7_text10',
                'value' => 'language3_home7_text10',
                'type' => 'kundol_web_setting',
            ),
            60 => 
            array (
                'key' => 'language3_home7_text11',
                'value' => 'language3_home7_text11',
                'type' => 'kundol_web_setting',
            ),
            61 => 
            array (
                'key' => 'language3_home7_text12',
                'value' => 'language3_home7_text12',
                'type' => 'kundol_web_setting',
            ),
            62 => 
            array (
                'key' => 'language3_home7_text13',
                'value' => 'language3_home7_text13',
                'type' => 'kundol_web_setting',
            ),
            63 => 
            array (
                'key' => 'language3_home7_text14',
                'value' => 'language3_home7_text14',
                'type' => 'kundol_web_setting',
            ),
            64 => 
            array (
                'key' => 'language3_home7_text15',
                'value' => 'language3_home7_text15',
                'type' => 'kundol_web_setting',
            ),
            65 => 
            array (
                'key' => 'language3_home7_text16',
                'value' => 'language3_home7_text16',
                'type' => 'kundol_web_setting',
            ),
            66 => 
            array (
                'key' => 'language3_home7_text17',
                'value' => 'language3_home7_text17',
                'type' => 'kundol_web_setting',
            ),
            67 => 
            array (
                'key' => 'language3_home7_text18',
                'value' => 'language3_home7_text18',
                'type' => 'kundol_web_setting',
            ),
            68 => 
            array (
                'key' => 'language3_home7_text19',
                'value' => 'language3_home7_text19',
                'type' => 'kundol_web_setting',
            ),
            69 => 
            array (
                'key' => 'language3_home7_text20',
                'value' => 'language3_home7_text20',
                'type' => 'kundol_web_setting',
            ),
            70 => 
            array (
                'key' => 'language3_home7_text21',
                'value' => 'language3_home7_text21',
                'type' => 'kundol_web_setting',
            ),
            71 => 
            array (
                'key' => 'language3_home7_text22',
                'value' => 'language3_home7_text22',
                'type' => 'kundol_web_setting',
            ),
            72 => 
            array (
                'key' => 'language3_home7_text23',
                'value' => 'language3_home7_text23',
                'type' => 'kundol_web_setting',
            ),
            73 => 
            array (
                'key' => 'language3_home7_text24',
                'value' => 'language3_home7_text24',
                'type' => 'kundol_web_setting',
            ),
            74 => 
            array (
                'key' => 'language3_home7_text25',
                'value' => 'language3_home7_text25',
                'type' => 'kundol_web_setting',
            ),
            75 => 
            array (
                'key' => 'language3_home7_text26',
                'value' => 'language3_home7_text26',
                'type' => 'kundol_web_setting',
            ),
            76 => 
            array (
                'key' => 'language3_home7_text27',
                'value' => 'language3_home7_text27',
                'type' => 'kundol_web_setting',
            ),
            77 => 
            array (
                'key' => 'language3_home7_text28',
                'value' => 'language3_home7_text28',
                'type' => 'kundol_web_setting',
            ),
            78 => 
            array (
                'key' => 'language3_home7_text29',
                'value' => 'language3_home7_text29',
                'type' => 'kundol_web_setting',
            ),
            79 => 
            array (
                'key' => 'language3_home7_text30',
                'value' => 'language3_home7_text30',
                'type' => 'kundol_web_setting',
            ),
            80 => 
            array (
                'key' => 'language3_home8_text1',
                'value' => 'language3_home8_text1',
                'type' => 'kundol_web_setting',
            ),
            81 => 
            array (
                'key' => 'language3_home8_text2',
                'value' => 'language3_home8_text2',
                'type' => 'kundol_web_setting',
            ),
            82 => 
            array (
                'key' => 'language3_home8_text3',
                'value' => 'language3_home8_text3',
                'type' => 'kundol_web_setting',
            ),
            83 => 
            array (
                'key' => 'language3_home8_text4',
                'value' => 'language3_home8_text4',
                'type' => 'kundol_web_setting',
            ),
            84 => 
            array (
                'key' => 'language3_home8_text5',
                'value' => 'language3_home8_text5',
                'type' => 'kundol_web_setting',
            ),
            85 => 
            array (
                'key' => 'language3_home8_text6',
                'value' => 'language3_home8_text6',
                'type' => 'kundol_web_setting',
            ),
            86 => 
            array (
                'key' => 'language3_home8_text7',
                'value' => 'language3_home8_text7',
                'type' => 'kundol_web_setting',
            ),
            87 => 
            array (
                'key' => 'language3_home8_text8',
                'value' => 'language3_home8_text8',
                'type' => 'kundol_web_setting',
            ),
            88 => 
            array (
                'key' => 'language3_home8_text9',
                'value' => 'language3_home8_text9',
                'type' => 'kundol_web_setting',
            ),
            89 => 
            array (
                'key' => 'language3_home8_text10',
                'value' => 'language3_home8_text10',
                'type' => 'kundol_web_setting',
            ),
            90 => 
            array (
                'key' => 'language3_home8_text11',
                'value' => 'language3_home8_text11',
                'type' => 'kundol_web_setting',
            ),
            91 => 
            array (
                'key' => 'language3_home8_text12',
                'value' => 'language3_home8_text12',
                'type' => 'kundol_web_setting',
            ),
            92 => 
            array (
                'key' => 'language3_home8_text13',
                'value' => 'language3_home8_text13',
                'type' => 'kundol_web_setting',
            ),
            93 => 
            array (
                'key' => 'language3_home8_text14',
                'value' => 'language3_home8_text14',
                'type' => 'kundol_web_setting',
            ),
            94 => 
            array (
                'key' => 'language3_home8_text15',
                'value' => 'language3_home8_text15',
                'type' => 'kundol_web_setting',
            ),
            95 => 
            array (
                'key' => 'language3_home8_text16',
                'value' => 'language3_home8_text16',
                'type' => 'kundol_web_setting',
            ),
            96 => 
            array (
                'key' => 'language3_home8_text17',
                'value' => 'language3_home8_text17',
                'type' => 'kundol_web_setting',
            ),
            97 => 
            array (
                'key' => 'language3_home8_text18',
                'value' => 'language3_home8_text18',
                'type' => 'kundol_web_setting',
            ),
            98 => 
            array (
                'key' => 'language3_home8_text19',
                'value' => 'language3_home8_text19',
                'type' => 'kundol_web_setting',
            ),
            99 => 
            array (
                'key' => 'language3_home8_text20',
                'value' => 'language3_home8_text20',
                'type' => 'kundol_web_setting',
            ),
            100 => 
            array (
                'key' => 'language3_home8_text21',
                'value' => 'language3_home8_text21',
                'type' => 'kundol_web_setting',
            ),
            101 => 
            array (
                'key' => 'language3_home8_text22',
                'value' => 'language3_home8_text22',
                'type' => 'kundol_web_setting',
            ),
            102 => 
            array (
                'key' => 'language3_home8_text23',
                'value' => 'language3_home8_text23',
                'type' => 'kundol_web_setting',
            ),
            103 => 
            array (
                'key' => 'language3_home8_text24',
                'value' => 'language3_home8_text24',
                'type' => 'kundol_web_setting',
            ),
            104 => 
            array (
                'key' => 'language3_home8_text25',
                'value' => 'language3_home8_text25',
                'type' => 'kundol_web_setting',
            ),
            105 => 
            array (
                'key' => 'language3_home8_text26',
                'value' => 'language3_home8_text26',
                'type' => 'kundol_web_setting',
            ),
            106 => 
            array (
                'key' => 'language3_home8_text27',
                'value' => 'language3_home8_text27',
                'type' => 'kundol_web_setting',
            ),
            107 => 
            array (
                'key' => 'language3_home8_text28',
                'value' => 'language3_home8_text28',
                'type' => 'kundol_web_setting',
            ),
            108 => 
            array (
                'key' => 'language3_home8_text29',
                'value' => 'language3_home8_text29',
                'type' => 'kundol_web_setting',
            ),
            109 => 
            array (
                'key' => 'language3_home8_text30',
                'value' => 'language3_home8_text30',
                'type' => 'kundol_web_setting',
            ),
            110 => 
            array (
                'key' => 'language3_home9_text1',
                'value' => 'language3_home9_text1',
                'type' => 'kundol_web_setting',
            ),
            111 => 
            array (
                'key' => 'language3_home9_text2',
                'value' => 'language3_home9_text2',
                'type' => 'kundol_web_setting',
            ),
            112 => 
            array (
                'key' => 'language3_home9_text3',
                'value' => 'language3_home9_text3',
                'type' => 'kundol_web_setting',
            ),
            113 => 
            array (
                'key' => 'language3_home9_text4',
                'value' => 'language3_home9_text4',
                'type' => 'kundol_web_setting',
            ),
            114 => 
            array (
                'key' => 'language3_home9_text5',
                'value' => 'language3_home9_text5',
                'type' => 'kundol_web_setting',
            ),
            115 => 
            array (
                'key' => 'language3_home9_text6',
                'value' => 'language3_home9_text6',
                'type' => 'kundol_web_setting',
            ),
            116 => 
            array (
                'key' => 'language3_home9_text7',
                'value' => 'language3_home9_text7',
                'type' => 'kundol_web_setting',
            ),
            117 => 
            array (
                'key' => 'language3_home9_text8',
                'value' => 'language3_home9_text8',
                'type' => 'kundol_web_setting',
            ),
            118 => 
            array (
                'key' => 'language3_home9_text9',
                'value' => 'language3_home9_text9',
                'type' => 'kundol_web_setting',
            ),
            119 => 
            array (
                'key' => 'language3_home9_text10',
                'value' => 'language3_home9_text10',
                'type' => 'kundol_web_setting',
            ),
            120 => 
            array (
                'key' => 'language3_home9_text11',
                'value' => 'language3_home9_text11',
                'type' => 'kundol_web_setting',
            ),
            121 => 
            array (
                'key' => 'language3_home9_text12',
                'value' => 'language3_home9_text12',
                'type' => 'kundol_web_setting',
            ),
            122 => 
            array (
                'key' => 'language3_home9_text13',
                'value' => 'language3_home9_text13',
                'type' => 'kundol_web_setting',
            ),
            123 => 
            array (
                'key' => 'language3_home9_text14',
                'value' => 'language3_home9_text14',
                'type' => 'kundol_web_setting',
            ),
            124 => 
            array (
                'key' => 'language3_home9_text15',
                'value' => 'language3_home9_text15',
                'type' => 'kundol_web_setting',
            ),
            125 => 
            array (
                'key' => 'language3_home9_text16',
                'value' => 'language3_home9_text16',
                'type' => 'kundol_web_setting',
            ),
            126 => 
            array (
                'key' => 'language3_home9_text17',
                'value' => 'language3_home9_text17',
                'type' => 'kundol_web_setting',
            ),
            127 => 
            array (
                'key' => 'language3_home9_text18',
                'value' => 'language3_home9_text18',
                'type' => 'kundol_web_setting',
            ),
            128 => 
            array (
                'key' => 'language3_home9_text19',
                'value' => 'language3_home9_text19',
                'type' => 'kundol_web_setting',
            ),
            129 => 
            array (
                'key' => 'language3_home9_text20',
                'value' => 'language3_home9_text20',
                'type' => 'kundol_web_setting',
            ),
            130 => 
            array (
                'key' => 'language3_home9_text21',
                'value' => 'language3_home9_text21',
                'type' => 'kundol_web_setting',
            ),
            131 => 
            array (
                'key' => 'language3_home9_text22',
                'value' => 'language3_home9_text22',
                'type' => 'kundol_web_setting',
            ),
            132 => 
            array (
                'key' => 'language3_home9_text23',
                'value' => 'language3_home9_text23',
                'type' => 'kundol_web_setting',
            ),
            133 => 
            array (
                'key' => 'language3_home9_text24',
                'value' => 'language3_home9_text24',
                'type' => 'kundol_web_setting',
            ),
            134 => 
            array (
                'key' => 'language3_home9_text25',
                'value' => 'language3_home9_text25',
                'type' => 'kundol_web_setting',
            ),
            135 => 
            array (
                'key' => 'language3_home9_text26',
                'value' => 'language3_home9_text26',
                'type' => 'kundol_web_setting',
            ),
            136 => 
            array (
                'key' => 'language3_home9_text27',
                'value' => 'language3_home9_text27',
                'type' => 'kundol_web_setting',
            ),
            137 => 
            array (
                'key' => 'language3_home9_text28',
                'value' => 'language3_home9_text28',
                'type' => 'kundol_web_setting',
            ),
            138 => 
            array (
                'key' => 'language3_home9_text29',
                'value' => 'language3_home9_text29',
                'type' => 'kundol_web_setting',
            ),
            139 => 
            array (
                'key' => 'language3_home9_text30',
                'value' => 'language3_home9_text30',
                'type' => 'kundol_web_setting',
            ),
            140 => 
            array (
                'key' => 'language3_home9_text31',
                'value' => 'language3_home9_text31',
                'type' => 'kundol_web_setting',
            ),
            141 => 
            array (
                'key' => 'language3_home9_text32',
                'value' => 'language3_home9_text32',
                'type' => 'kundol_web_setting',
            ),
            142 => 
            array (
                'key' => 'language3_home9_text33',
                'value' => 'language3_home9_text33',
                'type' => 'kundol_web_setting',
            ),
            143 => 
            array (
                'key' => 'language3_home9_text34',
                'value' => 'language3_home9_text34',
                'type' => 'kundol_web_setting',
            ),
            144 => 
            array (
                'key' => 'language3_home9_text35',
                'value' => 'language3_home9_text35',
                'type' => 'kundol_web_setting',
            ),
            145 => 
            array (
                'key' => 'language3_home9_text36',
                'value' => 'language3_home9_text36',
                'type' => 'kundol_web_setting',
            ),
            146 => 
            array (
                'key' => 'language3_home9_text37',
                'value' => 'language3_home9_text37',
                'type' => 'kundol_web_setting',
            ),
            147 => 
            array (
                'key' => 'language3_home9_text38',
                'value' => 'language3_home9_text38',
                'type' => 'kundol_web_setting',
            ),
            148 => 
            array (
                'key' => 'language3_home9_text39',
                'value' => 'language3_home9_text39',
                'type' => 'kundol_web_setting',
            ),
            149 => 
            array (
                'key' => 'language3_home9_text40',
                'value' => 'language3_home9_text40',
                'type' => 'kundol_web_setting',
            ),
            150 => 
            array (
                'key' => 'language3_home9_text41',
                'value' => 'language3_home9_text41',
                'type' => 'kundol_web_setting',
            ),
            151 => 
            array (
                'key' => 'language3_home9_text42',
                'value' => 'language3_home9_text42',
                'type' => 'kundol_web_setting',
            ),
            152 => 
            array (
                'key' => 'language3_home9_text43',
                'value' => 'language3_home9_text43',
                'type' => 'kundol_web_setting',
            ),
            153 => 
            array (
                'key' => 'language3_home9_text44',
                'value' => 'language3_home9_text44',
                'type' => 'kundol_web_setting',
            ),
            154 => 
            array (
                'key' => 'language3_home9_text45',
                'value' => 'language3_home9_text45',
                'type' => 'kundol_web_setting',
            ),
            155 => 
            array (
                'key' => 'language3_home9_text46',
                'value' => 'language3_home9_text46',
                'type' => 'kundol_web_setting',
            ),
            156 => 
            array (
                'key' => 'language3_home9_text47',
                'value' => 'language3_home9_text47',
                'type' => 'kundol_web_setting',
            ),
            157 => 
            array (
                'key' => 'language3_home9_text48',
                'value' => 'language3_home9_text48',
                'type' => 'kundol_web_setting',
            ),
            158 => 
            array (
                'key' => 'language3_home9_text49',
                'value' => 'language3_home9_text49',
                'type' => 'kundol_web_setting',
            ),
            159 => 
            array (
                'key' => 'language3_home9_text50',
                'value' => 'language3_home9_text50',
                'type' => 'kundol_web_setting',
            ),
            160 => 
            array (
                'key' => 'language4_home1_text1',
                'value' => 'language4_home1_text1',
                'type' => 'kundol_web_setting',
            ),
            161 => 
            array (
                'key' => 'language4_home1_text2',
                'value' => 'language4_home1_text2',
                'type' => 'kundol_web_setting',
            ),
            162 => 
            array (
                'key' => 'language4_home1_text3',
                'value' => 'language4_home1_text3',
                'type' => 'kundol_web_setting',
            ),
            163 => 
            array (
                'key' => 'language4_home1_text4',
                'value' => 'language4_home1_text4',
                'type' => 'kundol_web_setting',
            ),
            164 => 
            array (
                'key' => 'language4_home1_text5',
                'value' => 'language4_home1_text5',
                'type' => 'kundol_web_setting',
            ),
            165 => 
            array (
                'key' => 'language4_home1_text6',
                'value' => 'language4_home1_text6',
                'type' => 'kundol_web_setting',
            ),
            166 => 
            array (
                'key' => 'language4_home1_text7',
                'value' => 'language4_home1_text7',
                'type' => 'kundol_web_setting',
            ),
            167 => 
            array (
                'key' => 'language4_home1_text8',
                'value' => 'language4_home1_text8',
                'type' => 'kundol_web_setting',
            ),
            168 => 
            array (
                'key' => 'language4_home1_text9',
                'value' => 'language4_home1_text9',
                'type' => 'kundol_web_setting',
            ),
            169 => 
            array (
                'key' => 'language4_home1_text10',
                'value' => 'language4_home1_text10',
                'type' => 'kundol_web_setting',
            ),
            170 => 
            array (
                'key' => 'language4_home1_text11',
                'value' => 'language4_home1_text11',
                'type' => 'kundol_web_setting',
            ),
            171 => 
            array (
                'key' => 'language4_home1_text12',
                'value' => 'language4_home1_text12',
                'type' => 'kundol_web_setting',
            ),
            172 => 
            array (
                'key' => 'language4_home1_text13',
                'value' => 'language4_home1_text13',
                'type' => 'kundol_web_setting',
            ),
            173 => 
            array (
                'key' => 'language4_home1_text14',
                'value' => 'language4_home1_text14',
                'type' => 'kundol_web_setting',
            ),
            174 => 
            array (
                'key' => 'language4_home1_text15',
                'value' => 'language4_home1_text15',
                'type' => 'kundol_web_setting',
            ),
            175 => 
            array (
                'key' => 'language4_home1_text16',
                'value' => 'language4_home1_text16',
                'type' => 'kundol_web_setting',
            ),
            176 => 
            array (
                'key' => 'language4_home1_text17',
                'value' => 'language4_home1_text17',
                'type' => 'kundol_web_setting',
            ),
            177 => 
            array (
                'key' => 'language4_home1_text18',
                'value' => 'language4_home1_text18',
                'type' => 'kundol_web_setting',
            ),
            178 => 
            array (
                'key' => 'language4_home1_text19',
                'value' => 'language4_home1_text19',
                'type' => 'kundol_web_setting',
            ),
            179 => 
            array (
                'key' => 'language4_home1_text20',
                'value' => 'language4_home1_text20',
                'type' => 'kundol_web_setting',
            ),
            180 => 
            array (
                'key' => 'language4_home1_text21',
                'value' => 'language4_home1_text21',
                'type' => 'kundol_web_setting',
            ),
            181 => 
            array (
                'key' => 'language4_home1_text22',
                'value' => 'language4_home1_text22',
                'type' => 'kundol_web_setting',
            ),
            182 => 
            array (
                'key' => 'language4_home1_text23',
                'value' => 'language4_home1_text23',
                'type' => 'kundol_web_setting',
            ),
            183 => 
            array (
                'key' => 'language4_home1_text24',
                'value' => 'language4_home1_text24',
                'type' => 'kundol_web_setting',
            ),
            184 => 
            array (
                'key' => 'language4_home1_text25',
                'value' => 'language4_home1_text25',
                'type' => 'kundol_web_setting',
            ),
            185 => 
            array (
                'key' => 'language4_home1_text26',
                'value' => 'language4_home1_text26',
                'type' => 'kundol_web_setting',
            ),
            186 => 
            array (
                'key' => 'language4_home1_text27',
                'value' => 'language4_home1_text27',
                'type' => 'kundol_web_setting',
            ),
            187 => 
            array (
                'key' => 'language4_home1_text28',
                'value' => 'language4_home1_text28',
                'type' => 'kundol_web_setting',
            ),
            188 => 
            array (
                'key' => 'language4_home1_text29',
                'value' => 'language4_home1_text29',
                'type' => 'kundol_web_setting',
            ),
            189 => 
            array (
                'key' => 'language4_home1_text30',
                'value' => 'language4_home1_text30',
                'type' => 'kundol_web_setting',
            ),
            190 => 
            array (
                'key' => 'language4_home2_text1',
                'value' => 'language4_home2_text1',
                'type' => 'kundol_web_setting',
            ),
            191 => 
            array (
                'key' => 'language4_home2_text2',
                'value' => 'language4_home2_text2',
                'type' => 'kundol_web_setting',
            ),
            192 => 
            array (
                'key' => 'language4_home2_text3',
                'value' => 'language4_home2_text3',
                'type' => 'kundol_web_setting',
            ),
            193 => 
            array (
                'key' => 'language4_home2_text4',
                'value' => 'language4_home2_text4',
                'type' => 'kundol_web_setting',
            ),
            194 => 
            array (
                'key' => 'language4_home2_text5',
                'value' => 'language4_home2_text5',
                'type' => 'kundol_web_setting',
            ),
            195 => 
            array (
                'key' => 'language4_home2_text6',
                'value' => 'language4_home2_text6',
                'type' => 'kundol_web_setting',
            ),
            196 => 
            array (
                'key' => 'language4_home2_text7',
                'value' => 'language4_home2_text7',
                'type' => 'kundol_web_setting',
            ),
            197 => 
            array (
                'key' => 'language4_home2_text8',
                'value' => 'language4_home2_text8',
                'type' => 'kundol_web_setting',
            ),
            198 => 
            array (
                'key' => 'language4_home2_text9',
                'value' => 'language4_home2_text9',
                'type' => 'kundol_web_setting',
            ),
            199 => 
            array (
                'key' => 'language4_home2_text10',
                'value' => 'language4_home2_text10',
                'type' => 'kundol_web_setting',
            ),
            200 => 
            array (
                'key' => 'language4_home2_text11',
                'value' => 'language4_home2_text11',
                'type' => 'kundol_web_setting',
            ),
            201 => 
            array (
                'key' => 'language4_home2_text12',
                'value' => 'language4_home2_text12',
                'type' => 'kundol_web_setting',
            ),
            202 => 
            array (
                'key' => 'language4_home2_text13',
                'value' => 'language4_home2_text13',
                'type' => 'kundol_web_setting',
            ),
            203 => 
            array (
                'key' => 'language4_home2_text14',
                'value' => 'language4_home2_text14',
                'type' => 'kundol_web_setting',
            ),
            204 => 
            array (
                'key' => 'language4_home2_text15',
                'value' => 'language4_home2_text15',
                'type' => 'kundol_web_setting',
            ),
            205 => 
            array (
                'key' => 'language4_home2_text16',
                'value' => 'language4_home2_text16',
                'type' => 'kundol_web_setting',
            ),
            206 => 
            array (
                'key' => 'language4_home2_text17',
                'value' => 'language4_home2_text17',
                'type' => 'kundol_web_setting',
            ),
            207 => 
            array (
                'key' => 'language4_home2_text18',
                'value' => 'language4_home2_text18',
                'type' => 'kundol_web_setting',
            ),
            208 => 
            array (
                'key' => 'language4_home2_text19',
                'value' => 'language4_home2_text19',
                'type' => 'kundol_web_setting',
            ),
            209 => 
            array (
                'key' => 'language4_home2_text20',
                'value' => 'language4_home2_text20',
                'type' => 'kundol_web_setting',
            ),
            210 => 
            array (
                'key' => 'language4_home2_text21',
                'value' => 'language4_home2_text21',
                'type' => 'kundol_web_setting',
            ),
            211 => 
            array (
                'key' => 'language4_home2_text22',
                'value' => 'language4_home2_text22',
                'type' => 'kundol_web_setting',
            ),
            212 => 
            array (
                'key' => 'language4_home2_text23',
                'value' => 'language4_home2_text23',
                'type' => 'kundol_web_setting',
            ),
            213 => 
            array (
                'key' => 'language4_home2_text24',
                'value' => 'language4_home2_text24',
                'type' => 'kundol_web_setting',
            ),
            214 => 
            array (
                'key' => 'language4_home2_text25',
                'value' => 'language4_home2_text25',
                'type' => 'kundol_web_setting',
            ),
            215 => 
            array (
                'key' => 'language4_home2_text26',
                'value' => 'language4_home2_text26',
                'type' => 'kundol_web_setting',
            ),
            216 => 
            array (
                'key' => 'language4_home2_text27',
                'value' => 'language4_home2_text27',
                'type' => 'kundol_web_setting',
            ),
            217 => 
            array (
                'key' => 'language4_home2_text28',
                'value' => 'language4_home2_text28',
                'type' => 'kundol_web_setting',
            ),
            218 => 
            array (
                'key' => 'language4_home2_text29',
                'value' => 'language4_home2_text29',
                'type' => 'kundol_web_setting',
            ),
            219 => 
            array (
                'key' => 'language4_home2_text30',
                'value' => 'language4_home2_text30',
                'type' => 'kundol_web_setting',
            ),
            220 => 
            array (
                'key' => 'language4_home3_text1',
                'value' => 'language4_home3_text1',
                'type' => 'kundol_web_setting',
            ),
            221 => 
            array (
                'key' => 'language4_home3_text2',
                'value' => 'language4_home3_text2',
                'type' => 'kundol_web_setting',
            ),
            222 => 
            array (
                'key' => 'language4_home3_text3',
                'value' => 'language4_home3_text3',
                'type' => 'kundol_web_setting',
            ),
            223 => 
            array (
                'key' => 'language4_home3_text4',
                'value' => 'language4_home3_text4',
                'type' => 'kundol_web_setting',
            ),
            224 => 
            array (
                'key' => 'language4_home3_text5',
                'value' => 'language4_home3_text5',
                'type' => 'kundol_web_setting',
            ),
            225 => 
            array (
                'key' => 'language4_home3_text6',
                'value' => 'language4_home3_text6',
                'type' => 'kundol_web_setting',
            ),
            226 => 
            array (
                'key' => 'language4_home3_text7',
                'value' => 'language4_home3_text7',
                'type' => 'kundol_web_setting',
            ),
            227 => 
            array (
                'key' => 'language4_home3_text8',
                'value' => 'language4_home3_text8',
                'type' => 'kundol_web_setting',
            ),
            228 => 
            array (
                'key' => 'language4_home3_text9',
                'value' => 'language4_home3_text9',
                'type' => 'kundol_web_setting',
            ),
            229 => 
            array (
                'key' => 'language4_home3_text10',
                'value' => 'language4_home3_text10',
                'type' => 'kundol_web_setting',
            ),
            230 => 
            array (
                'key' => 'language4_home3_text11',
                'value' => 'language4_home3_text11',
                'type' => 'kundol_web_setting',
            ),
            231 => 
            array (
                'key' => 'language4_home3_text12',
                'value' => 'language4_home3_text12',
                'type' => 'kundol_web_setting',
            ),
            232 => 
            array (
                'key' => 'language4_home3_text13',
                'value' => 'language4_home3_text13',
                'type' => 'kundol_web_setting',
            ),
            233 => 
            array (
                'key' => 'language4_home3_text14',
                'value' => 'language4_home3_text14',
                'type' => 'kundol_web_setting',
            ),
            234 => 
            array (
                'key' => 'language4_home3_text15',
                'value' => 'language4_home3_text15',
                'type' => 'kundol_web_setting',
            ),
            235 => 
            array (
                'key' => 'language4_home3_text16',
                'value' => 'language4_home3_text16',
                'type' => 'kundol_web_setting',
            ),
            236 => 
            array (
                'key' => 'language4_home3_text17',
                'value' => 'language4_home3_text17',
                'type' => 'kundol_web_setting',
            ),
            237 => 
            array (
                'key' => 'language4_home3_text18',
                'value' => 'language4_home3_text18',
                'type' => 'kundol_web_setting',
            ),
            238 => 
            array (
                'key' => 'language4_home3_text19',
                'value' => 'language4_home3_text19',
                'type' => 'kundol_web_setting',
            ),
            239 => 
            array (
                'key' => 'language4_home3_text20',
                'value' => 'language4_home3_text20',
                'type' => 'kundol_web_setting',
            ),
            240 => 
            array (
                'key' => 'language4_home3_text21',
                'value' => 'language4_home3_text21',
                'type' => 'kundol_web_setting',
            ),
            241 => 
            array (
                'key' => 'language4_home3_text22',
                'value' => 'language4_home3_text22',
                'type' => 'kundol_web_setting',
            ),
            242 => 
            array (
                'key' => 'language4_home3_text23',
                'value' => 'language4_home3_text23',
                'type' => 'kundol_web_setting',
            ),
            243 => 
            array (
                'key' => 'language4_home3_text24',
                'value' => 'language4_home3_text24',
                'type' => 'kundol_web_setting',
            ),
            244 => 
            array (
                'key' => 'language4_home3_text25',
                'value' => 'language4_home3_text25',
                'type' => 'kundol_web_setting',
            ),
            245 => 
            array (
                'key' => 'language4_home3_text26',
                'value' => 'language4_home3_text26',
                'type' => 'kundol_web_setting',
            ),
            246 => 
            array (
                'key' => 'language4_home3_text27',
                'value' => 'language4_home3_text27',
                'type' => 'kundol_web_setting',
            ),
            247 => 
            array (
                'key' => 'language4_home3_text28',
                'value' => 'language4_home3_text28',
                'type' => 'kundol_web_setting',
            ),
            248 => 
            array (
                'key' => 'language4_home3_text29',
                'value' => 'language4_home3_text29',
                'type' => 'kundol_web_setting',
            ),
            249 => 
            array (
                'key' => 'language4_home3_text30',
                'value' => 'language4_home3_text30',
                'type' => 'kundol_web_setting',
            ),
            250 => 
            array (
                'key' => 'language4_home4_text1',
                'value' => 'language4_home4_text1',
                'type' => 'kundol_web_setting',
            ),
            251 => 
            array (
                'key' => 'language4_home4_text2',
                'value' => 'language4_home4_text2',
                'type' => 'kundol_web_setting',
            ),
            252 => 
            array (
                'key' => 'language4_home4_text3',
                'value' => 'language4_home4_text3',
                'type' => 'kundol_web_setting',
            ),
            253 => 
            array (
                'key' => 'language4_home4_text4',
                'value' => 'language4_home4_text4',
                'type' => 'kundol_web_setting',
            ),
            254 => 
            array (
                'key' => 'language4_home4_text5',
                'value' => 'language4_home4_text5',
                'type' => 'kundol_web_setting',
            ),
            255 => 
            array (
                'key' => 'language4_home4_text6',
                'value' => 'language4_home4_text6',
                'type' => 'kundol_web_setting',
            ),
            256 => 
            array (
                'key' => 'language4_home4_text7',
                'value' => 'language4_home4_text7',
                'type' => 'kundol_web_setting',
            ),
            257 => 
            array (
                'key' => 'language4_home4_text8',
                'value' => 'language4_home4_text8',
                'type' => 'kundol_web_setting',
            ),
            258 => 
            array (
                'key' => 'language4_home4_text9',
                'value' => 'language4_home4_text9',
                'type' => 'kundol_web_setting',
            ),
            259 => 
            array (
                'key' => 'language4_home4_text10',
                'value' => 'language4_home4_text10',
                'type' => 'kundol_web_setting',
            ),
            260 => 
            array (
                'key' => 'language4_home4_text11',
                'value' => 'language4_home4_text11',
                'type' => 'kundol_web_setting',
            ),
            261 => 
            array (
                'key' => 'language4_home4_text12',
                'value' => 'language4_home4_text12',
                'type' => 'kundol_web_setting',
            ),
            262 => 
            array (
                'key' => 'language4_home4_text13',
                'value' => 'language4_home4_text13',
                'type' => 'kundol_web_setting',
            ),
            263 => 
            array (
                'key' => 'language4_home4_text14',
                'value' => 'language4_home4_text14',
                'type' => 'kundol_web_setting',
            ),
            264 => 
            array (
                'key' => 'language4_home4_text15',
                'value' => 'language4_home4_text15',
                'type' => 'kundol_web_setting',
            ),
            265 => 
            array (
                'key' => 'language4_home4_text16',
                'value' => 'language4_home4_text16',
                'type' => 'kundol_web_setting',
            ),
            266 => 
            array (
                'key' => 'language4_home4_text17',
                'value' => 'language4_home4_text17',
                'type' => 'kundol_web_setting',
            ),
            267 => 
            array (
                'key' => 'language4_home4_text18',
                'value' => 'language4_home4_text18',
                'type' => 'kundol_web_setting',
            ),
            268 => 
            array (
                'key' => 'language4_home4_text19',
                'value' => 'language4_home4_text19',
                'type' => 'kundol_web_setting',
            ),
            269 => 
            array (
                'key' => 'language4_home4_text20',
                'value' => 'language4_home4_text20',
                'type' => 'kundol_web_setting',
            ),
            270 => 
            array (
                'key' => 'language4_home4_text21',
                'value' => 'language4_home4_text21',
                'type' => 'kundol_web_setting',
            ),
            271 => 
            array (
                'key' => 'language4_home4_text22',
                'value' => 'language4_home4_text22',
                'type' => 'kundol_web_setting',
            ),
            272 => 
            array (
                'key' => 'language4_home4_text23',
                'value' => 'language4_home4_text23',
                'type' => 'kundol_web_setting',
            ),
            273 => 
            array (
                'key' => 'language4_home4_text24',
                'value' => 'language4_home4_text24',
                'type' => 'kundol_web_setting',
            ),
            274 => 
            array (
                'key' => 'language4_home4_text25',
                'value' => 'language4_home4_text25',
                'type' => 'kundol_web_setting',
            ),
            275 => 
            array (
                'key' => 'language4_home4_text26',
                'value' => 'language4_home4_text26',
                'type' => 'kundol_web_setting',
            ),
            276 => 
            array (
                'key' => 'language4_home4_text27',
                'value' => 'language4_home4_text27',
                'type' => 'kundol_web_setting',
            ),
            277 => 
            array (
                'key' => 'language4_home4_text28',
                'value' => 'language4_home4_text28',
                'type' => 'kundol_web_setting',
            ),
            278 => 
            array (
                'key' => 'language4_home4_text29',
                'value' => 'language4_home4_text29',
                'type' => 'kundol_web_setting',
            ),
            279 => 
            array (
                'key' => 'language4_home4_text30',
                'value' => 'language4_home4_text30',
                'type' => 'kundol_web_setting',
            ),
            280 => 
            array (
                'key' => 'language4_home4_text31',
                'value' => 'language4_home4_text31',
                'type' => 'kundol_web_setting',
            ),
            281 => 
            array (
                'key' => 'language4_home4_text32',
                'value' => 'language4_home4_text32',
                'type' => 'kundol_web_setting',
            ),
            282 => 
            array (
                'key' => 'language4_home4_text33',
                'value' => 'language4_home4_text33',
                'type' => 'kundol_web_setting',
            ),
            283 => 
            array (
                'key' => 'language4_home4_text34',
                'value' => 'language4_home4_text34',
                'type' => 'kundol_web_setting',
            ),
            284 => 
            array (
                'key' => 'language4_home4_text35',
                'value' => 'language4_home4_text35',
                'type' => 'kundol_web_setting',
            ),
            285 => 
            array (
                'key' => 'language4_home4_text36',
                'value' => 'language4_home4_text36',
                'type' => 'kundol_web_setting',
            ),
            286 => 
            array (
                'key' => 'language4_home4_text37',
                'value' => 'language4_home4_text37',
                'type' => 'kundol_web_setting',
            ),
            287 => 
            array (
                'key' => 'language4_home4_text38',
                'value' => 'language4_home4_text38',
                'type' => 'kundol_web_setting',
            ),
            288 => 
            array (
                'key' => 'language4_home4_text39',
                'value' => 'language4_home4_text39',
                'type' => 'kundol_web_setting',
            ),
            289 => 
            array (
                'key' => 'language4_home4_text40',
                'value' => 'language4_home4_text40',
                'type' => 'kundol_web_setting',
            ),
            290 => 
            array (
                'key' => 'language4_home4_text41',
                'value' => 'language4_home4_text41',
                'type' => 'kundol_web_setting',
            ),
            291 => 
            array (
                'key' => 'language4_home4_text42',
                'value' => 'language4_home4_text42',
                'type' => 'kundol_web_setting',
            ),
            292 => 
            array (
                'key' => 'language4_home4_text43',
                'value' => 'language4_home4_text43',
                'type' => 'kundol_web_setting',
            ),
            293 => 
            array (
                'key' => 'language4_home4_text44',
                'value' => 'language4_home4_text44',
                'type' => 'kundol_web_setting',
            ),
            294 => 
            array (
                'key' => 'language4_home4_text45',
                'value' => 'language4_home4_text45',
                'type' => 'kundol_web_setting',
            ),
            295 => 
            array (
                'key' => 'language4_home4_text46',
                'value' => 'language4_home4_text46',
                'type' => 'kundol_web_setting',
            ),
            296 => 
            array (
                'key' => 'language4_home4_text47',
                'value' => 'language4_home4_text47',
                'type' => 'kundol_web_setting',
            ),
            297 => 
            array (
                'key' => 'language4_home4_text48',
                'value' => 'language4_home4_text48',
                'type' => 'kundol_web_setting',
            ),
            298 => 
            array (
                'key' => 'language4_home4_text49',
                'value' => 'language4_home4_text49',
                'type' => 'kundol_web_setting',
            ),
            299 => 
            array (
                'key' => 'language4_home4_text50',
                'value' => 'language4_home4_text50',
                'type' => 'kundol_web_setting',
            ),
            300 => 
            array (
                'key' => 'language4_home4_text51',
                'value' => 'language4_home4_text51',
                'type' => 'kundol_web_setting',
            ),
            301 => 
            array (
                'key' => 'language4_home4_text52',
                'value' => 'language4_home4_text52',
                'type' => 'kundol_web_setting',
            ),
            302 => 
            array (
                'key' => 'language4_home4_text53',
                'value' => 'language4_home4_text53',
                'type' => 'kundol_web_setting',
            ),
            303 => 
            array (
                'key' => 'language4_home4_text54',
                'value' => 'language4_home4_text54',
                'type' => 'kundol_web_setting',
            ),
            304 => 
            array (
                'key' => 'language4_home4_text55',
                'value' => 'language4_home4_text55',
                'type' => 'kundol_web_setting',
            ),
            305 => 
            array (
                'key' => 'language4_home4_text56',
                'value' => 'language4_home4_text56',
                'type' => 'kundol_web_setting',
            ),
            306 => 
            array (
                'key' => 'language4_home4_text57',
                'value' => 'language4_home4_text57',
                'type' => 'kundol_web_setting',
            ),
            307 => 
            array (
                'key' => 'language4_home4_text58',
                'value' => 'language4_home4_text58',
                'type' => 'kundol_web_setting',
            ),
            308 => 
            array (
                'key' => 'language4_home4_text59',
                'value' => 'language4_home4_text59',
                'type' => 'kundol_web_setting',
            ),
            309 => 
            array (
                'key' => 'language4_home4_text60',
                'value' => 'language4_home4_text60',
                'type' => 'kundol_web_setting',
            ),
            310 => 
            array (
                'key' => 'language4_home5_text1',
                'value' => 'language4_home5_text1',
                'type' => 'kundol_web_setting',
            ),
            311 => 
            array (
                'key' => 'language4_home5_text2',
                'value' => 'language4_home5_text2',
                'type' => 'kundol_web_setting',
            ),
            312 => 
            array (
                'key' => 'language4_home5_text3',
                'value' => 'language4_home5_text3',
                'type' => 'kundol_web_setting',
            ),
            313 => 
            array (
                'key' => 'language4_home5_text4',
                'value' => 'language4_home5_text4',
                'type' => 'kundol_web_setting',
            ),
            314 => 
            array (
                'key' => 'language4_home5_text5',
                'value' => 'language4_home5_text5',
                'type' => 'kundol_web_setting',
            ),
            315 => 
            array (
                'key' => 'language4_home5_text6',
                'value' => 'language4_home5_text6',
                'type' => 'kundol_web_setting',
            ),
            316 => 
            array (
                'key' => 'language4_home5_text7',
                'value' => 'language4_home5_text7',
                'type' => 'kundol_web_setting',
            ),
            317 => 
            array (
                'key' => 'language4_home5_text8',
                'value' => 'language4_home5_text8',
                'type' => 'kundol_web_setting',
            ),
            318 => 
            array (
                'key' => 'language4_home5_text9',
                'value' => 'language4_home5_text9',
                'type' => 'kundol_web_setting',
            ),
            319 => 
            array (
                'key' => 'language4_home5_text10',
                'value' => 'language4_home5_text10',
                'type' => 'kundol_web_setting',
            ),
            320 => 
            array (
                'key' => 'language4_home5_text11',
                'value' => 'language4_home5_text11',
                'type' => 'kundol_web_setting',
            ),
            321 => 
            array (
                'key' => 'language4_home5_text12',
                'value' => 'language4_home5_text12',
                'type' => 'kundol_web_setting',
            ),
            322 => 
            array (
                'key' => 'language4_home5_text13',
                'value' => 'language4_home5_text13',
                'type' => 'kundol_web_setting',
            ),
            323 => 
            array (
                'key' => 'language4_home5_text14',
                'value' => 'language4_home5_text14',
                'type' => 'kundol_web_setting',
            ),
            324 => 
            array (
                'key' => 'language4_home5_text15',
                'value' => 'language4_home5_text15',
                'type' => 'kundol_web_setting',
            ),
            325 => 
            array (
                'key' => 'language4_home5_text16',
                'value' => 'language4_home5_text16',
                'type' => 'kundol_web_setting',
            ),
            326 => 
            array (
                'key' => 'language4_home5_text17',
                'value' => 'language4_home5_text17',
                'type' => 'kundol_web_setting',
            ),
            327 => 
            array (
                'key' => 'language4_home5_text18',
                'value' => 'language4_home5_text18',
                'type' => 'kundol_web_setting',
            ),
            328 => 
            array (
                'key' => 'language4_home5_text19',
                'value' => 'language4_home5_text19',
                'type' => 'kundol_web_setting',
            ),
            329 => 
            array (
                'key' => 'language4_home5_text20',
                'value' => 'language4_home5_text20',
                'type' => 'kundol_web_setting',
            ),
            330 => 
            array (
                'key' => 'language4_home5_text21',
                'value' => 'language4_home5_text21',
                'type' => 'kundol_web_setting',
            ),
            331 => 
            array (
                'key' => 'language4_home5_text22',
                'value' => 'language4_home5_text22',
                'type' => 'kundol_web_setting',
            ),
            332 => 
            array (
                'key' => 'language4_home5_text23',
                'value' => 'language4_home5_text23',
                'type' => 'kundol_web_setting',
            ),
            333 => 
            array (
                'key' => 'language4_home5_text24',
                'value' => 'language4_home5_text24',
                'type' => 'kundol_web_setting',
            ),
            334 => 
            array (
                'key' => 'language4_home5_text25',
                'value' => 'language4_home5_text25',
                'type' => 'kundol_web_setting',
            ),
            335 => 
            array (
                'key' => 'language4_home5_text26',
                'value' => 'language4_home5_text26',
                'type' => 'kundol_web_setting',
            ),
            336 => 
            array (
                'key' => 'language4_home5_text27',
                'value' => 'language4_home5_text27',
                'type' => 'kundol_web_setting',
            ),
            337 => 
            array (
                'key' => 'language4_home5_text28',
                'value' => 'language4_home5_text28',
                'type' => 'kundol_web_setting',
            ),
            338 => 
            array (
                'key' => 'language4_home5_text29',
                'value' => 'language4_home5_text29',
                'type' => 'kundol_web_setting',
            ),
            339 => 
            array (
                'key' => 'language4_home5_text30',
                'value' => 'language4_home5_text30',
                'type' => 'kundol_web_setting',
            ),
            340 => 
            array (
                'key' => 'language4_home5_text31',
                'value' => 'language4_home5_text31',
                'type' => 'kundol_web_setting',
            ),
            341 => 
            array (
                'key' => 'language4_home5_text32',
                'value' => 'language4_home5_text32',
                'type' => 'kundol_web_setting',
            ),
            342 => 
            array (
                'key' => 'language4_home5_text33',
                'value' => 'language4_home5_text33',
                'type' => 'kundol_web_setting',
            ),
            343 => 
            array (
                'key' => 'language4_home5_text34',
                'value' => 'language4_home5_text34',
                'type' => 'kundol_web_setting',
            ),
            344 => 
            array (
                'key' => 'language4_home5_text35',
                'value' => 'language4_home5_text35',
                'type' => 'kundol_web_setting',
            ),
            345 => 
            array (
                'key' => 'language4_home5_text36',
                'value' => 'language4_home5_text36',
                'type' => 'kundol_web_setting',
            ),
            346 => 
            array (
                'key' => 'language4_home5_text37',
                'value' => 'language4_home5_text37',
                'type' => 'kundol_web_setting',
            ),
            347 => 
            array (
                'key' => 'language4_home5_text38',
                'value' => 'language4_home5_text38',
                'type' => 'kundol_web_setting',
            ),
            348 => 
            array (
                'key' => 'language4_home5_text39',
                'value' => 'language4_home5_text39',
                'type' => 'kundol_web_setting',
            ),
            349 => 
            array (
                'key' => 'language4_home5_text40',
                'value' => 'language4_home5_text40',
                'type' => 'kundol_web_setting',
            ),
            350 => 
            array (
                'key' => 'language4_home5_text41',
                'value' => 'language4_home5_text41',
                'type' => 'kundol_web_setting',
            ),
            351 => 
            array (
                'key' => 'language4_home5_text42',
                'value' => 'language4_home5_text42',
                'type' => 'kundol_web_setting',
            ),
            352 => 
            array (
                'key' => 'language4_home5_text43',
                'value' => 'language4_home5_text43',
                'type' => 'kundol_web_setting',
            ),
            353 => 
            array (
                'key' => 'language4_home5_text44',
                'value' => 'language4_home5_text44',
                'type' => 'kundol_web_setting',
            ),
            354 => 
            array (
                'key' => 'language4_home5_text45',
                'value' => 'language4_home5_text45',
                'type' => 'kundol_web_setting',
            ),
            355 => 
            array (
                'key' => 'language4_home5_text46',
                'value' => 'language4_home5_text46',
                'type' => 'kundol_web_setting',
            ),
            356 => 
            array (
                'key' => 'language4_home5_text47',
                'value' => 'language4_home5_text47',
                'type' => 'kundol_web_setting',
            ),
            357 => 
            array (
                'key' => 'language4_home5_text48',
                'value' => 'language4_home5_text48',
                'type' => 'kundol_web_setting',
            ),
            358 => 
            array (
                'key' => 'language4_home5_text49',
                'value' => 'language4_home5_text49',
                'type' => 'kundol_web_setting',
            ),
            359 => 
            array (
                'key' => 'language4_home5_text50',
                'value' => 'language4_home5_text50',
                'type' => 'kundol_web_setting',
            ),
            360 => 
            array (
                'key' => 'language4_home6_text1',
                'value' => 'language4_home6_text1',
                'type' => 'kundol_web_setting',
            ),
            361 => 
            array (
                'key' => 'language4_home6_text2',
                'value' => 'language4_home6_text2',
                'type' => 'kundol_web_setting',
            ),
            362 => 
            array (
                'key' => 'language4_home6_text3',
                'value' => 'language4_home6_text3',
                'type' => 'kundol_web_setting',
            ),
            363 => 
            array (
                'key' => 'language4_home6_text4',
                'value' => 'language4_home6_text4',
                'type' => 'kundol_web_setting',
            ),
            364 => 
            array (
                'key' => 'language4_home6_text5',
                'value' => 'language4_home6_text5',
                'type' => 'kundol_web_setting',
            ),
            365 => 
            array (
                'key' => 'language4_home6_text6',
                'value' => 'language4_home6_text6',
                'type' => 'kundol_web_setting',
            ),
            366 => 
            array (
                'key' => 'language4_home6_text7',
                'value' => 'language4_home6_text7',
                'type' => 'kundol_web_setting',
            ),
            367 => 
            array (
                'key' => 'language4_home6_text8',
                'value' => 'language4_home6_text8',
                'type' => 'kundol_web_setting',
            ),
            368 => 
            array (
                'key' => 'language4_home6_text9',
                'value' => 'language4_home6_text9',
                'type' => 'kundol_web_setting',
            ),
            369 => 
            array (
                'key' => 'language4_home6_text10',
                'value' => 'language4_home6_text10',
                'type' => 'kundol_web_setting',
            ),
            370 => 
            array (
                'key' => 'language4_home6_text11',
                'value' => 'language4_home6_text11',
                'type' => 'kundol_web_setting',
            ),
            371 => 
            array (
                'key' => 'language4_home6_text12',
                'value' => 'language4_home6_text12',
                'type' => 'kundol_web_setting',
            ),
            372 => 
            array (
                'key' => 'language4_home6_text13',
                'value' => 'language4_home6_text13',
                'type' => 'kundol_web_setting',
            ),
            373 => 
            array (
                'key' => 'language4_home6_text14',
                'value' => 'language4_home6_text14',
                'type' => 'kundol_web_setting',
            ),
            374 => 
            array (
                'key' => 'language4_home6_text15',
                'value' => 'language4_home6_text15',
                'type' => 'kundol_web_setting',
            ),
            375 => 
            array (
                'key' => 'language4_home6_text16',
                'value' => 'language4_home6_text16',
                'type' => 'kundol_web_setting',
            ),
            376 => 
            array (
                'key' => 'language4_home6_text17',
                'value' => 'language4_home6_text17',
                'type' => 'kundol_web_setting',
            ),
            377 => 
            array (
                'key' => 'language4_home6_text18',
                'value' => 'language4_home6_text18',
                'type' => 'kundol_web_setting',
            ),
            378 => 
            array (
                'key' => 'language4_home6_text19',
                'value' => 'language4_home6_text19',
                'type' => 'kundol_web_setting',
            ),
            379 => 
            array (
                'key' => 'language4_home6_text20',
                'value' => 'language4_home6_text20',
                'type' => 'kundol_web_setting',
            ),
            380 => 
            array (
                'key' => 'language4_home7_text1',
                'value' => 'language4_home7_text1',
                'type' => 'kundol_web_setting',
            ),
            381 => 
            array (
                'key' => 'language4_home7_text2',
                'value' => 'language4_home7_text2',
                'type' => 'kundol_web_setting',
            ),
            382 => 
            array (
                'key' => 'language4_home7_text3',
                'value' => 'language4_home7_text3',
                'type' => 'kundol_web_setting',
            ),
            383 => 
            array (
                'key' => 'language4_home7_text4',
                'value' => 'language4_home7_text4',
                'type' => 'kundol_web_setting',
            ),
            384 => 
            array (
                'key' => 'language4_home7_text5',
                'value' => 'language4_home7_text5',
                'type' => 'kundol_web_setting',
            ),
            385 => 
            array (
                'key' => 'language4_home7_text6',
                'value' => 'language4_home7_text6',
                'type' => 'kundol_web_setting',
            ),
            386 => 
            array (
                'key' => 'language4_home7_text7',
                'value' => 'language4_home7_text7',
                'type' => 'kundol_web_setting',
            ),
            387 => 
            array (
                'key' => 'language4_home7_text8',
                'value' => 'language4_home7_text8',
                'type' => 'kundol_web_setting',
            ),
            388 => 
            array (
                'key' => 'language4_home7_text9',
                'value' => 'language4_home7_text9',
                'type' => 'kundol_web_setting',
            ),
            389 => 
            array (
                'key' => 'language4_home7_text10',
                'value' => 'language4_home7_text10',
                'type' => 'kundol_web_setting',
            ),
            390 => 
            array (
                'key' => 'language4_home7_text11',
                'value' => 'language4_home7_text11',
                'type' => 'kundol_web_setting',
            ),
            391 => 
            array (
                'key' => 'language4_home7_text12',
                'value' => 'language4_home7_text12',
                'type' => 'kundol_web_setting',
            ),
            392 => 
            array (
                'key' => 'language4_home7_text13',
                'value' => 'language4_home7_text13',
                'type' => 'kundol_web_setting',
            ),
            393 => 
            array (
                'key' => 'language4_home7_text14',
                'value' => 'language4_home7_text14',
                'type' => 'kundol_web_setting',
            ),
            394 => 
            array (
                'key' => 'language4_home7_text15',
                'value' => 'language4_home7_text15',
                'type' => 'kundol_web_setting',
            ),
            395 => 
            array (
                'key' => 'language4_home7_text16',
                'value' => 'language4_home7_text16',
                'type' => 'kundol_web_setting',
            ),
            396 => 
            array (
                'key' => 'language4_home7_text17',
                'value' => 'language4_home7_text17',
                'type' => 'kundol_web_setting',
            ),
            397 => 
            array (
                'key' => 'language4_home7_text18',
                'value' => 'language4_home7_text18',
                'type' => 'kundol_web_setting',
            ),
            398 => 
            array (
                'key' => 'language4_home7_text19',
                'value' => 'language4_home7_text19',
                'type' => 'kundol_web_setting',
            ),
            399 => 
            array (
                'key' => 'language4_home7_text20',
                'value' => 'language4_home7_text20',
                'type' => 'kundol_web_setting',
            ),
            400 => 
            array (
                'key' => 'language4_home7_text21',
                'value' => 'language4_home7_text21',
                'type' => 'kundol_web_setting',
            ),
            401 => 
            array (
                'key' => 'language4_home7_text22',
                'value' => 'language4_home7_text22',
                'type' => 'kundol_web_setting',
            ),
            402 => 
            array (
                'key' => 'language4_home7_text23',
                'value' => 'language4_home7_text23',
                'type' => 'kundol_web_setting',
            ),
            403 => 
            array (
                'key' => 'language4_home7_text24',
                'value' => 'language4_home7_text24',
                'type' => 'kundol_web_setting',
            ),
            404 => 
            array (
                'key' => 'language4_home7_text25',
                'value' => 'language4_home7_text25',
                'type' => 'kundol_web_setting',
            ),
            405 => 
            array (
                'key' => 'language4_home7_text26',
                'value' => 'language4_home7_text26',
                'type' => 'kundol_web_setting',
            ),
            406 => 
            array (
                'key' => 'language4_home7_text27',
                'value' => 'language4_home7_text27',
                'type' => 'kundol_web_setting',
            ),
            407 => 
            array (
                'key' => 'language4_home7_text28',
                'value' => 'language4_home7_text28',
                'type' => 'kundol_web_setting',
            ),
            408 => 
            array (
                'key' => 'language4_home7_text29',
                'value' => 'language4_home7_text29',
                'type' => 'kundol_web_setting',
            ),
            409 => 
            array (
                'key' => 'language4_home7_text30',
                'value' => 'language4_home7_text30',
                'type' => 'kundol_web_setting',
            ),
            410 => 
            array (
                'key' => 'language4_home8_text1',
                'value' => 'language4_home8_text1',
                'type' => 'kundol_web_setting',
            ),
            411 => 
            array (
                'key' => 'language4_home8_text2',
                'value' => 'language4_home8_text2',
                'type' => 'kundol_web_setting',
            ),
            412 => 
            array (
                'key' => 'language4_home8_text3',
                'value' => 'language4_home8_text3',
                'type' => 'kundol_web_setting',
            ),
            413 => 
            array (
                'key' => 'language4_home8_text4',
                'value' => 'language4_home8_text4',
                'type' => 'kundol_web_setting',
            ),
            414 => 
            array (
                'key' => 'language4_home8_text5',
                'value' => 'language4_home8_text5',
                'type' => 'kundol_web_setting',
            ),
            415 => 
            array (
                'key' => 'language4_home8_text6',
                'value' => 'language4_home8_text6',
                'type' => 'kundol_web_setting',
            ),
            416 => 
            array (
                'key' => 'language4_home8_text7',
                'value' => 'language4_home8_text7',
                'type' => 'kundol_web_setting',
            ),
            417 => 
            array (
                'key' => 'language4_home8_text8',
                'value' => 'language4_home8_text8',
                'type' => 'kundol_web_setting',
            ),
            418 => 
            array (
                'key' => 'language4_home8_text9',
                'value' => 'language4_home8_text9',
                'type' => 'kundol_web_setting',
            ),
            419 => 
            array (
                'key' => 'language4_home8_text10',
                'value' => 'language4_home8_text10',
                'type' => 'kundol_web_setting',
            ),
            420 => 
            array (
                'key' => 'language4_home8_text11',
                'value' => 'language4_home8_text11',
                'type' => 'kundol_web_setting',
            ),
            421 => 
            array (
                'key' => 'language4_home8_text12',
                'value' => 'language4_home8_text12',
                'type' => 'kundol_web_setting',
            ),
            422 => 
            array (
                'key' => 'language4_home8_text13',
                'value' => 'language4_home8_text13',
                'type' => 'kundol_web_setting',
            ),
            423 => 
            array (
                'key' => 'language4_home8_text14',
                'value' => 'language4_home8_text14',
                'type' => 'kundol_web_setting',
            ),
            424 => 
            array (
                'key' => 'language4_home8_text15',
                'value' => 'language4_home8_text15',
                'type' => 'kundol_web_setting',
            ),
            425 => 
            array (
                'key' => 'language4_home8_text16',
                'value' => 'language4_home8_text16',
                'type' => 'kundol_web_setting',
            ),
            426 => 
            array (
                'key' => 'language4_home8_text17',
                'value' => 'language4_home8_text17',
                'type' => 'kundol_web_setting',
            ),
            427 => 
            array (
                'key' => 'language4_home8_text18',
                'value' => 'language4_home8_text18',
                'type' => 'kundol_web_setting',
            ),
            428 => 
            array (
                'key' => 'language4_home8_text19',
                'value' => 'language4_home8_text19',
                'type' => 'kundol_web_setting',
            ),
            429 => 
            array (
                'key' => 'language4_home8_text20',
                'value' => 'language4_home8_text20',
                'type' => 'kundol_web_setting',
            ),
            430 => 
            array (
                'key' => 'language4_home8_text21',
                'value' => 'language4_home8_text21',
                'type' => 'kundol_web_setting',
            ),
            431 => 
            array (
                'key' => 'language4_home8_text22',
                'value' => 'language4_home8_text22',
                'type' => 'kundol_web_setting',
            ),
            432 => 
            array (
                'key' => 'language4_home8_text23',
                'value' => 'language4_home8_text23',
                'type' => 'kundol_web_setting',
            ),
            433 => 
            array (
                'key' => 'language4_home8_text24',
                'value' => 'language4_home8_text24',
                'type' => 'kundol_web_setting',
            ),
            434 => 
            array (
                'key' => 'language4_home8_text25',
                'value' => 'language4_home8_text25',
                'type' => 'kundol_web_setting',
            ),
            435 => 
            array (
                'key' => 'language4_home8_text26',
                'value' => 'language4_home8_text26',
                'type' => 'kundol_web_setting',
            ),
            436 => 
            array (
                'key' => 'language4_home8_text27',
                'value' => 'language4_home8_text27',
                'type' => 'kundol_web_setting',
            ),
            437 => 
            array (
                'key' => 'language4_home8_text28',
                'value' => 'language4_home8_text28',
                'type' => 'kundol_web_setting',
            ),
            438 => 
            array (
                'key' => 'language4_home8_text29',
                'value' => 'language4_home8_text29',
                'type' => 'kundol_web_setting',
            ),
            439 => 
            array (
                'key' => 'language4_home8_text30',
                'value' => 'language4_home8_text30',
                'type' => 'kundol_web_setting',
            ),
            440 => 
            array (
                'key' => 'language4_home9_text1',
                'value' => 'language4_home9_text1',
                'type' => 'kundol_web_setting',
            ),
            441 => 
            array (
                'key' => 'language4_home9_text2',
                'value' => 'language4_home9_text2',
                'type' => 'kundol_web_setting',
            ),
            442 => 
            array (
                'key' => 'language4_home9_text3',
                'value' => 'language4_home9_text3',
                'type' => 'kundol_web_setting',
            ),
            443 => 
            array (
                'key' => 'language4_home9_text4',
                'value' => 'language4_home9_text4',
                'type' => 'kundol_web_setting',
            ),
            444 => 
            array (
                'key' => 'language4_home9_text5',
                'value' => 'language4_home9_text5',
                'type' => 'kundol_web_setting',
            ),
            445 => 
            array (
                'key' => 'language4_home9_text6',
                'value' => 'language4_home9_text6',
                'type' => 'kundol_web_setting',
            ),
            446 => 
            array (
                'key' => 'language4_home9_text7',
                'value' => 'language4_home9_text7',
                'type' => 'kundol_web_setting',
            ),
            447 => 
            array (
                'key' => 'language4_home9_text8',
                'value' => 'language4_home9_text8',
                'type' => 'kundol_web_setting',
            ),
            448 => 
            array (
                'key' => 'language4_home9_text9',
                'value' => 'language4_home9_text9',
                'type' => 'kundol_web_setting',
            ),
            449 => 
            array (
                'key' => 'language4_home9_text10',
                'value' => 'language4_home9_text10',
                'type' => 'kundol_web_setting',
            ),
            450 => 
            array (
                'key' => 'language4_home9_text11',
                'value' => 'language4_home9_text11',
                'type' => 'kundol_web_setting',
            ),
            451 => 
            array (
                'key' => 'language4_home9_text12',
                'value' => 'language4_home9_text12',
                'type' => 'kundol_web_setting',
            ),
            452 => 
            array (
                'key' => 'language4_home9_text13',
                'value' => 'language4_home9_text13',
                'type' => 'kundol_web_setting',
            ),
            453 => 
            array (
                'key' => 'language4_home9_text14',
                'value' => 'language4_home9_text14',
                'type' => 'kundol_web_setting',
            ),
            454 => 
            array (
                'key' => 'language4_home9_text15',
                'value' => 'language4_home9_text15',
                'type' => 'kundol_web_setting',
            ),
            455 => 
            array (
                'key' => 'language4_home9_text16',
                'value' => 'language4_home9_text16',
                'type' => 'kundol_web_setting',
            ),
            456 => 
            array (
                'key' => 'language4_home9_text17',
                'value' => 'language4_home9_text17',
                'type' => 'kundol_web_setting',
            ),
            457 => 
            array (
                'key' => 'language4_home9_text18',
                'value' => 'language4_home9_text18',
                'type' => 'kundol_web_setting',
            ),
            458 => 
            array (
                'key' => 'language4_home9_text19',
                'value' => 'language4_home9_text19',
                'type' => 'kundol_web_setting',
            ),
            459 => 
            array (
                'key' => 'language4_home9_text20',
                'value' => 'language4_home9_text20',
                'type' => 'kundol_web_setting',
            ),
            460 => 
            array (
                'key' => 'language4_home9_text21',
                'value' => 'language4_home9_text21',
                'type' => 'kundol_web_setting',
            ),
            461 => 
            array (
                'key' => 'language4_home9_text22',
                'value' => 'language4_home9_text22',
                'type' => 'kundol_web_setting',
            ),
            462 => 
            array (
                'key' => 'language4_home9_text23',
                'value' => 'language4_home9_text23',
                'type' => 'kundol_web_setting',
            ),
            463 => 
            array (
                'key' => 'language4_home9_text24',
                'value' => 'language4_home9_text24',
                'type' => 'kundol_web_setting',
            ),
            464 => 
            array (
                'key' => 'language4_home9_text25',
                'value' => 'language4_home9_text25',
                'type' => 'kundol_web_setting',
            ),
            465 => 
            array (
                'key' => 'language4_home9_text26',
                'value' => 'language4_home9_text26',
                'type' => 'kundol_web_setting',
            ),
            466 => 
            array (
                'key' => 'language4_home9_text27',
                'value' => 'language4_home9_text27',
                'type' => 'kundol_web_setting',
            ),
            467 => 
            array (
                'key' => 'language4_home9_text28',
                'value' => 'language4_home9_text28',
                'type' => 'kundol_web_setting',
            ),
            468 => 
            array (
                'key' => 'language4_home9_text29',
                'value' => 'language4_home9_text29',
                'type' => 'kundol_web_setting',
            ),
            469 => 
            array (
                'key' => 'language4_home9_text30',
                'value' => 'language4_home9_text30',
                'type' => 'kundol_web_setting',
            ),
            470 => 
            array (
                'key' => 'language4_home9_text31',
                'value' => 'language4_home9_text31',
                'type' => 'kundol_web_setting',
            ),
            471 => 
            array (
                'key' => 'language4_home9_text32',
                'value' => 'language4_home9_text32',
                'type' => 'kundol_web_setting',
            ),
            472 => 
            array (
                'key' => 'language4_home9_text33',
                'value' => 'language4_home9_text33',
                'type' => 'kundol_web_setting',
            ),
            473 => 
            array (
                'key' => 'language4_home9_text34',
                'value' => 'language4_home9_text34',
                'type' => 'kundol_web_setting',
            ),
            474 => 
            array (
                'key' => 'language4_home9_text35',
                'value' => 'language4_home9_text35',
                'type' => 'kundol_web_setting',
            ),
            475 => 
            array (
                'key' => 'language4_home9_text36',
                'value' => 'language4_home9_text36',
                'type' => 'kundol_web_setting',
            ),
            476 => 
            array (
                'key' => 'language4_home9_text37',
                'value' => 'language4_home9_text37',
                'type' => 'kundol_web_setting',
            ),
            477 => 
            array (
                'key' => 'language4_home9_text38',
                'value' => 'language4_home9_text38',
                'type' => 'kundol_web_setting',
            ),
            478 => 
            array (
                'key' => 'language4_home9_text39',
                'value' => 'language4_home9_text39',
                'type' => 'kundol_web_setting',
            ),
            479 => 
            array (
                'key' => 'language4_home9_text40',
                'value' => 'language4_home9_text40',
                'type' => 'kundol_web_setting',
            ),
            480 => 
            array (
                'key' => 'language4_home9_text41',
                'value' => 'language4_home9_text41',
                'type' => 'kundol_web_setting',
            ),
            481 => 
            array (
                'key' => 'language4_home9_text42',
                'value' => 'language4_home9_text42',
                'type' => 'kundol_web_setting',
            ),
            482 => 
            array (
                'key' => 'language4_home9_text43',
                'value' => 'language4_home9_text43',
                'type' => 'kundol_web_setting',
            ),
            483 => 
            array (
                'key' => 'language4_home9_text44',
                'value' => 'language4_home9_text44',
                'type' => 'kundol_web_setting',
            ),
            484 => 
            array (
                'key' => 'language4_home9_text45',
                'value' => 'language4_home9_text45',
                'type' => 'kundol_web_setting',
            ),
            485 => 
            array (
                'key' => 'language4_home9_text46',
                'value' => 'language4_home9_text46',
                'type' => 'kundol_web_setting',
            ),
            486 => 
            array (
                'key' => 'language4_home9_text47',
                'value' => 'language4_home9_text47',
                'type' => 'kundol_web_setting',
            ),
            487 => 
            array (
                'key' => 'language4_home9_text48',
                'value' => 'language4_home9_text48',
                'type' => 'kundol_web_setting',
            ),
            488 => 
            array (
                'key' => 'language4_home9_text49',
                'value' => 'language4_home9_text49',
                'type' => 'kundol_web_setting',
            ),
            489 => 
            array (
                'key' => 'language4_home9_text50',
                'value' => 'language4_home9_text50',
                'type' => 'kundol_web_setting',
            ),
            490 => 
            array (
                'key' => 'language5_home1_text1',
                'value' => 'language5_home1_text1',
                'type' => 'kundol_web_setting',
            ),
            491 => 
            array (
                'key' => 'language5_home1_text2',
                'value' => 'language5_home1_text2',
                'type' => 'kundol_web_setting',
            ),
            492 => 
            array (
                'key' => 'language5_home1_text3',
                'value' => 'language5_home1_text3',
                'type' => 'kundol_web_setting',
            ),
            493 => 
            array (
                'key' => 'language5_home1_text4',
                'value' => 'language5_home1_text4',
                'type' => 'kundol_web_setting',
            ),
            494 => 
            array (
                'key' => 'language5_home1_text5',
                'value' => 'language5_home1_text5',
                'type' => 'kundol_web_setting',
            ),
            495 => 
            array (
                'key' => 'language5_home1_text6',
                'value' => 'language5_home1_text6',
                'type' => 'kundol_web_setting',
            ),
            496 => 
            array (
                'key' => 'language5_home1_text7',
                'value' => 'language5_home1_text7',
                'type' => 'kundol_web_setting',
            ),
            497 => 
            array (
                'key' => 'language5_home1_text8',
                'value' => 'language5_home1_text8',
                'type' => 'kundol_web_setting',
            ),
            498 => 
            array (
                'key' => 'language5_home1_text9',
                'value' => 'language5_home1_text9',
                'type' => 'kundol_web_setting',
            ),
            499 => 
            array (
                'key' => 'language5_home1_text10',
                'value' => 'language5_home1_text10',
                'type' => 'kundol_web_setting',
            ),
        ));
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'key' => 'language5_home1_text11',
                'value' => 'language5_home1_text11',
                'type' => 'kundol_web_setting',
            ),
            1 => 
            array (
                'key' => 'language5_home1_text12',
                'value' => 'language5_home1_text12',
                'type' => 'kundol_web_setting',
            ),
            2 => 
            array (
                'key' => 'language5_home1_text13',
                'value' => 'language5_home1_text13',
                'type' => 'kundol_web_setting',
            ),
            3 => 
            array (
                'key' => 'language5_home1_text14',
                'value' => 'language5_home1_text14',
                'type' => 'kundol_web_setting',
            ),
            4 => 
            array (
                'key' => 'language5_home1_text15',
                'value' => 'language5_home1_text15',
                'type' => 'kundol_web_setting',
            ),
            5 => 
            array (
                'key' => 'language5_home1_text16',
                'value' => 'language5_home1_text16',
                'type' => 'kundol_web_setting',
            ),
            6 => 
            array (
                'key' => 'language5_home1_text17',
                'value' => 'language5_home1_text17',
                'type' => 'kundol_web_setting',
            ),
            7 => 
            array (
                'key' => 'language5_home1_text18',
                'value' => 'language5_home1_text18',
                'type' => 'kundol_web_setting',
            ),
            8 => 
            array (
                'key' => 'language5_home1_text19',
                'value' => 'language5_home1_text19',
                'type' => 'kundol_web_setting',
            ),
            9 => 
            array (
                'key' => 'language5_home1_text20',
                'value' => 'language5_home1_text20',
                'type' => 'kundol_web_setting',
            ),
            10 => 
            array (
                'key' => 'language5_home1_text21',
                'value' => 'language5_home1_text21',
                'type' => 'kundol_web_setting',
            ),
            11 => 
            array (
                'key' => 'language5_home1_text22',
                'value' => 'language5_home1_text22',
                'type' => 'kundol_web_setting',
            ),
            12 => 
            array (
                'key' => 'language5_home1_text23',
                'value' => 'language5_home1_text23',
                'type' => 'kundol_web_setting',
            ),
            13 => 
            array (
                'key' => 'language5_home1_text24',
                'value' => 'language5_home1_text24',
                'type' => 'kundol_web_setting',
            ),
            14 => 
            array (
                'key' => 'language5_home1_text25',
                'value' => 'language5_home1_text25',
                'type' => 'kundol_web_setting',
            ),
            15 => 
            array (
                'key' => 'language5_home1_text26',
                'value' => 'language5_home1_text26',
                'type' => 'kundol_web_setting',
            ),
            16 => 
            array (
                'key' => 'language5_home1_text27',
                'value' => 'language5_home1_text27',
                'type' => 'kundol_web_setting',
            ),
            17 => 
            array (
                'key' => 'language5_home1_text28',
                'value' => 'language5_home1_text28',
                'type' => 'kundol_web_setting',
            ),
            18 => 
            array (
                'key' => 'language5_home1_text29',
                'value' => 'language5_home1_text29',
                'type' => 'kundol_web_setting',
            ),
            19 => 
            array (
                'key' => 'language5_home1_text30',
                'value' => 'language5_home1_text30',
                'type' => 'kundol_web_setting',
            ),
            20 => 
            array (
                'key' => 'language5_home2_text1',
                'value' => 'language5_home2_text1',
                'type' => 'kundol_web_setting',
            ),
            21 => 
            array (
                'key' => 'language5_home2_text2',
                'value' => 'language5_home2_text2',
                'type' => 'kundol_web_setting',
            ),
            22 => 
            array (
                'key' => 'language5_home2_text3',
                'value' => 'language5_home2_text3',
                'type' => 'kundol_web_setting',
            ),
            23 => 
            array (
                'key' => 'language5_home2_text4',
                'value' => 'language5_home2_text4',
                'type' => 'kundol_web_setting',
            ),
            24 => 
            array (
                'key' => 'language5_home2_text5',
                'value' => 'language5_home2_text5',
                'type' => 'kundol_web_setting',
            ),
            25 => 
            array (
                'key' => 'language5_home2_text6',
                'value' => 'language5_home2_text6',
                'type' => 'kundol_web_setting',
            ),
            26 => 
            array (
                'key' => 'language5_home2_text7',
                'value' => 'language5_home2_text7',
                'type' => 'kundol_web_setting',
            ),
            27 => 
            array (
                'key' => 'language5_home2_text8',
                'value' => 'language5_home2_text8',
                'type' => 'kundol_web_setting',
            ),
            28 => 
            array (
                'key' => 'language5_home2_text9',
                'value' => 'language5_home2_text9',
                'type' => 'kundol_web_setting',
            ),
            29 => 
            array (
                'key' => 'language5_home2_text10',
                'value' => 'language5_home2_text10',
                'type' => 'kundol_web_setting',
            ),
            30 => 
            array (
                'key' => 'language5_home2_text11',
                'value' => 'language5_home2_text11',
                'type' => 'kundol_web_setting',
            ),
            31 => 
            array (
                'key' => 'language5_home2_text12',
                'value' => 'language5_home2_text12',
                'type' => 'kundol_web_setting',
            ),
            32 => 
            array (
                'key' => 'language5_home2_text13',
                'value' => 'language5_home2_text13',
                'type' => 'kundol_web_setting',
            ),
            33 => 
            array (
                'key' => 'language5_home2_text14',
                'value' => 'language5_home2_text14',
                'type' => 'kundol_web_setting',
            ),
            34 => 
            array (
                'key' => 'language5_home2_text15',
                'value' => 'language5_home2_text15',
                'type' => 'kundol_web_setting',
            ),
            35 => 
            array (
                'key' => 'language5_home2_text16',
                'value' => 'language5_home2_text16',
                'type' => 'kundol_web_setting',
            ),
            36 => 
            array (
                'key' => 'language5_home2_text17',
                'value' => 'language5_home2_text17',
                'type' => 'kundol_web_setting',
            ),
            37 => 
            array (
                'key' => 'language5_home2_text18',
                'value' => 'language5_home2_text18',
                'type' => 'kundol_web_setting',
            ),
            38 => 
            array (
                'key' => 'language5_home2_text19',
                'value' => 'language5_home2_text19',
                'type' => 'kundol_web_setting',
            ),
            39 => 
            array (
                'key' => 'language5_home2_text20',
                'value' => 'language5_home2_text20',
                'type' => 'kundol_web_setting',
            ),
            40 => 
            array (
                'key' => 'language5_home2_text21',
                'value' => 'language5_home2_text21',
                'type' => 'kundol_web_setting',
            ),
            41 => 
            array (
                'key' => 'language5_home2_text22',
                'value' => 'language5_home2_text22',
                'type' => 'kundol_web_setting',
            ),
            42 => 
            array (
                'key' => 'language5_home2_text23',
                'value' => 'language5_home2_text23',
                'type' => 'kundol_web_setting',
            ),
            43 => 
            array (
                'key' => 'language5_home2_text24',
                'value' => 'language5_home2_text24',
                'type' => 'kundol_web_setting',
            ),
            44 => 
            array (
                'key' => 'language5_home2_text25',
                'value' => 'language5_home2_text25',
                'type' => 'kundol_web_setting',
            ),
            45 => 
            array (
                'key' => 'language5_home2_text26',
                'value' => 'language5_home2_text26',
                'type' => 'kundol_web_setting',
            ),
            46 => 
            array (
                'key' => 'language5_home2_text27',
                'value' => 'language5_home2_text27',
                'type' => 'kundol_web_setting',
            ),
            47 => 
            array (
                'key' => 'language5_home2_text28',
                'value' => 'language5_home2_text28',
                'type' => 'kundol_web_setting',
            ),
            48 => 
            array (
                'key' => 'language5_home2_text29',
                'value' => 'language5_home2_text29',
                'type' => 'kundol_web_setting',
            ),
            49 => 
            array (
                'key' => 'language5_home2_text30',
                'value' => 'language5_home2_text30',
                'type' => 'kundol_web_setting',
            ),
            50 => 
            array (
                'key' => 'language5_home3_text1',
                'value' => 'language5_home3_text1',
                'type' => 'kundol_web_setting',
            ),
            51 => 
            array (
                'key' => 'language5_home3_text2',
                'value' => 'language5_home3_text2',
                'type' => 'kundol_web_setting',
            ),
            52 => 
            array (
                'key' => 'language5_home3_text3',
                'value' => 'language5_home3_text3',
                'type' => 'kundol_web_setting',
            ),
            53 => 
            array (
                'key' => 'language5_home3_text4',
                'value' => 'language5_home3_text4',
                'type' => 'kundol_web_setting',
            ),
            54 => 
            array (
                'key' => 'language5_home3_text5',
                'value' => 'language5_home3_text5',
                'type' => 'kundol_web_setting',
            ),
            55 => 
            array (
                'key' => 'language5_home3_text6',
                'value' => 'language5_home3_text6',
                'type' => 'kundol_web_setting',
            ),
            56 => 
            array (
                'key' => 'language5_home3_text7',
                'value' => 'language5_home3_text7',
                'type' => 'kundol_web_setting',
            ),
            57 => 
            array (
                'key' => 'language5_home3_text8',
                'value' => 'language5_home3_text8',
                'type' => 'kundol_web_setting',
            ),
            58 => 
            array (
                'key' => 'language5_home3_text9',
                'value' => 'language5_home3_text9',
                'type' => 'kundol_web_setting',
            ),
            59 => 
            array (
                'key' => 'language5_home3_text10',
                'value' => 'language5_home3_text10',
                'type' => 'kundol_web_setting',
            ),
            60 => 
            array (
                'key' => 'language5_home3_text11',
                'value' => 'language5_home3_text11',
                'type' => 'kundol_web_setting',
            ),
            61 => 
            array (
                'key' => 'language5_home3_text12',
                'value' => 'language5_home3_text12',
                'type' => 'kundol_web_setting',
            ),
            62 => 
            array (
                'key' => 'language5_home3_text13',
                'value' => 'language5_home3_text13',
                'type' => 'kundol_web_setting',
            ),
            63 => 
            array (
                'key' => 'language5_home3_text14',
                'value' => 'language5_home3_text14',
                'type' => 'kundol_web_setting',
            ),
            64 => 
            array (
                'key' => 'language5_home3_text15',
                'value' => 'language5_home3_text15',
                'type' => 'kundol_web_setting',
            ),
            65 => 
            array (
                'key' => 'language5_home3_text16',
                'value' => 'language5_home3_text16',
                'type' => 'kundol_web_setting',
            ),
            66 => 
            array (
                'key' => 'language5_home3_text17',
                'value' => 'language5_home3_text17',
                'type' => 'kundol_web_setting',
            ),
            67 => 
            array (
                'key' => 'language5_home3_text18',
                'value' => 'language5_home3_text18',
                'type' => 'kundol_web_setting',
            ),
            68 => 
            array (
                'key' => 'language5_home3_text19',
                'value' => 'language5_home3_text19',
                'type' => 'kundol_web_setting',
            ),
            69 => 
            array (
                'key' => 'language5_home3_text20',
                'value' => 'language5_home3_text20',
                'type' => 'kundol_web_setting',
            ),
            70 => 
            array (
                'key' => 'language5_home3_text21',
                'value' => 'language5_home3_text21',
                'type' => 'kundol_web_setting',
            ),
            71 => 
            array (
                'key' => 'language5_home3_text22',
                'value' => 'language5_home3_text22',
                'type' => 'kundol_web_setting',
            ),
            72 => 
            array (
                'key' => 'language5_home3_text23',
                'value' => 'language5_home3_text23',
                'type' => 'kundol_web_setting',
            ),
            73 => 
            array (
                'key' => 'language5_home3_text24',
                'value' => 'language5_home3_text24',
                'type' => 'kundol_web_setting',
            ),
            74 => 
            array (
                'key' => 'language5_home3_text25',
                'value' => 'language5_home3_text25',
                'type' => 'kundol_web_setting',
            ),
            75 => 
            array (
                'key' => 'language5_home3_text26',
                'value' => 'language5_home3_text26',
                'type' => 'kundol_web_setting',
            ),
            76 => 
            array (
                'key' => 'language5_home3_text27',
                'value' => 'language5_home3_text27',
                'type' => 'kundol_web_setting',
            ),
            77 => 
            array (
                'key' => 'language5_home3_text28',
                'value' => 'language5_home3_text28',
                'type' => 'kundol_web_setting',
            ),
            78 => 
            array (
                'key' => 'language5_home3_text29',
                'value' => 'language5_home3_text29',
                'type' => 'kundol_web_setting',
            ),
            79 => 
            array (
                'key' => 'language5_home3_text30',
                'value' => 'language5_home3_text30',
                'type' => 'kundol_web_setting',
            ),
            80 => 
            array (
                'key' => 'language5_home4_text1',
                'value' => 'language5_home4_text1',
                'type' => 'kundol_web_setting',
            ),
            81 => 
            array (
                'key' => 'language5_home4_text2',
                'value' => 'language5_home4_text2',
                'type' => 'kundol_web_setting',
            ),
            82 => 
            array (
                'key' => 'language5_home4_text3',
                'value' => 'language5_home4_text3',
                'type' => 'kundol_web_setting',
            ),
            83 => 
            array (
                'key' => 'language5_home4_text4',
                'value' => 'language5_home4_text4',
                'type' => 'kundol_web_setting',
            ),
            84 => 
            array (
                'key' => 'language5_home4_text5',
                'value' => 'language5_home4_text5',
                'type' => 'kundol_web_setting',
            ),
            85 => 
            array (
                'key' => 'language5_home4_text6',
                'value' => 'language5_home4_text6',
                'type' => 'kundol_web_setting',
            ),
            86 => 
            array (
                'key' => 'language5_home4_text7',
                'value' => 'language5_home4_text7',
                'type' => 'kundol_web_setting',
            ),
            87 => 
            array (
                'key' => 'language5_home4_text8',
                'value' => 'language5_home4_text8',
                'type' => 'kundol_web_setting',
            ),
            88 => 
            array (
                'key' => 'language5_home4_text9',
                'value' => 'language5_home4_text9',
                'type' => 'kundol_web_setting',
            ),
            89 => 
            array (
                'key' => 'language5_home4_text10',
                'value' => 'language5_home4_text10',
                'type' => 'kundol_web_setting',
            ),
            90 => 
            array (
                'key' => 'language5_home4_text11',
                'value' => 'language5_home4_text11',
                'type' => 'kundol_web_setting',
            ),
            91 => 
            array (
                'key' => 'language5_home4_text12',
                'value' => 'language5_home4_text12',
                'type' => 'kundol_web_setting',
            ),
            92 => 
            array (
                'key' => 'language5_home4_text13',
                'value' => 'language5_home4_text13',
                'type' => 'kundol_web_setting',
            ),
            93 => 
            array (
                'key' => 'language5_home4_text14',
                'value' => 'language5_home4_text14',
                'type' => 'kundol_web_setting',
            ),
            94 => 
            array (
                'key' => 'language5_home4_text15',
                'value' => 'language5_home4_text15',
                'type' => 'kundol_web_setting',
            ),
            95 => 
            array (
                'key' => 'language5_home4_text16',
                'value' => 'language5_home4_text16',
                'type' => 'kundol_web_setting',
            ),
            96 => 
            array (
                'key' => 'language5_home4_text17',
                'value' => 'language5_home4_text17',
                'type' => 'kundol_web_setting',
            ),
            97 => 
            array (
                'key' => 'language5_home4_text18',
                'value' => 'language5_home4_text18',
                'type' => 'kundol_web_setting',
            ),
            98 => 
            array (
                'key' => 'language5_home4_text19',
                'value' => 'language5_home4_text19',
                'type' => 'kundol_web_setting',
            ),
            99 => 
            array (
                'key' => 'language5_home4_text20',
                'value' => 'language5_home4_text20',
                'type' => 'kundol_web_setting',
            ),
            100 => 
            array (
                'key' => 'language5_home4_text21',
                'value' => 'language5_home4_text21',
                'type' => 'kundol_web_setting',
            ),
            101 => 
            array (
                'key' => 'language5_home4_text22',
                'value' => 'language5_home4_text22',
                'type' => 'kundol_web_setting',
            ),
            102 => 
            array (
                'key' => 'language5_home4_text23',
                'value' => 'language5_home4_text23',
                'type' => 'kundol_web_setting',
            ),
            103 => 
            array (
                'key' => 'language5_home4_text24',
                'value' => 'language5_home4_text24',
                'type' => 'kundol_web_setting',
            ),
            104 => 
            array (
                'key' => 'language5_home4_text25',
                'value' => 'language5_home4_text25',
                'type' => 'kundol_web_setting',
            ),
            105 => 
            array (
                'key' => 'language5_home4_text26',
                'value' => 'language5_home4_text26',
                'type' => 'kundol_web_setting',
            ),
            106 => 
            array (
                'key' => 'language5_home4_text27',
                'value' => 'language5_home4_text27',
                'type' => 'kundol_web_setting',
            ),
            107 => 
            array (
                'key' => 'language5_home4_text28',
                'value' => 'language5_home4_text28',
                'type' => 'kundol_web_setting',
            ),
            108 => 
            array (
                'key' => 'language5_home4_text29',
                'value' => 'language5_home4_text29',
                'type' => 'kundol_web_setting',
            ),
            109 => 
            array (
                'key' => 'language5_home4_text30',
                'value' => 'language5_home4_text30',
                'type' => 'kundol_web_setting',
            ),
            110 => 
            array (
                'key' => 'language5_home4_text31',
                'value' => 'language5_home4_text31',
                'type' => 'kundol_web_setting',
            ),
            111 => 
            array (
                'key' => 'language5_home4_text32',
                'value' => 'language5_home4_text32',
                'type' => 'kundol_web_setting',
            ),
            112 => 
            array (
                'key' => 'language5_home4_text33',
                'value' => 'language5_home4_text33',
                'type' => 'kundol_web_setting',
            ),
            113 => 
            array (
                'key' => 'language5_home4_text34',
                'value' => 'language5_home4_text34',
                'type' => 'kundol_web_setting',
            ),
            114 => 
            array (
                'key' => 'language5_home4_text35',
                'value' => 'language5_home4_text35',
                'type' => 'kundol_web_setting',
            ),
            115 => 
            array (
                'key' => 'language5_home4_text36',
                'value' => 'language5_home4_text36',
                'type' => 'kundol_web_setting',
            ),
            116 => 
            array (
                'key' => 'language5_home4_text37',
                'value' => 'language5_home4_text37',
                'type' => 'kundol_web_setting',
            ),
            117 => 
            array (
                'key' => 'language5_home4_text38',
                'value' => 'language5_home4_text38',
                'type' => 'kundol_web_setting',
            ),
            118 => 
            array (
                'key' => 'language5_home4_text39',
                'value' => 'language5_home4_text39',
                'type' => 'kundol_web_setting',
            ),
            119 => 
            array (
                'key' => 'language5_home4_text40',
                'value' => 'language5_home4_text40',
                'type' => 'kundol_web_setting',
            ),
            120 => 
            array (
                'key' => 'language5_home4_text41',
                'value' => 'language5_home4_text41',
                'type' => 'kundol_web_setting',
            ),
            121 => 
            array (
                'key' => 'language5_home4_text42',
                'value' => 'language5_home4_text42',
                'type' => 'kundol_web_setting',
            ),
            122 => 
            array (
                'key' => 'language5_home4_text43',
                'value' => 'language5_home4_text43',
                'type' => 'kundol_web_setting',
            ),
            123 => 
            array (
                'key' => 'language5_home4_text44',
                'value' => 'language5_home4_text44',
                'type' => 'kundol_web_setting',
            ),
            124 => 
            array (
                'key' => 'language5_home4_text45',
                'value' => 'language5_home4_text45',
                'type' => 'kundol_web_setting',
            ),
            125 => 
            array (
                'key' => 'language5_home4_text46',
                'value' => 'language5_home4_text46',
                'type' => 'kundol_web_setting',
            ),
            126 => 
            array (
                'key' => 'language5_home4_text47',
                'value' => 'language5_home4_text47',
                'type' => 'kundol_web_setting',
            ),
            127 => 
            array (
                'key' => 'language5_home4_text48',
                'value' => 'language5_home4_text48',
                'type' => 'kundol_web_setting',
            ),
            128 => 
            array (
                'key' => 'language5_home4_text49',
                'value' => 'language5_home4_text49',
                'type' => 'kundol_web_setting',
            ),
            129 => 
            array (
                'key' => 'language5_home4_text50',
                'value' => 'language5_home4_text50',
                'type' => 'kundol_web_setting',
            ),
            130 => 
            array (
                'key' => 'language5_home4_text51',
                'value' => 'language5_home4_text51',
                'type' => 'kundol_web_setting',
            ),
            131 => 
            array (
                'key' => 'language5_home4_text52',
                'value' => 'language5_home4_text52',
                'type' => 'kundol_web_setting',
            ),
            132 => 
            array (
                'key' => 'language5_home4_text53',
                'value' => 'language5_home4_text53',
                'type' => 'kundol_web_setting',
            ),
            133 => 
            array (
                'key' => 'language5_home4_text54',
                'value' => 'language5_home4_text54',
                'type' => 'kundol_web_setting',
            ),
            134 => 
            array (
                'key' => 'language5_home4_text55',
                'value' => 'language5_home4_text55',
                'type' => 'kundol_web_setting',
            ),
            135 => 
            array (
                'key' => 'language5_home4_text56',
                'value' => 'language5_home4_text56',
                'type' => 'kundol_web_setting',
            ),
            136 => 
            array (
                'key' => 'language5_home4_text57',
                'value' => 'language5_home4_text57',
                'type' => 'kundol_web_setting',
            ),
            137 => 
            array (
                'key' => 'language5_home4_text58',
                'value' => 'language5_home4_text58',
                'type' => 'kundol_web_setting',
            ),
            138 => 
            array (
                'key' => 'language5_home4_text59',
                'value' => 'language5_home4_text59',
                'type' => 'kundol_web_setting',
            ),
            139 => 
            array (
                'key' => 'language5_home4_text60',
                'value' => 'language5_home4_text60',
                'type' => 'kundol_web_setting',
            ),
            140 => 
            array (
                'key' => 'language5_home5_text1',
                'value' => 'language5_home5_text1',
                'type' => 'kundol_web_setting',
            ),
            141 => 
            array (
                'key' => 'language5_home5_text2',
                'value' => 'language5_home5_text2',
                'type' => 'kundol_web_setting',
            ),
            142 => 
            array (
                'key' => 'language5_home5_text3',
                'value' => 'language5_home5_text3',
                'type' => 'kundol_web_setting',
            ),
            143 => 
            array (
                'key' => 'language5_home5_text4',
                'value' => 'language5_home5_text4',
                'type' => 'kundol_web_setting',
            ),
            144 => 
            array (
                'key' => 'language5_home5_text5',
                'value' => 'language5_home5_text5',
                'type' => 'kundol_web_setting',
            ),
            145 => 
            array (
                'key' => 'language5_home5_text6',
                'value' => 'language5_home5_text6',
                'type' => 'kundol_web_setting',
            ),
            146 => 
            array (
                'key' => 'language5_home5_text7',
                'value' => 'language5_home5_text7',
                'type' => 'kundol_web_setting',
            ),
            147 => 
            array (
                'key' => 'language5_home5_text8',
                'value' => 'language5_home5_text8',
                'type' => 'kundol_web_setting',
            ),
            148 => 
            array (
                'key' => 'language5_home5_text9',
                'value' => 'language5_home5_text9',
                'type' => 'kundol_web_setting',
            ),
            149 => 
            array (
                'key' => 'language5_home5_text10',
                'value' => 'language5_home5_text10',
                'type' => 'kundol_web_setting',
            ),
            150 => 
            array (
                'key' => 'language5_home5_text11',
                'value' => 'language5_home5_text11',
                'type' => 'kundol_web_setting',
            ),
            151 => 
            array (
                'key' => 'language5_home5_text12',
                'value' => 'language5_home5_text12',
                'type' => 'kundol_web_setting',
            ),
            152 => 
            array (
                'key' => 'language5_home5_text13',
                'value' => 'language5_home5_text13',
                'type' => 'kundol_web_setting',
            ),
            153 => 
            array (
                'key' => 'language5_home5_text14',
                'value' => 'language5_home5_text14',
                'type' => 'kundol_web_setting',
            ),
            154 => 
            array (
                'key' => 'language5_home5_text15',
                'value' => 'language5_home5_text15',
                'type' => 'kundol_web_setting',
            ),
            155 => 
            array (
                'key' => 'language5_home5_text16',
                'value' => 'language5_home5_text16',
                'type' => 'kundol_web_setting',
            ),
            156 => 
            array (
                'key' => 'language5_home5_text17',
                'value' => 'language5_home5_text17',
                'type' => 'kundol_web_setting',
            ),
            157 => 
            array (
                'key' => 'language5_home5_text18',
                'value' => 'language5_home5_text18',
                'type' => 'kundol_web_setting',
            ),
            158 => 
            array (
                'key' => 'language5_home5_text19',
                'value' => 'language5_home5_text19',
                'type' => 'kundol_web_setting',
            ),
            159 => 
            array (
                'key' => 'language5_home5_text20',
                'value' => 'language5_home5_text20',
                'type' => 'kundol_web_setting',
            ),
            160 => 
            array (
                'key' => 'language5_home5_text21',
                'value' => 'language5_home5_text21',
                'type' => 'kundol_web_setting',
            ),
            161 => 
            array (
                'key' => 'language5_home5_text22',
                'value' => 'language5_home5_text22',
                'type' => 'kundol_web_setting',
            ),
            162 => 
            array (
                'key' => 'language5_home5_text23',
                'value' => 'language5_home5_text23',
                'type' => 'kundol_web_setting',
            ),
            163 => 
            array (
                'key' => 'language5_home5_text24',
                'value' => 'language5_home5_text24',
                'type' => 'kundol_web_setting',
            ),
            164 => 
            array (
                'key' => 'language5_home5_text25',
                'value' => 'language5_home5_text25',
                'type' => 'kundol_web_setting',
            ),
            165 => 
            array (
                'key' => 'language5_home5_text26',
                'value' => 'language5_home5_text26',
                'type' => 'kundol_web_setting',
            ),
            166 => 
            array (
                'key' => 'language5_home5_text27',
                'value' => 'language5_home5_text27',
                'type' => 'kundol_web_setting',
            ),
            167 => 
            array (
                'key' => 'language5_home5_text28',
                'value' => 'language5_home5_text28',
                'type' => 'kundol_web_setting',
            ),
            168 => 
            array (
                'key' => 'language5_home5_text29',
                'value' => 'language5_home5_text29',
                'type' => 'kundol_web_setting',
            ),
            169 => 
            array (
                'key' => 'language5_home5_text30',
                'value' => 'language5_home5_text30',
                'type' => 'kundol_web_setting',
            ),
            170 => 
            array (
                'key' => 'language5_home5_text31',
                'value' => 'language5_home5_text31',
                'type' => 'kundol_web_setting',
            ),
            171 => 
            array (
                'key' => 'language5_home5_text32',
                'value' => 'language5_home5_text32',
                'type' => 'kundol_web_setting',
            ),
            172 => 
            array (
                'key' => 'language5_home5_text33',
                'value' => 'language5_home5_text33',
                'type' => 'kundol_web_setting',
            ),
            173 => 
            array (
                'key' => 'language5_home5_text34',
                'value' => 'language5_home5_text34',
                'type' => 'kundol_web_setting',
            ),
            174 => 
            array (
                'key' => 'language5_home5_text35',
                'value' => 'language5_home5_text35',
                'type' => 'kundol_web_setting',
            ),
            175 => 
            array (
                'key' => 'language5_home5_text36',
                'value' => 'language5_home5_text36',
                'type' => 'kundol_web_setting',
            ),
            176 => 
            array (
                'key' => 'language5_home5_text37',
                'value' => 'language5_home5_text37',
                'type' => 'kundol_web_setting',
            ),
            177 => 
            array (
                'key' => 'language5_home5_text38',
                'value' => 'language5_home5_text38',
                'type' => 'kundol_web_setting',
            ),
            178 => 
            array (
                'key' => 'language5_home5_text39',
                'value' => 'language5_home5_text39',
                'type' => 'kundol_web_setting',
            ),
            179 => 
            array (
                'key' => 'language5_home5_text40',
                'value' => 'language5_home5_text40',
                'type' => 'kundol_web_setting',
            ),
            180 => 
            array (
                'key' => 'language5_home5_text41',
                'value' => 'language5_home5_text41',
                'type' => 'kundol_web_setting',
            ),
            181 => 
            array (
                'key' => 'language5_home5_text42',
                'value' => 'language5_home5_text42',
                'type' => 'kundol_web_setting',
            ),
            182 => 
            array (
                'key' => 'language5_home5_text43',
                'value' => 'language5_home5_text43',
                'type' => 'kundol_web_setting',
            ),
            183 => 
            array (
                'key' => 'language5_home5_text44',
                'value' => 'language5_home5_text44',
                'type' => 'kundol_web_setting',
            ),
            184 => 
            array (
                'key' => 'language5_home5_text45',
                'value' => 'language5_home5_text45',
                'type' => 'kundol_web_setting',
            ),
            185 => 
            array (
                'key' => 'language5_home5_text46',
                'value' => 'language5_home5_text46',
                'type' => 'kundol_web_setting',
            ),
            186 => 
            array (
                'key' => 'language5_home5_text47',
                'value' => 'language5_home5_text47',
                'type' => 'kundol_web_setting',
            ),
            187 => 
            array (
                'key' => 'language5_home5_text48',
                'value' => 'language5_home5_text48',
                'type' => 'kundol_web_setting',
            ),
            188 => 
            array (
                'key' => 'language5_home5_text49',
                'value' => 'language5_home5_text49',
                'type' => 'kundol_web_setting',
            ),
            189 => 
            array (
                'key' => 'language5_home5_text50',
                'value' => 'language5_home5_text50',
                'type' => 'kundol_web_setting',
            ),
            190 => 
            array (
                'key' => 'language5_home6_text1',
                'value' => 'language5_home6_text1',
                'type' => 'kundol_web_setting',
            ),
            191 => 
            array (
                'key' => 'language5_home6_text2',
                'value' => 'language5_home6_text2',
                'type' => 'kundol_web_setting',
            ),
            192 => 
            array (
                'key' => 'language5_home6_text3',
                'value' => 'language5_home6_text3',
                'type' => 'kundol_web_setting',
            ),
            193 => 
            array (
                'key' => 'language5_home6_text4',
                'value' => 'language5_home6_text4',
                'type' => 'kundol_web_setting',
            ),
            194 => 
            array (
                'key' => 'language5_home6_text5',
                'value' => 'language5_home6_text5',
                'type' => 'kundol_web_setting',
            ),
            195 => 
            array (
                'key' => 'language5_home6_text6',
                'value' => 'language5_home6_text6',
                'type' => 'kundol_web_setting',
            ),
            196 => 
            array (
                'key' => 'language5_home6_text7',
                'value' => 'language5_home6_text7',
                'type' => 'kundol_web_setting',
            ),
            197 => 
            array (
                'key' => 'language5_home6_text8',
                'value' => 'language5_home6_text8',
                'type' => 'kundol_web_setting',
            ),
            198 => 
            array (
                'key' => 'language5_home6_text9',
                'value' => 'language5_home6_text9',
                'type' => 'kundol_web_setting',
            ),
            199 => 
            array (
                'key' => 'language5_home6_text10',
                'value' => 'language5_home6_text10',
                'type' => 'kundol_web_setting',
            ),
            200 => 
            array (
                'key' => 'language5_home6_text11',
                'value' => 'language5_home6_text11',
                'type' => 'kundol_web_setting',
            ),
            201 => 
            array (
                'key' => 'language5_home6_text12',
                'value' => 'language5_home6_text12',
                'type' => 'kundol_web_setting',
            ),
            202 => 
            array (
                'key' => 'language5_home6_text13',
                'value' => 'language5_home6_text13',
                'type' => 'kundol_web_setting',
            ),
            203 => 
            array (
                'key' => 'language5_home6_text14',
                'value' => 'language5_home6_text14',
                'type' => 'kundol_web_setting',
            ),
            204 => 
            array (
                'key' => 'language5_home6_text15',
                'value' => 'language5_home6_text15',
                'type' => 'kundol_web_setting',
            ),
            205 => 
            array (
                'key' => 'language5_home6_text16',
                'value' => 'language5_home6_text16',
                'type' => 'kundol_web_setting',
            ),
            206 => 
            array (
                'key' => 'language5_home6_text17',
                'value' => 'language5_home6_text17',
                'type' => 'kundol_web_setting',
            ),
            207 => 
            array (
                'key' => 'language5_home6_text18',
                'value' => 'language5_home6_text18',
                'type' => 'kundol_web_setting',
            ),
            208 => 
            array (
                'key' => 'language5_home6_text19',
                'value' => 'language5_home6_text19',
                'type' => 'kundol_web_setting',
            ),
            209 => 
            array (
                'key' => 'language5_home6_text20',
                'value' => 'language5_home6_text20',
                'type' => 'kundol_web_setting',
            ),
            210 => 
            array (
                'key' => 'language5_home7_text1',
                'value' => 'language5_home7_text1',
                'type' => 'kundol_web_setting',
            ),
            211 => 
            array (
                'key' => 'language5_home7_text2',
                'value' => 'language5_home7_text2',
                'type' => 'kundol_web_setting',
            ),
            212 => 
            array (
                'key' => 'language5_home7_text3',
                'value' => 'language5_home7_text3',
                'type' => 'kundol_web_setting',
            ),
            213 => 
            array (
                'key' => 'language5_home7_text4',
                'value' => 'language5_home7_text4',
                'type' => 'kundol_web_setting',
            ),
            214 => 
            array (
                'key' => 'language5_home7_text5',
                'value' => 'language5_home7_text5',
                'type' => 'kundol_web_setting',
            ),
            215 => 
            array (
                'key' => 'language5_home7_text6',
                'value' => 'language5_home7_text6',
                'type' => 'kundol_web_setting',
            ),
            216 => 
            array (
                'key' => 'language5_home7_text7',
                'value' => 'language5_home7_text7',
                'type' => 'kundol_web_setting',
            ),
            217 => 
            array (
                'key' => 'language5_home7_text8',
                'value' => 'language5_home7_text8',
                'type' => 'kundol_web_setting',
            ),
            218 => 
            array (
                'key' => 'language5_home7_text9',
                'value' => 'language5_home7_text9',
                'type' => 'kundol_web_setting',
            ),
            219 => 
            array (
                'key' => 'language5_home7_text10',
                'value' => 'language5_home7_text10',
                'type' => 'kundol_web_setting',
            ),
            220 => 
            array (
                'key' => 'language5_home7_text11',
                'value' => 'language5_home7_text11',
                'type' => 'kundol_web_setting',
            ),
            221 => 
            array (
                'key' => 'language5_home7_text12',
                'value' => 'language5_home7_text12',
                'type' => 'kundol_web_setting',
            ),
            222 => 
            array (
                'key' => 'language5_home7_text13',
                'value' => 'language5_home7_text13',
                'type' => 'kundol_web_setting',
            ),
            223 => 
            array (
                'key' => 'language5_home7_text14',
                'value' => 'language5_home7_text14',
                'type' => 'kundol_web_setting',
            ),
            224 => 
            array (
                'key' => 'language5_home7_text15',
                'value' => 'language5_home7_text15',
                'type' => 'kundol_web_setting',
            ),
            225 => 
            array (
                'key' => 'language5_home7_text16',
                'value' => 'language5_home7_text16',
                'type' => 'kundol_web_setting',
            ),
            226 => 
            array (
                'key' => 'language5_home7_text17',
                'value' => 'language5_home7_text17',
                'type' => 'kundol_web_setting',
            ),
            227 => 
            array (
                'key' => 'language5_home7_text18',
                'value' => 'language5_home7_text18',
                'type' => 'kundol_web_setting',
            ),
            228 => 
            array (
                'key' => 'language5_home7_text19',
                'value' => 'language5_home7_text19',
                'type' => 'kundol_web_setting',
            ),
            229 => 
            array (
                'key' => 'language5_home7_text20',
                'value' => 'language5_home7_text20',
                'type' => 'kundol_web_setting',
            ),
            230 => 
            array (
                'key' => 'language5_home7_text21',
                'value' => 'language5_home7_text21',
                'type' => 'kundol_web_setting',
            ),
            231 => 
            array (
                'key' => 'language5_home7_text22',
                'value' => 'language5_home7_text22',
                'type' => 'kundol_web_setting',
            ),
            232 => 
            array (
                'key' => 'language5_home7_text23',
                'value' => 'language5_home7_text23',
                'type' => 'kundol_web_setting',
            ),
            233 => 
            array (
                'key' => 'language5_home7_text24',
                'value' => 'language5_home7_text24',
                'type' => 'kundol_web_setting',
            ),
            234 => 
            array (
                'key' => 'language5_home7_text25',
                'value' => 'language5_home7_text25',
                'type' => 'kundol_web_setting',
            ),
            235 => 
            array (
                'key' => 'language5_home7_text26',
                'value' => 'language5_home7_text26',
                'type' => 'kundol_web_setting',
            ),
            236 => 
            array (
                'key' => 'language5_home7_text27',
                'value' => 'language5_home7_text27',
                'type' => 'kundol_web_setting',
            ),
            237 => 
            array (
                'key' => 'language5_home7_text28',
                'value' => 'language5_home7_text28',
                'type' => 'kundol_web_setting',
            ),
            238 => 
            array (
                'key' => 'language5_home7_text29',
                'value' => 'language5_home7_text29',
                'type' => 'kundol_web_setting',
            ),
            239 => 
            array (
                'key' => 'language5_home7_text30',
                'value' => 'language5_home7_text30',
                'type' => 'kundol_web_setting',
            ),
            240 => 
            array (
                'key' => 'language5_home8_text1',
                'value' => 'language5_home8_text1',
                'type' => 'kundol_web_setting',
            ),
            241 => 
            array (
                'key' => 'language5_home8_text2',
                'value' => 'language5_home8_text2',
                'type' => 'kundol_web_setting',
            ),
            242 => 
            array (
                'key' => 'language5_home8_text3',
                'value' => 'language5_home8_text3',
                'type' => 'kundol_web_setting',
            ),
            243 => 
            array (
                'key' => 'language5_home8_text4',
                'value' => 'language5_home8_text4',
                'type' => 'kundol_web_setting',
            ),
            244 => 
            array (
                'key' => 'language5_home8_text5',
                'value' => 'language5_home8_text5',
                'type' => 'kundol_web_setting',
            ),
            245 => 
            array (
                'key' => 'language5_home8_text6',
                'value' => 'language5_home8_text6',
                'type' => 'kundol_web_setting',
            ),
            246 => 
            array (
                'key' => 'language5_home8_text7',
                'value' => 'language5_home8_text7',
                'type' => 'kundol_web_setting',
            ),
            247 => 
            array (
                'key' => 'language5_home8_text8',
                'value' => 'language5_home8_text8',
                'type' => 'kundol_web_setting',
            ),
            248 => 
            array (
                'key' => 'language5_home8_text9',
                'value' => 'language5_home8_text9',
                'type' => 'kundol_web_setting',
            ),
            249 => 
            array (
                'key' => 'language5_home8_text10',
                'value' => 'language5_home8_text10',
                'type' => 'kundol_web_setting',
            ),
            250 => 
            array (
                'key' => 'language5_home8_text11',
                'value' => 'language5_home8_text11',
                'type' => 'kundol_web_setting',
            ),
            251 => 
            array (
                'key' => 'language5_home8_text12',
                'value' => 'language5_home8_text12',
                'type' => 'kundol_web_setting',
            ),
            252 => 
            array (
                'key' => 'language5_home8_text13',
                'value' => 'language5_home8_text13',
                'type' => 'kundol_web_setting',
            ),
            253 => 
            array (
                'key' => 'language5_home8_text14',
                'value' => 'language5_home8_text14',
                'type' => 'kundol_web_setting',
            ),
            254 => 
            array (
                'key' => 'language5_home8_text15',
                'value' => 'language5_home8_text15',
                'type' => 'kundol_web_setting',
            ),
            255 => 
            array (
                'key' => 'language5_home8_text16',
                'value' => 'language5_home8_text16',
                'type' => 'kundol_web_setting',
            ),
            256 => 
            array (
                'key' => 'language5_home8_text17',
                'value' => 'language5_home8_text17',
                'type' => 'kundol_web_setting',
            ),
            257 => 
            array (
                'key' => 'language5_home8_text18',
                'value' => 'language5_home8_text18',
                'type' => 'kundol_web_setting',
            ),
            258 => 
            array (
                'key' => 'language5_home8_text19',
                'value' => 'language5_home8_text19',
                'type' => 'kundol_web_setting',
            ),
            259 => 
            array (
                'key' => 'language5_home8_text20',
                'value' => 'language5_home8_text20',
                'type' => 'kundol_web_setting',
            ),
            260 => 
            array (
                'key' => 'language5_home8_text21',
                'value' => 'language5_home8_text21',
                'type' => 'kundol_web_setting',
            ),
            261 => 
            array (
                'key' => 'language5_home8_text22',
                'value' => 'language5_home8_text22',
                'type' => 'kundol_web_setting',
            ),
            262 => 
            array (
                'key' => 'language5_home8_text23',
                'value' => 'language5_home8_text23',
                'type' => 'kundol_web_setting',
            ),
            263 => 
            array (
                'key' => 'language5_home8_text24',
                'value' => 'language5_home8_text24',
                'type' => 'kundol_web_setting',
            ),
            264 => 
            array (
                'key' => 'language5_home8_text25',
                'value' => 'language5_home8_text25',
                'type' => 'kundol_web_setting',
            ),
            265 => 
            array (
                'key' => 'language5_home8_text26',
                'value' => 'language5_home8_text26',
                'type' => 'kundol_web_setting',
            ),
            266 => 
            array (
                'key' => 'language5_home8_text27',
                'value' => 'language5_home8_text27',
                'type' => 'kundol_web_setting',
            ),
            267 => 
            array (
                'key' => 'language5_home8_text28',
                'value' => 'language5_home8_text28',
                'type' => 'kundol_web_setting',
            ),
            268 => 
            array (
                'key' => 'language5_home8_text29',
                'value' => 'language5_home8_text29',
                'type' => 'kundol_web_setting',
            ),
            269 => 
            array (
                'key' => 'language5_home8_text30',
                'value' => 'language5_home8_text30',
                'type' => 'kundol_web_setting',
            ),
            270 => 
            array (
                'key' => 'language5_home9_text1',
                'value' => 'language5_home9_text1',
                'type' => 'kundol_web_setting',
            ),
            271 => 
            array (
                'key' => 'language5_home9_text2',
                'value' => 'language5_home9_text2',
                'type' => 'kundol_web_setting',
            ),
            272 => 
            array (
                'key' => 'language5_home9_text3',
                'value' => 'language5_home9_text3',
                'type' => 'kundol_web_setting',
            ),
            273 => 
            array (
                'key' => 'language5_home9_text4',
                'value' => 'language5_home9_text4',
                'type' => 'kundol_web_setting',
            ),
            274 => 
            array (
                'key' => 'language5_home9_text5',
                'value' => 'language5_home9_text5',
                'type' => 'kundol_web_setting',
            ),
            275 => 
            array (
                'key' => 'language5_home9_text6',
                'value' => 'language5_home9_text6',
                'type' => 'kundol_web_setting',
            ),
            276 => 
            array (
                'key' => 'language5_home9_text7',
                'value' => 'language5_home9_text7',
                'type' => 'kundol_web_setting',
            ),
            277 => 
            array (
                'key' => 'language5_home9_text8',
                'value' => 'language5_home9_text8',
                'type' => 'kundol_web_setting',
            ),
            278 => 
            array (
                'key' => 'language5_home9_text9',
                'value' => 'language5_home9_text9',
                'type' => 'kundol_web_setting',
            ),
            279 => 
            array (
                'key' => 'language5_home9_text10',
                'value' => 'language5_home9_text10',
                'type' => 'kundol_web_setting',
            ),
            280 => 
            array (
                'key' => 'language5_home9_text11',
                'value' => 'language5_home9_text11',
                'type' => 'kundol_web_setting',
            ),
            281 => 
            array (
                'key' => 'language5_home9_text12',
                'value' => 'language5_home9_text12',
                'type' => 'kundol_web_setting',
            ),
            282 => 
            array (
                'key' => 'language5_home9_text13',
                'value' => 'language5_home9_text13',
                'type' => 'kundol_web_setting',
            ),
            283 => 
            array (
                'key' => 'language5_home9_text14',
                'value' => 'language5_home9_text14',
                'type' => 'kundol_web_setting',
            ),
            284 => 
            array (
                'key' => 'language5_home9_text15',
                'value' => 'language5_home9_text15',
                'type' => 'kundol_web_setting',
            ),
            285 => 
            array (
                'key' => 'language5_home9_text16',
                'value' => 'language5_home9_text16',
                'type' => 'kundol_web_setting',
            ),
            286 => 
            array (
                'key' => 'language5_home9_text17',
                'value' => 'language5_home9_text17',
                'type' => 'kundol_web_setting',
            ),
            287 => 
            array (
                'key' => 'language5_home9_text18',
                'value' => 'language5_home9_text18',
                'type' => 'kundol_web_setting',
            ),
            288 => 
            array (
                'key' => 'language5_home9_text19',
                'value' => 'language5_home9_text19',
                'type' => 'kundol_web_setting',
            ),
            289 => 
            array (
                'key' => 'language5_home9_text20',
                'value' => 'language5_home9_text20',
                'type' => 'kundol_web_setting',
            ),
            290 => 
            array (
                'key' => 'language5_home9_text21',
                'value' => 'language5_home9_text21',
                'type' => 'kundol_web_setting',
            ),
            291 => 
            array (
                'key' => 'language5_home9_text22',
                'value' => 'language5_home9_text22',
                'type' => 'kundol_web_setting',
            ),
            292 => 
            array (
                'key' => 'language5_home9_text23',
                'value' => 'language5_home9_text23',
                'type' => 'kundol_web_setting',
            ),
            293 => 
            array (
                'key' => 'language5_home9_text24',
                'value' => 'language5_home9_text24',
                'type' => 'kundol_web_setting',
            ),
            294 => 
            array (
                'key' => 'language5_home9_text25',
                'value' => 'language5_home9_text25',
                'type' => 'kundol_web_setting',
            ),
            295 => 
            array (
                'key' => 'language5_home9_text26',
                'value' => 'language5_home9_text26',
                'type' => 'kundol_web_setting',
            ),
            296 => 
            array (
                'key' => 'language5_home9_text27',
                'value' => 'language5_home9_text27',
                'type' => 'kundol_web_setting',
            ),
            297 => 
            array (
                'key' => 'language5_home9_text28',
                'value' => 'language5_home9_text28',
                'type' => 'kundol_web_setting',
            ),
            298 => 
            array (
                'key' => 'language5_home9_text29',
                'value' => 'language5_home9_text29',
                'type' => 'kundol_web_setting',
            ),
            299 => 
            array (
                'key' => 'language5_home9_text30',
                'value' => 'language5_home9_text30',
                'type' => 'kundol_web_setting',
            ),
            300 => 
            array (
                'key' => 'language5_home9_text31',
                'value' => 'language5_home9_text31',
                'type' => 'kundol_web_setting',
            ),
            301 => 
            array (
                'key' => 'language5_home9_text32',
                'value' => 'language5_home9_text32',
                'type' => 'kundol_web_setting',
            ),
            302 => 
            array (
                'key' => 'language5_home9_text33',
                'value' => 'language5_home9_text33',
                'type' => 'kundol_web_setting',
            ),
            303 => 
            array (
                'key' => 'language5_home9_text34',
                'value' => 'language5_home9_text34',
                'type' => 'kundol_web_setting',
            ),
            304 => 
            array (
                'key' => 'language5_home9_text35',
                'value' => 'language5_home9_text35',
                'type' => 'kundol_web_setting',
            ),
            305 => 
            array (
                'key' => 'language5_home9_text36',
                'value' => 'language5_home9_text36',
                'type' => 'kundol_web_setting',
            ),
            306 => 
            array (
                'key' => 'language5_home9_text37',
                'value' => 'language5_home9_text37',
                'type' => 'kundol_web_setting',
            ),
            307 => 
            array (
                'key' => 'language5_home9_text38',
                'value' => 'language5_home9_text38',
                'type' => 'kundol_web_setting',
            ),
            308 => 
            array (
                'key' => 'language5_home9_text39',
                'value' => 'language5_home9_text39',
                'type' => 'kundol_web_setting',
            ),
            309 => 
            array (
                'key' => 'language5_home9_text40',
                'value' => 'language5_home9_text40',
                'type' => 'kundol_web_setting',
            ),
            310 => 
            array (
                'key' => 'language5_home9_text41',
                'value' => 'language5_home9_text41',
                'type' => 'kundol_web_setting',
            ),
            311 => 
            array (
                'key' => 'language5_home9_text42',
                'value' => 'language5_home9_text42',
                'type' => 'kundol_web_setting',
            ),
            312 => 
            array (
                'key' => 'language5_home9_text43',
                'value' => 'language5_home9_text43',
                'type' => 'kundol_web_setting',
            ),
            313 => 
            array (
                'key' => 'language5_home9_text44',
                'value' => 'language5_home9_text44',
                'type' => 'kundol_web_setting',
            ),
            314 => 
            array (
                'key' => 'language5_home9_text45',
                'value' => 'language5_home9_text45',
                'type' => 'kundol_web_setting',
            ),
            315 => 
            array (
                'key' => 'language5_home9_text46',
                'value' => 'language5_home9_text46',
                'type' => 'kundol_web_setting',
            ),
            316 => 
            array (
                'key' => 'language5_home9_text47',
                'value' => 'language5_home9_text47',
                'type' => 'kundol_web_setting',
            ),
            317 => 
            array (
                'key' => 'language5_home9_text48',
                'value' => 'language5_home9_text48',
                'type' => 'kundol_web_setting',
            ),
            318 => 
            array (
                'key' => 'language5_home9_text49',
                'value' => 'language5_home9_text49',
                'type' => 'kundol_web_setting',
            ),
            319 => 
            array (
                'key' => 'language5_home9_text50',
                'value' => 'language5_home9_text50',
                'type' => 'kundol_web_setting',
            ),
        ));    
        
        
        // $total_home_pages = 9;
        // $total_languages = 5;
        // $total_home_text_fields[1] = 30;
        // $total_home_text_fields[2] = 30;
        // $total_home_text_fields[3] = 30;
        // $total_home_text_fields[4] = 60;
        // $total_home_text_fields[5] = 50;
        // $total_home_text_fields[6] = 20;
        // $total_home_text_fields[7] = 30;
        // $total_home_text_fields[8] = 30;
        // $total_home_text_fields[9] = 50;    

        //     for ($i=1; $i<=$total_languages; $i++)
        //     {
        //         for ($j=1; $j<=$total_home_pages; $j++)
        //         {
                    
        //             for ($k=1; $k<=$total_home_text_fields[$j]; $k++)
        //             {
        //                 Setting::insertOrIgnore([
                            
        //                         "key" => "language".$i."_home".$j."_text".$k,
        //                         "value" => "language".$i."_home".$j."_text".$k,
        //                         "type" => "kundol_web_setting"
                            
        //                 ]);
        //             }
        //         }
        //     }    

           

        //business firebase setting
        Setting::insertOrIgnore([
            [
                'key' => 'api_key',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'auth_domain',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'database_url',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'peoject_id',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'storage_bucket',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'messaging_sender_id',
                'value' => '',
                'type' => 'business_firebase_setting',
            ],
            [
                'key' => 'app_id',
                'value' => '',
                'type' => 'business_firebase_setting',
            ]
        ]);

        //email templates setting
//         Setting::insertOrIgnore([
//             [
//                 'key' => 'forget_email_template',
//                 'value' => '<html>
//                 <head>
//                 <title>Password Reset</title>
//                 </head>
                
//                 <body style="background-color: #e9ecef;">
//                     <p>Dear Customer,</p>
//                     <div>There was a request to change your password!</div>
//                     <br />
//                     <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                         <tbody>
//                             <tr>
//                                 <td bgcolor="#ffffff">
//                                     <table border="0" width="100%" cellspacing="0" cellpadding="10">
//                                         <tbody>
//                                             <tr>
//                                                 <td bgcolor="#ffffff">
//                                                     <h1>Reset Your Password</h1>
//                                                     <p>Tap the button below to reset your customer account password. If you did not
//                                                         request a new password, you can safely delete this email.</p>
//                                                     <p>    
//                                                         <a href="forget_link" target="_blank">Reset Password</a>
//                                                     </p>    
//                                                     <p>If that does not work, copy and paste the following link in your browser:</p>
//                                                     <p><a href="#" target="_blank">https://same-link-as-button.url/xxx-xxx-xxxx</a></p>
                
//                                                     <p>Cheers,<br /> Themes-Coder Team.</p>
                
//                                                 </td>
//                                             </tr>
//                                         </tbody>
//                                     </table>
//                                 </td>
//                             </tr>
                          
//                             <tr>
//                                 <td bgcolor="#e9ecef">
//                                     <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                                         <tbody>
//                                             <tr>
//                                                 <td bgcolor="#e9ecef">
//                                                     <p>You received this email because we received a request for [type_of_action] for
//                                                         your account. If you did not request [type_of_action] you can safely delete this
//                                                         email.</p>
//                                                 </td>
//                                             </tr>
//                                             <tr>
//                                                 <td bgcolor="#e9ecef">
//                                                     <p>To stop receiving these emails, you can <a href="#"
//                                                             target="_blank">unsubscribe</a> at any time.
                
//                                                     <br />
//                                                             1223, Main Street, Anytown New York, 38000 USA</p>
//                                                 </td>
//                                             </tr>
//                                         </tbody>
//                                     </table>
//                                 </td>
//                             </tr>
//                         </tbody>
//                     </table>
//                 </body>
                
//                 </html>',
//                 'type' => 'email_template',
//             ],
//             [
//                 'key' => 'contact_us_email_template',
//                 'value' => '<html>
// <head>
// <title>Contact Us</title>
// </head>
// <body style="background-color: #e9ecef;">
//     <p>Dear Admin,</p>
//     <div>There was a contact inquiry, please see details below.</div>
//     <br />

//     <table border="0" width="100%" cellspacing="0" cellpadding="0">
//         <tbody>
//             <tr>
//                 <td bgcolor="#ffffff">
//                 <table border="0" width="100%" cellspacing="0" cellpadding="10" bgcolor="#ffffff">
//                 <tbody>
//                     <tr>
//                     <td>
//                         <b>Name:</b> username<br />
//                         <b>Email:</b> useremail<br />
//                         <b>Phone:</b> userphone<br />
//                         <b>Message:</b> usermessage<br />
//                     </td>
//                     </tr>
//                 </tbody>
//                 </table>
//                 </td>
//             </tr>
          
//             <tr>
//                 <td bgcolor="#e9ecef">
//                     <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                         <tbody>
//                             <tr>
//                                 <td bgcolor="#e9ecef">
//                                     <p>You received this email because we received a request for [type_of_action] for
//                                         your account. If you did not request [type_of_action] you can safely delete this
//                                         email.</p>
//                                 </td>
//                             </tr>
//                             <tr>
//                                 <td bgcolor="#e9ecef">
//                                     <p>To stop receiving these emails, you can <a href="#"
//                                             target="_blank">unsubscribe</a> at any time.

//                                     <br />
//                                             1223, Main Street, Anytown New York, 38000 USA</p>
//                                 </td>
//                             </tr>
//                         </tbody>
//                     </table>
//                 </td>
//             </tr>
//         </tbody>
//     </table>
//   </body>
// </html>',
//                 'type' => 'email_template',
//             ]
//         ]);
//         //email templates setting
//         Setting::insertOrIgnore([
//             [
//                 'key' => 'welcome_email_template',
//                 'value' => '<html>
//                 <head>
//                 <title>Email Subscription</title>
//                 </head>
                
//                 <body style="background-color: #e9ecef;">
//                     <p>Dear Customer,</p>
//                     <div>Thank you for joining our email subscription.</div>
//                     <br />
//                     <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                         <tbody>
//                             <tr>
//                                 <td bgcolor="#ffffff">
//                                     <table border="0" width="100%" cellspacing="0" cellpadding="10">
//                                         <tbody>
//                                             <tr>
//                                                 <td bgcolor="#ffffff">
                                                
//                                                 <div>
//                                                   <h3>We&rsquo;re here to give you best products, discountsand sales promotion. Stay tuned with us to get yourdiscount vochures and enjoy your shopping</h3>
//                                                   <h1>Get 30% Off</h1>
//                                                   <p>
//                                                     <a href="https://themes-coder.com/">Visit Store Now</a>
//                                                   </p>
//                                                 </div>
                
//                                                 </td>
//                                             </tr>
//                                         </tbody>
//                                     </table>
//                                 </td>
//                             </tr>
                          
//                             <tr>
//                                 <td bgcolor="#e9ecef">
//                                     <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                                         <tbody>
//                                             <tr>
//                                                 <td bgcolor="#e9ecef">
//                                                     <p>Cheers,<br /> Themes-Coder Team.</p>
//                                                 </td>
//                                             </tr>
//                                             <tr>
//                                                 <td bgcolor="#e9ecef">
//                                                     <p>To stop receiving these emails, you can <a href="#"
//                                                             target="_blank">unsubscribe</a> at any time.
                
//                                                     <br />
//                                                             1223, Main Street, Anytown New York, 38000 USA</p>
//                                                 </td>
//                                             </tr>
//                                         </tbody>
//                                     </table>
//                                 </td>
//                             </tr>
//                         </tbody>
//                     </table>
//                 </body>
                
//                 </html>',
//                 'type' => 'email_template',
//             ],
//             [
//                 'key' => 'order_email_template',
//                 'value' => `<!DOCTYPE html>
//                 <html lang="en">
//                 <head>
//                 </head>
                
//                 <body>
//                 <p>&nbsp;</p>
//                 <!-- utf-8 works for most cases -->
//                 <p>&nbsp;</p>
//                 <!-- Forcing initial-scale shouldn't be necessary -->
//                 <p>&nbsp;</p>
//                 <!-- Use the latest (edge) version of IE rendering engine -->
//                 <p>&nbsp;</p>
//                 <!-- Disable auto-scale in iOS 10 Mail entirely -->
//                 <p>&nbsp;</p>
//                 <!-- The title tag shows in email notifications, like Android 4.4. -->
//                 <p>&nbsp;</p>
//                 <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
//                 <p>&nbsp;</p>
//                 <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
//                 <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
//                 <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->cart_items
//                 <table style="margin: auto;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
//                 <tbody>
//                 <tr>
//                 <td class="bg_white" style="padding: 1em 2.5em 0 2.5em;" valign="top">
//                 <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                 <tbody>
//                 <tr>
//                 <td class="logo" style="text-align: center;"><a href="https://aytlidergrup.ro/"><img src="https://aytlidergrup.ro/gallary/202111081736ayt-logo-small.png" alt="logo" /></a></td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 <!-- end tr -->
//                 <tr style="background-color: #fff; border-top: 1px solid #000;">
//                 <td style="padding: 0 2.5em; text-align: left;">
//                 <div class="heading-section">
//                 <div class="headingLatin" style="display: flex; align-items: center; justify-content: center; z-index: 2; position: relative;">
//                 <h6 style="color: #fff; margin-bottom: 5px; font-size: 14px;">ORDER Status</h6>
//                 <p style="color: #fff; margin-bottom: 0; font-size: 14px;">ID : order_id</p>
//                 </div>
//                 </div>
//                 </td>
//                 </tr>
//                 <tr>
//                 <td class="hero bg_white" style="height: 400px; border-bottom: 1px solid #000;" valign="middle">
//                 <div class="overlay">&nbsp;</div>
//                 <table>
//                 <tbody>
//                 <tr>
//                 <td>
//                 <div class="text" style="padding: 0 4em; text-align: center;">
//                 <p style="font-size: 15px; color: #000;">Stay Tuned With Us</p>
//                 <h2 style="font-size: 22px;">YOUR ORDER HAS BEEN Status AND WILL BE SHIPPED SHORTLY</h2>
//                 <p>&nbsp;</p>
//                 </div>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 <tr>
//                 <td class="hero bg_white" style="padding: 0 2.5em; height: 400px;" valign="middle">
//                 <table width="100%">
//                 <tbody>
//                 <tr style="display: flex; justify-content: space-between; align-items: center;">
//                 <th class="border-0">
//                 <h5 style="margin: 0; font-size: 16px;">Buyer Name:</h5>
//                 </th>
//                 <td style="display: flex; justify-content: flex-end;">
//                 <p style="margin: 0; font-size: 16px; color: #000;">buyer_name</p>
//                 </td>
//                 </tr>
//                 <tr style="display: flex; justify-content: space-between; align-items: center;">
//                 <th class="border-0">
//                 <h5 style="margin: 0; font-size: 16px;">Shipping Address:</h5>
//                 </th>
//                 <td style="display: flex; justify-content: flex-end;">
//                 <p style="margin: 0; font-size: 16px; color: #000;">shipping_address</p>
//                 </td>
//                 </tr>
//                 <tr style="display: flex; justify-content: space-between; align-items: center;">
//                 <th class="border-0">
//                 <h5 style="margin: 0; font-size: 16px;">Tracking ID:</h5>
//                 </th>
//                 <td style="display: flex; justify-content: flex-end;">
//                 <p style="margin: 0; font-size: 16px; color: blue;">order_id</p>
//                 </td>
//                 </tr>
//                 <tr style="display: flex; justify-content: space-between; align-items: center;">
//                 <th class="border-0">
//                 <h5 style="margin: 0; font-size: 16px;">Total Amount:</h5>
//                 </th>
//                 <td style="display: flex; justify-content: flex-end;">
//                 <p style="margin: 0; font-size: 16px; color: #000;">amount</p>
//                 </td>
//                 </tr>
//                 <tr>
//                 <td>
//                 <div style="padding: 3em; text-align: center;">
//                 <p><a class="btn btn-black" href="#">TRACK PACKAGE</a></p>
//                 </div>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 <tr>
//                 <td class="bg_light footer" valign="middle">
//                 <table>
//                 <tbody>
//                 <tr style="text-align: left;">
//                 <td style="padding-top: 20px; text-align: center;" valign="middle">
//                 <h3 class="heading text-black">Your Package Includes</h3>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 <!-- end tr -->
//                 <tr>
//                 <td>
//                 <table class="footer" style="margin: auto;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
//                 <tbody>
//                 <tr>
//                 <td class="bg_black footer email-section" valign="middle">
//                 <table>
//                 <tbody>
//                 <tr>
//                 <td style="padding-top: 20px;" valign="top" width="45%">
//                 <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                 <tbody>
//                 <tr>
//                 <td style="text-align: left; padding-right: 10px;">
//                 <h3 class="heading text-white">Do you need Help?</h3>
//                 <p class="text-white" style="font-size: 11px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id euismod ex, eget cursus felis.</p>
//                 <ul style="list-style-type: none; margin: 0; padding: 0;">
//                 <li style="display: flex; align-items: center; margin-bottom: 10px;">
//                 <p class="text-white" style="margin-top: 0; margin-bottom: 0; margin-left: 15px; font-size: 12px;">9887-152-435</p>
//                 </li>
//                 <li style="display: flex; align-items: center;">
//                 <p class="text-white" style="margin-top: 0; margin-bottom: 0; margin-left: 15px; font-size: 12px;">Email@yourcompanyname.com</p>
//                 </li>
//                 </ul>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 <td style="padding-top: 20px;" valign="top" width="30%">
//                 <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                 <tbody>
//                 <tr>
//                 <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
//                 <h3 class="heading text-white">Important Info</h3>
//                 <ul style="list-style-type: none; margin: 0; padding: 0;">
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Terms &amp; Conditions</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Submission Specifications</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Refund Policy</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Privacy Policy</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Delivery information</p>
//                 </li>
//                 </ul>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 <td style="padding-top: 20px;" valign="top" width="27%">
//                 <table border="0" width="100%" cellspacing="0" cellpadding="0">
//                 <tbody>
//                 <tr>
//                 <td style="text-align: left; padding-left: 10px;">
//                 <h3 class="heading text-white">Social Media</h3>
//                 <ul style="list-style-type: none; margin: 0; padding: 0;">
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Facebook</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Twitter</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Linked In</p>
//                 </li>
//                 <li style="display: flex; align-items: center; margin-bottom: 5px;">
//                 <p style="margin-top: 0; margin-bottom: 0; margin-left: 10px; font-size: 12px;">Youtube</p>
//                 </li>
//                 </ul>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 <!-- end: tr -->
//                 <tr class="bg_black" style="border-top: 1px solid #fff;">
//                 <td class="bg_black" style="text-align: center;">
//                 <p class="text-white">2015-2019 companyname.com All rights are reserved</p>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 <!-- 1 Column Text + Button : END --></tbody>
//                 </table>
//                 </div>
//                 </center>
//                 </body>
//                 </html>`,
//                 'type' => 'email_template',
//             ]
//         ]);

        //business business_google_setting setting
        Setting::insertOrIgnore([
            [
                'key' => 'google_map_api_string',
                'value' => '',
                'type' => 'business_google_setting',
            ]
        ]);

        //business same for billing
        Setting::insertOrIgnore([
            [
                'key' => 'same_for_billing',
                'value' => '1',
                'type' => 'business_general',
            ]
        ]);

    }
}
