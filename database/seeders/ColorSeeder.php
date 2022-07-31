<?php

namespace Database\Seeders;

use App\Models\color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = array(
            array('id' => '1','color' => 'white','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:15:44','updated_at' => '2022-07-31 14:15:44'),
            array('id' => '2','color' => 'black','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:15:58','updated_at' => '2022-07-31 14:15:58'),
            array('id' => '3','color' => 'gold','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:16:08','updated_at' => '2022-07-31 14:16:08')
          );

          foreach ($colors as  $value) {
             color::create($value);
          }
    }
}
