<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Story;
use Faker\Factory as Faker;

class StorySeeder extends Seeder
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
            $story = new Story;
            $story->title=$faker->sentence();
            $story->content=$faker->paragraph(7);
            $story->user_id=$faker->randomElement(range(1,200));
            $story->avg_rating=$faker->randomFloat(1, 2, 5);
            $story->num_rating=$faker->randomElement(range(1,200));
            $story->genre=$faker->randomElement(["Romance","Comedy","Action","Thriller","Horror","Mystery"]);
            $story->save();
        }
    }
}
