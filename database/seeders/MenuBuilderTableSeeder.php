<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\MenuBuilder;

class MenuBuilderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuBuilder::where('id', '>', '0')->delete();
        MenuBuilder::insertOrIgnore([
            'menu' => '[
                    {
                        "id": 1628672836150,
                        "link": "",
                        "name": [
                            "Home",
                            "Beranda",
                            "الصفحة الرئيسية",
                            "Home"
                        ],
                        "page": "/",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2,
                            3,
                            4,
                        ]
                    },
                    {
                        "id": 1628672997563,
                        "link": "",
                        "name": [
                            "Shop",
                            "Belanja",
                            "محل",
                            "Shop"
                        ],
                        "page": "/shop",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2,
                            3,
                            4
                        ]
                    },
                    {
                        "id": 1628672976637,
                        "link": "",
                        "name": [
                            "Blog",
                            "Blog",
                            "مقالات",
                            "Blog"
                        ],
                        "page": "/blog",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2,
                            3,
                            4
                        ]
                    },
                    {
                        "id": 1628672935413,
                        "link": "",
                        "name": [
                            "Contact Us",
                            "Hubungi Kami",
                            "اتصل بنا",
                            "Contact Us"
                        ],
                        "page": "/contact-us",
                        "type": "page",
                        "exlink": "",
                        "product": "",
                        "category": "",
                        "children": [],
                        "contentpage": "",
                        "language_id": [
                            1,
                            2,
                            3,
                            4
                        ]
                    }     
            ]',
        ]);
    }
}
