<?php

namespace Database\Seeders;

use App\Models\types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array('id' => '1','name' => 'screen','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:16:16','updated_at' => '2022-07-31 14:16:16'),
            array('id' => '2','name' => 'battre','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:16:20','updated_at' => '2022-07-31 14:16:20'),
            array('id' => '3','name' => 'IC','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:16:24','updated_at' => '2022-07-31 14:16:24'),
            array('id' => '4','name' => 'camera','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 14:16:28','updated_at' => '2022-07-31 14:16:28')
          );
          

          foreach ($types as $value) {
            types::create($value);
          }
    }
}
