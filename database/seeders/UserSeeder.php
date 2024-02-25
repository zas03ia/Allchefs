<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for($i=0; $i<200;$i++){
            $user = new User;
            $user->name=$faker->name;
            $user->email=$faker->email;
            $user->password=$faker->password;
            $user->save();
        }
    }
}
