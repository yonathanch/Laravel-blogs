<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    //n+1 problem eagerloading di model tambahin with 
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // jika memakai ternary
        // if(isset($filters['search']) ? $filters['search'] : false)

        $query->when(
            $filters['search'] ?? false, 
            fn ($query, $search) => 
            $query->where('title', 'like', '%' . $search . '%')
        ); 

        //jika sudah punya relasi yaitu kode diatas query->when search maka ditambahkan whereHas dengan relasi model post public function category() 
        //dan slug karna dalam route Route::get('/posts/{post:slug}' diambil slug
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn($query)=>
            $query->where('slug', $category))
        );

        //jika sudah punya relasi yaitu kode diatas query->when search maka ditambahkan whereHas dengan relasi model post public function author() 
        //dan slug karna dalam route Route::get('/authors/{user:username}' diambil username
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn($query)=>
            $query->where('username', $author))
        );
    }
}
