<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSalary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 

class UserSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $current = 300;
        for ($i = 0; $i < 100; $i++){
            \DB::table('user_salaries')->insert([
                'user_id' =>$current + $i,
                'payslip_link' => $faker->url,
                'basic_salary'=> random_int(540, 1000),
                'food_allowance'=> random_int(50, 200),
                'position_allowance'=> random_int(50, 200),
                'effective_date'=> \Carbon\Carbon::now(),
                'end_date'=> \Carbon\Carbon::now(),
                'notes'=> $faker->paragraph,
                'salary_status'=> random_int(1, 4)
            ]);
        }
    }
}
