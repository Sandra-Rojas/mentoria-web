<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

        User::truncate();
        Category::truncate();
        Post::truncate();

        Post::factory()->create();
        //se comenta para agregar truncate de Post llamar a post factory  para crear una cantidad de post
         //\App\Models\User::factory(10)->create();
         //\App\Models\User::factory()->create();

         // $user = User::factory()->create();

         // $personal = Category::create([
         //    'name' => 'Personal',
         //    'slug' => 'personal',
         // ]);

         // $work = Category::create([
         //    'name' => 'Work',
         //    'slug' => 'worh',
         // ]);
         
         // $hobbies = Category::create([
         //    'name' => 'Hobbies',
         //    'slug' => 'hobbies',
         // ]);

         // Post::create([
         //     'category_id' => $work->id,
         //     'user_id' => $user->id,
         //     'slug' => 'my-firt-post',
         //     'title' => 'My First Post',
         //     'resumen' => 'The are many',
         //     'body' => 'Teha are many viartions',
         // ]);
        
      }
}
