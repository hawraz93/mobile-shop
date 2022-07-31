<?php

namespace Database\Seeders;

use App\Models\devices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices =[
            ['id' => '1','name' => 'iphone 8','model' => '2020','company' => 'apple','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 13:49:35','updated_at' => '2022-07-31 13:49:35'],
            ['id' => '2','name' => 'iphone max','model' => '2020','company' => 'apple','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 13:49:56','updated_at' => '2022-07-31 13:49:56'],
            ['id' => '3','name' => 'Note 9','model' => '2021','company' => 'samsong','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 13:50:37','updated_at' => '2022-07-31 13:50:37'],
            ['id' => '4','name' => 'galaxy a75','model' => '2020','company' => 'samsung','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 13:51:32','updated_at' => '2022-07-31 13:51:32'],
            ['id' => '5','name' => 'poco f1','model' => '2018','company' => 'xiome','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-07-31 13:54:14','updated_at' => '2022-07-31 13:54:14']
          ];
            foreach ($devices as  $value) {
                devices::create($value);
            }          
    }
}
