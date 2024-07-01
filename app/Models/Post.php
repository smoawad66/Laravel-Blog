<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; // Mass assignment unfillable attributes
    //protected $fillable = ['title', 'excerpt', 'body'];// Mass assignment fillable attributes


    // {$with} attribute is used to solve the n+1 problem where one query is executed for each post to get its category
    // It specifies which relationships will be eager-loaded automatically every time a post is fetched
    protected $with = ['category', 'author'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
        $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('category', fn ($query) =>
        $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) =>
        $query->where('username', $author)));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favouriteTo()
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id');
    }
}
