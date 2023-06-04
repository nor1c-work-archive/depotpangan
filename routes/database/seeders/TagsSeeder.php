<?php

namespace Database\Seeders;

use App\Models\Admin\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'demo',
        //         'created_by' => '1',
        //     ]
        // );
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'general',
        //         'created_by' => '1',
        //     ]
        // );
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'sliders',
        //         'created_by' => '1',
        //     ]
        // );
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'banners',
        //         'created_by' => '1',
        //     ]
        // );
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'category',
        //         'created_by' => '1',
        //     ]
        // );
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'product',
        //         'created_by' => '1',
        //     ]
        // );
        // Tag::insertOrIgnore(
        //     [
        //         'name' => 'parallax',
        //         'created_by' => '1',
        //     ]
        // );


        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'demo',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'general',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'sliders',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'banners',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'category',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'product',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'parallax',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'home-blocks',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'home-sliders',
            ),
        ));
    }
}
