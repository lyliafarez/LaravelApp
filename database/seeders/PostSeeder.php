<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::get()->each(function($category){
            
                \App\Models\Post::factory(1)->create([
                    'category_id' => $category->id,
                    'user_id' =>User::inRandomOrder()->first()->id,
                ]);
            
        });
    }
}
