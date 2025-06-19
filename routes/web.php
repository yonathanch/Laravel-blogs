<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'HomePage']);
});

Route::get('/posts', function () {
    //"cara manual jika otomatis lakukan di model"n+1 problem 
    // $post = Post::with(['author', 'category'])->latest()->get();


    //latest jika ingin memanggil yang terbaru jika ingin memanggil yang paling lama pakel all() saja
    // $post = Post::latest()->get();
    // return view('posts', ['title' => 'Blog', 'posts' => $post]);


    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(8)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function( Post $post){     
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function( User $user){   
    //jika sudah memanggil parentnya kita ga bsa memakai with eager loading akan tetapi memakai load yaitu lazyload
    // $posts = $user->posts->load('category', 'author');
        return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function( Category $category){     

        // $posts = $category->posts->load('category', 'author');
        return view('posts', ['title' => ' Articles in ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});





