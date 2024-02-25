<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for($i=0; $i<500;$i++){
            $rate = new Rating;
            $rate->user_id=$faker->randomElement(range(1,200));
            $rate->story_id=$faker->randomElement(range(1,300));
            $rate->ratings=$faker->randomElement(range(1,5));
            $rate->save();
        }
    }
}
