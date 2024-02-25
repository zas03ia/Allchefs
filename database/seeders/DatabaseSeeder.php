<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    /** 
     *
     *    
      *  @return void  
    */  
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            StorySeeder::class
        ]);
        $this->call([
            FavoriteSeeder::class
        ]);
        $this->call([
            RatingSeeder::class
        ]);
    }
    
}
