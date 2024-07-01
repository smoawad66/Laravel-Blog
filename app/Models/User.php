<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    // auto mutate any attribute before inserting the record in the database
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // auto hash passwords
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Post::class, 'favourites', 'user_id', 'post_id');
    }

    public function trunc($attribute, $length)
    {
        return substr($this->$attribute, 0, $length) . (strlen($this->$attribute) > $length ? ' ...' : '');
    }
}
