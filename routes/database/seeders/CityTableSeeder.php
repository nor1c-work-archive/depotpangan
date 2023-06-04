<?php

namespace Database\Seeders;

use App\Models\Admin\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::where('id', '>', '0')->delete();
        $file = fopen(public_path("cities.csv"), "r");
        while ( ($data = fgetcsv($file,0,",")) !== FALSE )
            {
                City::insertOrIgnore(
                    [
                        'id' => $data[0],
                        'name' => $data[1],
                        'state_id' => $data[2],
                        'country_id' => $data[3],
                    ]
                );
                
            }
        fclose($file);
    }
}
