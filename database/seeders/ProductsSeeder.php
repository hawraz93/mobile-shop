<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array('id' => '1','name' => 'Dominique Nichols','size' => 'Quas sint vitae omni','quality' => '47','type_id' => '1','quantity' => '575','sellPrice' => '6','buyPrice' => '14','color_id' => NULL,'device_id' => '2','box_id' => NULL,'user_id' => '1','note' => 'Magna dolore ea simi','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:06','updated_at' => '2022-08-04 18:52:54'),
            array('id' => '2','name' => 'Karly Stark','size' => 'Doloribus quaerat im','quality' => '57','type_id' => '4','quantity' => '687','sellPrice' => '975645','buyPrice' => '78','color_id' => NULL,'device_id' => '4','box_id' => NULL,'user_id' => '1','note' => 'Tempore repellendus','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:10','updated_at' => '2022-08-04 18:52:54'),
            array('id' => '3','name' => 'Germane Holman','size' => 'Tempore libero natu','quality' => '94','type_id' => '2','quantity' => '299','sellPrice' => '75','buyPrice' => '65','color_id' => NULL,'device_id' => '1','box_id' => NULL,'user_id' => '1','note' => 'Voluptatem Asperior','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:14','updated_at' => '2022-08-04 13:39:14'),
            array('id' => '4','name' => 'Dillon Hood','size' => 'Quidem atque quis nu','quality' => '28','type_id' => '1','quantity' => '679','sellPrice' => '64','buyPrice' => '60','color_id' => NULL,'device_id' => '4','box_id' => NULL,'user_id' => '1','note' => 'Ipsum iste exercitat','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:17','updated_at' => '2022-08-04 13:39:17'),
            array('id' => '5','name' => 'Walter Church','size' => 'Nam dignissimos ad o','quality' => '79','type_id' => '3','quantity' => '877','sellPrice' => '85','buyPrice' => '5','color_id' => NULL,'device_id' => '4','box_id' => NULL,'user_id' => '1','note' => 'Molestias ab dolores','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:20','updated_at' => '2022-08-04 13:39:20'),
            array('id' => '6','name' => 'Zenaida Wall','size' => 'Et iusto eum magni c','quality' => '17','type_id' => '1','quantity' => '895','sellPrice' => '19','buyPrice' => '4','color_id' => NULL,'device_id' => '1','box_id' => NULL,'user_id' => '1','note' => 'Possimus error irur','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:28','updated_at' => '2022-08-04 13:39:28'),
            array('id' => '7','name' => 'Hop Cervantes','size' => 'Sequi autem illo ist','quality' => '91','type_id' => '4','quantity' => '387','sellPrice' => '90','buyPrice' => '77','color_id' => NULL,'device_id' => '3','box_id' => NULL,'user_id' => '1','note' => 'Dolor consequuntur e','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:32','updated_at' => '2022-08-04 13:39:32'),
            array('id' => '8','name' => 'Sandra Carpenter','size' => 'Voluptas accusantium','quality' => '89','type_id' => '3','quantity' => '258','sellPrice' => '46','buyPrice' => '92','color_id' => NULL,'device_id' => '5','box_id' => NULL,'user_id' => '1','note' => 'Maxime culpa archite','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:35','updated_at' => '2022-08-04 13:39:35'),
            array('id' => '9','name' => 'Troy Sullivan','size' => 'Sit omnis harum non ','quality' => '83','type_id' => '2','quantity' => '874','sellPrice' => '46','buyPrice' => '32','color_id' => NULL,'device_id' => '2','box_id' => NULL,'user_id' => '1','note' => 'Asperiores qui inven','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:40','updated_at' => '2022-08-04 13:39:40'),
            array('id' => '10','name' => 'Chantale Mullen','size' => 'Ea voluptatem magna','quality' => '33','type_id' => '3','quantity' => '715','sellPrice' => '69','buyPrice' => '88','color_id' => NULL,'device_id' => '5','box_id' => NULL,'user_id' => '1','note' => 'Ut rerum quod quia t','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:49','updated_at' => '2022-08-04 13:39:49'),
            array('id' => '11','name' => 'Helen Christensen','size' => 'Qui doloribus sed un','quality' => '2','type_id' => '2','quantity' => '788','sellPrice' => '26','buyPrice' => '43','color_id' => NULL,'device_id' => '5','box_id' => NULL,'user_id' => '1','note' => 'Non cillum voluptas ','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:53','updated_at' => '2022-08-04 13:39:53'),
            array('id' => '12','name' => 'Keefe Gibbs','size' => 'Qui id voluptas maxi','quality' => '16','type_id' => '2','quantity' => '185','sellPrice' => '59','buyPrice' => '70','color_id' => NULL,'device_id' => '4','box_id' => NULL,'user_id' => '1','note' => 'Nihil sapiente ea at','deleted_at' => NULL,'created_at' => '2022-08-04 13:39:58','updated_at' => '2022-08-04 13:39:58'),
            array('id' => '13','name' => 'camera','size' => NULL,'quality' => NULL,'type_id' => '4','quantity' => '223','sellPrice' => '3','buyPrice' => '23','color_id' => NULL,'device_id' => '1','box_id' => NULL,'user_id' => '1','note' => NULL,'deleted_at' => NULL,'created_at' => '2022-08-04 15:25:51','updated_at' => '2022-08-04 15:25:51')
          );
          foreach ($products as  $value) {
            Products::create($value);
         }
    }
}
