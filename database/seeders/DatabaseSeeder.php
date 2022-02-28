<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *  
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(function($user){ 
            Comment::factory()->times(rand(1, 20))->create(['user_id' => $user->id]);
            Article::factory()->times(rand(1, 20))->create(['user_id' => $user->id, 'published_at' => now(), 'votes' => rand(0, 10)]);
        }); 
    }
}
