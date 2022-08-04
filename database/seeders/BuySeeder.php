<?php

namespace Database\Seeders;

use App\Models\buy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buys = array(
            array('id' => '1','product_id' => '3','quantity' => '12','delegate' => 'Non explicabo Omnis','delegate_phone' => '8923748934','note' => 'Quod eos non sunt ve','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:41:18','updated_at' => '2022-08-04 13:43:15'),
            array('id' => '2','product_id' => '11','quantity' => '900','delegate' => 'Sunt aliqua Est bla','delegate_phone' => '423435565','note' => 'Exercitationem assum','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:43:56','updated_at' => '2022-08-04 13:44:34'),
            array('id' => '3','product_id' => '2','quantity' => '865','delegate' => 'Ex accusantium quia ','delegate_phone' => '435465745','note' => 'Velit consequat Re','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:44:22','updated_at' => '2022-08-04 13:44:22'),
            array('id' => '4','product_id' => '8','quantity' => '184','delegate' => 'Iste voluptates accu','delegate_phone' => '','note' => 'Officia voluptas est','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:45:27','updated_at' => '2022-08-04 13:45:27'),
            array('id' => '5','product_id' => '11','quantity' => '348','delegate' => 'Consectetur non fac','delegate_phone' => '3434564564','note' => 'Iste cumque qui veni','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:46:30','updated_at' => '2022-08-04 13:46:30'),
            array('id' => '6','product_id' => '1','quantity' => '760','delegate' => 'Enim architecto reic','delegate_phone' => '','note' => 'Quod ullamco beatae ','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:48:47','updated_at' => '2022-08-04 13:48:47'),
            array('id' => '7','product_id' => '4','quantity' => '31','delegate' => 'Cillum ut consequatu','delegate_phone' => '','note' => 'Reiciendis inventore','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:54:03','updated_at' => '2022-08-04 13:54:03'),
            array('id' => '8','product_id' => '8','quantity' => '998','delegate' => 'Cupiditate voluptas ','delegate_phone' => '','note' => 'Ab velit quia perspi','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:55:16','updated_at' => '2022-08-04 13:55:16'),
            array('id' => '9','product_id' => '8','quantity' => '280','delegate' => 'Cumque qui omnis ips','delegate_phone' => '','note' => 'Quod nisi nesciunt ','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:57:54','updated_at' => '2022-08-04 13:57:54'),
            array('id' => '10','product_id' => '8','quantity' => '280','delegate' => 'Cumque qui omnis ips','delegate_phone' => '','note' => 'Quod nisi nesciunt ','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 13:58:18','updated_at' => '2022-08-04 13:58:18'),
            array('id' => '11','product_id' => '4','quantity' => '201','delegate' => 'Voluptatem qui non a','delegate_phone' => '','note' => 'Error repellendus S','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:00:11','updated_at' => '2022-08-04 14:00:11'),
            array('id' => '12','product_id' => '7','quantity' => '290','delegate' => 'Alias consequat Et ','delegate_phone' => '','note' => 'Adipisci quis illo a','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:00:37','updated_at' => '2022-08-04 14:00:37'),
            array('id' => '13','product_id' => '4','quantity' => '482','delegate' => 'Ex consectetur cupid','delegate_phone' => '','note' => 'Vitae quasi est nost','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:08:11','updated_at' => '2022-08-04 14:08:11'),
            array('id' => '14','product_id' => '7','quantity' => '637','delegate' => 'Et recusandae Rerum','delegate_phone' => '','note' => 'Laudantium expedita','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:10:28','updated_at' => '2022-08-04 14:10:28'),
            array('id' => '15','product_id' => '2','quantity' => '240','delegate' => 'Non provident et di','delegate_phone' => '','note' => 'Enim mollit velit d','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:14:06','updated_at' => '2022-08-04 14:14:06'),
            array('id' => '16','product_id' => '5','quantity' => '7','delegate' => 'Quia magna ullamco r','delegate_phone' => '','note' => 'Optio provident ad','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:15:31','updated_at' => '2022-08-04 14:15:31'),
            array('id' => '17','product_id' => '12','quantity' => '895','delegate' => 'Sint Nam aut alias ','delegate_phone' => '','note' => 'Inventore dolores ma','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:17:59','updated_at' => '2022-08-04 14:17:59'),
            array('id' => '18','product_id' => '8','quantity' => '756','delegate' => 'Nihil excepturi est','delegate_phone' => '','note' => 'Enim nihil voluptate','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:18:57','updated_at' => '2022-08-04 14:18:57'),
            array('id' => '19','product_id' => '7','quantity' => '777','delegate' => 'Ut est magni odit vo','delegate_phone' => '','note' => 'Quidem nostrum labor','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:21:44','updated_at' => '2022-08-04 14:21:44'),
            array('id' => '20','product_id' => '7','quantity' => '777','delegate' => 'Ut est magni odit vo','delegate_phone' => '','note' => 'Quidem nostrum labor','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:22:02','updated_at' => '2022-08-04 14:22:02'),
            array('id' => '21','product_id' => '7','quantity' => '524','delegate' => 'Temporibus corporis ','delegate_phone' => '556567','note' => 'Cillum ipsam ullamco','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:23:33','updated_at' => '2022-08-04 14:23:33'),
            array('id' => '22','product_id' => '7','quantity' => '524','delegate' => 'Temporibus corporis ','delegate_phone' => '5676577','note' => 'Cillum ipsam ullamco','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:23:58','updated_at' => '2022-08-04 14:23:58'),
            array('id' => '23','product_id' => '11','quantity' => '230','delegate' => 'Quibusdam rerum ipsu','delegate_phone' => '456','note' => 'Asperiores soluta in','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 14:24:40','updated_at' => '2022-08-04 14:24:40'),
            array('id' => '24','product_id' => '10','quantity' => '210','delegate' => 'Quis earum debitis q','delegate_phone' => '','note' => 'Minus sunt commodo ','user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 15:22:16','updated_at' => '2022-08-04 15:22:16'),
            array('id' => '25','product_id' => '6','quantity' => '65','delegate' => 'gfdg','delegate_phone' => '0770487587','note' => NULL,'user_id' => '1','deleted_at' => NULL,'created_at' => '2022-08-04 15:24:42','updated_at' => '2022-08-04 15:24:42'),
            array('id' => '26','product_id' => '13','quantity' => '56','delegate' => 'fdsfg','delegate_phone' => '0770487587','note' => NULL,'user_id' => '1','deleted_at' => '2022-08-04 17:26:46','created_at' => '2022-08-04 15:26:14','updated_at' => '2022-08-04 17:26:46'),
            array('id' => '27','product_id' => '13','quantity' => '435','delegate' => 'fsdfsdf','delegate_phone' => '0770487587','note' => NULL,'user_id' => '1','deleted_at' => '2022-08-04 17:26:44','created_at' => '2022-08-04 15:35:24','updated_at' => '2022-08-04 17:26:44'),
            array('id' => '28','product_id' => '2','quantity' => '455','delegate' => '34rt','delegate_phone' => '455456346','note' => NULL,'user_id' => '1','deleted_at' => '2022-08-04 17:26:40','created_at' => '2022-08-04 15:46:18','updated_at' => '2022-08-04 17:26:40')
          );


          foreach ($buys as  $value) {
            buy::create($value);
         }
    }
}
