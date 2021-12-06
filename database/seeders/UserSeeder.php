<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $faker = \Faker\Factory::create();
        $current = 300;
        for ($i = 0; $i < 100; $i++){
            \DB::table('users')->insert([
                'user_id' =>$current + $i,
                'email' => $faker->safeEmail,
                'email_verified_at'=> NULL,
                'password'=> Hash::make('12345678'),
                'is_admin'=>random_int(1, 4)
            ]);
        }
    }
}
