<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [   'id' => '1', 
                'name' => 'hawraz',
                'email' => 'hawraz@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$A80HaN3IAwj1PD1GkUUunuPWByhYGUQf9TtmOhtnPuCMqnqlkxkxC',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2022-07-24 12:39:48',
                'updated_at' => '2022-07-24 12:39:48'],
          ];
        foreach ($users as $value) {
            User::create($value);
        }
    
    }
}
