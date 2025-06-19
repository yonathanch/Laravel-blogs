<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Natan',
        //     'username' => 'tan',
        //     'email' => 'natan123@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Category::create([
        //     'name' => 'Web Developer',
        //     'slug' => 'Web-developer'
        // ]);


        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius doloribus perspiciatis dolor nemo, impedit, obcaecati iusto voluptatibus assumenda reiciendis, soluta reprehenderit laboriosam beatae quia saepe. Nulla nihil sapiente vel! Animi?'
        // ]);


        //  membuat post factory beserta user dan category
        // Post::factory(50)->recycle([
        //     Category::factory(3)->create(),
        //     User::factory(5)->create()
        // ])->create();

        // berikut cara agar membuat user natan masuk membuat artikel post juga dan tidak perlu menjadi admin
        // $natan = User::create([
        //     'name' => 'Natan',
        //     'username' => 'tan',
        //     'email' => 'natan123@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Post::factory(50)->recycle([
        //     Category::factory(3)->create(),
        //     $natan,
        //     User::factory(5)->create()
        // ])->create();
        
        
        //membuat kategori dan user terpisah di file categorySeeder dab UserSeeder
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(50)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
