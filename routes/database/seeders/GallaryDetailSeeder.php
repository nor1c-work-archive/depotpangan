<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\GallaryDetail;

class GallaryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GallaryDetail::where('id', '>', '0')->delete();
      //   GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'1',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/01-largelogo.png',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'1',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/01-mediumlogo.png',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'1',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/01-thumbnaillogo.png',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'2',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large01-slider.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'2',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium01-slider.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'2',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail01-slider.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'3',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109042527banner_270x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'3',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109042527banner_270x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'3',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109042527banner_270x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'4',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109025727banner_270x229.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'4',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109025727banner_270x229.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'4',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/thumbnail202109025727banner_270x229.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'5',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109042309banner_271x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'5',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109042309banner_271x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'5',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109042309banner_271x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'6',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109025813banner_368x550.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'6',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109025813banner_368x550.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'6',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109025813banner_368x550.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'7',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109025823banner_370x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'7',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109025823banner_370x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'7',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109025823banner_370x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'8',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109025851banner_370x220.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'8',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109025851banner_370x220.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'8',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109025851banner_370x220.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'9',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109025909banner_370x230.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'9',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109025909banner_370x230.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'9',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109025909banner_370x230.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'10',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109025939banner_370x230.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'10',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109025939banner_370x230.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'10',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109025939banner_370x230.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'11',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109020219banner_370x277.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'11',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109020219banner_370x277.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'11',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109020219banner_370x277.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'12',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109040046banner_370x493.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'12',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109040046banner_370x493.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'12',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109040046banner_370x493.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'13',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109045900banner_372x546.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'13',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109045900banner_372x546.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'13',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109045900banner_372x546.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'14',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109020247banner_470x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'14',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109020247banner_470x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'14',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109020247banner_470x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'15',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109020336banner_470x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'15',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109020336banner_470x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'15',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109020336banner_470x210.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'16',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109020344banner_568x298.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'16',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109020344banner_568x298.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'16',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109020344banner_568x298.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'17',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109042006banner_570x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'17',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109042006banner_570x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'17',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109042006banner_570x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'18',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109041942banner_570x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'18',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109041942banner_570x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'18',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109041942banner_570x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'19',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109020413banner_570x490.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'19',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109020413banner_570x490.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'19',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109020413banner_570x490.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'20',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109043135banner_770x259.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'20',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109043135banner_770x259.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'20',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109043135banner_770x259.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'21',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109045938banner_770x301.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'21',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109045938banner_770x301.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'21',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109045938banner_770x301.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'22',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109045900banner_372x546.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'22',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109045900banner_372x546.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'22',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109045900banner_372x546.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'23',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109045938banner_770x301.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'23',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109045938banner_770x301.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'23',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109045938banner_770x301.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'24',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109045420banner_270x229.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'24',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109045420banner_270x229.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'24',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109045420banner_270x229.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'25',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109041942banner_570x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'25',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109041942banner_570x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'25',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109041942banner_570x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'26',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109042006banner_570x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'26',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109042006banner_570x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'26',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109042006banner_570x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'27',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109042527banner_270x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'27',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109042527banner_270x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'27',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109042527banner_270x211.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'28',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109042309banner_271x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'28',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109042309banner_271x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'28',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109042309banner_271x451.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'29',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109040046banner_370x493.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'29',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109040046banner_370x493.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'29',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109040046banner_370x493.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'30',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109043135banner_770x259.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'30',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109043135banner_770x259.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'30',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109043135banner_770x259.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'31',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109054227banner_370x193.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'31',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109054227banner_370x193.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'31',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109054227banner_370x193.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'32',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109054758category900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'32',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109054758category900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'32',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109054758category900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'33',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109055140wUJPQ27501.png',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'33',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109055140wUJPQ27501.png',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'33',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109055140wUJPQ27501.png',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'34',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109050158product_1_900x900.jpg',
            
      //    ]);	
         
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'34',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109050158product_1_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'34',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109050158product_1_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'35',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109050215product_2_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'35',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109050215product_2_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'35',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109050215product_2_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'36',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109050235product_3_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'36',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109050235product_3_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'36',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109050235product_3_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'37',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109052217product_4_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'37',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109052217product_4_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'37',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109052217product_4_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'38',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109052232product_5_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'38',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109052232product_5_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'38',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109052232product_5_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'39',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109052248product_6_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'39',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109052248product_6_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'39',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109052248product_6_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'40',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109052304product_7_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'40',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109052304product_7_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'40',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109052304product_7_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'41',
      //       'gallary_type'=>'large',
      //       'height'=>'1600',
      //       'width'=>'1600',
      //       'path'=>'/gallary/large202109061656homebanner1600x800.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'41',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109061656homebanner1600x800.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'41',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109061656homebanner1600x800.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'42',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109081240product_8_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'42',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109081240product_8_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'42',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109081240product_8_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'43',
      //       'gallary_type'=>'large',
      //       'height'=>'900',
      //       'width'=>'900',
      //       'path'=>'/gallary/large202109081253product_9_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'43',
      //       'gallary_type'=>'medium',
      //       'height'=>'600',
      //       'width'=>'600',
      //       'path'=>'/gallary/medium202109081253product_9_900x900.jpg',
            
      //    ]);	
      //    GallaryDetail::insertOrIgnore([
      //       'gallary_id'=>'43',
      //       'gallary_type'=>'thumbnail',
      //       'height'=>'400',
      //       'width'=>'400',
      //       'path'=>'/gallary/thumbnail202109081253product_9_900x900.jpg',
            
      //    ]);

      \DB::table('gallary_detail')->insert(array (
         0 => 
         array (
             'id' => '1',
             'gallary_id' => '1',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/01-largelogo.png',
         ),
         1 => 
         array (
             'id' => '2',
             'gallary_id' => '1',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/01-mediumlogo.png',
         ),
         2 => 
         array (
             'id' => '3',
             'gallary_id' => '1',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/01-thumbnaillogo.png',
         ),
         3 => 
         array (
             'id' => '4',
             'gallary_id' => '2',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large01-slider.jpg',
         ),
         4 => 
         array (
             'id' => '5',
             'gallary_id' => '2',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium01-slider.jpg',
         ),
         5 => 
         array (
             'id' => '6',
             'gallary_id' => '2',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail01-slider.jpg',
         ),
         6 => 
         array (
             'id' => '7',
             'gallary_id' => '3',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109042527banner_270x211.jpg',
         ),
         7 => 
         array (
             'id' => '8',
             'gallary_id' => '3',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109042527banner_270x211.jpg',
         ),
         8 => 
         array (
             'id' => '9',
             'gallary_id' => '3',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109042527banner_270x211.jpg',
         ),
         9 => 
         array (
             'id' => '10',
             'gallary_id' => '4',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109025727banner_270x229.jpg',
         ),
         10 => 
         array (
             'id' => '11',
             'gallary_id' => '4',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109025727banner_270x229.jpg',
         ),
         11 => 
         array (
             'id' => '12',
             'gallary_id' => '4',
             'gallary_type' => 'thumbnail',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/thumbnail202109025727banner_270x229.jpg',
         ),
         12 => 
         array (
             'id' => '13',
             'gallary_id' => '5',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109042309banner_271x451.jpg',
         ),
         13 => 
         array (
             'id' => '14',
             'gallary_id' => '5',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109042309banner_271x451.jpg',
         ),
         14 => 
         array (
             'id' => '15',
             'gallary_id' => '5',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109042309banner_271x451.jpg',
         ),
         15 => 
         array (
             'id' => '16',
             'gallary_id' => '6',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109025813banner_368x550.jpg',
         ),
         16 => 
         array (
             'id' => '17',
             'gallary_id' => '6',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109025813banner_368x550.jpg',
         ),
         17 => 
         array (
             'id' => '18',
             'gallary_id' => '6',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109025813banner_368x550.jpg',
         ),
         18 => 
         array (
             'id' => '19',
             'gallary_id' => '7',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109025823banner_370x210.jpg',
         ),
         19 => 
         array (
             'id' => '20',
             'gallary_id' => '7',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109025823banner_370x210.jpg',
         ),
         20 => 
         array (
             'id' => '21',
             'gallary_id' => '7',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109025823banner_370x210.jpg',
         ),
         21 => 
         array (
             'id' => '22',
             'gallary_id' => '8',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109025851banner_370x220.jpg',
         ),
         22 => 
         array (
             'id' => '23',
             'gallary_id' => '8',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109025851banner_370x220.jpg',
         ),
         23 => 
         array (
             'id' => '24',
             'gallary_id' => '8',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109025851banner_370x220.jpg',
         ),
         24 => 
         array (
             'id' => '25',
             'gallary_id' => '9',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109025909banner_370x230.jpg',
         ),
         25 => 
         array (
             'id' => '26',
             'gallary_id' => '9',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109025909banner_370x230.jpg',
         ),
         26 => 
         array (
             'id' => '27',
             'gallary_id' => '9',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109025909banner_370x230.jpg',
         ),
         27 => 
         array (
             'id' => '28',
             'gallary_id' => '10',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109025939banner_370x230.jpg',
         ),
         28 => 
         array (
             'id' => '29',
             'gallary_id' => '10',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109025939banner_370x230.jpg',
         ),
         29 => 
         array (
             'id' => '30',
             'gallary_id' => '10',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109025939banner_370x230.jpg',
         ),
         30 => 
         array (
             'id' => '31',
             'gallary_id' => '11',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109020219banner_370x277.jpg',
         ),
         31 => 
         array (
             'id' => '32',
             'gallary_id' => '11',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109020219banner_370x277.jpg',
         ),
         32 => 
         array (
             'id' => '33',
             'gallary_id' => '11',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109020219banner_370x277.jpg',
         ),
         33 => 
         array (
             'id' => '34',
             'gallary_id' => '12',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109040046banner_370x493.jpg',
         ),
         34 => 
         array (
             'id' => '35',
             'gallary_id' => '12',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109040046banner_370x493.jpg',
         ),
         35 => 
         array (
             'id' => '36',
             'gallary_id' => '12',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109040046banner_370x493.jpg',
         ),
         36 => 
         array (
             'id' => '37',
             'gallary_id' => '13',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109045900banner_372x546.jpg',
         ),
         37 => 
         array (
             'id' => '38',
             'gallary_id' => '13',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109045900banner_372x546.jpg',
         ),
         38 => 
         array (
             'id' => '39',
             'gallary_id' => '13',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109045900banner_372x546.jpg',
         ),
         39 => 
         array (
             'id' => '40',
             'gallary_id' => '14',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109020247banner_470x210.jpg',
         ),
         40 => 
         array (
             'id' => '41',
             'gallary_id' => '14',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109020247banner_470x210.jpg',
         ),
         41 => 
         array (
             'id' => '42',
             'gallary_id' => '14',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109020247banner_470x210.jpg',
         ),
         42 => 
         array (
             'id' => '43',
             'gallary_id' => '15',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109020336banner_470x210.jpg',
         ),
         43 => 
         array (
             'id' => '44',
             'gallary_id' => '15',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109020336banner_470x210.jpg',
         ),
         44 => 
         array (
             'id' => '45',
             'gallary_id' => '15',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109020336banner_470x210.jpg',
         ),
         45 => 
         array (
             'id' => '46',
             'gallary_id' => '16',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109020344banner_568x298.jpg',
         ),
         46 => 
         array (
             'id' => '47',
             'gallary_id' => '16',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109020344banner_568x298.jpg',
         ),
         47 => 
         array (
             'id' => '48',
             'gallary_id' => '16',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109020344banner_568x298.jpg',
         ),
         48 => 
         array (
             'id' => '49',
             'gallary_id' => '17',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109042006banner_570x211.jpg',
         ),
         49 => 
         array (
             'id' => '50',
             'gallary_id' => '17',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109042006banner_570x211.jpg',
         ),
         50 => 
         array (
             'id' => '51',
             'gallary_id' => '17',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109042006banner_570x211.jpg',
         ),
         51 => 
         array (
             'id' => '52',
             'gallary_id' => '18',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109041942banner_570x451.jpg',
         ),
         52 => 
         array (
             'id' => '53',
             'gallary_id' => '18',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109041942banner_570x451.jpg',
         ),
         53 => 
         array (
             'id' => '54',
             'gallary_id' => '18',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109041942banner_570x451.jpg',
         ),
         54 => 
         array (
             'id' => '55',
             'gallary_id' => '19',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109020413banner_570x490.jpg',
         ),
         55 => 
         array (
             'id' => '56',
             'gallary_id' => '19',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109020413banner_570x490.jpg',
         ),
         56 => 
         array (
             'id' => '57',
             'gallary_id' => '19',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109020413banner_570x490.jpg',
         ),
         57 => 
         array (
             'id' => '58',
             'gallary_id' => '20',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109043135banner_770x259.jpg',
         ),
         58 => 
         array (
             'id' => '59',
             'gallary_id' => '20',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109043135banner_770x259.jpg',
         ),
         59 => 
         array (
             'id' => '60',
             'gallary_id' => '20',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109043135banner_770x259.jpg',
         ),
         60 => 
         array (
             'id' => '61',
             'gallary_id' => '21',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109045938banner_770x301.jpg',
         ),
         61 => 
         array (
             'id' => '62',
             'gallary_id' => '21',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109045938banner_770x301.jpg',
         ),
         62 => 
         array (
             'id' => '63',
             'gallary_id' => '21',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109045938banner_770x301.jpg',
         ),
         63 => 
         array (
             'id' => '64',
             'gallary_id' => '22',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109045900banner_372x546.jpg',
         ),
         64 => 
         array (
             'id' => '65',
             'gallary_id' => '22',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109045900banner_372x546.jpg',
         ),
         65 => 
         array (
             'id' => '66',
             'gallary_id' => '22',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109045900banner_372x546.jpg',
         ),
         66 => 
         array (
             'id' => '67',
             'gallary_id' => '23',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109045938banner_770x301.jpg',
         ),
         67 => 
         array (
             'id' => '68',
             'gallary_id' => '23',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109045938banner_770x301.jpg',
         ),
         68 => 
         array (
             'id' => '69',
             'gallary_id' => '23',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109045938banner_770x301.jpg',
         ),
         69 => 
         array (
             'id' => '70',
             'gallary_id' => '24',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109045420banner_270x229.jpg',
         ),
         70 => 
         array (
             'id' => '71',
             'gallary_id' => '24',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109045420banner_270x229.jpg',
         ),
         71 => 
         array (
             'id' => '72',
             'gallary_id' => '24',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109045420banner_270x229.jpg',
         ),
         72 => 
         array (
             'id' => '73',
             'gallary_id' => '25',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109041942banner_570x451.jpg',
         ),
         73 => 
         array (
             'id' => '74',
             'gallary_id' => '25',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109041942banner_570x451.jpg',
         ),
         74 => 
         array (
             'id' => '75',
             'gallary_id' => '25',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109041942banner_570x451.jpg',
         ),
         75 => 
         array (
             'id' => '76',
             'gallary_id' => '26',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109042006banner_570x211.jpg',
         ),
         76 => 
         array (
             'id' => '77',
             'gallary_id' => '26',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109042006banner_570x211.jpg',
         ),
         77 => 
         array (
             'id' => '78',
             'gallary_id' => '26',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109042006banner_570x211.jpg',
         ),
         78 => 
         array (
             'id' => '79',
             'gallary_id' => '27',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109042527banner_270x211.jpg',
         ),
         79 => 
         array (
             'id' => '80',
             'gallary_id' => '27',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109042527banner_270x211.jpg',
         ),
         80 => 
         array (
             'id' => '81',
             'gallary_id' => '27',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109042527banner_270x211.jpg',
         ),
         81 => 
         array (
             'id' => '82',
             'gallary_id' => '28',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109042309banner_271x451.jpg',
         ),
         82 => 
         array (
             'id' => '83',
             'gallary_id' => '28',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109042309banner_271x451.jpg',
         ),
         83 => 
         array (
             'id' => '84',
             'gallary_id' => '28',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109042309banner_271x451.jpg',
         ),
         84 => 
         array (
             'id' => '85',
             'gallary_id' => '29',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109040046banner_370x493.jpg',
         ),
         85 => 
         array (
             'id' => '86',
             'gallary_id' => '29',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109040046banner_370x493.jpg',
         ),
         86 => 
         array (
             'id' => '87',
             'gallary_id' => '29',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109040046banner_370x493.jpg',
         ),
         87 => 
         array (
             'id' => '88',
             'gallary_id' => '30',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109043135banner_770x259.jpg',
         ),
         88 => 
         array (
             'id' => '89',
             'gallary_id' => '30',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109043135banner_770x259.jpg',
         ),
         89 => 
         array (
             'id' => '90',
             'gallary_id' => '30',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109043135banner_770x259.jpg',
         ),
         90 => 
         array (
             'id' => '91',
             'gallary_id' => '31',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109054227banner_370x193.jpg',
         ),
         91 => 
         array (
             'id' => '92',
             'gallary_id' => '31',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109054227banner_370x193.jpg',
         ),
         92 => 
         array (
             'id' => '93',
             'gallary_id' => '31',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109054227banner_370x193.jpg',
         ),
         93 => 
         array (
             'id' => '94',
             'gallary_id' => '32',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109054758category900x900.jpg',
         ),
         94 => 
         array (
             'id' => '95',
             'gallary_id' => '32',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109054758category900x900.jpg',
         ),
         95 => 
         array (
             'id' => '96',
             'gallary_id' => '32',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109054758category900x900.jpg',
         ),
         96 => 
         array (
             'id' => '97',
             'gallary_id' => '33',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109055140wUJPQ27501.png',
         ),
         97 => 
         array (
             'id' => '98',
             'gallary_id' => '33',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109055140wUJPQ27501.png',
         ),
         98 => 
         array (
             'id' => '99',
             'gallary_id' => '33',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109055140wUJPQ27501.png',
         ),
         99 => 
         array (
             'id' => '100',
             'gallary_id' => '34',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109050158product_1_900x900.jpg',
         ),
         100 => 
         array (
             'id' => '101',
             'gallary_id' => '34',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109050158product_1_900x900.jpg',
         ),
         101 => 
         array (
             'id' => '102',
             'gallary_id' => '34',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109050158product_1_900x900.jpg',
         ),
         102 => 
         array (
             'id' => '103',
             'gallary_id' => '35',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109050215product_2_900x900.jpg',
         ),
         103 => 
         array (
             'id' => '104',
             'gallary_id' => '35',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109050215product_2_900x900.jpg',
         ),
         104 => 
         array (
             'id' => '105',
             'gallary_id' => '35',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109050215product_2_900x900.jpg',
         ),
         105 => 
         array (
             'id' => '106',
             'gallary_id' => '36',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109050235product_3_900x900.jpg',
         ),
         106 => 
         array (
             'id' => '107',
             'gallary_id' => '36',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109050235product_3_900x900.jpg',
         ),
         107 => 
         array (
             'id' => '108',
             'gallary_id' => '36',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109050235product_3_900x900.jpg',
         ),
         108 => 
         array (
             'id' => '109',
             'gallary_id' => '37',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109052217product_4_900x900.jpg',
         ),
         109 => 
         array (
             'id' => '110',
             'gallary_id' => '37',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109052217product_4_900x900.jpg',
         ),
         110 => 
         array (
             'id' => '111',
             'gallary_id' => '37',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109052217product_4_900x900.jpg',
         ),
         111 => 
         array (
             'id' => '112',
             'gallary_id' => '38',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109052232product_5_900x900.jpg',
         ),
         112 => 
         array (
             'id' => '113',
             'gallary_id' => '38',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109052232product_5_900x900.jpg',
         ),
         113 => 
         array (
             'id' => '114',
             'gallary_id' => '38',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109052232product_5_900x900.jpg',
         ),
         114 => 
         array (
             'id' => '115',
             'gallary_id' => '39',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109052248product_6_900x900.jpg',
         ),
         115 => 
         array (
             'id' => '116',
             'gallary_id' => '39',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109052248product_6_900x900.jpg',
         ),
         116 => 
         array (
             'id' => '117',
             'gallary_id' => '39',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109052248product_6_900x900.jpg',
         ),
         117 => 
         array (
             'id' => '118',
             'gallary_id' => '40',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109052304product_7_900x900.jpg',
         ),
         118 => 
         array (
             'id' => '119',
             'gallary_id' => '40',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109052304product_7_900x900.jpg',
         ),
         119 => 
         array (
             'id' => '120',
             'gallary_id' => '40',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109052304product_7_900x900.jpg',
         ),
         120 => 
         array (
             'id' => '121',
             'gallary_id' => '41',
             'gallary_type' => 'large',
             'height' => '1600',
             'width' => '1600',
             'path' => '/gallary/large202109061656homebanner1600x800.jpg',
         ),
         121 => 
         array (
             'id' => '122',
             'gallary_id' => '41',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109061656homebanner1600x800.jpg',
         ),
         122 => 
         array (
             'id' => '123',
             'gallary_id' => '41',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109061656homebanner1600x800.jpg',
         ),
         123 => 
         array (
             'id' => '124',
             'gallary_id' => '42',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109081240product_8_900x900.jpg',
         ),
         124 => 
         array (
             'id' => '125',
             'gallary_id' => '42',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109081240product_8_900x900.jpg',
         ),
         125 => 
         array (
             'id' => '126',
             'gallary_id' => '42',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109081240product_8_900x900.jpg',
         ),
         126 => 
         array (
             'id' => '127',
             'gallary_id' => '43',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202109081253product_9_900x900.jpg',
         ),
         127 => 
         array (
             'id' => '128',
             'gallary_id' => '43',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202109081253product_9_900x900.jpg',
         ),
         128 => 
         array (
             'id' => '129',
             'gallary_id' => '43',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202109081253product_9_900x900.jpg',
         ),
         129 => 
         array (
             'id' => '130',
             'gallary_id' => '44',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205244413furniture-bg.jpg',
         ),
         130 => 
         array (
             'id' => '131',
             'gallary_id' => '44',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205244413furniture-bg.jpg',
         ),
         131 => 
         array (
             'id' => '132',
             'gallary_id' => '44',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205244413furniture-bg.jpg',
         ),
         132 => 
         array (
             'id' => '133',
             'gallary_id' => '45',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205244452banner_image_1.png',
         ),
         133 => 
         array (
             'id' => '134',
             'gallary_id' => '45',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205244452banner_image_1.png',
         ),
         134 => 
         array (
             'id' => '135',
             'gallary_id' => '45',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205244452banner_image_1.png',
         ),
         135 => 
         array (
             'id' => '136',
             'gallary_id' => '46',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205244454banner_image_2.png',
         ),
         136 => 
         array (
             'id' => '137',
             'gallary_id' => '46',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205244454banner_image_2.png',
         ),
         137 => 
         array (
             'id' => '138',
             'gallary_id' => '46',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205244454banner_image_2.png',
         ),
         138 => 
         array (
             'id' => '139',
             'gallary_id' => '47',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205244457banner_image_3.png',
         ),
         139 => 
         array (
             'id' => '140',
             'gallary_id' => '47',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205244457banner_image_3.png',
         ),
         140 => 
         array (
             'id' => '141',
             'gallary_id' => '47',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205244457banner_image_3.png',
         ),
         141 => 
         array (
             'id' => '142',
             'gallary_id' => '48',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240437fullwidthbanner.jpg',
         ),
         142 => 
         array (
             'id' => '143',
             'gallary_id' => '48',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240437fullwidthbanner.jpg',
         ),
         143 => 
         array (
             'id' => '144',
             'gallary_id' => '48',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240437fullwidthbanner.jpg',
         ),
         144 => 
         array (
             'id' => '145',
             'gallary_id' => '49',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240500fullwidthbanner.jpg',
         ),
         145 => 
         array (
             'id' => '146',
             'gallary_id' => '49',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240500fullwidthbanner.jpg',
         ),
         146 => 
         array (
             'id' => '147',
             'gallary_id' => '49',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240500fullwidthbanner.jpg',
         ),
         147 => 
         array (
             'id' => '148',
             'gallary_id' => '50',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240651profile1.png',
         ),
         148 => 
         array (
             'id' => '149',
             'gallary_id' => '50',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240651profile1.png',
         ),
         149 => 
         array (
             'id' => '150',
             'gallary_id' => '50',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240651profile1.png',
         ),
         150 => 
         array (
             'id' => '151',
             'gallary_id' => '51',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240910cate-05.jpg',
         ),
         151 => 
         array (
             'id' => '152',
             'gallary_id' => '51',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240910cate-05.jpg',
         ),
         152 => 
         array (
             'id' => '153',
             'gallary_id' => '51',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240910cate-05.jpg',
         ),
         153 => 
         array (
             'id' => '154',
             'gallary_id' => '52',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241013banner-01.jpg',
         ),
         154 => 
         array (
             'id' => '155',
             'gallary_id' => '52',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241013banner-01.jpg',
         ),
         155 => 
         array (
             'id' => '156',
             'gallary_id' => '52',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241013banner-01.jpg',
         ),
         156 => 
         array (
             'id' => '157',
             'gallary_id' => '53',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241015banner-02.jpg',
         ),
         157 => 
         array (
             'id' => '158',
             'gallary_id' => '53',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241015banner-02.jpg',
         ),
         158 => 
         array (
             'id' => '159',
             'gallary_id' => '53',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241015banner-02.jpg',
         ),
         159 => 
         array (
             'id' => '160',
             'gallary_id' => '54',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241020cate-01.jpg',
         ),
         160 => 
         array (
             'id' => '161',
             'gallary_id' => '54',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241020cate-01.jpg',
         ),
         161 => 
         array (
             'id' => '162',
             'gallary_id' => '54',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241020cate-01.jpg',
         ),
         162 => 
         array (
             'id' => '163',
             'gallary_id' => '55',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241022cate-02.jpg',
         ),
         163 => 
         array (
             'id' => '164',
             'gallary_id' => '55',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241022cate-02.jpg',
         ),
         164 => 
         array (
             'id' => '165',
             'gallary_id' => '55',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241022cate-02.jpg',
         ),
         165 => 
         array (
             'id' => '166',
             'gallary_id' => '56',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241025cate-03.jpg',
         ),
         166 => 
         array (
             'id' => '167',
             'gallary_id' => '56',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241025cate-03.jpg',
         ),
         167 => 
         array (
             'id' => '168',
             'gallary_id' => '56',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241025cate-03.jpg',
         ),
         168 => 
         array (
             'id' => '169',
             'gallary_id' => '57',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241027cate-04.jpg',
         ),
         169 => 
         array (
             'id' => '170',
             'gallary_id' => '57',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241027cate-04.jpg',
         ),
         170 => 
         array (
             'id' => '171',
             'gallary_id' => '57',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241027cate-04.jpg',
         ),
         171 => 
         array (
             'id' => '172',
             'gallary_id' => '58',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241136offers-1.png',
         ),
         172 => 
         array (
             'id' => '173',
             'gallary_id' => '58',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241136offers-1.png',
         ),
         173 => 
         array (
             'id' => '174',
             'gallary_id' => '58',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241136offers-1.png',
         ),
         174 => 
         array (
             'id' => '175',
             'gallary_id' => '59',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241138offers-2.png',
         ),
         175 => 
         array (
             'id' => '176',
             'gallary_id' => '59',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241138offers-2.png',
         ),
         176 => 
         array (
             'id' => '177',
             'gallary_id' => '59',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241138offers-2.png',
         ),
         177 => 
         array (
             'id' => '178',
             'gallary_id' => '60',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241141offers-3.png',
         ),
         178 => 
         array (
             'id' => '179',
             'gallary_id' => '60',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241141offers-3.png',
         ),
         179 => 
         array (
             'id' => '180',
             'gallary_id' => '60',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241141offers-3.png',
         ),
         180 => 
         array (
             'id' => '181',
             'gallary_id' => '61',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241301bg-paralax.jpg',
         ),
         181 => 
         array (
             'id' => '182',
             'gallary_id' => '61',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241301bg-paralax.jpg',
         ),
         182 => 
         array (
             'id' => '183',
             'gallary_id' => '61',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241301bg-paralax.jpg',
         ),
         183 => 
         array (
             'id' => '184',
             'gallary_id' => '62',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241457Flower-banner1.jpg',
         ),
         184 => 
         array (
             'id' => '185',
             'gallary_id' => '62',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241457Flower-banner1.jpg',
         ),
         185 => 
         array (
             'id' => '186',
             'gallary_id' => '62',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241457Flower-banner1.jpg',
         ),
         186 => 
         array (
             'id' => '187',
             'gallary_id' => '63',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241459Flower-banner2.jpg',
         ),
         187 => 
         array (
             'id' => '188',
             'gallary_id' => '63',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241459Flower-banner2.jpg',
         ),
         188 => 
         array (
             'id' => '189',
             'gallary_id' => '63',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241459Flower-banner2.jpg',
         ),
         189 => 
         array (
             'id' => '190',
             'gallary_id' => '64',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241501paralax.jpg',
         ),
         190 => 
         array (
             'id' => '191',
             'gallary_id' => '64',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241501paralax.jpg',
         ),
         191 => 
         array (
             'id' => '192',
             'gallary_id' => '64',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241501paralax.jpg',
         ),
         192 => 
         array (
             'id' => '193',
             'gallary_id' => '65',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241535banner7.jpg',
         ),
         193 => 
         array (
             'id' => '194',
             'gallary_id' => '65',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241535banner7.jpg',
         ),
         194 => 
         array (
             'id' => '195',
             'gallary_id' => '65',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241535banner7.jpg',
         ),
         195 => 
         array (
             'id' => '196',
             'gallary_id' => '66',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241538big-img07.jpg',
         ),
         196 => 
         array (
             'id' => '197',
             'gallary_id' => '66',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241538big-img07.jpg',
         ),
         197 => 
         array (
             'id' => '198',
             'gallary_id' => '66',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241538big-img07.jpg',
         ),
         198 => 
         array (
             'id' => '199',
             'gallary_id' => '67',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241541cate-banner1.jpg',
         ),
         199 => 
         array (
             'id' => '200',
             'gallary_id' => '67',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241541cate-banner1.jpg',
         ),
         200 => 
         array (
             'id' => '201',
             'gallary_id' => '67',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241541cate-banner1.jpg',
         ),
         201 => 
         array (
             'id' => '202',
             'gallary_id' => '68',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241543cate-banner3.jpg',
         ),
         202 => 
         array (
             'id' => '203',
             'gallary_id' => '68',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241543cate-banner3.jpg',
         ),
         203 => 
         array (
             'id' => '204',
             'gallary_id' => '68',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241543cate-banner3.jpg',
         ),
         204 => 
         array (
             'id' => '205',
             'gallary_id' => '69',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241614element-banner5-center.jpg',
         ),
         205 => 
         array (
             'id' => '206',
             'gallary_id' => '69',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241614element-banner5-center.jpg',
         ),
         206 => 
         array (
             'id' => '207',
             'gallary_id' => '69',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241614element-banner5-center.jpg',
         ),
         207 => 
         array (
             'id' => '208',
             'gallary_id' => '70',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241735look1.jpg',
         ),
         208 => 
         array (
             'id' => '209',
             'gallary_id' => '70',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241735look1.jpg',
         ),
         209 => 
         array (
             'id' => '210',
             'gallary_id' => '70',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241735look1.jpg',
         ),
         210 => 
         array (
             'id' => '211',
             'gallary_id' => '71',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241741look2.jpg',
         ),
         211 => 
         array (
             'id' => '212',
             'gallary_id' => '71',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241741look2.jpg',
         ),
         212 => 
         array (
             'id' => '213',
             'gallary_id' => '71',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241741look2.jpg',
         ),
         213 => 
         array (
             'id' => '214',
             'gallary_id' => '72',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241744look3.jpg',
         ),
         214 => 
         array (
             'id' => '215',
             'gallary_id' => '72',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241744look3.jpg',
         ),
         215 => 
         array (
             'id' => '216',
             'gallary_id' => '72',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241744look3.jpg',
         ),
         216 => 
         array (
             'id' => '217',
             'gallary_id' => '73',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241811banner2.jpg',
         ),
         217 => 
         array (
             'id' => '218',
             'gallary_id' => '73',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241811banner2.jpg',
         ),
         218 => 
         array (
             'id' => '219',
             'gallary_id' => '73',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241811banner2.jpg',
         ),
         219 => 
         array (
             'id' => '220',
             'gallary_id' => '74',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241816banner3.jpg',
         ),
         220 => 
         array (
             'id' => '221',
             'gallary_id' => '74',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241816banner3.jpg',
         ),
         221 => 
         array (
             'id' => '222',
             'gallary_id' => '74',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241816banner3.jpg',
         ),
         222 => 
         array (
             'id' => '223',
             'gallary_id' => '75',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205241135paralex.jpg',
         ),
         223 => 
         array (
             'id' => '224',
             'gallary_id' => '75',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205241135paralex.jpg',
         ),
         224 => 
         array (
             'id' => '225',
             'gallary_id' => '75',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205241135paralex.jpg',
         ),
         225 => 
         array (
             'id' => '226',
             'gallary_id' => '76',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240154Slider_01_01.jpg',
         ),
         226 => 
         array (
             'id' => '227',
             'gallary_id' => '76',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240154Slider_01_01.jpg',
         ),
         227 => 
         array (
             'id' => '228',
             'gallary_id' => '76',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240154Slider_01_01.jpg',
         ),
         228 => 
         array (
             'id' => '229',
             'gallary_id' => '77',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240156Slider_01_02.jpg',
         ),
         229 => 
         array (
             'id' => '230',
             'gallary_id' => '77',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240156Slider_01_02.jpg',
         ),
         230 => 
         array (
             'id' => '231',
             'gallary_id' => '77',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240156Slider_01_02.jpg',
         ),
         231 => 
         array (
             'id' => '232',
             'gallary_id' => '78',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240158Slider_01_03.jpg',
         ),
         232 => 
         array (
             'id' => '233',
             'gallary_id' => '78',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240158Slider_01_03.jpg',
         ),
         233 => 
         array (
             'id' => '234',
             'gallary_id' => '78',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240158Slider_01_03.jpg',
         ),
         234 => 
         array (
             'id' => '235',
             'gallary_id' => '79',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240224Slider_01_01.jpg',
         ),
         235 => 
         array (
             'id' => '236',
             'gallary_id' => '79',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240224Slider_01_01.jpg',
         ),
         236 => 
         array (
             'id' => '237',
             'gallary_id' => '79',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240224Slider_01_01.jpg',
         ),
         237 => 
         array (
             'id' => '238',
             'gallary_id' => '80',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240227Slider_01_02.jpg',
         ),
         238 => 
         array (
             'id' => '239',
             'gallary_id' => '80',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240227Slider_01_02.jpg',
         ),
         239 => 
         array (
             'id' => '240',
             'gallary_id' => '80',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240227Slider_01_02.jpg',
         ),
         240 => 
         array (
             'id' => '241',
             'gallary_id' => '81',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240228Slider_01_01.jpg',
         ),
         241 => 
         array (
             'id' => '242',
             'gallary_id' => '81',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240228Slider_01_01.jpg',
         ),
         242 => 
         array (
             'id' => '243',
             'gallary_id' => '81',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240228Slider_01_01.jpg',
         ),
         243 => 
         array (
             'id' => '244',
             'gallary_id' => '82',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240229Slider_01_03.jpg',
         ),
         244 => 
         array (
             'id' => '245',
             'gallary_id' => '82',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240229Slider_01_03.jpg',
         ),
         245 => 
         array (
             'id' => '246',
             'gallary_id' => '82',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240229Slider_01_03.jpg',
         ),
         246 => 
         array (
             'id' => '247',
             'gallary_id' => '83',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240233Slider_01_02.jpg',
         ),
         247 => 
         array (
             'id' => '248',
             'gallary_id' => '83',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240233Slider_01_02.jpg',
         ),
         248 => 
         array (
             'id' => '249',
             'gallary_id' => '83',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240233Slider_01_02.jpg',
         ),
         249 => 
         array (
             'id' => '250',
             'gallary_id' => '84',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240235Slider_01_03.jpg',
         ),
         250 => 
         array (
             'id' => '251',
             'gallary_id' => '84',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240235Slider_01_03.jpg',
         ),
         251 => 
         array (
             'id' => '252',
             'gallary_id' => '84',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240235Slider_01_03.jpg',
         ),
         252 => 
         array (
             'id' => '253',
             'gallary_id' => '85',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240256Slider_01_01.jpg',
         ),
         253 => 
         array (
             'id' => '254',
             'gallary_id' => '85',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240256Slider_01_01.jpg',
         ),
         254 => 
         array (
             'id' => '255',
             'gallary_id' => '85',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240256Slider_01_01.jpg',
         ),
         255 => 
         array (
             'id' => '256',
             'gallary_id' => '86',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240259Slider_01_02.jpg',
         ),
         256 => 
         array (
             'id' => '257',
             'gallary_id' => '86',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240259Slider_01_02.jpg',
         ),
         257 => 
         array (
             'id' => '258',
             'gallary_id' => '86',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240259Slider_01_02.jpg',
         ),
         258 => 
         array (
             'id' => '259',
             'gallary_id' => '87',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240301Slider_01_03.jpg',
         ),
         259 => 
         array (
             'id' => '260',
             'gallary_id' => '87',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240301Slider_01_03.jpg',
         ),
         260 => 
         array (
             'id' => '261',
             'gallary_id' => '87',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240301Slider_01_03.jpg',
         ),
         261 => 
         array (
             'id' => '262',
             'gallary_id' => '88',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240324Slider_01_01.jpg',
         ),
         262 => 
         array (
             'id' => '263',
             'gallary_id' => '88',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240324Slider_01_01.jpg',
         ),
         263 => 
         array (
             'id' => '264',
             'gallary_id' => '88',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240324Slider_01_01.jpg',
         ),
         264 => 
         array (
             'id' => '265',
             'gallary_id' => '89',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240327Slider_01_02.jpg',
         ),
         265 => 
         array (
             'id' => '266',
             'gallary_id' => '89',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240327Slider_01_02.jpg',
         ),
         266 => 
         array (
             'id' => '267',
             'gallary_id' => '89',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240327Slider_01_02.jpg',
         ),
         267 => 
         array (
             'id' => '268',
             'gallary_id' => '90',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240330Slider_01_03.jpg',
         ),
         268 => 
         array (
             'id' => '269',
             'gallary_id' => '90',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240330Slider_01_03.jpg',
         ),
         269 => 
         array (
             'id' => '270',
             'gallary_id' => '90',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240330Slider_01_03.jpg',
         ),
         270 => 
         array (
             'id' => '271',
             'gallary_id' => '91',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240403Slider_01_01.jpg',
         ),
         271 => 
         array (
             'id' => '272',
             'gallary_id' => '91',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240403Slider_01_01.jpg',
         ),
         272 => 
         array (
             'id' => '273',
             'gallary_id' => '91',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240403Slider_01_01.jpg',
         ),
         273 => 
         array (
             'id' => '274',
             'gallary_id' => '92',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240405Slider_01_02.jpg',
         ),
         274 => 
         array (
             'id' => '275',
             'gallary_id' => '92',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240405Slider_01_02.jpg',
         ),
         275 => 
         array (
             'id' => '276',
             'gallary_id' => '92',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240405Slider_01_02.jpg',
         ),
         276 => 
         array (
             'id' => '277',
             'gallary_id' => '93',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240408Slider_01_03.jpg',
         ),
         277 => 
         array (
             'id' => '278',
             'gallary_id' => '93',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240408Slider_01_03.jpg',
         ),
         278 => 
         array (
             'id' => '279',
             'gallary_id' => '93',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240408Slider_01_03.jpg',
         ),
         279 => 
         array (
             'id' => '280',
             'gallary_id' => '94',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240428Slider_01_01.jpg',
         ),
         280 => 
         array (
             'id' => '281',
             'gallary_id' => '94',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240428Slider_01_01.jpg',
         ),
         281 => 
         array (
             'id' => '282',
             'gallary_id' => '94',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240428Slider_01_01.jpg',
         ),
         282 => 
         array (
             'id' => '283',
             'gallary_id' => '95',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240433Slider_01_02.jpg',
         ),
         283 => 
         array (
             'id' => '284',
             'gallary_id' => '95',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240433Slider_01_02.jpg',
         ),
         284 => 
         array (
             'id' => '285',
             'gallary_id' => '95',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240433Slider_01_02.jpg',
         ),
         285 => 
         array (
             'id' => '286',
             'gallary_id' => '96',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240436Slider_01_03.jpg',
         ),
         286 => 
         array (
             'id' => '287',
             'gallary_id' => '96',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240436Slider_01_03.jpg',
         ),
         287 => 
         array (
             'id' => '288',
             'gallary_id' => '96',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240436Slider_01_03.jpg',
         ),
         288 => 
         array (
             'id' => '289',
             'gallary_id' => '97',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240459Slider_01_01.jpg',
         ),
         289 => 
         array (
             'id' => '290',
             'gallary_id' => '97',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240459Slider_01_01.jpg',
         ),
         290 => 
         array (
             'id' => '291',
             'gallary_id' => '97',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240459Slider_01_01.jpg',
         ),
         291 => 
         array (
             'id' => '292',
             'gallary_id' => '98',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240503Slider_01_02.jpg',
         ),
         292 => 
         array (
             'id' => '293',
             'gallary_id' => '98',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240503Slider_01_02.jpg',
         ),
         293 => 
         array (
             'id' => '294',
             'gallary_id' => '98',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240503Slider_01_02.jpg',
         ),
         294 => 
         array (
             'id' => '295',
             'gallary_id' => '99',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240506Slider_01_03.jpg',
         ),
         295 => 
         array (
             'id' => '296',
             'gallary_id' => '99',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240506Slider_01_03.jpg',
         ),
         296 => 
         array (
             'id' => '297',
             'gallary_id' => '99',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240506Slider_01_03.jpg',
         ),
         297 => 
         array (
             'id' => '298',
             'gallary_id' => '100',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240528Slider_01_01.jpg',
         ),
         298 => 
         array (
             'id' => '299',
             'gallary_id' => '100',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240528Slider_01_01.jpg',
         ),
         299 => 
         array (
             'id' => '300',
             'gallary_id' => '100',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240528Slider_01_01.jpg',
         ),
         300 => 
         array (
             'id' => '301',
             'gallary_id' => '101',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240533Slider_01_02.jpg',
         ),
         301 => 
         array (
             'id' => '302',
             'gallary_id' => '101',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240533Slider_01_02.jpg',
         ),
         302 => 
         array (
             'id' => '303',
             'gallary_id' => '101',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240533Slider_01_02.jpg',
         ),
         303 => 
         array (
             'id' => '304',
             'gallary_id' => '102',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240536Slider_01_03.jpg',
         ),
         304 => 
         array (
             'id' => '305',
             'gallary_id' => '102',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240536Slider_01_03.jpg',
         ),
         305 => 
         array (
             'id' => '306',
             'gallary_id' => '102',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240536Slider_01_03.jpg',
         ),
         306 => 
         array (
             'id' => '307',
             'gallary_id' => '103',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240601Slider_01_01.jpg',
         ),
         307 => 
         array (
             'id' => '308',
             'gallary_id' => '103',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240601Slider_01_01.jpg',
         ),
         308 => 
         array (
             'id' => '309',
             'gallary_id' => '103',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240601Slider_01_01.jpg',
         ),
         309 => 
         array (
             'id' => '310',
             'gallary_id' => '104',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240604Slider_01_02.jpg',
         ),
         310 => 
         array (
             'id' => '311',
             'gallary_id' => '104',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240604Slider_01_02.jpg',
         ),
         311 => 
         array (
             'id' => '312',
             'gallary_id' => '104',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240604Slider_01_02.jpg',
         ),
         312 => 
         array (
             'id' => '313',
             'gallary_id' => '105',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240631Slider_01_01.jpg',
         ),
         313 => 
         array (
             'id' => '314',
             'gallary_id' => '105',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240631Slider_01_01.jpg',
         ),
         314 => 
         array (
             'id' => '315',
             'gallary_id' => '105',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240631Slider_01_01.jpg',
         ),
         315 => 
         array (
             'id' => '316',
             'gallary_id' => '106',
             'gallary_type' => 'large',
             'height' => '900',
             'width' => '900',
             'path' => '/gallary/large202205240633Slider_01_02.jpg',
         ),
         316 => 
         array (
             'id' => '317',
             'gallary_id' => '106',
             'gallary_type' => 'medium',
             'height' => '600',
             'width' => '600',
             'path' => '/gallary/medium202205240633Slider_01_02.jpg',
         ),
         317 => 
         array (
             'id' => '318',
             'gallary_id' => '106',
             'gallary_type' => 'thumbnail',
             'height' => '400',
             'width' => '400',
             'path' => '/gallary/thumbnail202205240633Slider_01_02.jpg',
         ),
     ));
         
    }
}
