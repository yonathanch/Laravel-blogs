<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //membuat kategori  dengan factori data random
        //Category::factory(3)->create();

        //membuat kategory manual
        Category::create([
            'name' => 'Web developer',
            'slug' => 'web-developer',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Backend',
            'slug' => 'back-end',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Mobile dev',
            'slug' => 'Mobile-Dev',
            'color' => 'yellow'
        ]);
    }
}
