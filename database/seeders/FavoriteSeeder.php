<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Favorite;
use Faker\Factory as Faker;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for($i=0; $i<300;$i++){
            $favorite = new Favorite;
            $favorite->user_id=$faker->randomElement(range(1,200));
            $favorite->story_id=$faker->randomElement(range(1,300));
            $favorite->save();
        }
    }
}
