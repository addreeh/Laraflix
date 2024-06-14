<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'username',
        'email',
        'email_verified_at',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function reviewedMovies()
    {
        return $this->belongsToMany(Movie::class, 'movie_reviews')->withPivot('comment', 'rating', 'created_at', 'updated_at', 'id');
    }

    public function followedMovies()
    {
        return $this->belongsToMany(Movie::class, 'movie_user_follows');
    }

    public function viewedMovies()
    {
        return $this->belongsToMany(Movie::class, 'movie_user_views');
    }
}
