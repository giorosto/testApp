<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Web Development',
            'Web Design',
            'Graphic Design',
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
        foreach($categories as $category){
            Blog::create([
                'title' => 'Blog - '.$category,
                'content' => 'Laravel 9.x is the best framework for web development. It is easy to use and has a lot of features. It is a must have for any web developer.',
                'image' => 'https://laravel.com/assets/img/laravel-logo.png',
                'user_id' => 1,
                'category_id' => Category::where('name', $category)->first()->id,
            ]);
        }
    }
}
