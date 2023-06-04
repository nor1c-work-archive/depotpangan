<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Gallary;
class GallarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallary::where('id', '>', '0')->delete();

         // Gallary::insertOrIgnore([
         //    'name'=>'01-logo.png',
         //    'extension'=>'image/png',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'01-slider.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109042527banner_270x211.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109025727banner_270x229.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109042309banner_271x451.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109025813banner_368x550.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109025823banner_370x210.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109025851banner_370x220.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109025909banner_370x230.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109025939banner_370x230.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109020219banner_370x277.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109040046banner_370x493.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109045900banner_372x546.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109020247banner_470x210.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109020336banner_470x210.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109020344banner_568x298.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109042006banner_570x211.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109041942banner_570x451.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109020413banner_570x490.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109043135banner_770x259.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109045938banner_770x301.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109045900banner_372x546.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109045938banner_770x301.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109045420banner_270x229.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109041942banner_570x451.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109042006banner_570x211.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109042527banner_270x211.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109042309banner_271x451.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109040046banner_370x493.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109043135banner_770x259.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109054227banner_370x193.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109054758category900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109055140wUJPQ27501.png',
         //    'extension'=>'image/png',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109050158product_1_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109050215product_2_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109050235product_3_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109052217product_4_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109052232product_5_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109052248product_6_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109052304product_7_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109061656homebanner1600x800.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109081240product_8_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);	
         // Gallary::insertOrIgnore([
         //    'name'=>'202109081253product_9_900x900.jpg',
         //    'extension'=>'image/jpeg',
         //    'user_id'=>'1',
         //    'created_by'=>'1'
         // ]);

         \DB::table('gallary')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => '01-logo.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => '01-slider.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => '202109042527banner_270x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => '202109025727banner_270x229.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => '202109042309banner_271x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => '202109025813banner_368x550.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => '202109025823banner_370x210.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => '202109025851banner_370x220.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => '202109025909banner_370x230.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => '202109025939banner_370x230.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            10 => 
            array (
                'id' => '11',
                'name' => '202109020219banner_370x277.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            11 => 
            array (
                'id' => '12',
                'name' => '202109040046banner_370x493.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            12 => 
            array (
                'id' => '13',
                'name' => '202109045900banner_372x546.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            13 => 
            array (
                'id' => '14',
                'name' => '202109020247banner_470x210.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            14 => 
            array (
                'id' => '15',
                'name' => '202109020336banner_470x210.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            15 => 
            array (
                'id' => '16',
                'name' => '202109020344banner_568x298.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            16 => 
            array (
                'id' => '17',
                'name' => '202109042006banner_570x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            17 => 
            array (
                'id' => '18',
                'name' => '202109041942banner_570x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            18 => 
            array (
                'id' => '19',
                'name' => '202109020413banner_570x490.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            19 => 
            array (
                'id' => '20',
                'name' => '202109043135banner_770x259.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            20 => 
            array (
                'id' => '21',
                'name' => '202109045938banner_770x301.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            21 => 
            array (
                'id' => '22',
                'name' => '202109045900banner_372x546.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            22 => 
            array (
                'id' => '23',
                'name' => '202109045938banner_770x301.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            23 => 
            array (
                'id' => '24',
                'name' => '202109045420banner_270x229.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            24 => 
            array (
                'id' => '25',
                'name' => '202109041942banner_570x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            25 => 
            array (
                'id' => '26',
                'name' => '202109042006banner_570x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            26 => 
            array (
                'id' => '27',
                'name' => '202109042527banner_270x211.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            27 => 
            array (
                'id' => '28',
                'name' => '202109042309banner_271x451.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            28 => 
            array (
                'id' => '29',
                'name' => '202109040046banner_370x493.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            29 => 
            array (
                'id' => '30',
                'name' => '202109043135banner_770x259.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            30 => 
            array (
                'id' => '31',
                'name' => '202109054227banner_370x193.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            31 => 
            array (
                'id' => '32',
                'name' => '202109054758category900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            32 => 
            array (
                'id' => '33',
                'name' => '202109055140wUJPQ27501.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            33 => 
            array (
                'id' => '34',
                'name' => '202109050158product_1_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            34 => 
            array (
                'id' => '35',
                'name' => '202109050215product_2_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            35 => 
            array (
                'id' => '36',
                'name' => '202109050235product_3_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            36 => 
            array (
                'id' => '37',
                'name' => '202109052217product_4_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            37 => 
            array (
                'id' => '38',
                'name' => '202109052232product_5_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            38 => 
            array (
                'id' => '39',
                'name' => '202109052248product_6_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            39 => 
            array (
                'id' => '40',
                'name' => '202109052304product_7_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            40 => 
            array (
                'id' => '41',
                'name' => '202109061656homebanner1600x800.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            41 => 
            array (
                'id' => '42',
                'name' => '202109081240product_8_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            42 => 
            array (
                'id' => '43',
                'name' => '202109081253product_9_900x900.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            43 => 
            array (
                'id' => '44',
                'name' => '202205244413furniture-bg.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            44 => 
            array (
                'id' => '45',
                'name' => '202205244452banner_image_1.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            45 => 
            array (
                'id' => '46',
                'name' => '202205244454banner_image_2.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            46 => 
            array (
                'id' => '47',
                'name' => '202205244457banner_image_3.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            47 => 
            array (
                'id' => '48',
                'name' => '202205240437fullwidthbanner.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            48 => 
            array (
                'id' => '49',
                'name' => '202205240500fullwidthbanner.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            49 => 
            array (
                'id' => '50',
                'name' => '202205240651profile1.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            50 => 
            array (
                'id' => '51',
                'name' => '202205240910cate-05.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            51 => 
            array (
                'id' => '52',
                'name' => '202205241013banner-01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            52 => 
            array (
                'id' => '53',
                'name' => '202205241015banner-02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            53 => 
            array (
                'id' => '54',
                'name' => '202205241020cate-01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            54 => 
            array (
                'id' => '55',
                'name' => '202205241022cate-02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            55 => 
            array (
                'id' => '56',
                'name' => '202205241025cate-03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            56 => 
            array (
                'id' => '57',
                'name' => '202205241027cate-04.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            57 => 
            array (
                'id' => '58',
                'name' => '202205241136offers-1.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            58 => 
            array (
                'id' => '59',
                'name' => '202205241138offers-2.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            59 => 
            array (
                'id' => '60',
                'name' => '202205241141offers-3.png',
                'extension' => 'image/png',
                'user_id' => '1',
                'created_by' => '1',
            ),
            60 => 
            array (
                'id' => '61',
                'name' => '202205241301bg-paralax.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            61 => 
            array (
                'id' => '62',
                'name' => '202205241457Flower-banner1.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            62 => 
            array (
                'id' => '63',
                'name' => '202205241459Flower-banner2.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            63 => 
            array (
                'id' => '64',
                'name' => '202205241501paralax.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            64 => 
            array (
                'id' => '65',
                'name' => '202205241535banner7.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            65 => 
            array (
                'id' => '66',
                'name' => '202205241538big-img07.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            66 => 
            array (
                'id' => '67',
                'name' => '202205241541cate-banner1.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            67 => 
            array (
                'id' => '68',
                'name' => '202205241543cate-banner3.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            68 => 
            array (
                'id' => '69',
                'name' => '202205241614element-banner5-center.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            69 => 
            array (
                'id' => '70',
                'name' => '202205241735look1.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            70 => 
            array (
                'id' => '71',
                'name' => '202205241741look2.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            71 => 
            array (
                'id' => '72',
                'name' => '202205241744look3.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            72 => 
            array (
                'id' => '73',
                'name' => '202205241811banner2.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            73 => 
            array (
                'id' => '74',
                'name' => '202205241816banner3.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            74 => 
            array (
                'id' => '75',
                'name' => '202205241135paralex.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            75 => 
            array (
                'id' => '76',
                'name' => '202205240154Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            76 => 
            array (
                'id' => '77',
                'name' => '202205240156Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            77 => 
            array (
                'id' => '78',
                'name' => '202205240158Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            78 => 
            array (
                'id' => '79',
                'name' => '202205240224Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            79 => 
            array (
                'id' => '80',
                'name' => '202205240227Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            80 => 
            array (
                'id' => '81',
                'name' => '202205240228Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            81 => 
            array (
                'id' => '82',
                'name' => '202205240229Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            82 => 
            array (
                'id' => '83',
                'name' => '202205240233Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            83 => 
            array (
                'id' => '84',
                'name' => '202205240235Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            84 => 
            array (
                'id' => '85',
                'name' => '202205240256Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            85 => 
            array (
                'id' => '86',
                'name' => '202205240259Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            86 => 
            array (
                'id' => '87',
                'name' => '202205240301Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            87 => 
            array (
                'id' => '88',
                'name' => '202205240324Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            88 => 
            array (
                'id' => '89',
                'name' => '202205240327Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            89 => 
            array (
                'id' => '90',
                'name' => '202205240330Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            90 => 
            array (
                'id' => '91',
                'name' => '202205240403Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            91 => 
            array (
                'id' => '92',
                'name' => '202205240405Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            92 => 
            array (
                'id' => '93',
                'name' => '202205240408Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            93 => 
            array (
                'id' => '94',
                'name' => '202205240428Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            94 => 
            array (
                'id' => '95',
                'name' => '202205240433Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            95 => 
            array (
                'id' => '96',
                'name' => '202205240436Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            96 => 
            array (
                'id' => '97',
                'name' => '202205240459Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            97 => 
            array (
                'id' => '98',
                'name' => '202205240503Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            98 => 
            array (
                'id' => '99',
                'name' => '202205240506Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            99 => 
            array (
                'id' => '100',
                'name' => '202205240528Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            100 => 
            array (
                'id' => '101',
                'name' => '202205240533Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            101 => 
            array (
                'id' => '102',
                'name' => '202205240536Slider_01_03.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            102 => 
            array (
                'id' => '103',
                'name' => '202205240601Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            103 => 
            array (
                'id' => '104',
                'name' => '202205240604Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            104 => 
            array (
                'id' => '105',
                'name' => '202205240631Slider_01_01.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
            105 => 
            array (
                'id' => '106',
                'name' => '202205240633Slider_01_02.jpg',
                'extension' => 'image/jpeg',
                'user_id' => '1',
                'created_by' => '1',
            ),
        ));
        
    }
}
