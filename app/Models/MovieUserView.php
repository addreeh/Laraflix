<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieUserView extends Model
{
    protected $fillable = [
        'user_id',
        'movie_id',
        'viewed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
