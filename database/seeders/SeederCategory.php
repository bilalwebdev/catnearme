<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['title' => 'Blog' , 'slug' => 'blog' , 'essence' => 'blog',  'created_at' => now() , 'updated_at' => now() ],

        ]);
    }
}
